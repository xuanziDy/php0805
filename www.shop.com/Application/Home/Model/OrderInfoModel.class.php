<?php
/**
 * Created by PhpStorm.
 * User: ying
 * Date: 2015/11/21
 * Time: 21:06
 */

namespace Home\Model;


use Think\Model;

class OrderInfoModel extends Model
{
    /**
     * 将请求中的订单保存在是哪个表中。
     */
    public function add($requestData)
    {
        header('content-type:text/html;charset=utf-8');
        $this->startTrans();
        //>>1.准备order_info表中数据.
        $orderInfo = array();
            //>>1.1根据收货人地址id查询出需要的数据。
            $address_id = $requestData['address_id'];
            $addressModel = D('Address');
            $address = $addressModel->get($address_id);
            $orderInfo = array_merge($orderInfo, $address);

            //>>1.2查询出送货方式的id,名字,价格.
            $delivery_id = $requestData['delivery_id'];
            $deliveryModel = D('Delivery');
            $delivery = $deliveryModel->getDelivery($delivery_id);
            $delivery['delivery_id'] = $delivery_id;
            $orderInfo = array_merge($orderInfo, $delivery);

            //>>1.3查询出支付方式的pay_type_name
            $payType['pay_type_id'] = $requestData['pay_type_id'];
            $payType['pay_type_name'] = M('PayType')->getFieldById($requestData['pay_type_id'], 'name');
            $orderInfo = array_merge($orderInfo, $payType);


            //>>1.4准备会员id和订单时间.
            $orderInfo['member_id'] = UID;
            $orderInfo['inputtime'] = NOW_TIME;

            //>>1.5 准备下单时的订单状态
                $orderInfo['order_status'] = 0;
                $orderInfo['shipping_status'] = 0;
                $orderInfo['pay_status'] = 0;

            //>>1.6准备订单中的价格=购物车总价+运费.
                //>>a.购物车信息和总价
                $shoppingCarModel = D('ShoppingCar');
                 $shoppingCar = $shoppingCarModel->getList();
                //>>b.购物车总价+运费
                 $orderInfo['price'] = $shoppingCar['total_money']+$orderInfo['delivery_price'];


            //>>1.7去数据库中查询购买量是否大于库存量。
            $file=fopen('./stock.lock','w+'); //以读写的方式打开文件
            if(flock($file,LOCK_EX)){
                foreach($shoppingCar['shoppingCar'] as $item){
                    $row=M('Goods')->where(array('id'=>$item['goods_id'],'stock'=>array('EGT',$item['num'])))->find();
                    if(empty($row)){
                        //>>如果为空，表示购买数量大于库存量。
                        $this->error=$item['name'].'的存库不足';
                        $this->rollback();
                        return false;
                    }else{
                        //>>库存量>购买数量  ===>  减少库存。
                       $result= M('Goods')->where(array('id'=>$item['goods_id'],'member_id'=>UID))->setDec('stock',$item['num']);
                        if($result===false){
                            $this->error=$item['name'].'的库存减少失败！';
                            $this->rollback();
                            return false;
                        }
                    }
                }
                flock($file,LOCK_UN);  //解锁
            }
            fclose($file);  //关闭文件

        //>>2.保存到order_info表中
        $order_info_id=parent::add($orderInfo);
        if($order_info_id===false){
            $this->error='保存订单信息失败';
            $this->rollback();
            return false;
        }

        //>>3.准备order_info_item表中所需数据。
        $orderInfoItem=array();
        foreach ($shoppingCar['shoppingCar'] as $item) {
            $item['order_info_id']=$order_info_id;
            $item['price']=$item['num']*$item['shop_price'];
            $item['id']=null;
            $orderInfoItem[]=$item;
        }

        //>>4.保存数据到order_info_item中。
        $orderInfoItemModel=M('OrderInfoItem');
        $orderInfoItemModel->addAll($orderInfoItem);

        //>>5.准备发票数据。
//        if($requestData['invoice']==1){
//            //需要
//            //>>5.1准备发票的名字
//            $invoice=array();
//            if($requestData['invoice_type']==1){  //个人
//                $invoice['name']=UID;  //发票名字为用户名。
//            }else{
//                $invoice['name']=$requestData['invoice_input'];  //单位---输入的公司名字
//            }
//            //>>5.2准备发票的具体内容
//            if($requestData['invoice_content']=="明细"){
//                //拼凑
//                $invoice_content='';
//                foreach ($orderInfoItem as $item) {
//                    $invoice_content .= $item['name'].$item['num'].$item['price']."<br/>";
//                }
//            }else{
//                //简单式
//                $invoice_content=$requestData['invoice_content'];
//            }
//
//            $invoice['order_info_id']=$order_info_id;
//            $invoice['content']=$invoice_content;
//            $invoice['price']=$shoppingCar['total_money'];  //购物车总价
//
//            //>>6.保存发票信息到invoice表中.
//            $invoice_id=M('invoice')->add($invoice);
//            if($invoice_id===false){
//                $this->error='保存发票信息失败';
//                $this->rollback();
//                return false;
//            }
//        }
        //>>7.生成sn,把生成的发票id更新到order_info中
        $sn = date('Ymd').str_pad($order_info_id,12,0,STR_PAD_LEFT);  //生成20位的订单号，不够的用0左填充

        $result  = parent::save(array('id'=>$order_info_id,'sn'=>$sn));
        if($result===false){
            $this->error = '更新订单失败!';
            $this->rollback();
            return false;
        }


        //>>8.清空购物车中的数据。
        $result=M('ShoppingCar')->where(array('member_id'=>UID))->delete();
        if($result===false){
            $this->error = '更新库存失败!';
            $this->rollback();
            return false;
        }


        $this->commit();
        return $order_info_id;
    }

    /**
     * 根据id得到order_info表中的数据
     * @param $id
     * @return mixed
     */
    public function get($id){
        return $this->field("sn,price,pay_type_id")->find($id);
    }

    /**
     * 利用支付宝（第三方插件）的支付，
     * @param $id
     */
//    public function doPay($id){
//        //>>1.根据id找到订单信息
//        $orderInfo = $this->find($id);
//        //>>2.根据订单信息进行支付
//        $alipay_config = C('ALIPAY_CONFIG');
//
//        vendor('Alipay.lib.alipay_submit#class');
//        /**************************请求参数**************************/
//
//        //支付类型
//        $payment_type = "1";
//        //必填，不能修改
//        //服务器异步通知页面路径
//        $notify_url = "http://www.shop.com/index.php/OrderInfo/notify_url";
//        //需http://格式的完整路径，不能加?id=123这类自定义参数
//
//        //页面跳转同步通知页面路径
//        $return_url = "http://www.shop.com/index.php/Index/index";  //支付完成后回到网站首页
//        //需http://格式的完整路径，不能加?id=123这类自定义参数，不能写成http://localhost/
//
//        //商户订单号
//        $out_trade_no = $orderInfo['sn'];
//        //商户网站订单系统中唯一订单号，必填
//
//        //订单名称
//        $subject = '韩国馆订单';
//        //必填
//
//        //付款金额
//        $price = $orderInfo['price'];
//        //必填
//
//        //商品数量
//        $quantity = "1";
//        //必填，建议默认为1，不改变值，把一次交易看成是一次下订单而非购买一件商品
//        //物流费用
//        $logistics_fee = $orderInfo['delivery_price'];
//        //必填，即运费
//        //物流类型
//        $logistics_type = "EXPRESS";
//        //必填，三个值可选：EXPRESS（快递）、POST（平邮）、EMS（EMS）
//        //物流支付方式
//        $logistics_payment = "SELLER_PAY";
//        //必填，两个值可选：SELLER_PAY（卖家承担运费）、BUYER_PAY（买家承担运费）
//        //订单描述
//
//        $body = '韩国馆订单';
//        //商品展示地址
//        $show_url = "http://www.shop.com/index.php/OrderInfo/show/id/".$id;
//        //需以http://开头的完整路径，如：http://www.商户网站.com/myorder.html
//
//        //收货人姓名
//        $receive_name = $orderInfo['receiver'];
//        //如：张三
//
//        //收货人地址
//        $receive_address = $orderInfo['province_name'].$orderInfo['city_name'].$orderInfo['area_name'].$orderInfo['detail_address'];
//        //如：XX省XXX市XXX区XXX路XXX小区XXX栋XXX单元XXX号
//
//        //收货人邮编
//        $receive_zip = '123456';
//        //如：123456
//
//        //收货人电话号码
//        $receive_phone = $orderInfo['tel'];
//        //如：0571-88158090
//
//        //收货人手机号码
//        $receive_mobile = $orderInfo['tel'];
//        //如：13312341234
//
//
//        /************************************************************/
//
////构造要请求的参数数组，无需改动
//        $parameter = array(
//            "service" => "create_partner_trade_by_buyer",
//            "partner" => trim($alipay_config['partner']),
//            "seller_email" => trim($alipay_config['seller_email']),
//            "payment_type"	=> $payment_type,
//            "notify_url"	=> $notify_url,
//            "return_url"	=> $return_url,
//            "out_trade_no"	=> $out_trade_no,
//            "subject"	=> $subject,
//            "price"	=> $price,
//            "quantity"	=> $quantity,
//            "logistics_fee"	=> $logistics_fee,
//            "logistics_type"	=> $logistics_type,
//            "logistics_payment"	=> $logistics_payment,
//            "body"	=> $body,
//            "show_url"	=> $show_url,
//            "receive_name"	=> $receive_name,
//            "receive_address"	=> $receive_address,
//            "receive_zip"	=> $receive_zip,
//            "receive_phone"	=> $receive_phone,
//            "receive_mobile"	=> $receive_mobile,
//            "_input_charset"	=> trim(strtolower($alipay_config['input_charset']))
//        );
//
//        header('Content-Type: text/html;charset=utf-8');
//        //建立请求
//        $alipaySubmit = new \AlipaySubmit($alipay_config);
//        $html_text = $alipaySubmit->buildRequestForm($parameter,"get", "确认");
//        echo $html_text;
//    }


    /**
     * order_status 0未确认 1已确认 -1 退货
     * pay_status 0 未付款 1 已付款
     *
     * @param $order_id
     */
    public function doPay($order_id){
       return  $this->where('id',$order_id)->save(array('pay_status'=>1));
    }

    public function getOrderInfoList($member_id){
        $where=array(
            'oi.member_id'=>$member_id,
            'oi.status'=>1
        );
        //所有订单
        $orders=$this->alias('oi')->join('LEFT JOIN `comment` AS c ON oi.id=c.order_id')->where($where)->field("oi.id as order_id,oi.sn,oi.pay_status,oi.order_status,oi.shipping_status,c.`status` as comment_status")->select();
//        dd($orders);
        $map=array();
        if(!empty($orders)){
            $order_ids=arr2str(array_column($orders,'order_id'),',');
            $infos=M('order_info_item')->where("order_info_id in ($order_ids)")->select();
            foreach($orders as $k=>$order){
                foreach($infos as $info){
                    $info['logo']='http://admin.shop.com/Uploads/'.$info['logo'];
                    unset($info['id']);
                    if($order['order_id']==$info['order_info_id']){
                        $map[$k]['sn']=$order['sn'];
                        $map[$k]['list'][]=array_merge($order,$info);
                    }
                }
            }
        }
        return $map;
    }

    public function affirm($order_status,$order_id){
        return $this->where(array('id'=>$order_id))->save(array('order_status'=>$order_status));
    }

}