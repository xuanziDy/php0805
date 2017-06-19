<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/11/17
 * Time: 16:21
 */

namespace Home\Model;


use Think\Model;

class ShoppingCarModel extends Model
{

    /**
     * 将请求数据保存到购物车中
     * @param $requestData
     */
    public function add($item){
        $item['member_id'] = UID;
        //>>1.先检查是否在数据库中存在
        $count =  $this->where(array('member_id'=>$item['member_id'],'goods_id'=>$item['goods_id']))->count();
        if($count>0){
            //>>1.1. 如果存在, 更新数量
            $this->where(array('member_id'=>$item['member_id'],'goods_id'=>$item['goods_id']));
            return parent::setInc('num',$item['num']);

        }else{
            //>>1.1. 如果不存在,直接添加到数据库中
            return parent::add($item);
        }
    }

    /**
     * 将购物明细中的数据保存到DB的购物车中
     * @param $item
     */
//    private function addDB($item){
//        $item['member_id'] = UID;
//        //>>1.先检查是否在数据库中存在
//          $count =  $this->where(array('member_id'=>$item['member_id'],'goods_id'=>$item['goods_id']))->count();
//         if($count>0){
//             //>>1.1. 如果存在, 更新数量
//             $this->where(array('member_id'=>$item['member_id'],'goods_id'=>$item['goods_id']));
//            return parent::setInc('num',$item['num']);
//
//         }else{
//             //>>1.1. 如果不存在,直接添加到数据库中
//             return parent::add($item);
//         }
//    }


    /**
     * 将cookie中的购物数据取出保存到数据库中
     */
    public function cookie2DB(){
        $shoppingCar = cookie('shopping_car');
         //>>1.如果cookie中没有任何内容, 直接返回
        if(empty($shoppingCar)){
            return;
        }
        //>>2.如果cookie中有购物明细, 需要将每个购物明细保存到数据库中
        $shoppingCar = unserialize($shoppingCar);
        foreach($shoppingCar as $item){
            $this->addDB($item);
        }
        //>>3.清空cookie中的数据
        cookie('shopping_car',null);
    }




    /**
     *1. 没有登录从cookie中获取
     *2. 登录的话从数据库中获取
     */
    public function getList(){
//         if(!isLogin()){
//             //>>1.没有登录从cookie中获取
//             $shoppingCar = cookie('shopping_car');
//             $shoppingCar = unserialize($shoppingCar);
//         }else{
//             //>>2.登录的话从数据库中获取
//             $shoppingCar = $this->field('goods_id,num')->where(array('member_id'=>UID))->select();
//         }
        $shoppingCar = $this->field('goods_id,num,id')->where(array('member_id'=>UID))->select();
        //>>2.需要重构$shoppingCar中的数据
        $this->buildShoppingCar($shoppingCar);
        $totals=array_column($shoppingCar,'total');
        $total_money=0;
        foreach($totals as $v){
            $total_money+=$v;
        }
        return array(
            'shoppingCar'=>$shoppingCar,
            'total_money'=>$total_money
        );
    }

    private function buildShoppingCar(&$shoppingCar){
        foreach($shoppingCar as &$item){
             //>>1.需要根据item中的goods_id从goods表中查询出 name,logo,shop_price
            $row = M('Goods')->field('name,logo,shop_price')->find($item['goods_id']);
            $where=array(
                'ga.goods_id'=>$item['goods_id']
            );
            $goods_attributes=M('GoodsAttribute')->alias('ga')->join('__ATTRIBUTE__ AS a ON a.id=ga.attribute_id')->field('a.name,ga.value')->where($where)->select();
            $map=array();
           foreach($goods_attributes as $k=>$v){
                $map[]=$v['name'].':'.$v['value'];
           }
            $row['goods_attributes']=  implode(';',$map);
            $row['total']=$row['shop_price']*$item['num'];
            $item = array_merge($item,$row);
        }
    }
}