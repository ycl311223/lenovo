<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>联想商城-结算中心</title>
	<meta name="keywords" content="{{config('web.keywords')}}" />
	<meta name="description" content="{{config('web.description')}}" />
	<link rel="shortcut icon" href="/style/home/img/1.png">
	<link rel="stylesheet" href="/style/home/css/zhufu.css">
	<script src="/style/home/js/jquery.js"></script>
	<script src="/style/home/js/zhifu.js"></script>
</head>
<body>
@include("home.public.header1")
<div class="top_logob">
    <a href="/"><img src="/style/home/img/pic-15.jpg" class="top_logob_imga"></a>
    <img src="/style/home/img/pic-16.jpg" class="top_logob_imgb">
</div>
<form action="/orders" method="post">
    {{csrf_field()}}
<div class="wrap" style="padding-top: 40px;">
    <div class="box-01">
        <div class="box-tl"><p>请填写并核对以下信息</p></div>
        <div class="box-a" id="box-a">
            <p>收货信息：<span class="showbtn-SH showbtn new_p" ><span onclick="opens()" style="cursor:pointer;">＋新增收货地址</span></span></p>
            <script>
                function opens(){
                    $("#addAddr").show();
                }
                function closes(){
                    $("#addAddr").hide();
                }
            </script>
            <div id="addressList-SH">
                @foreach($addr as $dizhi)
                    <p>
                        <input type="radio" checked name="aid" id="" value="{{$dizhi->id}}">
                        <span>{{$dizhi->sname}}</span>
                        <span>{{$dizhi->stel}}</span>
                        <span>{{$dizhi->addr}}</span>
                        <span>{{$dizhi->addrInfo}}</span>
                    </p>
                @endforeach

            </div>
            <div id="bg-SH" class="bg-n"></div>
            <div style="display:none" id="addAddr" class="box-SH box">
                <input type="hidden" id="flag1-SH" value="0">
                <input type="hidden" id="deliveridupdate-SH" value="">
                <a class="close" href="javascript:void(0);" onclick="closes()">╳</a>
                <ul>
                    <li>
                        <label>
                            <span>* </span>收货人：
                        </label>
                        <input type="text" id="name-SH">
                        <label id="alertName-SH" style="display:none;color:red">收货人不能为空</label>
                    </li>
                    <li>
                        <label>
                            <span>* </span>手机：
                        </label>
                        <input type="text" id="mobile-SH">
                        <label>  固定电话：</label>
                        <input type="text" id="phone-SH">
                    </li>
                    <li>
                        <label><span>* </span>地址：</label>
                        <select id="goodsProvince-SH" name="goodsProvince-SH" onchange="getCities('SH')" style=" height:25px;width:120px">
                            <option value="">省份</option>
                        </select>
                        <select id="goodsCity-SH" name="goodsCity-SH"  style=" height:25px;width:120px">
                            <option value="">城市</option>
                        </select>
                        <select id="goodsCounty-SH" name="goodsCounty-SH" style=" height:25px;width:120px">
                            <option value="">区/县</option>
                        </select>
                    </li>
                    <li>
                        <label><span>* </span>详细地址：</label>
                        <input type="text" style="width:410px;" id="goodsStreet-SH">
                    </li>
                    <li>
                        <label>邮箱：</label>
                        <input type="text" id="mail-SH">
                        <span style="color:red;vertical-align: middle;padding-left: 5px;">用来接收订单提醒邮件，便于您及时了解订单状态</span>
                    </li>
                    <li>
                        <label><input type="checkbox" style="width:14px;height:14px;margin-top: -8px;" id="isCheck-SH" >&nbsp;&nbsp;</label>设置为默认收货地址</li>
                    <li>
                        <label></label>
                        <button id="submitbtn-SH" >保存收货人信息</button>
                    </li>
                </ul>
            </div>
        </div>
        <div class="box-d" id="box-d" style="display:none"></div>
    </div>
    <div class="box-02" id="productList">
            <div class="box-tl"><p><a href="getcart.jhtm" latag="latag_pc_ordersubmit_backtocart">返回购物车修改&gt;</a>确认商品</p></div>
            <div class="box-ls" style="margin-bottom: -20px;">
                <p class="tl-a">&nbsp;</p><p class="tl-b">商品名称</p>
                <p class="tl-c">单价</p><p class="tl-d">数量</p>
                <p class="tl-e">金额</p>
            </div>
            <div class="divide" style="margin-top: 20px;border-bottom: 1px solid #d9d8d6;"></div>
            <?php $tot=0;?>
            @foreach($newShop as $key=>$shop)
            <div class="list" id="52771" style="border-bottom: none;">
                <input type="hidden" name="ids[]" value="{{$shop['id']}}" id="">
                <input type="hidden" name="nums[]" value="{{$shop['num']}}" id="">
                <input type="hidden" name="prices[]" value="{{$shop['goodsInfo']->price}}" id="">
                <p class="list-a">
                    <a title="{{$shop['goodsInfo']->title}}"  href="/goods/{{$shop['id']}}">
                    <img title="{{$shop['goodsInfo']->title}}" style="width: 120px;height: 100px" src="/Uploads/goods/{{$shop['goodsInfo']->img}}">
                    </a>
                </p>
                <p class="list-b">
                    <a title="{{$shop['goodsInfo']->title}}" href="/goods/{{$shop['id']}}">{{$shop['goodsInfo']->title}}</a>
                </p>
                <p class="list-c">{{$shop['goodsInfo']->price}}</p>
                <p class="list-d">{{$shop['num']}}</p>
                <?php
                    $money=$shop['goodsInfo']->price*$shop['num'];
                    $tot+=$money;
                ?>
                <p class="list-e">{{$money}}</p>
            </div>
            @endforeach
            <div id="cto_personal" style="display: none;">
                <div class="dsix_boxg_cont personal">
                    <div class="personal_title personal_config" style="border:1px solid #d9d8d6;">个性化配置信息<b>▼</b><b style="display:none">▲</b></div>
                    <div class="config_table_box">
                        <table class="config_table" width="100%" cellpadding="0" cellspacing="0">
                        </table>
                    </div>
                </div>
                <div class="dsix_boxg_cont personal">
                    <div class="personal_title">个性定制－A面定制图片信息<b>▼</b><b style="display:none">▲</b></div>
                    <div class="personal_body" id="personal_imga"></div>
                </div>
                <div class="dsix_boxg_cont personal">
                    <div class="personal_title">个性定制－C面定制文字信息<b>▼</b><b style="display:none">▲</b></div>
                    <div class="personal_body clearfix" id="pagec_char"></div>
                </div>
            </div>
    </div>
    <div style="text-align:right;" id="agree_condition">
       <span id="lenovocondition">
            <input type="checkbox" name="isagreed" id="isagreed" checked="checked" latag="latag_pc_odersubmit_agree">
            <a target="_blank" href="turnB2C.jhtm" latag="latag_pc_odersubmit_turnb2c">我同意  《联想产品网络销售通用条款和条件》</a>
       </span>
    </div>
    <div class="box-06 clearfix" id="discountinfo" style="display: block;">
        <p><span>商品总价：<em style="color: #e2231a;font-weight: bold;font-style: normal;" id="totalPrice">￥{{$tot}}</em>元</span></p>
        <p id="submitbutton" style="margin-bottom: 15px;"><button style="font-size: 18px;cursor: pointer;margin-top: 2px;">提交订单</button></p>
    </div>

    <div id="orderformDiv"></div>
</form>
    <div class="footer">
       <img src="/style/home/img/99999.png" alt="">
       <img src="/style/home/img/9999.png" alt="">
    </div>
</div>
</body>
</html>