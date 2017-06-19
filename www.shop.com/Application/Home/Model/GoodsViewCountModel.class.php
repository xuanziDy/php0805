<?php
/**
 * Created by PhpStorm.
 * User: ying
 * Date: 2015/11/22
 * Time: 22:01
 */

namespace Home\Model;


use Think\Model;

class GoodsViewCountModel extends Model
{

    //根据商品的id，更改goods_view_count表中的浏览次数。
//    public function addViewCount($goods_id){
//        //>>1.连接redis服务器.
//        $redis=getRedis();
//
//        //>.2.在redis中以  goods_view_count:$goods_id 的形式保存。
//        $redis->incr("goods_view_count:$goods_id");
//
//        //>>3.判断是否存在数据，存在只是数字更新。
//        $row=$this->where(array('goods_id'=>$goods_id))->find(); //直接把id写在find时，id需要是主键。
//        if($row){
//            $this->where(array('goods_id'=>$goods_id))->setInc('times'); //默认增加1
//        }else{
//            //>>2.不存数据。新添一条数据。
//            $this->add(array('goods_id'=>$goods_id,'times'=>1)); //默认增加1
//        }
//
//    }
}