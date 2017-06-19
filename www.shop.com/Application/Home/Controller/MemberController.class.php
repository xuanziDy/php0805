<?php
/**
 * Created by PhpStorm.
 * User: ying
 * Date: 2015/11/15
 * Time: 20:48
 */

namespace Home\Controller;


use Org\Util\String;
use Think\Controller;
use Think\Verify;

class MemberController extends Controller
{
    //登录
    public function checkLogin(){
        if(IS_POST){
            //>>先进行验证码的验证
            $captcha = I('post.checkcode');
            $verify=new Verify();
//            echo $captcha.'<br/>';
            if(!$verify->check($captcha)){
                $this->error('验证码错误');
            }
            //>>1.接收请求参数
            $username = I('post.username');
            $password = I('post.password');
            //>>2.再进行验证登陆
            $loginService = D('Login','Service');

            //根据用户名和密码进行验证
            $result = $loginService->login($username,$password);
//            var_dump($result);
//            exit;

            if(is_array($result)){  //是数组, 表示用户信息
                //登陆成功,将用户信息保存到session中
                login($result);

                //完成自动登录信息的保存
                $remember = I('post.remember');
                if(!empty($remember)){
                    //保存用户信息
                    $rst=$loginService->saveAutoLogin($result['id']);
                 //   exit;
//                    if($rst){
//                        $this->success('登录成功!',U('Index/index'));
//                    }
                }
                $this->success('登录成功!',U('Index/index'));
            }else{ //如果不是数组, 就是错误信息
                $this->error($result);  //$loginService->getError()
            }
        }else{
            $this->display('login');
        }
    }

    public function logout(){
        logout();
        $this->success('注销成功!',U('Index/index'));
    }
    //注册
    public function regist(){
        if(IS_POST){
            //>>1.验证手机短信
            $code=I('post.checkcode');  //用户输入的验证码
            if($code!==session('TEL_CODE')){
                $this->error('短信验证失败,请重新获取');
                return; //失败了就结束，不能在继续后面的逻辑
            }

            //>>2.验证数据的合法性
            $menmberModel=D('Member');
            if($menmberModel->create()!==false){
                if($menmberModel->add()!==false){
                    $result['status']=1;
                    $result['info']='注册成功，请登录';
                }else{
                    $result['status']=0;
                    $result['info']='注册失败';
                }
            }else{
                $result['status']=0;
                $result['info']='注册失败';
            }
            $result['url']=U('Member/checkLogin');
            $this->ajaxReturn($result);
        }else{
            $this->display('regist');
        }
    }

    /**
     * 前台验证---------用户名和邮箱是否重复
     */
    public function check(){
        //>>1.接收传递的参数
        $params=I('get.');
        //>>2.创建模型
        $memberModel=D('Member');
        //>>3.验证是否存在该用户名，要求返回一个布尔值。
        $result=$memberModel->checkRepeat($params);
        //>>4.返回json类型的布尔值，php值在js中应用都是json类型
        $this->ajaxReturn($result);
    }

    /**
     * 发送短信验证
     * @param $tel
     */
    public function sendSMS($tel){
        $memberModel=D('Member');
        $result=$memberModel->sendSMS($tel);
        $this->ajaxReturn($result);
    }


    //得到用户信息
    public function getUserInfo(){
        if(isLogin()){
           $userinfo=login();
            return $this->ajaxReturn($userinfo['username']);
        }
    }
}