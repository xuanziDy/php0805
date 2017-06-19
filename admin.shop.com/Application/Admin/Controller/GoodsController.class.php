<?php
namespace Admin\Controller;

use Think\Controller;

class GoodsController extends BaseController
{
    protected $meta_title = "商品";

    /**
     * 根据请求中的内容为wheres准备查询条件
     * @param $wheres
     */
    protected  function _setWheres(&$wheres){
        $brand_id = I('get.brand_id');
        if(!empty($brand_id)){
            $wheres['obj.brand_id'] = $brand_id;
        }
        $supplier_id = I('get.supplier_id');
        if(!empty($supplier_id)){
            $wheres['obj.supplier_id'] = $supplier_id;
        }
    }

    protected function _before_index_view(){
        //>>1.准备品牌数据
        $brandModel  =  D('Brand');
        $brands  = $brandModel->getAllList();
        $this->assign('brands',$brands);
        //>>2.准备供货商数据
        $supplierModel  =  D('Supplier');
        $suppliers  = $supplierModel->getAllList();
        $this->assign('suppliers',$suppliers);
    }

    protected function _before_show_view(){
        //>>1.在进入添加商品页面时，准备商品分类所需要的数据。
        $GoodsCategoryModel=D('GoodsCategory');
        $categorys=$GoodsCategoryModel->getList();
        $this->assign('nodes',json_encode($categorys)); //页面需要的是一个json字符串形式的数组。
        //>>2.准备商品品牌的数据
        $BrandModel=D('Brand');
        $brands=$BrandModel->getAllList();
        $this->assign('brands',$brands);
        //>>3.准备供货商的数据
        $SupplierModel=D('Supplier');
        $suppliers=$SupplierModel->getAllList();
        $this->assign('suppliers',$suppliers);
        //>>4.准备会员级别。
        $MemberLevelModel=D('MemberLevel');
        $memberLevels=$MemberLevelModel->getAllList(array(),"id,name");
        $this->assign('memberLevels',$memberLevels);
        //>>5.将所有的商品类型查询出来分配到页面
        $goodsTypeModel = D('GoodsType');
        $goodsTypes = $goodsTypeModel->getAllList();
        $this->assign('goodsTypes',$goodsTypes);


        //编辑时，得到传来的id
        $goods_id=I('get.id');
        if($goods_id){
            //>>1.准备商品描述的数据。
            $GoodsIntroModel=M('GoodsIntro');
            $intro=$GoodsIntroModel->getFieldByGoodsId($goods_id,'intro'); //动态查询：根据商品描述表中goods_id字段的值$id，去查询字段为intro的值。
            $this->assign('intro',$intro);
            //>>2.准备商品相册中图片的路径
            $goodsAlbumModel=D('GoodsAlbum'); //这里不用M创建对象然后直接调用select查询数据，是因为这里是控制器。对数据表的查询最好放在模型中处理
            $albums=$goodsAlbumModel->getAlbumByGoodsId($goods_id);
            $this->assign('albums',$albums);
            //>>3.准备关联文章的标题和隐藏域显示----编辑时，才显示
                $goodsArticleModel=D('GoodsArticle');
                $articles=$goodsArticleModel->getArticleName($goods_id);
                $this->assign('articles',$articles);
            //>>4.准备回显会员价格
            $goodsMemberPriceModel=D('GoodsMemberPrice');
            $prices=$goodsMemberPriceModel->getGoodsMemberPrice($goods_id);
            $this->assign('prices',$prices);

            //>>5 将当前商品的类型对应的所有属性找到分配到页面上
            //找到商品类型,  根据类型找到该类型下的属性
            $attributes = $this->model->getAttributeGoodsId($goods_id);
//            echo "<pre/>";
//            print_r($attributes);
//            exit;
            $this->assign('attributes',json_encode($attributes));

            //>>6 根据当前商品的id找到当前商品的属性值
            $goodsAttributeModel = D('GoodsAttribute');
            $goodsAttributes = $goodsAttributeModel->getGoodsAttributeByGoodsId($goods_id);
            $this->assign('goodsAttributes',json_encode($goodsAttributes));

        }
    }

    public function deleteGoodsAlbum(){
        $album_id=$_POST['album_id'];
        $GoodsAlbumModel=D('GoodsAlbum');
        $result=array('success'=>true);
        if($GoodsAlbumModel->where(array('id'=>$album_id))->delete() === false){
            $result['success']=false;
        }
       $this->ajaxReturn($result);  //tp框架中返回ajax请求数据
    }

    public function add()
{
    if (IS_POST) {
        //>>2.用模型中的add方法得到数据
        if ($this->model->create() !== false) {
            $requestData=I('post.','',false);
            if ($this->model->add($requestData) !== false) {
                $this->success('添加成功', cookie('__forword__'));
                return; //这里一定要退出，不然后面的代码无论如何都要执行。
            }
        }
        $this->error('操作失败' . showError($this->model));
    } else {
        $this->_before_show_view();
        $this->assign('meta_title', '添加' . $this->meta_title); //meta_title在子类中。
        $this->display('edit');
    }
}
    public function edit($id)
    {
        if (IS_POST) {
            //用模型中的save方法得到数据
            if ($this->model->create() !== false) {
                $requestData=I('post.','',false); //接收所有的数据
                if ($this->model->save($requestData) !== false) {
                    $this->success('修改成功', cookie('__forword__'));
                    return; //这里一定要退出，不然后面的代码无论如何都要执行。
                }
            }
            $this->error('操作失败' . showError($this->model));

        } else {
            //得到所有信息。
            $row = $this->model->find($id);
            //传递查到的所有信息。
            $this->assign($row);
            //展示编辑页面
            $this->assign('meta_title', '编辑' . $this->meta_title);
            $this->_before_show_view(); //这里调用钩子函数，实现其余数据的处理。
            $this->display('edit');
        }
    }
}