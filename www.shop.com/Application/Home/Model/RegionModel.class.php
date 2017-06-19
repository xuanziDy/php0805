<?php
/**
 * Created by PhpStorm.
 * User: ying
 * Date: 2015/11/20
 * Time: 22:09
 */

namespace Home\Model;


use Think\Model;

class RegionModel extends Model
{

    //得到省份数据
    public function getProvince(){
        return $this->where(array("parent_id"=>0))->select();
    }

    //得到子城市
    public function getChildren($parent_id=0){
        return $this->field('id,name')->where(array("parent_id"=>$parent_id))->select();
    }

}