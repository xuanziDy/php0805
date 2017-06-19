<?php
namespace Home\Controller;

use Think\Controller;
use Think\Page;

class IndexController extends Controller
{
//    protected $defaultLog='www.shop.com/Uploads/tplogo.jpg';

    //>>得到需要在前台展示的所有商品分类。
    public function _initialize(){
        header("content-type:text/html;charset=utf-8");

        //>>1.得到所有可以在前台显示的商品分类。
        $goodsCategoryModel=D('GoodsCategory');
        $goodsCategorys=$goodsCategoryModel->getList();
        $this->assign('goodsCategorys',$goodsCategorys);

        //>>2.得到所有的是帮助类型的文章分类
        $articleCategoryModel=D('ArticleCategory');
        $articleCategorys=$articleCategoryModel->getHelpActricleCategory();
        $this->assign('articleCategorys',$articleCategorys);

        //>>3.得到所有可显示的帮助类文章
        $articleModel=D('Article');
        $articles=$articleModel->getHelpArticle();
        $this->assign('articles',$articles);
    }


    //首页
   public function index(){
       //>>1.1得到【疯狂抢购】的商品
       $goodsModel=D('Goods');
       $goods_1_status=$goodsModel->getGoodsByGoodsStatus(1);

       //>>1.2得到【热卖商品】的商品
       $goods_2_status=$goodsModel->getGoodsByGoodsStatus(2);

       //>>1.3得到【推荐商品】
       $goods_4_status=$goodsModel->getGoodsByGoodsStatus(4);


       //>>1.4得到【新品上架】
       $goods_8_status=$goodsModel->getGoodsByGoodsStatus(8);

       //>>1.5得到【猜您喜欢】
       $goods_16_status=$goodsModel->getGoodsByGoodsStatus(16);


       //>>2.得到【网站快报--13】新闻
       $articleModel=D('article');
       $news=$articleModel->getNews();


       $this->assign(array(
           'isHidden'=>false,
           'meta_title'=>'韩国馆首页',
           'goods_1s'=>$goods_1_status,
           'goods_2s'=>$goods_2_status,
           'goods_4s'=>$goods_4_status,
           'goods_8s'=>$goods_8_status,
           'goods_16s'=>$goods_16_status,
           'news'=>$news,
       ));
        $this->display('index');
   }
    //商品列表页
    public function lst($category_id){
        header("content-type:text/html;charset=utf-8");
        $this->assign('isHidden',true);
        $this->assign('meta_title','商品列表');
        $this->assign('category_id',I('get.category_id'));


        //>>0.准备面包屑数据
        $goodsCategoryModel=D('goodsCategory');
        $mbx_goodsCategorys=$goodsCategoryModel->getGoodsCategory($category_id);
//        dd($mbx_goodsCategorys);
        $this->assign('mbx_goodsCategorys',$mbx_goodsCategorys);

        //>>1.得到该分类下的所有子分类
        $subClasses=$goodsCategoryModel->getSubclass($category_id);
//        print_r($subClasses);
        $this->assign('subClass',$subClasses);

        //>>2.得到该分类下的所有商品
        $goodsModel=D('goods');
        $subClasses_ids=arr2str(array_column($subClasses,'id'));

        $where=array();
        if(IS_POST){
            $keyword=I('post.keyword');
            $where['keyword']=array('like','%'.$keyword.'%');
        }

        $rst=$goodsModel->getGoods($subClasses_ids,$where);

        $this->assign('lst_goods',$rst['goods']);
        $this->assign('pageHtml',$rst['pageHtml']);
        $this->assign('category',$category_id);
        $this->display('lst');
    }

    //商品单页  id 为商品id
    public function show($id){
        //>>1.得到某个商品的具体信息，包括各种规格的图片
        $goodsModel=D('goods');
        $goods=$goodsModel->get($id);
//      dd($goods);
        $this->assign($goods);
        //>>2.得到面包屑内容
        $goodsCategoryModel=D('GoodsCategory');
        $goodsCategorys=$goodsCategoryModel->getGoodsCategory($goods['goods_category_id']);
        $this->assign('goodsCategorys',$goodsCategorys);
        //>>3.得到商品的全部图片。
        $paths=$goods['path'];

        //>>4.得到该商品的评价
        $commentModel=M('Comment');
        $comments=$commentModel->alias('c')->join('__MEMBER__ AS m ON m.id=c.member_id')->field("c.*,m.username")->order('id','desc')->select();
        $info=array();
        foreach($comments as $k=>$v){
            $goods_ids=explode(',',$v['goods_ids']);
            if(in_array($id,$goods_ids)){
                $info[]=$v;
            }
        }
//dd($info);

        //>>5.得到该商品的介绍
        $intro=M('GoodsIntro')->where(array('goods_id'=>$id))->field('intro')->find();
//        echo M('GoodsIntro')->getLastSql();
//        echo $intro;
//        exit;
//        dump($intro);
        $this->assign(array(
            'isHidden'=>true,
            'meta_title'=>"韩国馆——".$goods['name'],
            'paths'=>$paths,
        ));
        $this->assign('info',$info);
        $this->assign('intro',$intro['intro']);
        $this->display('show');
    }
}