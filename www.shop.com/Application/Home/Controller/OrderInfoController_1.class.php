<?php
/**
 * Created by PhpStorm.
 * User: ying
 * Date: 2015/11/20
 * Time: 18:56
 */

namespace Home\Controller;


use Think\Controller;

class OrderInfoController extends Controller
{
    public function index()
    {
        if (!isLogin()) {
            //>>1.1.没有登录，就去登录。
            $this->error('请登录', U('/checkLogin'));
        }
        //>>2.准备购物车中商品信息。
        $ShoppingCarModel = D('ShoppingCar');
        $rst = $ShoppingCarModel->getList();
        $this->assign('shoppingCars', $rst['shoppingCar']);
        $this->assign('total_money', $rst['total_money']);

        //>>3.准备收货人信息
        $addressModel = D('Address');
        $addresses = $addressModel->getList();
        $this->assign('addresses', $addresses);

        //>>4.准备送货方式
        $deliveryModel = D('Delivery');
        $deliverys = $deliveryModel->get("id,name,price,intro,is_default");
        $this->assign('deliverys', $deliverys);
        //>>5.准备支付方式
        $payTypeModel = D('PayType');
        $payTypes = $payTypeModel->get();
        $this->assign('payTypes', $payTypes);

        $this->display('index');
    }



    //保存订单信息。
    public function add()
    {
        //>>1.接收表单传递的数据，不用create是因为create只能收集orderinfo表中字段的信息。
        $params = I('post.');
        //>>2.放model去保存数据。
        $orderInfoModel = D('OrderInfo');
        $result = $orderInfoModel->add($params);
        if ($result !== false) {
            $this->success('下单成功，请支付',U('pay',array('id'=>$result)));
        } else {
            $this->error('下单失败:'.$orderInfoModel->getError());
        }
    }


    /**
     * 根据id区查询一条订单的信息。
     * @param $id
     */
    public function Pay($id){
        $orderInfoModel = D('OrderInfo');
        $orderInfo  = $orderInfoModel->get($id);
        $orderInfo['id']=$id;
        $this->assign($orderInfo);
        $this->display('pay');
    }

    /**
     * 根据订单id进行支付：因为支付宝要求传递订单的信息，才可以支付。
     * @param $id
     */
//    public function doPay($id){
//        $orderInfoModel = D('OrderInfo');
//        $orderInfoModel->doPay($id);
//    }

    public function doPay($order_id){
        //更改订单支付状态
        $orderInfoModel = D('OrderInfo');
       $rst= $orderInfoModel->doPay($order_id);
        if($rst){
            $this->success('支付成功',U('Index/index'));
        }else{
            $this->error('支付失败');
        }
    }




    /**
     * 支付宝请求网站的状态
     */
//    public function notify_url(){
//        //>>1.通过C方法获取支付宝的配置
//        $alipay_config = C('ALIPAY_CONFIG');
//        //>>2.加载该类
//        vendor("Alipay.lib.alipay_notify#class");
//        //计算得出通知验证结果
//        $alipayNotify = new \AlipayNotify($alipay_config);
//        $verify_result = $alipayNotify->verifyNotify();  //验证该请求是否来源于支付宝
//
//        if($verify_result) {//验证成功
//            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//            //请在这里加上商户的业务逻辑程序代
//
//
//            //——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
//
//            //获取支付宝的通知返回参数，可参考技术文档中服务器异步通知参数列表
//
//            //商户订单号
//
//            $out_trade_no = $_POST['out_trade_no'];
//
//            //支付宝交易号
//
//            $trade_no = $_POST['trade_no'];
//
//            //交易状态
//            $trade_status = $_POST['trade_status'];
//
//            if($_POST['trade_status'] == 'WAIT_BUYER_PAY') {
//                //该判断表示买家已在支付宝交易管理中产生了交易记录，但没有付款
//
//                //判断该笔订单是否在商户网站中已经做过处理
//                //如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
//                //请务必判断请求时的price、quantity、seller_id与通知时获取的price、quantity、seller_id为一致的
//                //如果有做过处理，不执行商户的业务程序
//
//                echo "success";		//请不要修改或删除
//
//                //调试用，写文本函数记录程序运行情况是否正常
//                //logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
//            }
//            else if($_POST['trade_status'] == 'WAIT_SELLER_SEND_GOODS') {
//                //该判断表示买家已在支付宝交易管理中产生了交易记录且付款成功，但卖家没有发货
//
//
//                //
//
//                //根据订单号$out_trade_no 更改当前网站中的订单状态
//                $this->where(array('sn'=>$out_trade_no))->save(array('order_status'=>1,'pay_status'=>2));
//
//                //判断该笔订单是否在商户网站中已经做过处理
//                //如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
//                //请务必判断请求时的price、quantity、seller_id与通知时获取的price、quantity、seller_id为一致的
//                //如果有做过处理，不执行商户的业务程序
//
//                echo "success";		//请不要修改或删除
//
//                //调试用，写文本函数记录程序运行情况是否正常
//                //logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
//            }
//            else if($_POST['trade_status'] == 'WAIT_BUYER_CONFIRM_GOODS') {
//                //该判断表示卖家已经发了货，但买家还没有做确认收货的操作
//
//
//                $this->where(array('sn'=>$out_trade_no))->save(array('order_status'=>5,'shipping_status'=>1));
//                //判断该笔订单是否在商户网站中已经做过处理
//                //如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
//                //请务必判断请求时的price、quantity、seller_id与通知时获取的price、quantity、seller_id为一致的
//                //如果有做过处理，不执行商户的业务程序
//
//                echo "success";		//请不要修改或删除
//
//                //调试用，写文本函数记录程序运行情况是否正常
//                //logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
//
//
//            }
//            else if($_POST['trade_status'] == 'TRADE_FINISHED') {
//                //该判断表示买家已经确认收货，这笔交易完成
//                //判断该笔订单是否在商户网站中已经做过处理
//                //如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
//                //请务必判断请求时的price、quantity、seller_id与通知时获取的price、quantity、seller_id为一致的
//                //如果有做过处理，不执行商户的业务程序
//
//                echo "success";		//请不要修改或删除
//
//                //调试用，写文本函数记录程序运行情况是否正常
//                //logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
//            }
//            else {
//                //其他状态判断
//                echo "success";
//
//                //调试用，写文本函数记录程序运行情况是否正常
//                //logResult ("这里写入想要调试的代码变量值，或其他运行的结果记录");
//            }
//
//            //——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
//
//            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//        }
//        else {
//            //验证失败
//            echo "fail";
//
//            //调试用，写文本函数记录程序运行情况是否正常
//            //logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
//        }
//    }


//    public function show($id){
//        $orderInfoModel = D('OrderInfo');
//        $order_info=$orderInfoModel->get($id);
//        $this->assign($order_info);
//        $this->display('show');
//    }


    //个人中心查看订单
    public function getOrderInfoList(){
        header('Content-type:text/html;charset=utf-8');
       if(!Login()){
           redirect(U('Member/checkLogin'));
       }else{
           $member_id=UID;
       }
        $orderInfoMpder=D('OrderInfo');
        //某个订单的详情
//        $infos=$orderInfoMpder->getOrderInfoList($member_id);
//        dd($infos);



        //得到所欲订单号
        $sns=$orderInfoMpder->where(array('member_id'=>$member_id))->field('id,sn,pay_status,shipping_status,order_status')->select();
        $goods=$comments=array();
        //得到所有的商品
        if(!empty($sns)){
            $sns_ids=implode(',',array_column($sns,'id'));
            $goods= M('order_info_item')->where("order_info_id in ($sns_ids)")->select();
            $comments=M('comment')->where(array('member_id'=>$member_id,'status'=>1))->select();
//            foreach($goods as $good){
//                foreach($comments as $comment){
//                    if($good[''])
//                }
//            }
        }

//echo "<pre/>";
//        print_r($sns);
//        print_r($goods);
//        exit;
//        $this->assign('infos',$infos);
        $this->assign('sns',$sns);
        $this->assign('goods',$goods);
        $this->assign('comments',$comments);
        $this->display('orderInfo');
    }

    //用户改变收货状态
    public function affirm(){
        $order_id=I('post.order_id','','int');
        $order_status=I('post.order_status','','int');// 收货状态
        $model=D('OrderInfo');
        $rst= $model->affirm($order_status,$order_id);
        if($rst){
            $result['status']=1;
            $result['info']='成功';
        }else{
            $result['status']=0;
            $result['info']='失败';
        }
        $result['url']=U('getOrderInfoList');
        $this->ajaxReturn($result);
    }

    //用户删除个人已经确认收货的订单
    public function deleteOrder(){
        $order_id=I('post.order_id','','int');
        $model=D('OrderInfo');
       $rst=$model->where(array('id'=>$order_id))->save(array('status'=>-1));
        if($rst){
            $result['status']=1;
            $result['info']='成功';
        }else{
            $result['status']=0;
            $result['info']='失败';
        }
        $result['url']=U('getOrderInfoList');
        $this->ajaxReturn($result);
    }
}