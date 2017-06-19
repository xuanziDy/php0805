<?php
/**
 * Created by PhpStorm.
 * User: ying
 * Date: 2015/11/22
 * Time: 21:50
 */

namespace Home\Controller;


use Think\Controller;

class GoodsController extends Controller
{
    //增加浏览次数。
    public function addViewCount($goods_id){
        //商品的浏览次数经常变，所以会经常操作表，不设置为goods中的而一个字段，而是单独建表
        $goodsViewCountModel=D('GoodsViewCount');
        $goodsViewCountModel->addViewCount($goods_id); //因为数据的不重要性，所以是否成功并没有关系，可以不用返回数据
    }

}