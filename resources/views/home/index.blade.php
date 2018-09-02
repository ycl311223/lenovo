<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>{{config('web.title')}}</title>
  <meta name="keywords" content="{{config('web.keywords')}}" />
    <meta name="description" content="{{config('web.description')}}" />
  <link rel="shortcut icon" href="/style/home/img/1.png">
  <link rel="stylesheet" href="/style/home/css/lenovo.css">
  <script src="/style/home/js/jquery.js"></script>
  <script src="/style/home/js/index.js"></script>
</head>
<body>
  <!-- 头 -->
  @include("home.public.header")
  
  <!-- 菜单 -->
  <div class="container menus">
    <div class="menus-img">
      <a><img src="/style/home/img/4.jpg"alt=""></a>
    </div>
    <div class="menus-dao">
      <ul>
        <li><a class=xp>小新Air 13 Pro
          <span class="pro"></span>
        </a>
        </li>
        <li class="bk">
          <a >爆款</a>
          <ul class="bk-bao">
           <li> <a href="">小新Air 12</a></li>
            <li><a href="">小新Air13 Pro</a></li>
            <li><a href="">小新310</a></li>
            <li><a href="">拯救者游戏本</a></li>
            <li><a href="">ThinkPad New S2</a></li>
            <li><a href="">看家宝Snowman</a></li>
            <li><a href="">小新700</a></li>
            <li><a href="">MIIX5</a> </li> 
            <li><a href="">YOGA BOOK</a></li>
          </ul>
        </li>
        <li ><a class="lx">联想合伙人<span class="hehou"></span></a></li>
        <li><a>0元试用</a></li>
        <li><a>以旧换新</a></li>
        <li><a>私人定制</a></li>
        <li class="fw"><a>服务</a>
          <ul class="fuwu">
            <li><a href="">服务支持</a></li>
            <li><a href="">驱动下载</a></li>
            <li><a href="">联想知识库</a></li>
          </ul>
        </li>
        <li><a>社区</a></li>
        <!-- <li></li> -->
      </ul>
     </div>
  </div>
  <!-- 监听 -->
  <div class="jianting">
    <ul>   
    </ul>
  </div>
  <!-- 侧边栏 -->
  <div class="cebianlang">
   <ul>
    <li class="ccbl"><span class="dianhua"></span>
      <div class="xianshi">
        <dl class="clearfix">
          <dt class="pc"></dt>
           <dd>
            <a href="javascript:;">商城服务热线<br>
            4000-888-222</a>
          </dd>
           <dt class="tk"></dt>
           <dd>
            <a href="javascript:;">商城服务热线<br>4000-888-222</a>
          </dd>
           <dt class="shouji"></dt>
           <dd>
            <a href="javascript:;">手机频道服务热线<br>
              400-818-8818</a>
          </dd>
           <dt class="xiuli"></dt>
           <dd>
            <a href="javascript:;">服务产品购买热线<br>
              400-890-1566</a>
          </dd> 
          <dt class="dianlian"></dt>
          <dd>
            <a href="javascript:;">联想商用客户热线<br>
              400-813-6161</a>
          </dd>
          <dt class="ka"></dt>
          <dd>
            <a href="javascript:;">通信卡服务热线<br>
              400-641-0041</a>
          </dd>
         </dl>
      </div>
    </li>
    <li><span class="wechat"></span></li>
    <li><span class="home"></span></li>
    <li><span class="qianbi"></span></li>
   </ul>
   <div class="huidao"> 
    <span class="dingbu"></span>
   </div>
   
  </div>
  <!-- 轮播区 -->
  <div class="container carouse">
      <div class="left">
        <ul>
            @foreach($type as $one)
            <li>
                <div class="left-menu">
                    <a href="" target="_blank" class="list_nm" style="height:10.56px;line-height:10.56px" >{{$one->name}}
                        <span class="list_usepng list_icona"></span>
                    </a>
                    <div class="left-xiang" style="display: none;">
                        <div class="left-zong">
                            @foreach($one->zi as $two)
                            <div class="left-zi">
                                <p><a href="">{{$two->name}}</a></p>
                                <ul class="clearfix">
                                    @foreach($two->zi as $three)
                                    <li>
                                        <a href="" >{{$three->name}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endforeach
                        </div>
                        <!-- 右侧广告-->
                        <div class="left-tu">
                           @foreach($one->rightAds as $ads)
                            <a href="">
                                <img class="classification_img" title="{{$ads->title}}" src="/Uploads/ads/{{$ads->img}}">
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
      </div>
      <div class="clear"></div>
      <div class="center">
      <ul class='imgs'>
      @foreach($slider as $key =>$value)
          @if($key=0)
           <li class='active'><img src="/Uploads/lun/{{$value->img}}" alt=""></li>
          @else
           <li class=''><img src="/Uploads/lun/{{$value->img}}" alt=""></li>
          @endif
      @endforeach


    </ul>
    <ul class='nums'>
        @foreach($slider as $key => $value)
            @if($key=0)
                <li class="active"></li>
            @else
                <li class=""></li>
            @endif

        @endforeach
    </ul>
      <a href="javascript:;" class="btn btn-left"></a>
      <a href="javascript:;" class="btn btn-right"></a>
  </div>
      <div class="right">
        <div class="xin">   
          <div class="xisn">
            <div class="horn_ring"></div>
            <ul class="xnss"> 
               <li><a target="_blank" href="">四年延保，沸腾国庆！</a></li> 
               <li><a target="_blank" href="">联想APP客户端乐豆抽奖大战开始啦，赶快下载抽取大奖，miix平板等着你！</a></li>
               <li><a target="_blank" href="">四年延保，沸腾国庆！</a></li> 
               <li><a target="_blank" href="">联想APP客户端乐豆抽奖大战开始啦，赶快下载抽取大奖，miix平板等着你！</a>
               </li>                   
             </ul>  
            </div> 
          </div>
        <!-- 评论 -->
        <div class="ping">
           <h2 class="clearfix"><span>精彩讨论</span>
            <a target="_blank" href="">更多 &gt;</a>
           </h2>
           <ul class="lun">               
              <li>
                <a target="_blank" href="">【评测】一款高颜值笔记本的告白</a>
              </li>               
              <li>
                <a target="_blank" href="">【评测】Moto Z+哈苏模块≈单反体验</a>
              </li>       
              <li>
              <a target="_blank" href="">【活动】分享你的怀旧珍藏赢好礼</a>
              </li>          
              <li>
                <a target="_blank" href="">【体验】诠释轻薄与性能的小新 Air 13 Pro</a>
              </li>           
              <li>
                <a target="_blank" href="">【小白课堂】小新笔记本还能这样玩</a>
              </li>        
              <li>
                <a target="_blank" href="l">【活动】联想智能存储有奖征名</a>
              </li>        
              <li>
                
                <a target="_blank" href="">【选本】新晋二合一笔记本推荐</a>
              </li>               
             </ul>
        </div>
      </div>
  
  </div>
  <!-- 图片 -->
  <div class="container middle-erbo">
   <div class="bao"> 
    <div class="tui">
      <img src="/style/home/img/70.jpg" alt="">
    </div>
    <div class="boo">
      <ul class="bo-1">
          @foreach($adss as $key => $val)
                    <!--   这里要是$ads就与上边的$ads冲突了，就会导致这里无法解析出$ads，就会报non-object的错误，非对象           -->
          <li>
            <a target="_blank" href="">
            <img src="/Uploads/ads/{{$val->img}}">
            </a>
          </li>
          @endforeach

      </ul>
      <a href="javascript:;" class="btn btn-left"></a>
      <a href="javascript:;" class="btn btn-right"></a>
    </div>
   </div>
  </div>  
  <!-- 明星单品 -->
  <div class="container star">
    <div class="star-1">
      <h3><span><img src="/style/home/img/555.png" alt=""dispaly="none"></span>明星单品</h3>
      <div class="start-xi">
        <ul>
          @foreach($goods as $good)
          <li style="width: 198px; height: 297px;">
            <a target="_blank" href=""> 
              <img src="/Uploads/goods/{{$good->img}}">
            </a>
            <p class="star_name">
              <a target="_blank" href="">小新Air 12 (6Y30/Windows 10 家庭版/12.2英寸/LTE 4G 48G流量)</a>
            </p>
            <p class="star_ad">
              <a target="_blank" href="">轻薄本！火热发售！</a>
            </p>
            <p class="star_price"><a target="_blank" href="">3,999元</a></p>
          </li>
          @endforeach
          <div class='clear'></div>
        </ul>
    </div>
 </div>
</div>
  <!-- 猜你喜欢 -->
  <!-- <div class="like"></div> -->

  <!-- 楼层 -->
  <div class="ceng"> 
    <div class='container lou '>
  <!-- 1F联想 -->
     <div class="lenovo">
     <div class="title"> 
       <h3><span>1F</span><em>联想 Lenovo 电脑</em></h3>
       <div class="jieshao">
        <a target="_blank" href="" title="YOGA4 Pro系列">YOGA4 Pro系列</a>
        <a target="_blank" href="" title="V4000系列">V4000系列</a>
        <a target="_blank" href="" title="拯救者系列">拯救者系列</a>
        <a target="_blank" href="" title="700S系列">700S系列</a>
        <a target="_blank" href="" title="Y900系列">Y900系列</a>
        <a href="" target="_blank" title="" class="myicon floor_more">更多</a>
       </div>
     </div>
     <div class="rong">
       <div class="zuo">
         <a target="_blank" href=""> <img width="240" height="535" src="/style/home/img/7.png">
         </a>
       </div>
       <div class="you">
         <div class="you1 good">
          <a target="_blank" href=""  title="小新Air 12 (6Y30/Windows 10 家庭版/LTE 4G 12G流量)"> 
           <img width="164" height="164" src="/style/home/img/8.jpg" > 
          </a>
          <a class="good-jie"target="_blank" href="">小新Air 12 (6Y30/Windows 10 家庭版/LTE 4G 12G流量)
          </a>
          <a class="good-jie1"target="_blank" href="" title="小新Air 12 (6Y30/Windows 10 家庭版/LTE 4G 12G流量)">i3办公本 稳定为先
          </a>
          <a class="money"  target="_blank" href=""  title="小新Air 12 (6Y30/Windows 10 家庭版/LTE 4G 12G流量)">3,499元
          </a>
          <span class="good-biao"></span>
         </div>
         <div class="you2 good">
           <a target="_blank" href="" title="小新Air 13 Pro (I7/Windows 10 家庭版/13.3英寸/8G/256G/银)">
            <img width="164" height="164" src="/style/home/img/9.jpg" >
           </a>
           <a class="good-jie" target="_blank" href=""  title="小新Air 13 Pro (I7/Windows 10 家庭版/13.3英寸/8G/256G/银)" class="good-jie">小新Air 13 Pro (I7/Windows 10 家庭版/13.3英寸/8G/256G/银)</a>
           <a class="good-jie1" target="_blank" href="" title="小新Air 13 Pro (I7/Windows 10 家庭版/13.3英寸/8G/256G/银)">窄边框设计 全高清屏
           </a>
           <a class="money" target="_blank" href=""title="小新Air 13 Pro (I7/Windows 10 家庭版/13.3英寸/8G/256G/银)">6,499元
           </a>
           <span class="good-biao"></span>
         </div>
         <div class="you3 good">
           <a target="_blank" href=""  title="天逸310 (I5/Windows 10 家庭版/15.6英寸/4G/无光驱)" >
            <img width="164" height="164" src="/style/home/img/88.jpg" style="left: 0px;">
           </a>
           <a class="good-jie" target="_blank" href="" title="天逸310 (I5/Windows 10 家庭版/15.6英寸/4G/无光驱)" >天逸310 (I5/Windows 10 家庭版/15.6英寸/4G/无光驱)
           </a>
           <a class="good-jie1" target="_blank" href="" title="天逸310 (I5/Windows 10 家庭版/15.6英寸/4G/无光驱)" >影音保真 畅享生活
           </a>
           <a  class="money" target="_blank" href=""title="天逸310 (I5/Windows 10 家庭版/15.6英寸/4G/无光驱)" >3,699元
           </a>
         </div>
         <div class="you4 good">
           <a target="_blank" href=""title="小新310经典版 (I7/Windows10 家庭版 /4G/128G SSD)" > 
            <img width="164" height="164" src="/style/home/img/87.jpg" style="left: 0px;">
           <a class="good-jie" target="_blank" href=""title="小新310经典版 (I7/Windows10 家庭版 /4G/128G SSD)">小新310经典版 (I7/Windows10 家庭版 /4G/128G SSD)</a>
           <a  class="good-jie1"target="_blank" href=""title="小新310经典版 (I7/Windows10 家庭版 /4G/128G SSD)">全高清屏 捕捉世界美好</a>
           <a  class="money" target="_blank" href=""title="小新310经典版 (I7/Windows10 家庭版 /4G/128G SSD)">4,399元
           </a>
         </div>
         <div class="you5 good">
           <a target="_blank" href=""title="致美一体机510S-i7-银"> 
            <img width="164" height="164" src="/style/home/img/86.jpg" style="left: 0px;">
           </a>
           <a class="good-jie" target="_blank" href="" title="致美一体机510S-i7-银">致美一体机510S-i7-银
           </a>
           <a class="good-jie1" target="_blank" href=""title="致美一体机510S-i7-银">23英寸IPS全高清屏
           </a>
           <a class="money" target="_blank" href=""title="致美一体机510S-i7-银"> 7,299元
           </a>
         </div>
         <div class="you6 good">
           <a target="_blank" href=""title="YOGA 4 Pro(YOGA 900)-13-IFI(金色)(L)"> 
            <img width="164" height="164" src="/style/home/img/85.jpg" style="left: 0px;">
           </a>
           <a class="good-jie" target="_blank" href=""title="YOGA 4 Pro(YOGA 900)-13-IFI(金色)(L)">YOGA 4 Pro(YOGA 900)-13-IFI(金色)(L)
           </a>
           <a class="good-jie1" target="_blank" href=""title="YOGA 4 Pro(YOGA 900)-13-IFI(金色)(L)">赠送新秀丽商务手提包</a>
           <a class="money" target="_blank" href=""title="YOGA 4 Pro(YOGA 900)-13-IFI(金色)(L)">8,199元</a>
         </div>
         <div class="you7 good">
           <a target="_blank" href=""title="C560 I54460T8G1TGRW-10(黑色)"> 
            <img width="164" height="164" src="/style/home/img/84.jpg" style="left: 0px;">
           </a>
           <a class="good-jie" target="_blank" href="" title="C560 I54460T8G1TGRW-10(黑色)">C560 I54460T8G1TGRW-10(黑色)
           </a>
           <a class="good-jie1" class="good-jie1"target="_blank" href=""  title="C560 I54460T8G1TGRW-10(黑色)">赠送一体机延长一年保修
           </a>
           <a class="money" target="_blank" href="" title="C560 I54460T8G1TGRW-10(黑色)">5,399元
           </a>
         </div>
         <div class="you8 good">
            <a target="_blank" href="" title="Lenovo h3050 I341704G50GD-10(单主机)">
              <img width="164" height="164" src="/style/home/img/15.png" style="left: 0px;"> 
            </a>
            <a class="good-jie" class="good-jie" target="_blank" href="" title="Lenovo h3050 I341704G50GD-10(单主机)">Lenovo h3050 I341704G50GD-10(单主机)
            </a>
            <a  class="good-jie1"target="_blank" href="" title="Lenovo h3050 I341704G50GD-10(单主机)">家用办公两不误 套餐价格更优惠
            </a>
            <a class="money" target="_blank" href=""title="Lenovo h3050 I341704G50GD-10(单主机)">3,099元
            </a>
         </div>
       </div>
       <div class="clear"></div>
     </div>
     </div>
   <!-- 2Fthinkpad -->
     <div class="thinkpad">
     <div class="title">
       <h3><span>2F</span> ThinkPad 电脑</h3>
       <div class="jieshao">
         <a target="_blank" href="" title="X1 系列">X1 系列</a>
         <a target="_blank" href="" title="X系列">X系列</a>
         <a target="_blank" href="" title="T系列">T系列</a>
         <a target="_blank" href="" title="E系列">E系列</a>
         <a target="_blank" href="" title="S系列">S系列</a>
         <a href="">更多</a>
       </div>
     </div>
     <div class="action">
       <div class="zuo">
         <a target="_blank" href="" > 
          <img width="240" height="535" src="/style/home/img/16.png">
        </a>
       </div>

       <div class="you">
         <div class="you1 good">
           <a target="_blank" href="52772.html"title="ThinkPad 黑将S5魔兽定制版 20G4S00100 银色">
            <img width="164" height="164" src="/style/home/img/18.png" style="left: 0px;">
           </a>
           <a  class="good-jie"target="_blank" href="52772.html"  title="ThinkPad 黑将S5魔兽定制版 20G4S00100 银色">ThinkPad 黑将S5魔兽定制版 20G4S00100 银色</a>
           <a  class="good-jie1"target="_blank" href="52772.html" title="ThinkPad 黑将S5魔兽定制版 20G4S00100 银色" >
           </a>
           <a  class="money"target="_blank" href="52772.html"  title="ThinkPad 黑将S5魔兽定制版 20G4S00100 银色" 
           >7,999元</a>
         </div>
         <div class="you2 good">
           <a target="_blank" href="./xianqing.html" title="ThinkPad E560 20EVA034CD" class="pro_img">
            <img width="164" height="164" src="/style/home/img/19.png" style="left: 0px;"> 
           </a>
           <a  class="good-jie" target="_blank" href="./xianqing.html"  title="ThinkPad E560 20EVA034CD" >ThinkPad E560 20EVA034CD</a>
           <a class="good-jie1" target="_blank" href=""  title="ThinkPad E560 20EVA034CD" ></a>
           <a class="money" target="_blank" href=""  title="ThinkPad E560 20EVA034CD" >4,599元</a>
           <span class=""></span>
         </div>
         <div class="you3 good">
           <a target="_blank" href=""  title="ThinkPad X260 20F6A05FCD" class="pro_img"> 
            <img width="164" height="164" src="/style/home/img/20.png" style="left: 0px;">
           </a>
           <a  class="good-jie" target="_blank" href=""  title="ThinkPad X260 20F6A05FCD" >ThinkPad X260 20F6A05FCD
           </a>
           <a class="good-jie1" target="_blank" href=""  title="ThinkPad X260 20F6A05FCD" >轻装上阵 才能担当重任
           </a>
           <a  class="money"target="_blank" href="" title="ThinkPad X260 20F6A05FCD" >7,599元
           </a>
           <span class=""></span>
         </div>
         <div class="you4 good">
           <a target="_blank" href=""title="ThinkPad T450 20BUA0RNCD">   
              <img width="164" height="164" src="/style/home/img/21.png"style="left: 0px;">   
           </a>
           <a class="good-jie" target="_blank" href=""  title="ThinkPad T450 20BUA0RNCD" >ThinkPad T450 20BUA0RNCD
           </a>
           <a class="good-jie1" target="_blank" href="" title="ThinkPad T450 20BUA0RNCD">精锐纤薄 亦威亦美
           </a>
           <a class="money" target="_blank" href=""  title="ThinkPad T450 20BUA0RNCD">6,499元
           </a>
         </div>
         <div class="you5 good">
           <a target="_blank" href="" title="ThinkPad 黑将S5魔兽定制版 20G4S00000 黑色"> 
            <img width="164" height="164" src="/style/home/img/18.png"> 
           </a>
           <a class="good-jie"  target="_blank" href=""  title="ThinkPad 黑将S5魔兽定制版 20G4S00000 黑色" >ThinkPad 黑将S5魔兽定制版 20G4S00000 黑色</a>
           <a class="good-jie1" target="_blank" href=""  title="ThinkPad 黑将S5魔兽定制版 20G4S00000 黑色" >
           </a>
           <a  class="money" target="_blank" href="" title="ThinkPad 黑将S5魔兽定制版 20G4S00000 黑色" >7,999元
           </a>
         </div>
         <div class="you6 good">
           <a target="_blank" href="" title="ThinkPad E560 20EVA00KCD" class="pro_img"> 
            <img width="164" height="164" src="/style/home/img/19.png"style="left: 0px;"> 
           </a>
           <a class="good-jie" target="_blank" href="" title="ThinkPad E560 20EVA00KCD">ThinkPad E560 20EVA00KCD
           </a>
           <a class="good-jie1" target="_blank" href=""  title="ThinkPad E560 20EVA00KCD" >高性价  商务范儿
           </a>
           <a class="money" target="_blank" href="" title="ThinkPad E560 20EVA00KCD">4,499元

           </a>
           <span class="good-baokuan"></span>
         </div>
         <div class="you7 good">
           <a target="_blank" href=""  title="ThinkPad 黑将S5 20G4A000CD 黑色"> 
            <img width="164" height="164" src="/style/home/img/18.png" style="left: 0px;">
           </a>
           <a class="good-jie" target="_blank" href=""  title="ThinkPad 黑将S5 20G4A000CD 黑色">ThinkPad 黑将S5 20G4A000CD 黑色
           </a>
           <a class="good-jie1" target="_blank" href="" title="ThinkPad 黑将S5 20G4A000CD 黑色">
           </a>
           <a class="money" target="_blank" href=""  title="ThinkPad 黑将S5 20G4A000CD 黑色">6,699元
           </a>
         </div>
         <div class="you8 good">
           <a target="_blank" href="" title="ThinkPad E460 20ETA02FCD"> 

            <img width="164" height="164" src="/style/home/img/22.png" style="left: 0px;"> 
           </a>
           <a  class="good-jie" target="_blank" href="" title="ThinkPad E460 20ETA02FCD" >ThinkPad E460 20ETA02FCD
           </a>
           <a class="good-jie1" target="_blank" href=""  title="ThinkPad E460 20ETA02FCD">
           </a>
           <a class="money" target="_blank" href=""  title="ThinkPad E460 20ETA02FCD">4,699元
           </a>
         </div>

       </div>
       <div class="clear"></div>
     </div>
     </div>
   <!-- 3F平板 -->
     <div class="tablet">
     <div class="title">
      <h3><span>3F </span>平板电脑</h3>
       <div class="jieshao">
         <a target="_blank" href="" title="投影平板">投影平板</a>
         <a target="_blank" href="" title="PHAB手机平板">PHAB手机平板</a>
         <a target="_blank" href="http://www.lenovo.com.cn" title="新小七">新小七</a>
         <a target="_blank" href="" title="教育平板">教育平板</a>
         <a href="http://www.lenovo.com.cn/pad.html">更多</a>
       </div>
     </div>
     <div class="action">
       <div class="zuo">
         <a target="_blank" href="">
          <img width="240" height="535" src="/style/home/img/32.jpg">
         </a>
       </div>
       <div class="you">
         <div class="you1 good">
           <a target="_blank" href=""  title="MIIX5 二合一笔记本  尊享版 银色"> 
            <img width="164" height="164" src="/style/home/img/33.jpg" style="left: 0px;">
           </a>
           <a class="good-jie" target="_blank" href=""  title="MIIX5 二合一笔记本  尊享版 银色">MIIX5 二合一笔记本  尊享版 银色</a>
           <a target="_blank" href="" title="MIIX5 二合一笔记本  尊享版 银色">
           </a>
         </div>
         <div class="you2 good">
           <a target="_blank" href="" title="YOGA BOOK 二合一笔记本  雅黑" class="pro_img">  
            <img width="164" height="164" src="/style/home/img/34.jpg" alt="YOGA BOOK 二合一笔记本  雅黑" class="lazy_img" style="left: 0px;">
             </a>
            <a class="good-jie" target="_blank" href="" title="YOGA BOOK 二合一笔记本  雅黑" class="good-jie">YOGA BOOK 二合一笔记本  雅黑
            </a>
            <a target="_blank" href="" title="YOGA BOOK 二合一笔记本  雅黑" class="good-jie1">
            </a>
            <p class="prod" gcode="58064">            
              <a target="_blank" href="" title="YOGA BOOK 二合一笔记本  雅黑" class="money" controller="fn1">￥3499</a>               
            </p>

         </div>
         <div class="you3 good">
            <a target="_blank" href=""  title="MIIX5 二合一笔记本 精英版 银色" class="pro_img">               
              <img width="164" height="164" src="/style/home/img/35.jpg" alt="MIIX5 二合一笔记本 精英版 银色" class="lazy_img" style="left: 0px;">   
            </a>
            <a class="good-jie" target="_blank" href=""  title="MIIX5 二合一笔记本 精英版 银色" class="good-jie">MIIX5 二合一笔记本 精英版 银色
            </a>
            <a target="_blank" href=""  title="MIIX5 二合一笔记本 精英版 银色" class="good-jie1">
            </a>
            <p class="prod" gcode="58010">   
            <a target="_blank" href=""  title="MIIX5 二合一笔记本 精英版 银色" class="money" controller="fn1">￥4399</a>           
            </p>
            </div>
            <div class="you4 good">
            <a target="_blank" href="" title="YOGA BOOK 二合一笔记本  Windows版 雅黑" class="pro_img">  
            <img width="164" height="164" src="/style/home/img/36.jpg" alt="YOGA BOOK 二合一笔记本  Windows版 雅黑" class="lazy_img" style="left: 0px;">               
            </a>
            <a class="good-jie" target="_blank" href="" title="YOGA BOOK 二合一笔记本  Windows版 雅黑" class="good-jie">YOGA BOOK 二合一笔记本  Windows版 雅黑
            </a>
            <a target="_blank" href="" title="YOGA BOOK 二合一笔记本  Windows版 雅黑" class="good-jie1">
            </a>
            <p class="prod" gcode="58011">  
            <a target="_blank" href="" title="YOGA BOOK 二合一笔记本  Windows版 雅黑" class="money" controller="fn1">￥3999
            </a>              
            </p>
         </div>
         <div class="you5 good">
            <a target="_blank" href=""  title="联想 MIIX 4 旗舰版 二合一平板电脑 12英寸 金色" class="pro_img">
             <img width="164" height="164" src="/style/home/img/37.jpg" alt="联想 MIIX 4 旗舰版 二合一平板电脑 12英寸 金色" class="lazy_img" style="left: 0px;">  
            </a>
            <a class="good-jie" target="_blank" href=""  title="联想 MIIX 4 旗舰版 二合一平板电脑 12英寸 金色" class="good-jie">联想 MIIX 4 旗舰版 二合一平板电脑 12英寸 金色
            </a>
            <a target="_blank" href=""  title="联想 MIIX 4 旗舰版 二合一平板电脑 12英寸 金色" class="good-jie1">
            </a>
            <p class="prod" gcode="53055">
            <a target="_blank" href=""  title="联想 MIIX 4 旗舰版 二合一平板电脑 12英寸 金色" class="money" controller="fn1">￥5999
            </a> 
            </p>
         </div>
         <div class="you6 good">
          <a target="_blank" href="" title="联想YOGA平板-2-8寸-WiFi版 （铂银色）" class="pro_img">
            <img width="164" height="164" src="/style/home/img/38.jpg" alt="联想YOGA平板-2-8寸-WiFi版 （铂银色）" class="lazy_img" style="left: 0px;">      
          </a>
          <a class="good-jie" target="_blank" href="" title="联想YOGA平板-2-8寸-WiFi版 （铂银色）" class="good-jie">联想YOGA平板-2-8寸-WiFi版 （铂银色）</a>
          <a target="_blank" href="" title="联想YOGA平板-2-8寸-WiFi版 （铂银色）" class="good-jie1">
          </a>
          <p class="prod" gcode="47434">              
          <a target="_blank" href="" title="联想YOGA平板-2-8寸-WiFi版 （铂银色）" class="money" controller="fn1">￥1999
          </a>        
          </p>
         </div>
         <div class="you7 good">
          <a target="_blank" href=""  title="便携8寸 平板-A8-50F（午夜蓝）" class="pro_img">  
           <img width="164" height="164" src="/style/home/img/39.jpg" alt="便携8寸 平板-A8-50F（午夜蓝）" class="lazy_img" style="left: 0px;">    
          </a>
          <a  class="good-jie" target="_blank" href=""  title="便携8寸 平板-A8-50F（午夜蓝）" class="good-jie">便携8寸 平板-A8-50F（午夜蓝）
          </a>
          <a target="_blank" href=""  title="便携8寸 平板-A8-50F（午夜蓝）" class="good-jie1">
          </a>
          <p class="prod" gcode="51944">  
           <a target="_blank" href=""  title="便携8寸 平板-A8-50F（午夜蓝）" class="money" controller="fn1">￥899
            
            </a>      
          </p>
         </div>
         <div class="you8 good">
          <a target="_blank" href=""  title="TAB 2 A10-70F（白色）" class="pro_img">   
            <img width="164" height="164" src="/style/home/img/40.jpg" alt="TAB 2 A10-70F（白色）" class="lazy_img" style="left: 0px;">
          </a>
          <a  class="good-jie" target="_blank" href=""  title="TAB 2 A10-70F（白色）" class="good-jie">TAB 2 A10-70F（白色）
          </a>
          <a target="_blank" href=""  title="TAB 2 A10-70F（白色）" class="good-jie1">
          </a>
          <p class="prod" gcode="47774">              
           <a target="_blank" href=""  title="TAB 2 A10-70F（白色）" class="money" controller="fn1">￥1599
          </a>             
          </p>
         </div>
       </div>
       <div class="clear"></div>

     </div>
     </div>
   <!-- 4F手机 -->
     <div class="cellphone">
     <div class="title">
      <h3><span>4F</span> 手机产品</h3>
       <div class="jieshao">
         <a target="_blank" href="" title="体质仪">体质仪</a>
         <a target="_blank" href="" title="圈铁耳机">圈铁耳机</a>
         <a href="#" target="_blank" title="" class="myicon floor_more">更多</a>
       </div>
     </div>
     <div class="action">
       <div class="zuo">
         <a target="_blank" href="" title="">   
           <img width="240" height="535" src="/style/home/img/23.jpg" alt="" class="lazy_img"></a>
       </div>
       <div class="you">
        <div class="you1 good">
          <a target="_blank" href=""  title="Moto Z 电池模块套装" class="pro_img">         
            <img width="164" height="164" src="/style/home/img/24.jpg" alt="Moto Z 电池模块套装" class="lazy_img" style="left: 0px;">             
          </a>
          <a target="_blank" href=""  title="Moto Z 电池模块套装" class="good-jie">Moto Z 电池模块套装
          </a>
          <a target="_blank" href=""  title="Moto Z 电池模块套装" class="good-jie1">领券立减100元！用券价：4299元！
          </a>
          <p class="prod" gcode="58006">          
            <a target="_blank" href=""  title="Moto Z 电池模块套装" class="money" controller="fn1">￥4399
            </a>             
          </p>
          <span class="good-xinping">
          </span>
        </div>
        <div class="you2 good">
          <a target="_blank" href=""  title="Moto Z Play" class="pro_img">         
          
           <img width="164" height="164" src="/style/home/img/25.jpg" alt="Moto Z Play" class="lazy_img" style="left: 0px;">               
          </a>
          <a target="_blank" href=""  title="Moto Z Play" class="good-jie">Moto Z Play
          </a>
          <a target="_blank" href=""  title="Moto Z Play" class="good-jie1">领券立减100元！用券价：3199元！
          </a>
          <p class="prod" gcode="58005">                    
          <a target="_blank" href=""  title="Moto Z Play" class="money" controller="fn1">￥3299
          </a>               
          </p>
          <span class="good-xinping"></span>
        </div>
        <div class="you3 good">
            <a target="_blank" href="" title="ZUK Z2 3+32G" class="pro_img">                  
            
             <img width="164" height="164" src="/style/home/img/26.jpg" alt="ZUK Z2 3+32G" class="lazy_img" style="left: 0px;">    
            </a>
            <a target="_blank" href="" title="ZUK Z2 3+32G" class="good-jie">ZUK Z2 3+32G
            </a>
            <a target="_blank" href="" title="ZUK Z2 3+32G" class="good-jie1">直降300！领券再减50！仅售1249元！
            </a>
            <p class="prod" gcode="53124">                   
            <a target="_blank" href="" title="ZUK Z2 3+32G" class="money" controller="fn1">￥1599
            </a>                  
            </p>
          <span class="good-zhijian"></span>
        </div>
        <div class="you4 good">
            <a target="_blank" href=""  title="ZUK Z2 标准版" class="pro_img">                 
                 <img width="164" height="164" src="/style/home/img/27.jpg" alt="ZUK Z2 标准版" class="lazy_img" style="left: 0px;">              
            </a>
            <a target="_blank" href=""  title="ZUK Z2 标准版" class="good-jie">ZUK Z2 标准版
            </a>
            <a target="_blank" href=""  title="ZUK Z2 标准版" class="good-jie1">双11零点直降300元！
            </a>
            <p class="prod" gcode="53204">              
            <a target="_blank" href=""  title="ZUK Z2 标准版" class="money" controller="fn1">￥1799
            </a>                
            </p>
          <span class="good-zhijian"></span>
        </div>
        <div class="you5 good">
          <a target="_blank" href=""  title="ZUK Z2 Pro旗舰版" class="pro_img">            
           <img width="164" height="164" src="/style/home/img/28.jpg" alt="ZUK Z2 Pro旗舰版" class="lazy_img" style="left: 0px;">              
          </a>
          <a target="_blank" href=""  title="ZUK Z2 Pro旗舰版" class="good-jie">ZUK Z2 Pro旗舰版
          </a>
          <a target="_blank" href=""  title="ZUK Z2 Pro旗舰版" class="good-jie1">直降100元！领券再减100！仅售2099元！</a>
          <p class="prod" gcode="52621">         
          <a target="_blank" href=""  title="ZUK Z2 Pro旗舰版" class="money" controller="fn1">￥2299
          </a>   
          </p>
          <span class="good-zhijian"></span>
        </div>
        <div class="you6 good">
          <a target="_blank" href=""  title="ZUK Z2 Pro尊享套餐" class="pro_img">             
            <img width="164" height="164" src="/style/home/img/29.jpg" alt="ZUK Z2 Pro尊享套餐" class="lazy_img" style="left: 0px;">                  
          </a>
          <a target="_blank" href=""  title="ZUK Z2 Pro尊享套餐" class="good-jie">ZUK Z2 Pro尊享套餐
          </a>
          <a target="_blank" href=""  title="ZUK Z2 Pro尊享套餐" class="good-jie1">Z2 Pro尊享版+耳机+臂包+保护壳
          </a>
          <p class="prod" gcode="52611">                   
          <a target="_blank" href=""  title="ZUK Z2 Pro尊享套餐" class="money" controller="fn1">￥2999</a>      
          </p>
        </div>
        <div class="you7 good">
            <a target="_blank" href=""  title="ZUK Z1" class="pro_img">         
            <img width="164" height="164" src="/style/home/img/30.jpg" class="lazy_img" style="left: 0px;">         
            </a>
            <a target="_blank" href="http://www.zuk.com/store/2_2.html?hmsr=lenovo_home&amp;
            hmpl=4f_7&amp;cid=sqgc1688"  title="ZUK Z1" class="good-jie">ZUK Z1
            </a>
            <a target="_blank" href=""  title="ZUK Z1" class="good-jie1">年度口碑精品
            </a>
            <p class="prod" gcode="52625">           
            <a target="_blank" href=""  title="ZUK Z1" class="money" controller="fn1">￥1499</a>               
            </p>
        </div>
        <div class="you8 good">
            <a target="_blank" href=""  title="VIBE P1" class="pro_img">        
             <img width="164" height="164" src="/style/home/img/31.jpg" alt="VIBE P1" class="lazy_img" style="left: 0px;">         
            </a>
            <a target="_blank" href=""  title="VIBE P1" class="good-jie">VIBE P1
            </a>
            <a target="_blank" href=""  title="VIBE P1" class="good-jie1">充电5分钟 通话3小时
            </a>
            <p class="prod">                 
            <a target="_blank" href=""  title="VIBE P1" class="money" controller="fn1">￥899
            </a>              
            </p>
          <span class="good-zhij ian"></span>
        </div>
       
       </div>
       <div class="clear"></div>
     </div>
     </div>
   <!-- 5F增值服务-->
     <div class="serve">
     <div class="title">
       <h3><span>5F</span> 电脑增值服务</h3>
       <div class="jieshao">
         <a target="_blank" href="" title="固态硬盘升级服务">固态硬盘升级服务</a>
         <a target="_blank" href="" title="内存升级服务">内存升级服务</a>
         <a href="key=" target="_blank" title="" class="myicon floor_more">更多</a>
       </div>
     </div>
     <div class="action">
       <div class="zuo">
         <a target="_blank" href="" latag="latag_home_MD532_e702e4a8-db91-4ff8-a8c5-b41ed1f928af_p1_goods_code_no_exists" title="">
          <img width="240" height="535" src="/style/home/img/41.jpg" alt="" class="lazy_img"></a>
       </div>
       <div class="you">
         <div class="you1 good">
          <a target="_blank" href=""  title="联想便携式多功能适配器" class="pro_img">     
          <img width="164" height="164" src="/style/home/img/42.jpg" alt="联想便携式多功能适配器" class="lazy_img" style="left: 0px;">            
          </a>
          <a target="_blank" href=""  title="联想便携式多功能适配器" class="good-jie">联想便携式多功能适配器
          </a>
          <a target="_blank" href=""  title="联想便携式多功能适配器" class="good-jie1">便携多功能在手 出行无忧
          </a>
          <a target="_blank" href=""  title="联想便携式多功能适配器" class="money">299元
          </a>
           <span class="good-baokuan">
           </span>
         </div>
         <div class="you2 good">
            <a target="_blank" href="" latag="latag_home_MD532_e702e4a8-db91-4ff8-a8c5-b41ed1f928af_p3_53325" title="联想看家宝Thinker（酷黑版）" class="pro_img">               
             <img width="164" height="164" src="/style/home/img/43.jpg" alt="联想看家宝Thinker（酷黑版）" class="lazy_img" style="left: 0px;">          
            </a>
            <a target="_blank" href="" latag="latag_home_MD532_e702e4a8-db91-4ff8-a8c5-b41ed1f928af_p3_53325" title="联想看家宝Thinker（酷黑版）" class="good-jie">联想看家宝Thinker（酷黑版）
            </a>
            <a target="_blank" href="" latag="latag_home_MD532_e702e4a8-db91-4ff8-a8c5-b41ed1f928af_p3_53325" title="联想看家宝Thinker（酷黑版）" class="good-jie1">送云存 送8G TF卡
            </a>
            <a target="_blank" href="" latag="latag_home_MD532_e702e4a8-db91-4ff8-a8c5-b41ed1f928af_p3_53325" title="联想看家宝Thinker（酷黑版）" class="money">249元
            </a>
           <span class="good-xinping"></span>
         </div>
         <div class="you3 good">
          <a target="_blank" href="" ltitle="联想小闲Wi-FiU盘 32GB 白色" class="pro_img">    
             <img width="164" height="164" src="/style/home/img/44.jpg" alt="联想小闲Wi-FiU盘 32GB 白色" class="lazy_img" style="left: 0px;">            
          </a>
          <a target="_blank" href="" title="联想小闲Wi-FiU盘 32GB 白色" class="good-jie">联想小闲Wi-FiU盘 32GB 白色
          </a>
          <a target="_blank" href="" title="联想小闲Wi-FiU盘 32GB 白色" class="good-jie1">新品首发 
          </a>
          <a target="_blank" href="" title="联想小闲Wi-FiU盘 32GB 白色" class="money">239元
          </a>
           <span class="good-xinping"></span>
         </div>
         <div class="you4 good">
          <a target="_blank" href="" title="联想看家宝Snow man" class="pro_img">                       
            <img width="164" height="164" src="/style/home/img/45.jpg" alt="联想看家宝Snow man" class="lazy_img" style="left: 0px;">       
          </a>
          <a target="_blank" href=""  title="联想看家宝Snow man" class="good-jie">联想看家宝Snow man
          </a>
          <a target="_blank" href="" title="联想看家宝Snow man" class="good-jie1">送3个月云储存 送8G TF卡
          </a>
          <a target="_blank" href="" title="联想看家宝Snow man" class="money">199元
          </a>
           <span class="good-biao"></span>
         </div>
         <div class="you5 good">
          <a target="_blank" href=""  title="128G固态硬盘升级服务mSATA" class="pro_img">           
          <img width="164" height="164" src="/style/home/img/46.jpg" alt="128G固态硬盘升级服务mSATA" class="lazy_img" style="left: 0px;">           
          </a>
          <a target="_blank" href=""  title="128G固态硬盘升级服务mSATA" class="good-jie">128G固态硬盘升级服务mSATA
          </a>
          <a target="_blank" href="" title="128G固态硬盘升级服务mSATA" class="good-jie1">卓越的读写速度 工程师上门安装
          </a>
          <a target="_blank" href="" title="128G固态硬盘升级服务mSATA" class="money">799元
          </a>
         </div>
         <div class="you6 good">
          <a target="_blank" href="" title="120G固态硬盘升级服务NGFF(80mm)" class="pro_img">                     
          <img width="164" height="164" src="/style/home/img/47.jpg" class="lazy_img" style="left: 0px;">     
              </a>
          <a target="_blank" href=""title="120G固态硬盘升级服务NGFF(80mm)" class="good-jie">120G固态硬盘升级服务NGFF(80mm)
          </a>
          <a target="_blank" href=""  title="120G固态硬盘升级服务NGFF(80mm)" class="good-jie1">卓越的读写速度 工程师上门安装
          </a>
          <a target="_blank" href=""  title="120G固态硬盘升级服务NGFF(80mm)" class="money">699元
          </a>
         </div>
         <div class="you7 good">
          <a target="_blank" href=""  title="240G固态硬盘升级服务NGFF(80mm )" class="pro_img">       
          <img width="164" height="164" src="/style/home/img/47.jpg" alt="240G固态硬盘升级服务NGFF(80mm )" class="lazy_img" style="left: 0px;">                   </a>
          <a target="_blank" href=""  title="240G固态硬盘升级服务NGFF(80mm )" class="good-jie">240G固态硬盘升级服务NGFF(80mm )
          </a>
          <a target="_blank" href="" title="240G固态硬盘升级服务NGFF(80mm )" class="good-jie1">卓越的读写速度 工程师上门安装
          </a>
          <a target="_blank" href="" title="240G固态硬盘升级服务NGFF(80mm )" class="money">1,099元
          </a>
         </div>
         <div class="you8 good">
          <div class="jieshao-shang">
              <a class="xiaotu"target="_blank" href=""> 
                <img width="100" height="100" src="/style/home/img/110.jpg" alt="数据恢复" class="lazy_img">
              </a>
              <div class="jieshao-0">
                <div class="zai">
                  <a class="good-jie" style="width:120px"target="_blank" href="" title="数据恢复">数据恢复</a>
                  <a class="good-jie1" target="_blank" href="" title="数据恢复" >专家服务 抢救数据</a>
                  <a target="_blank" href=""title="数据恢复" class="money">365元</a>
                </div>
              </div>
              <div class="clear"></div>
           
             <div class="jieshao-xia001">
                <a  class="xiaotu2" target="_blank" href=""title="数据恢复">
                  <img width="100" height="100" src="/style/home/img/111.jpg" alt="数据恢复" class="lazy_img">
                </a>
               <div class="jieshaos-002" style="height:134px">
                 <div class="jsz">
                    <a class="good-jie" style="width:120px" target="_blank" href=""  title="新机开荒">新机开荒</a>
                    <a class="good-jie1" target="_blank" href="" title="新机开荒" >远程安装必备软件及驱动</a>
                    <a target="_blank" href="" latag="latag_home_MD532_e702e4a8-db91-4ff8-a8c5-b41ed1f928af_p10_51644" title="新机开荒" class="money">19元</a>
                  </div>
               </div>
              <div class="clear"></div>
            </div>
         </div>
         </div>
       </div>
       <div class="clear"></div>
     </div>
<!-- 6F社交平台 -->
       <div class="container social">
          <div class="title">
            <h3><span>6F</span> 社交平台</h3>
          </div>
          <div class="social-tu">
            <ul>
              <li>
                <div class="shekuang" datatype="5" sort="1" b_i="190,212,30">
                      <a target="_blank" href="">
                        <img width="190" height="212" src="/style/home/img/50.jpg" class="lazy_img"></a>
                      <div class="social-tou"></div>
                      <div class="social-rong">
                        <em class="social-zi" ></em>
                        <span>联想社区</span>
                      </div>
                </div>
              </li>
              <li>
                <div class="shekuang" datatype="5" sort="2" b_i="190,212,30">
                      <a target="_blank" href="http://955.cc/muj82">
                        <img width="190" height="212" src="/style/home/img/52.jpg" class="lazy_img"></a>
                      <div class="social-tou"></div>
                      <div class="social-rong">
                        <em class="social-guanwei"></em>
                        <span>官方微信</span>
                      </div>
                </div>
              </li>
              <li>
                <div class="shekuang" datatype="5" sort="3" b_i="190,212,30">
                      <a target="_blank" href="">
                        <img width="190" height="212" src="/style/home/img/53.jpg" class="lazy_img"></a>
                      <div class="social-tou"></div>
                     <div class="social-rong">
                        <em class="social-weifu"></em>
                        <span>微信服务</span>
                      </div>
                </div>
              </li>
              <li>
                <div class="shekuang" datatype="5" sort="4" b_i="190,212,30">
                      <a target="_blank" href="">
                        <img width="190" height="212" src="/style/home/img/54.jpg" class="lazy_img"></a>
                      <div class="social-tou"></div>
                      <div class="social-rong">
                        <em class="social-batie"></em>
                        <span>百度贴吧</span>
                      </div>
                </div>
              </li>
              <li>
                <div class="shekuang" datatype="5" sort="5" b_i="190,212,30">
                      <a target="_blank" href="">
                        <img width="190" height="212" src="/style/home/img/55.jpg" class="lazy_img"></a>
                      <div class="social-tou"></div>
                      <div class="social-rong">
                        <em class="social-gaungwei"></em>
                        <span>官方微博</span>
                      </div>
                </div>
              </li>
              <li style="margin-right:0px;">
                <div class="shekuang" datatype="5" sort="6" b_i="190,212,30">
                      <a target="_blank" href="" >
                        <img width="190" height="212" src="/style/home/img/56.jpg" class="lazy_img"></a>
                      <div class="social-tou"></div>
                      <div class="social-rong">
                        <em class="social-xinqu" ></em>
                        <span>兴趣部落</span>
                      </div>
                </div>
              </li>
              <div class="clear"><div>
            </ul>
          </div>
      </div>
     </div>
    </div>
   </div>
 </div>

@include("home.public.footer") 

</body>

</html>

