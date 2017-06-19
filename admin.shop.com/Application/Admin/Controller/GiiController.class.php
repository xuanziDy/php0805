<?php
/**
 * Created by PhpStorm.
 * User: ying
 * Date: 2015/11/3
 * Time: 9:51
 */

namespace Admin\Controller;


use Think\Controller;

//这里的代码生成控制器时为了生成各种控制器，是不需要base控制器的功能的。
class GiiController extends Controller
{
    public function index()
    {
        if (IS_POST) {
            header('Content-Type:text/html;charset=utf-8');
            //>>1.得到表单中提交的table_name
            $table_name = I('post.table_name');
            //>>2.得到符合thinkphp要求的规范的类名
            $name = parse_name($table_name, 1); //1：brand->Brand  0:Brand->brand  有下划线的同理。
            //>>3.得到meta_title的值。
            $sql = "SELECT `TABLE_COMMENT` FROM `information_schema`.`TABLES` WHERE `TABLE_SCHEMA` = '" . C('DB_NAME') . "' AND `TABLE_NAME` = '" . $table_name . "'";
            $rows = M()->query($sql);
            $meta_title = $rows[0]['table_comment'];

            //>>4.生成模板文件夹的路径
            defined(TEMPLATE_PATH) or define('TEMPLATE_PATH', ROOT_PATH . 'Template/');

            /*--------------------------------生成控制器------------------------------------------*/
            //>>把模板文件内容当做html代码，因为没有php标识。用静态缓存技术。
            ob_start();
            require(TEMPLATE_PATH . 'Controller.tpl');
            $controller_content = ob_get_clean();
            $controller_content = "<?php\r\n" . $controller_content;  //添加php标识，一开始就存在于模板中则不能当做静态页缓存。
            $controller_path = APP_PATH . "Admin/Controller/" . $name . "Controller.class.php";
            file_put_contents($controller_path, $controller_content); //把内容输出到文件中。

            /*-------------------------------处理字段的详细信息----------------------------------------------*/
            //在列表页展示的每一项都是每个字段的注释。
            $sql="show full columns from `$table_name`";
            $fields=M()->query($sql);
            //得到所有字段的注释
            foreach($fields as &$field){  //这里采用了引用传值。因为要修改数组本身的数据。
                $comment=$field['comment'];
                preg_match('/(.*)@([a-z]*)\|?(.*)/',$comment,$result);
                if(!empty($result)){
                    $field['comment']=$result[1];
                    $field['input_type']=$result[2];
                    if(!empty($result[3])){
                        parse_str($result[3],$option_value); //1=是&0=否 ==> 变成关联数组。
                        $field['option_value']=$option_value;
                    }
                }
            }
            unset($field); //前面应用传值了，这里要删除之前的数据。不然会导致代码错误。
            /*--------------------------------------------生成模型------------------------------------------*/
            ob_start();
            require(TEMPLATE_PATH . 'Model.tpl');
            $model_content = ob_get_clean();
            $model_content = "<?php\r\n" . $model_content;  //添加php标识，一开始就存在于模板中则不能当做静态页缓存。
            $model_path = APP_PATH . "Admin/Model/" . $name . "Model.class.php";
            file_put_contents($model_path, $model_content); //把内容输出到文件中。

            /*----------------------------------生成index.html页面---------------------------*/
            ob_start();
            require(TEMPLATE_PATH.'index.tpl');
            $index_content=ob_get_clean();
            //得到视图的路径
            $view_path=APP_PATH."Admin/View/".$name;
            if(!is_dir($view_path)){
                mkdir($view_path,0777,true);
            }
            $index_path=$view_path."/index.html";
            file_put_contents($index_path,$index_content);

            /*-----------------------------------------生成edit.html页面--------------------*/
            ob_start();
            require(TEMPLATE_PATH.'edit.tpl');
            $index_content=ob_get_clean();
            //得到视图的路径
            $view_path=APP_PATH."Admin/View/".$name;
            if(!is_dir($view_path)){
                mkdir($view_path,0777,true);
            }
            $index_path=$view_path."/edit.html";
            file_put_contents($index_path,$index_content);

        } else {
            $this->display('index');
        }
    }
}