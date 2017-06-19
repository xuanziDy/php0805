<?php
/**
 * Created by PhpStorm.
 * User: ying
 * Date: 2015/11/14
 * Time: 11:26
 */

namespace Home\Model;


use Think\Model;

class GoodsCategoryModel extends Model
{
    /**
     *商品分类的所有数据
     * @return mixed
     */
    public function getList()
    {
        //>>有缓存，就从缓存中读取。
//        $goodsCategorys = S('goodsCategorys');
        //>>无缓存，从数据库中读取，并加入缓存
        if (empty($goodsCategorys)) {
            $goodsCategorys = $this->field("id,name,parent_id,level")->where(array("status" => 1))->order("lft")->select();
//            S('goodsCategorys', $goodsCategorys); //>>第三个参数可指定缓存的时间，不指定默认为永久缓存
        }
        return $goodsCategorys;
    }


    public function getGoodsCategory($category_id)
    {
        //>>1.面包屑中某个商品的父分类————思想：分类中左边界小于当前商品的左边界，右边界小于当前商品的右边界
        $sql = "SELECT a.`name`,a.id,a.level FROM goods_category AS a,goods_category AS b WHERE a.`lft`<=b.`lft` AND a.`rgt`>=b.`rgt` AND b.`id`=$category_id order by a.level";
        $rows = $this->query($sql);
        return $rows;
    }

    //得到子分类
    public  function getSubclass($category_id){
        $sql = "SELECT a.`name`,a.id FROM goods_category AS a,goods_category AS b WHERE a.`lft`>=b.`lft` AND a.`rgt`<=b.`rgt` AND b.`id`=$category_id";
        $rows=$this->query($sql);
        return $rows;

    }

}