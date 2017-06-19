/**
 * Created by dy on 2017/4/12.
 */
new Vue({
    el:'#cars',
    data:{
        productList:[{
            'goods_id':  '35',
            'num' :  '1',
            'id':  '33',
            'name':  '领路',
            'logo' : 'http://admin.shop.com/Uploads/goods/2016-05-31/574d5c3976c52.jpg',
            'shop_price' : '180' ,
            'goods_attributes' :  ["xxxxx"] ,
            'total': 180
        },{
            'goods_id':  '36',
            'num' :  '2',
            'id':  '34',
            'name':  '精华水',
            'logo' : 'http://admin.shop.com/Uploads/goods/2016-05-31/574d5c3976c52.jpg',
            'shop_price' : '190' ,
            'goods_attributes' :  ["yyyy","zzzz"] ,
            'total': 190
        }],
        total_money:0,
        checked:false,
        checkAllFlag:false,
        currentObj:'',
    },
    filters:{
        formatMoney: function (value) {
            //console.info(value);

            return '￥'+ value;
        }
    },

    mounted:function(){
        //this.$nextTick(function(){
            //this.cartView();
        //});

    },
    methods:{
        //cartView:function(){
        //    var _this = this;
        //    _this.$http.get('www.shop.com/ShoppingCar/getCarsData').then(function(res){
        //       _this.productList =  res.body.shoppingCar;
        //    });
        //}
        changeNum:function(product,type){
            if(type>0){
                product.num++;
            }else{
                if( product.num>1){
                    product.num--;
                }
            }
            this.calcTotalMoney();
        },
        selectProduct:function(item){
            if(typeof  item.checked =='undefined'){
                //没选中
                Vue.set(item,'checked',true);
            }else{
                item.checked = !item.checked;
            }
            this.calcTotalMoney();
        },
        checkAll:function(){
            this.checkAllFlag = !this.checkAllFlag;
            var _this = this;
            this.productList.forEach(function(item,index){
                if(typeof  item.checked =='undefined'){
                    //没选中
                    Vue.set(item,'checked',_this.checkAllFlag);
                }else{
                    item.checked = _this.checkAllFlag;
                }
            });
            this.calcTotalMoney();
        },
        calcTotalMoney:function(){
            var _this = this;
            _this.total_money = 0;
            this.productList.forEach(function(item,index){
                if(item.checked){
                    _this.total_money += item.num * item.shop_price;
                    //console.log(_this.total_money);
                }
            });
        },
        delProduct:function(item){
          var index =   this.productList.indexOf(item);
            //this.$delete(item);  //疑点三：不能这样用？
            this.productList.splice(index,1);  //从index开始 ，删除1位
        }
    }
});

Vue.filter('money',function(value,type){ // 这里的value 是过滤器调用数据的值，不是另外传入的值
    return '￥' + value + type;  //疑点一： value.toFixed(2)不是函数
});