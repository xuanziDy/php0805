<?php
/**
 * Created by PhpStorm.
 * User: ying
 * Date: 2015/11/20
 * Time: 22:49
 */

namespace Home\Model;


use Think\Model;

class AddressModel extends Model
{
    //>>保存数据
    public function add()
    {
        //如果此时是默认状态，就把其他的修改为0
        if (isset($this->data['is_default'])) {
            $this->where(array('member_id' => UID));
            parent::save(array('is_default' => 0));
        }
        $this->data['member_id'] = UID;
        return parent::add();
    }

    /*
     * 得到当前用户的收货地址信息。
     * SELECT a.`receiver`,a.`detail_address`,a.`tel`,a.`is_default`,province.`name` AS province_name,city.`name` AS city_name,`area`.`name` AS area_name FROM address AS a
            JOIN region AS province ON a.`province_id`=province.id
            JOIN region AS city ON a.`city_id`=city.id
            JOIN region AS `area` ON a.`area_id`=`area`.id
        WHERE member_id=2;
     */
    public function getList()
    {
        $this->field("a.id,a.`receiver`,a.`detail_address`,a.`tel`,a.`is_default`,province.`name` AS province_name,city.`name` AS city_name,`area`.`name` AS area_name")
            ->alias('a')->join("__REGION__  AS province ON a.`province_id`=province.id");
        $this->join("__REGION__ AS city ON a.`city_id`=city.id");
        $this->join("LEFT JOIN  __REGION__ AS `area` ON a.`area_id`=`area`.id");
        return $this->where(array("member_id" => UID))->select();
    }

    public function save()
    {
        if (isset($this->data['is_default'])) {
            $this->where(array('member_id' => UID));
            parent::save(array('is_default' => 0));
        }
        return parent::save();
    }


    //设置为默认：把全部设置为0，当前的设置为1
    public function changeIsDefault($id,$is_default)
    {
        $this->where(array('member_id'=>UID));
        parent::save(array('is_default' => 0));

        $this->where(array('id' => $id,'member_id'=>UID));  //修改当前的默认状态
        return parent::save(array('is_default' => $is_default));
    }

    public function get($address_id){
        $this->field("a.`receiver`,a.`province_id`,a.`city_id`,a.`area_id`,a.`detail_address`,a.`tel`,province.`name` AS province_name,city.`name` AS city_name,`area`.`name` AS area_name")
            ->alias('a')->join("__REGION__  AS province ON a.`province_id`=province.id");
        $this->join("__REGION__ AS city ON a.`city_id`=city.id");
        $this->join("__REGION__ AS `area` ON a.`area_id`=`area`.id");
        return $this->where(array("member_id" => UID,'a.id'=>$address_id))->find();
    }
}