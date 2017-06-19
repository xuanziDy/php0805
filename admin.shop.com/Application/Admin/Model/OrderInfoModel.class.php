<?php
namespace Admin\Model;

use Think\Model;
use Think\Page;

class OrderInfoModel extends BaseModel
{
    protected $page_size=10;
    //展示
    public function getOrderInfoList($where=array()){

        $where['status']=array('gt',0);
        //所有订单
        $orders=$this->field("id,sn,receiver,pay_status,order_status,shipping_status,inputtime")->where($where)
            ->order('id','desc')->select();
//        echo $this->getLastSql();
//        exit;
        if(!empty($orders)){
            $order_ids=implode(',',array_column($orders,'id'));
            $prices= M('order_info_item')->where("order_info_id in ($order_ids)")->field('order_info_id,price')->select();
            foreach($orders as $k=>&$order){
                foreach($prices as $price){
                    $order['order_time']=date('Y-m-d H:i:s',$order['inputtime']);
                    if($order['id']==$price['order_info_id']){
                        $orders[$k]['money']+=$price['price'];
                    }
                }
            }
        }
//        var_dump($orders);
        return empty($orders)?array():$orders;
    }

    public function getList($order_id){
//        echo $order_id;
        $orders=$this->alias('oi')->join('member as m on m.id=oi.member_id')->field('oi.*,m.username')->where(array('oi.id'=>$order_id))->find();
//        echo $this->getLastSql();
//        dd($orders);
        $order_infos= M('order_info_item')->alias('oii')->join('__GOODS__ AS g ON  oii.goods_id=g.id')->where("oii.order_info_id = {$orders['id']}")->field('oii.order_info_id,oii.goods_id,oii.name,oii.shop_price,oii.num,oii.price,oii.logo,g.stock')->select();

        return array(
            'orders'=>$orders,
            'infos'=>$order_infos
        );
    }

    //改变发货状态
    public function change($shipping_status,$order_id){
        return $this->where(array('id'=>$order_id))->save(array('shipping_status'=>$shipping_status));
    }

    //改变收货状态
    public function change2($pay_status,$order_id){
        return $this->where(array('id'=>$order_id))->save(array('pay_status'=>$pay_status));
    }
    //改变收货状态
    public function back($order_status,$order_id){
        return $this->where(array('id'=>$order_id))->save(array('order_status'=>$order_status));
    }

    /**
     * 根据id去改变一条数据的状态。
     * @param $id
     * @param $status
     */
    public function changeStatus($id, $status)
    {
        $data = array('status' => $status);
        $wheres = array('id' => array('in', $id));
        if ($status == -1) {
            $data['name'] = array('exp', 'concat(name,"_del")');
        }
        return $this->where($wheres)->save($data);
    }
}