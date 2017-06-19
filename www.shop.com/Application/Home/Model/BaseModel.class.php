<?php
/**
 * Created by PhpStorm.
 * User: ying
 * Date: 2015/11/21
 * Time: 13:33
 */

namespace Home\Model;


use Think\Model;

class BaseModel extends Model
{
    public function get($field="id,name,intro,is_default"){
        return  $this->field($field)->where(array('status'=>1))->select();
    }
}