<?php
/**
 * Created by PhpStorm.
 * User: ying
 * Date: 2015/11/20
 * Time: 22:07
 */

namespace Home\Controller;


use Think\Controller;

class AddressController extends Controller
{

    //展示地址信息，用户必须是已经登录。
    public function _initialize()
    {
        if (!isLogin()) {
//            cookie('__LOGIN_FORWORD_URL__', $_SERVER['REQUEST_URI']); //在这里记录下地址，登录之后就自动回到这个地址
            $this->redirect('Member/checkLogin');

        }
    }

    //展示用户的收货地址信息。
    public function index()
    {
        //>>1.准备省的数据展示在页面上。
        $regionModel = D('Region');
        $provinces = $regionModel->getProvince();
        $this->assign('provinces', $provinces);

        //>>2.得到收货地址
        $addressModel = D('Address');
        $addresses = $addressModel->getList();
        $this->assign('addresses', $addresses);

        $this->display('index');
    }

    public function add()
    {
        $addressModel = D('Address');
        if (($data = $addressModel->create()) !== false) {
//            if (empty($data['id'])) {
                //保存
                if ($addressModel->add() !== false) {
//                    $this->success('保存成功', U('index'));  //用success，在json中接收到的数据有status这个属性。
                    $result['status']=1;
                    $result['info']='地址添加成功';
                }else{
                    $result['status']=0;
                    $result['info']='地址添加失败';
                }
//            } else {
//                //修改后保存。
//                if($addressModel->save()!==false){
//                    $result['status']=1;
//                    $result['info']='地址修改成功';
//                }else{
//                    $result['status']=0;
//                    $result['info']='地址修改失败';
//                }
//            }
            $result['url']=U('Address/index');
            $this->ajaxReturn($result);
        }
    }


    /**
     * 修改地址
     * @param $id
     */
    public function edit($id)
    {
        //根据id去地址表中查询数据。
        $addressModel = D('Address');
        $address = $addressModel->find($id);
        $this->ajaxReturn($address);
    }

    //改变默认状态
    public function changeIsDefault($id,$is_default){
        $addressModel = D('Address');
       $result= $addressModel->changeIsDefault($id,$is_default);
        if($result !== false){
            $this->success('修改状态成功');
        }else{
            $this->error('修改状态失败');
        }

    }



    public function remove($id){
        $addressModel = D('Address');
        $result=$addressModel->delete($id);
        if($result!==false){
            $this->success('删除成功!');
        }else{
            $this->error('删除失败!');
        }
    }
}