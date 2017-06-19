<?php
/**
 * Created by PhpStorm.
 * User: Memberistrator
 * Date: 2015/11/11
 * Time: 15:14
 */

namespace Home\Service;


use Org\Util\String;

class LoginService
{

    /**
     * 根据用户名和密码进行登陆
     * @param $username
     * @param $password
     */
    public function login($username,$password){
        //>>1.先判断用户名
          $MemberModel = D('Member');
          $row = $MemberModel->getByUsername($username);
          if($row){
              //>>2.判断是否是激活状态
              if($row['status']!=1){
                  $this->error="用户未激活或者禁用";
                  return false;
              }
              //>>3.再判断密码(将当前登陆用户名的密码进行加密之后再和数据库中的密码进行对比)
              $password = md5($row['salt'].$password);
                if($row['password']==$password){
                    return $row;
                }else{
                    return '密码错误!';
                }
          }else{
             return  '用户名错误或者不存在';
          }
    }

    /**
     * 保存自动登录的信息
     * @param $Member_id
     */
    public function saveAutoLogin($Member_id){
//        echo $Member_id;
         //>>1.生成一个随机的字符串,作为auto_key的值, 并且保存到数据库中
           $auto_key = String::randString();
        //echo $auto_key;
           $MemberModel  = M('Member');

           $rst=$MemberModel->where(array('id'=>$Member_id))->save(array('auto_key'=>$auto_key));
       // echo $MemberModel->getLastSql();
        if($rst !== false){
            //>>2. 将auto_key进行加密之后和  Member_id 保存到cookie中
            $salt = $MemberModel->getFieldById($Member_id,'salt');
            $auto_key = md5($auto_key.$salt);

            //让cookie的值在浏览器中保存一个星期
            cookie('Member_id',$Member_id,60*60*24*7);
            cookie('auto_key',$auto_key,60*60*24*7);
            return true;
        }else{
            return false;
        }
    }


    /**
     * 自动登录的方法 , 就是根据cookie中值进行登录
     * 1. 登录失败: 返回false
     * 2. 登录成功: 返回true
     */
    public function autoLogin(){
        //>>1.得到cookie中信息
          $Member_id = cookie('Member_id');
          $auto_key = cookie('auto_key');
              //如果没有cookie的值就需要自动登录
          if(empty($Member_id) || empty($auto_key)){
              return false;
          }
        //>>2.根据cookie中的Member_id,查找是否有该用户
          $MemberModel  = M('Member');
          $row = $MemberModel->getById($Member_id);
          if($row){
              //>>3.如果有用户再比 加密后的auto_key
              if($auto_key==md5($row['auto_key'].$row['salt'])){
                    //登录成功
                  login($row); //将当前登陆信息保存到 session中
                  return true;  //一定要返回
              }else{
                  return false;
              }
          }else{
              return false;
          }

    }
}