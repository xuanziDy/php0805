<?php
/**
 * Created by PhpStorm.
 * User: ying
 * Date: 2015/11/15
 * Time: 23:17
 */

namespace Home\Model;


use Org\Util\String;
use Think\Model;

class MemberModel extends Model
{
    /**
     * 前台验证----根据参数(关联数组)去查询，看是否有该用户
     * false：存在该用户
     * true:不存在该用户
     * @param $params
     * @return bool
     */
    public function checkRepeat($params)
    {
        $row = $this->where($params)->find();
        return  empty($row)?true:false;
    }

    /**
     * 后台---自动验证
     * @var array
     */
    protected $_validate = array(
        array('username', 'require', '用户名不能够为空!'),
        array('username', '', '用户名已存在!', '', 'unique'),
        array('password', 'require', '密码不能够为空!'),
        array('repassword', 'require', '密码不能够为空!'),
        array('tel', 'require', '手机号不能够为空!'),
        array('add_time', 'require', '注册时间不能够为空!'),
    );

    /**
     * 后台---自动完成
     * @var array
     */
    protected $_auto = array(
        //盐---随机6位字符串
        array('salt', '\Org\Util\String::randString', '', 'function'),
        //注册时间---当前时间戳
        array('add_time', NOW_TIME),
//        array('mail_key', 'generateKey', '', 'callback'),
        array('status', 1), //默认为1，表示激活
    );

    //生成随机的10位数。
    public function generateKey()
    {
        return md5(String::randString(10));
    }

    //登录验证
    public function login(){
        //>>1.根据用户名查询
        $username = $this->data['username'];
        $password = $this->data['password'];

        $row = $this->getByUsername($username); // where username = $username
        if($row){
            //>>2.检测当前用户的状态
            if($row['status']!=1){
                $this->error = '没有被激活或者被禁用';
                return false;
            }
            //>>3.判定密码
            if(md5($password.$row['salt'])==$row['password']){
                //登陆成功之后将cookie中的数据同步同数据库中
                defined('UID') or define('UID',$row['id']);
                $shoppingCarModel = D('ShoppingCar');
                $shoppingCarModel->cookie2DB();
                return $row;   //返回用户信息
            }else{
                $this->error =  '密码出错!';
                return false;
            }
        }else{
            $this->error = '用户名出错';
            return false;
        }
    }

    /**
     * 增加新用户
     * @return bool|mixed
     */
    public function add()
    {
        //>>1.保存用户信息。
        $this->data['password'] = md5($this->data['salt'] . $this->data['password']); //对密码加盐加密
//        $mail = $this->data['eamil'];  //要发送的邮件地址
//        $mail_key = $this->data['mail_key'];  //激活邮箱的随机码
        $id = parent::add();
        if(!$id){
            $this->error="用户基本信息注册失败";
            return false;
        }
//        //>>2.发送激活邮件。
//        $content = "<a href='http://www.shop.com/Member/activate/id/$id/key/$mail_key'>点击这里激活验证</a>";
//        $result = $this->sendEmail($mail, '京西激活邮件', $content);
//        if ($result === false) {
//            $this->error="请重新填写Email";
//            return false;
//        }
        return $id;
    }

    //验证邮箱。
//    public function activate($id,$key)
//    {
//        //>>1.把得到的随机码与数据库中的码值进行对比
//        $mail_key=$this->getFieldById($id,'mail_key');
//       if($mail_key==$key){
//           //>>2.改变状态
//          return $this->where("id=$id")->setField('status',1); //设置某个字段的值
//       }else{
//           return false;
//       }
//    }

    //发送短信
    public function sendSMS($tel){
        //>>1. 随机生成一个数字
        $randomNumber = String::randString(6,1);

        session('TEL_CODE',$randomNumber);  //为了和用户输入的短信验证码进行验证码
        //>>2.将该数字发送到$tel手机号

//        include "TopSdk.php";   //加载了TopSdk.php之后,下面的代码就可以使用自动加载
        vendor('SMS.TopSdk');
        date_default_timezone_set('Asia/Shanghai');  //设置时区

        $c = new \TopClient;
        $c->appkey = '23268691';                              //创建的应用上的appkey
        $c->secretKey = '015af3aa430f471e9aa69e2837e67f22';   //创建的应用上的secretKey

        $req = new \AlibabaAliqinFcSmsNumSendRequest;
        $req->setSmsType("normal");  //固定的
        $req->setSmsFreeSignName("注册验证");   //你发送的短信是干什么的?
        $req->setSmsTemplateCode("SMS_2220286");  //模板的id
//        $req->setSmsParam("{'code':'$randomNumber','product':'韩国馆'}");
        $req ->setSmsParam( "{code:'$randomNumber',product:'韩国馆会员注册'}" );
        $req->setRecNum($tel);  //发送的手机号
        $resp = $c->execute($req);
        //判定发送的状态
        return ((string)$resp->result->success)==='true';
    }

//    public function sendEmail($email,$title,$content)     //发件邮箱，标题，内容
//    {
//        vendor('PHPMailer.PHPMailerAutoload');
//        $mail_config = C('MAIL_CONFIG');
//        $mail = new \PHPMailer;
//        $mail->isSMTP();                                      // 设置发送邮件协议: SMTP
//        $mail->Host = $mail_config['Host'];                   // 设置邮件的服务器
//        $mail->SMTPAuth = true;                               // 开启授权
//        $mail->Username = $mail_config['Username'];           // 登陆用户的用户名
//        $mail->Password = $mail_config['Password'];           // 登陆用户的密码
//
//        /////////////////////准备邮件内容///////////////////////////////////////
//        $mail->setFrom($email, 'xxxx');      //发件人
//        $mail->addAddress('75284885@qq.com');                   // 收件人
//        $mail->isHTML(true);                                 // 设置邮件为Html的邮件
//        $mail->CharSet = 'utf-8';                            //设置编码
//        $mail->Subject = $title;                             //邮件的标题
//        $mail->Body = $content;                              //邮件的内容
//        if ($mail->send() === false) {
//            $this->error = $mail->ErrorInfo;
//            return false;
//        }
//    }

    /**
     * 得到某个用户的信息
     * @param $username
     * @return mixed
     */
    public function getByUsername($username){
        return $this->where(array("username"=>$username))->find();
    }


}