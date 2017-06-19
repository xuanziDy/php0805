<?php
/**
 * Created by PhpStorm.
 * User: ying
 * Date: 2015/11/22
 * Time: 23:09
 */

namespace Home\Controller;


use Think\Controller;

class CronController extends Controller
{
//    public function viewCount2mysql(){
//        //>>1.链接redis
//        $redis=getRedis();
//
//        //>>2.取出redis中的所有键为  goods_view_count:* 的值
//       $keys= $redis->keys("goods_view_count:*");
//       $values=$redis->mget($keys);
//
//        //>>3.把redis中对应的商品浏览次数放在数据库中
//        foreach($keys as $k=>$key){
//            $goods_id=str2arr($key,':')[1];  //截取出对应的商品id
//            $goods_times=$values[$k];   //得到对应商品的浏览次数
//
//            $goodsViewCountModel = M("GoodsViewCount");
//            $row = $goodsViewCountModel->where(array('goods_id'=>$goods_id))->find();
//            if($row){
//                //>>3.如果有, 就更新 +1
//                $goodsViewCountModel->where(array('goods_id'=>$goods_id))->setInc('times',$goods_times);
//            }else{
//                //>>2.如果没有就在当前上面添加进去
//                $goodsViewCountModel->add(array('goods_id'=>$goods_id,'times'=>$goods_times));
//            }
//        }
//    }

}