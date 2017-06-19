<?php
/**
 * Created by PhpStorm.
 * User: ying
 * Date: 2015/11/14
 * Time: 13:41
 */

namespace Home\Model;


use Think\Model;

class ArticleCategoryModel extends Model
{
    public function getHelpActricleCategory(){

        $articleCategorys=S('articleCategorys');
        //>>无缓存，从数据库中读取，并加入缓存
        if(empty($articleCategorys)){
            $articleCategorys=$this->where(array("is_help"=>1))->order("sort")->select();
            S('articleCategorys',$articleCategorys); //>>第三个参数可指定缓存的时间，不指定默认为永久缓存
        }
        return $articleCategorys;
    }

}