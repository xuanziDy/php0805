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
            $data['order_sn']=I('post.order_sn');  //订单
            $data['member_id']=UID;
            $data['create_at']=time();
            $data['replay']='';
            $data['update_at']=date('Y-m-d H:i:s');
            $data['status']=1; //0=未评价 1=已评价

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
            $sn= I('get.order_sn');
            //根据货号查询到商品
            $goods= M('order_info')->alias('oi')->join('__ORDER_INFO_ITEM__ AS oii ON oii.order_info_id=oi.id')->where(array('oi.sn'=>$sn))->field('oii.goods_id,oii.logo')->select();
//            $goods_ids=implode(array_column($goods_ids,'goods_id'),',');
//            echo $goods_ids;
//            $commetns=M('comment')->field('goods_id,content,replay,status,create_at,order_sn')->where(array('order_sn'=>$sn))->where("goods_id in ($goods_ids)")->select();
//           echo  M('comment')->getLastSql();
            dd($goods);

            $this->assign('order_sn',$sn);
//            $this->assign('goods',$goods);
            $this->display('add');
        }

    }
}