<?php
/**
 * Created by PhpStorm.
 * User: dy
 * Date: 2016/5/22
 * Time: 22:38
 */

namespace Home\Controller;


use Think\Controller;

class CommentController extends Controller
{

    //新增评价
    public function add(){
        header('Content-Type:text/html;charset=utf-8');
        if(!Login()){
            $this->redirect(U('Member/checkLogin'));
        }else{
            $member_id=UID;
        }
        if(IS_POST){
            $data['start']=I('post.start',1,'int');  //星级
            $data['content']=I('post.content');
            $data['order_id']=I('post.order_id');  //订单
            $data['goods_ids']=I('post.goods_ids');  //商品
            $data['member_id']=UID;
            $data['create_at']=time();
            $data['replay']='';
            $data['update_at']=date('Y-m-d H:i:s');
            $data['status']=1; //0=未评价 1=已评价
//            dd($data);

            $rst=M('Comment')->add($data);
            if($rst){
                $result['status']=1;
                $result['info']='评价成功';
            }else{
                $result['status']=0;
                $result['info']='评价失败';
            }
            $result['url']=U('OrderInfo/getOrderInfoList');
            $this->ajaxReturn($result);
        }else{
            $order_id= I('get.order_id');
            $goods_ids= M('order_info_item')->where(array('order_info_id'=>$order_id))->field('goods_id')->select();
            $goods_ids=implode(',',array_column($goods_ids,'goods_id'));

            $this->assign('order_id',$order_id);
            $this->assign('goods_ids',$goods_ids);
            $this->display('add');
        }

    }
}