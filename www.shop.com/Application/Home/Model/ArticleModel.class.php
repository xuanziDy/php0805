<?php
/**
 * Created by PhpStorm.
 * User: ying
 * Date: 2015/11/14
 * Time: 13:41
 */

namespace Home\Model;


use Think\Model;

class ArticleModel extends Model
{
    public function getHelpArticle()
    {
        $articles = S('articles');
        if (empty($articles)) {
            $this->alias("a")->join("__ARTICLE_CATEGORY__ as ac on a.article_category_id=ac.id")->field("a.article_category_id,a.name")->where(array('a.status' => 1, 'ac.is_help' => 1));
            $articles = $this->select();
            S('articles', $articles);
        }
        return $articles;
    }

    public function getNews(){
        //得到网站快报这个分类下面的可显示的文章。
        return $this->field("id,name")->where(array("status"=>1,"article_category_id"=>6))->select();
    }

}