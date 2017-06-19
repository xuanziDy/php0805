<?php
/**
 * Created by PhpStorm.
 * User: ying
 * Date: 2015/11/14
 * Time: 20:26
 */

namespace Home\Model;


use Think\Model;
use Think\Page;

class GoodsModel extends Model
{

    protected $page_size=10;
    /**
     * 【疯狂抢购】【热卖商品】【推荐商品】【新品上架】【猜您喜欢】
     * @param $goods_status
     * @param int $num
     * @return mixed
     */
    public function getGoodsByGoodsStatus($goods_status,$num=5){
        $wheres=array('status'=>1,'is_on_sale'=>1);
        $rows=$this->field('id,name,logo,shop_price')->where($wheres)->where("goods_status&{$goods_status}>0")->order('sort')->limit($num)->select();
        return $rows;
    }

    /**
     * 得到商品的所有完整信息。
     * @param $goods_id
     * @return mixed
     */
    public function get($goods_id){
        //>>1.从goods表中得到某个商品的基本信息
        $goods=$this->field("id,name,sn,market_price,shop_price,goods_category_id,logo,stock")->where(array("id"=>$goods_id))->find();

        //>>2.从goods_album表中得到某个商品的图片。
        $goodsAlbumModel=M('GoodsAlbum');
        $paths= $goodsAlbumModel->field("path")->where(array('goods_id'=>$goods['id']))->select();
        $paths=array_column($paths,'path');
        //把logo地址放在第一个.
        array_unshift($paths,$goods['logo']);
        $goods['path']=$paths;

        return $goods;
    }

    //得到该分类下的所有商品
    public function getGoods($subClasses_ids,$where=''){
        $count=M('Goods')->where("goods_category_id in ($subClasses_ids)")->count();
//        echo M('Goods')->getLastSql();
        $page=new Page($count,$this->page_size);
        $goods = M('Goods')->where("goods_category_id in ($subClasses_ids) and `status` >=0")->where($where)->order('id','desc')->limit($page->firstRow.','.$page->listRows)->select();
//        echo M('Goods')->getLastSql();
//        echo $this->getLastSql();
//        exit;
        $pageHtml=$page->show();
        return array(
            'pageHtml'=>$pageHtml,
            'goods'=>$goods
        );
    }
}