<?php
/**
 * Created by PhpStorm.
 * User: ying
 * Date: 2015/11/17
 * Time: 17:56
 */

namespace Home\Controller;


use Think\Controller;

class ShoppingCarController extends Controller
{

    /**
     * 展示购物车中商品
     */
    public function index()
    {
        header('Content-Type:text/html;charset=utf-8');
        if(!isLogin()){
           $this->redirect('Member/checkLogin');
        }
//        $shoppingCarModel=D('ShoppingCar');
//        $rst=$shoppingCarModel->getList();
//        dump($rst);
//        exit;

//        $this->assign('shoppingCar',$rst['shoppingCar']);
//        $this->assign('total_money',$rst['total_money']);

        $this->display('index');
    }

    public function getCarsData(){
        $shoppingCarModel=D('ShoppingCar');
        $rst=$shoppingCarModel->getList();
        $data['status'] =1;
        $data['msg'] ='成功';
        $data['shoppingCar'] =$rst['shoppingCar'];
        $this->ajaxReturn($data,'json');
    }



    /**
     * 添加到购物车
     */
    public function add()
    {
        if(!isLogin()){
            //没登录
            $res['status']=2;
            $res['msg']='请登录';
            $res['url']=U('Member/checkLogin');
            $this->ajaxReturn($res);
        }
        //>>1.接收参数
        $params = I('post.');
        //>>2.把商品加入到购物车中（cookie/数据库）
        $shoppingCarModel = D('ShoppingCar');
        $result = $shoppingCarModel->add($params);
        if($result){
            $res['status']=1;
            $res['msg']='成功';
        }else{
            $res['status']=0;
            $res['msg']='失败';
        }
      $this->ajaxReturn($res);
    }


    //获得当前购物车的数量
    public function getCartNum(){
        $params=I('post.goods_id');
        $shoppingCarModel = D('ShoppingCar');
        $where=array(
            'member_id'=>UID,
        );
        $count=$shoppingCarModel->where($where)->count();
        $this->ajaxReturn($count);
    }

    //删除某条数据
    public function delete(){
        $id=I('get.id','','int');
       $where=array(
           'member_id'=>UID,
           'id'=>$id
       );
       $rst=M('ShoppingCar')->where($where)->delete();
       redirect(U('ShoppingCar/index'));
    }



}