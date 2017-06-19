<?php
/**
 * Created by PhpStorm.
 * User: ying
 * Date: 2015/11/20
 * Time: 22:22
 */

namespace Home\Controller;


use Think\Controller;

class RegionController extends Controller
{
    public function getChildren($parent_id)
    {
        $regioModel = D('Region');
        $result = $regioModel->getChildren($parent_id);
        $this->ajaxReturn($result);  //js中需要的是json数据
    }
}