<?php

namespace Home\Model;

use Think\Model;

class ShoppingCarModel extends Model
{
    //添加商品到购物车
    public function add($item){

//        if(!isLogin()){
//            //>>1.用户未登录，调用addCookie()方法保存数据到cookie.
//            $this->addCookie($item);  //没有返回值
//        }else{
//            //>>2.用户已经登录，调用addDB()方法保存数据到数据表
//            $this->addDB($item);   //有返回布尔值
//        }
        $this->addDB($item);
    }

    /**
     * 把cookie中商品保存在数据库中。
     * @param $item
     */
//    private function addCookie($item){
//        //>>1.得到cookie中的购物车数组。
//        $shoppingCar=cookie('Shopping_Car');
//        //>>2.没有购物车数组
//        if(empty($shoppingCar)){
//            $shoppingCar=array();  //就新建数组。
//        }else{
//            $shoppingCar=unserialize($shoppingCar);
//        }
//
//        //>>3.添加已有的商品，数量直接相加
//        $goods_id=array_column($shoppingCar,'goods_id'); //得到购物车中的所有商品的id
//        if(in_array($item['goods_id'],$goods_id)){
//            foreach($shoppingCar as &$shoppingCarItem){
//                if($shoppingCarItem['goods_id']==$item['goods_id']){
//                    $shoppingCarItem['num']= $shoppingCarItem['num']+$item['num'];
//                    break;
//                }
//            }
//        }else{
//            //>>4.没有同样的商品
//            $shoppingCar[]=$item;
//        }
//        cookie('Shopping_Car',serialize($shoppingCar)); //加入购物车中的商品放在cookie中
//    }

    /**
     * 登录之后，把购物信息加入到表中。
     * @param $item
     * @return mixed|string
     */
    private function addDB($item){

        //>>1.得到用户id
        $item['member_id']=login()['id'];
        //>>2.如果库中存在相同的商品，只需要数量加1.
        $count=$this->where(array('member_id'=>$item['member_id'],'goods_id'=>$item['goods_id']))->count();
        if($count>0){
            //>>3.存在
            $this->where(array('member_id'=>$item['member_id'],'goods_id'=>$item['goods_id'])); //更新条件
            return  parent::setInc('num',$item['num']); //让num字段的值增加$item['num']
        }else{
            //>>4.不存在
            return parent::add($item);
        }
    }


    /**
     *把商品的购物明细展示在购物车列表中
     *
     * 没有登录，就去cookie中找
     * 有登录,就去表中查找。
     */
    public function getList(){

        if(!isLogin()){
            //>>1.从cookie中取出购物信息
            $shoppingCar=cookie('Shopping_Car');
            $shoppingCar= unserialize($shoppingCar);
        }else{
            //>>2.从shopping_car取出购物信息
             $member_id=login()['id'];  //得到用户id
            $shoppingCar=$this->where(array('member_id'=>$member_id))->select();
        }
        $this->buildShoppingCar($shoppingCar);
        return $shoppingCar;
    }

    /**
     * 重构数据库中购物车表中的内容（把购物车中商品信息补充完整）
     * @param $shoppingCar
     */
    private function buildShoppingCar(&$shoppingCar){
        //遍历cookie中的购物车
        foreach($shoppingCar as &$item){
            //得到某个商品的信息。
            $row=M('Goods')->field('name,logo,shop_price')->find($item['goods_id']);
            $item=array_merge($row,$item);
        }
    }

}