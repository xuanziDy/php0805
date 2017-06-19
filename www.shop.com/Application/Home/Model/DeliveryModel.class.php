<?php
/**
 * Created by PhpStorm.
 * User: ying
 * Date: 2015/11/21
 * Time: 13:26
 */

namespace Home\Model;


use Think\Model;

class DeliveryModel extends BaseModel
{
    public function getDelivery($delivery_id){
       return  $this->field("name as delivery_name,price as delivery_price")->find($delivery_id);
    }

}