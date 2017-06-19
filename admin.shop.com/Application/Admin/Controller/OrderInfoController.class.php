<?php
/**
 * Created by PhpStorm.
 * User: dy
 * Date: 2016/5/23
 * Time: 22:32
 */

namespace Admin\Controller;


use Think\Controller;

class OrderInfoController extends BaseController
{
    //展示订单信息
    public function index(){
        $where=array();
        if(IS_POST){
            $order_sn=trim(I('post.order_sn'));
          //  $receiver=I('post.receiver');
            $pay_status=I('post.pay_status');
            $shipping_status=I('post.shipping_status');
            $order_status=I('post.order_status');
            //订单号
            if(!empty($order_sn)){
                $where['sn']=array('eq',$order_sn);
            }
            //支付状态
            if($pay_status != -99){
                $where['pay_status']=array('eq',$pay_status);
            }
            //发货状态
            if($shipping_status != -99){
                $where['shipping_status']=array('eq',$shipping_status);
            }
            //订单状态
            if($order_status != -99){
                $where['order_status']=array('eq',$order_status);
            }
            $this->assign(get_defined_vars());

        }
        $model=D('OrderInfo');
        $orders= $model->getOrderInfoList($where);
        $this->assign('orders',$orders);
        $this->display('index');
    }
    //详情
    public function edit($id){
//        echo $id;
        $model=D('OrderInfo');
        $rst= $model->getList($id);
        $this->assign('orders',$rst['orders']);
        $this->assign('infos',$rst['infos']);
        $this->display('edit');
    }

    //改变物流状态
    public function change(){
        $shipping_status=I('post.shipping_status','','int'); //物流状态
        $order_id=I('post.order_id','','int');
        $model=D('OrderInfo');
       $rst= $model->change($shipping_status,$order_id);
        if($rst){
            $result['status']=1;
            $result['info']='状态设置成功';
        }else{
            $result['status']=0;
            $result['info']='状态设置失败';
        }
        $result['url']=U('index');
        $this->ajaxReturn($result);
    }
    public function change2(){
        $pay_status=I('post.pay_status','','int'); //物流状态
        $order_id=I('post.order_id','','int');
        $model=D('OrderInfo');
        $rst= $model->change2($pay_status,$order_id);
        if($rst){
            $result['status']=1;
            $result['info']='状态设置成功';
        }else{
            $result['status']=0;
            $result['info']='状态设置失败';
        }
        $result['url']=U('OrderInfo/index');
        $this->ajaxReturn($result);
    }


    //改变收货状态之退货
    public function back(){
        $order_id=I('post.order_id','','int');
        $order_status=I('post.order_status','','int');// 收货状态
        $model=D('OrderInfo');
        $rst= $model->back($order_status,$order_id);
        if($rst){
            $result['status']=1;
            $result['info']='成功';
        }else{
            $result['status']=0;
            $result['info']='失败';
        }
        $result['url']=U('OrderInfo/index');
        $this->ajaxReturn($result);
    }

    /**
     * 修改状态。（移除和修改是否显示）
     * @param $id
     * @param int $status
     */
    public function changeStatus($id, $status = -1)
    {
        if ($this->model->changeStatus($id, $status) !== false) {
            $this->success('操作成功', cookie('__forword__'));
        } else {
            $this->error('操作失败');
        }
    }
}