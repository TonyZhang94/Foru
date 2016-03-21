<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="/foru/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="/foru/Public/css/commonstyle.css" rel="stylesheet" />
		<link href="/foru/Public/css/style.css" rel="stylesheet"/>
		<link rel="stylesheet" href="/foru/Public/css/style_li.css" />
    
		<title>For优 修改密码</title>
	</head>
	<body>
		<div class="public-top-layout" style="background-color: #fff">
	<div class="topbar">
		<div class="user-entry"></div>
		<div class="fr">
			<a class="text-special" href="">手机For优</a>
		</div>
		
		<?php if(empty($_SESSION['username'])): ?><div class="quick-menu">
				欢迎光临<span class="text-special">ForU</span>校园超市，请 <a class="text-special" href="<?php echo U('Login/index');?>">登录</a><a class="text-special" href="<?php echo U('Login/register');?>">注册</a>
				<span> </span>
			</div>
			<?php else: ?> 
			<div class="quick-menu">
				尊敬的 &nbsp; <a href="<?php echo U('Person/personhomepage',array('campusId'=>cookie('campusId')));?>"><?php echo (session('nickname')); ?></a> &nbsp;您好,欢迎来到 For优校园超市<a href="<?php echo U('Index/logout');?>" id="log-out">退出</a> <span class="spliter text-special"></span>
			</div><?php endif; ?> 
	</div>
</div>
        <div id="info"></div>
		<div id="index-header" data-campusId="<?php echo ($campusId); ?>">
			<div class="container header-bottom">
	<div id="header-botton-wrapper">
		<div id="log-wrapper" class="fl">
			<div id="header-logo" class="fl">
				<a href="<?php echo U('/Home/Index/index',array('campusId'=>$campusId));?>"><img src="/foru/Public/img/logo.png" class="fl"></a>
				<span class="text-special fl"><p>For优<br><span class="bold inline-block">为你更好的生活</span></span>
			</div>
			<div id="header-search" class="fl">
			    <?php if($searchHidden == 1): ?><input name="keyword" type="text" placeholder="请输入要查找的商品" value="" list="search-record">
			    <?php else: ?><input name="keyword" type="text" placeholder="请输入要查找的商品" value="<?php echo ($search); ?>" list="search-record"><?php endif; ?>
			

				<datalist id="search-record">
				
				</datalist>
					
				<button id="search">搜索</button>
				<ul>
					<?php if(is_array($hotSearch)): $i = 0; $__LIST__ = $hotSearch;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vi): $mod = ($i % 2 );++$i;?><li>
						    <a href="<?php echo U('/Home/Index/goodslist',array('search'=>$vi['search_tag'],'campusId'=>$campusId,'categoryName'=>$vi['display_name'],'searchHidden'=>1));?>"><?php echo ($vi["display_name"]); ?></a>
					    </li><?php endforeach; endif; else: echo "" ;endif; ?>
					<!-- <li>
						<a href="<?php echo U('/Home/Index/goodslist',array('search'=>'水果','campusId'=>$campusId,'categoryName'=>'新鲜水果','searchHidden'=>1));?>">新鲜水果</a>
					</li>
					<li>
						<a href="<?php echo U('/Home/Index/goodslist',array('search'=>'牛奶','campusId'=>$campusId,'categoryName'=>'新鲜牛奶','searchHidden'=>1));?>">新鲜牛奶</a>
					</li>
					<li>
						<a href="<?php echo U('/Home/Index/goodslist',array('search'=>'面包','campusId'=>$campusId,'categoryName'=>'美味面包','searchHidden'=>1));?>">美味面包</a>
					</li>
					<li>
						<a href="<?php echo U('/Home/Index/goodslist',array('search'=>'休闲','campusId'=>$campusId,'categoryName'=>'休闲零食','searchHidden'=>1));?>">休闲零食</a>
					</li>
					<li>
						<a href="<?php echo U('/Home/Index/goodslist',array('search'=>'饮料','campusId'=>$campusId,'categoryName'=>'可口饮料','searchHidden'=>1));?>">可口饮料</a>
					</li> -->
				</ul>
			</div>

			<div id="shopping-cart" class="drop-down" >
				<div class="drop-down-left">
					<img src="/foru/Public/img/icon/shopping-cart.png" alt="">	
					<a target="_blank" href="<?php echo U('/Home/ShoppingCart/shoppingcart',array('campusId'=>$campusId));?>">购物车 &gt;&gt;</a>
				</div>
				<div class="drop-down-layer ">
				   <?php if(empty($cartGood)): ?><div class="no-goods">
						 	当前校区购物车中还没有商品，赶紧去选购吧！
						</div>
						<div class="index-shopping-cart clearfix none">							<!-- -->
				    		<ul class="clearfix">
				    		   
				    		</ul>
				    		<div class="shopping-cart-bottom">
				    			<span class="block clearfix">
				    				<a href="<?php echo U('/Home/ShoppingCart/shoppingcart',array('campusId'=>$campusId));?>" class="fl">
				    					查看全部<span class="goods-count"><?php echo (count($cartGood)); ?></span>件商品
				    				</a>
				    				<a href="<?php echo U('/Home/ShoppingCart/shoppingcart',array('campusId'=>$campusId));?>" id="go-shopping-cart" class="fr">去购物车结算</a>
				    			</span>
				    		</div>
				    	</div>
				    <?php else: ?>
				    	<div class="no-goods none">
						 	当前校区购物车中还没有商品，赶紧去选购吧！
						</div>
				    	<div class="index-shopping-cart clearfix">							<!-- -->
				    		<ul class="clearfix">
				    		   <?php if(is_array($cartGood)): foreach($cartGood as $key=>$vo): if($key < 5): ?><li id="<?php echo ($vo["order_id"]); ?>">
					    			   	    <div class="smallgood" data-orderId="<?php echo ($vo["order_id"]); ?>">
					    						<img src="<?php echo ($vo["img_url"]); ?>" alt="<?php echo ($vo["name"]); ?>">
					    						<div><?php echo ($vo["name"]); ?></div>
					    						<span class="goods-cost fl">
					    						  <?php if($vo['is_discount'] == 1): ?>￥<?php echo (number_format($vo["discount_price"],1)); ?>×<?php echo ($vo["order_count"]); ?>
                                                  <?php else: ?>￥<?php echo (number_format($vo["price"],1)); ?>×<?php echo ($vo["order_count"]); endif; ?>	
					    						</span>
					    						<span class="fr">
					    							<a data-href="<?php echo U('/Home/ShoppingCart/deleteOrders',array('orderIds'=>$vo['order_id']));?>">删除</a>
					    						</span>
					    					</div>
					    				</li><?php endif; endforeach; endif; ?>
				    		</ul>
				    		<div class="shopping-cart-bottom">
				    			<span class="block clearfix">
				    				<a href="<?php echo U('ShoppingCart/shoppingcart',array('campusId'=>$campusId));?>" class="fl">
				    					查看全部<span class="goods-count"><?php echo (count($cartGood)); ?></span>件商品
				    				</a>
				    				<a href="<?php echo U('ShoppingCart/shoppingcart',array('campusId'=>$campusId));?>" id="go-shopping-cart" class="fr">去购物车结算</a>
				    			</span>
				    		</div>
				    	</div><?php endif; ?>
					
				
				</div>
			</div>
		<!-- 	<div id="qr-code" class="fr" >
				<img src="/foru/Public/img/qrcode.png" alt="二维码">
			</div> -->
		</div>
	</div>
</div>
			<div class="w bground-special">
	<div id="nav-bar" class="wrapper nav-wrapper">
	    <?php if($categoryHidden != 1): ?><div class="fl">
			   商品分类
		    </div><?php endif; ?>
		
		<ul class="nav nav-pills">
			<li>
				<a href="<?php echo U('/Home/Index');?>">首页</a>
			</li>
			<li>
				<a href="<?php echo U('/Home/index/goodslist',array('categoryId'=>$module[4]['category_id'],'campusId'=>$module[4]['campus_id']));?>">小优推荐</a>
			</li>
			<li>
				<a href="<?php echo U('/Home/index/goodslist',array('categoryId'=>$module[5]['category_id'],'campusId'=>$module[5]['campus_id']));?>">最新体验</a>
			</li>
			<li>
				<a href="<?php echo U('/Home/index/goodslist',array('categoryId'=>$module[6]['category_id'],'campusId'=>$module[6]['campus_id']));?>">特惠秒杀</a>
			</li>
			<li>
				<a href="<?php echo U('Person/personhomepage',array('campusId'=>$campusId));?>">个人中心</a>
			</li>

			<?php if($hiddenLocation != 1): if(($campusId == null) OR (cookie('campusId') == undefined)): ?><li>
					  	<?php if(is_array($campusList)): foreach($campusList as $key=>$vo): if($vo["campus_id"] == 1): ?><img src="/foru/Public/img/icon/location.png" alt="">
					   	   		<span id="location" >
					   	   		  	<?php echo ($vo["campus_name"]); ?>
					   	   		</span><?php endif; endforeach; endif; ?>		
					</li>
					<?php else: ?>

					<li>
					   <?php if(is_array($campusList)): foreach($campusList as $key=>$vo): if($vo["campus_id"] == $campusId): ?><img src="/foru/Public/img/icon/location.png" alt="">
					   	   		<span id="location" >
					   	   		  	<?php echo ($vo["campus_name"]); ?>
					   	   		</span><?php endif; endforeach; endif; ?>
					</li><?php endif; ?>

				<?php else: ?><li></li><?php endif; ?>
		</ul>
	</div>
</div>

			<div id="nav-breadcrumb" class="wrapper">
				<ul class="breadcrumb">
					<li><a href="<?php echo U('Index/index',array('campusId'=>$campusId));?>">首页</a></li>
					<li><a href="<?php echo U('Person/personhomepage',array('campusId'=>$campusId));?>">我的For优</a></li>
					<li class="active"><a href="/foru/index.php/Home/Person/resetpword.html">账户安全</a></li>
				</ul>
			</div>
		</div>
		<div class="wrapper clearfix" >
			<div id="person-nav-side">
				<ul>
				<span>我的订单</span>
					<li><a href="<?php echo U('Person/orderManage',array('campusId'=>$campusId,'status'=>0));?>">全部</a></li>
					<li><a href="<?php echo U('Person/orderManage',array('campusId'=>$campusId,'status'=>1));?>">待付款</a></li>
					<li><a href="<?php echo U('Person/orderManage',array('campusId'=>$campusId,'status'=>2));?>">待确认</a></li>
					<li><a href="<?php echo U('Person/orderManage',array('campusId'=>$campusId,'status'=>3));?>">配送中</a></li>
					<li><a href="<?php echo U('Person/orderManage',array('campusId'=>$campusId,'status'=>4));?>">待评价</a></li>
					<li><a href="<?php echo U('Person/orderManage',array('campusId'=>$campusId,'status'=>5));?>">已完成</a></li>
				</ul>
				<ul>
					<span>资料管理</span>
					<li><a href="<?php echo U('Person/personInfo',array('campusId'=>$campusId));?>">个人信息</a></li>
					<li><a href="<?php echo U('Person/locaManage',array('campusId'=>$campusId));?>">地址管理</a></li>
					<li class="active"><a href="<?php echo U('Person/resetpword',array('campusId'=>$campusId));?>">账户安全</a></li>
				</ul>
				<ul>
					<span>服务中心</span>
					<li><a>联系客服</a></li>
					<li><a>关于我们</a></li>
					<li><a>意见反馈</a></li>
				</ul>
			</div>
				
			<div id="person-info-body">
				<div class="person-info-body-header">
					<span class="spliter bground-special"></span>
					<h4>重置密码</h4>
				</div>
				
				
					<div class="person-info-body-progress">
						<dl class="active" id="dl-1">
							<dt class="text">1</dt>
							<dt class="round"></dt>
							<dd class="phone">填写注册邮箱</dd>
						</dl>
						<dl  id="dl-2">
							<dt class="text">2</dt>
							<dt class="round"></dt>
							<dd class="self">验证身份</dd>
						</dl>
						<dl id="dl-3">
							<dt class="text">3</dt>
							<dt class="round"></dt>
							<dd class="password">设置新密码</dd>
						</dl>
						<dl id="dl-4">
							<dt class="text">4</dt>
							<dt class="round"></dt>
							<dd class="finish">完成</dd>
						</dl>
					</div>
				
				<div class="person-info-body-main">
					<div class="person-info-body-page1">
						<div class="person-info-body">
							<!--1-->
							<span class="glyphicon glyphicon-envelope text-special span-inline-block person-info-body-page-margin"></span>
							<span class="person-info-body-page-text span-inline-block person-info-body-page-margin" >邮&nbsp;&nbsp;箱:</span>
							<input type="text" class="person-info-body-page-input span-inline-block person-info-body-page-margin" name="phone" form="person-info-body-form-1" id="person-info-body-form-phone"/>
							<span class="span-inline-block person-info-body-page-text person-info-body-page-margin" id="form-1-span-1">请输入注册时使用的邮箱</span>
							<p><br /></p>
							<!--2-->
							<div class="person-info-body-page-eletop">
								<span class="glyphicon glyphicon-th-large text-special span-inline-block person-info-body-page-margin"></span>
								<span class="person-info-body-page-text span-inline-block person-info-body-page-margin">验证码:</span>
								<input type="text" class="person-info-body-page-input span-inline-block person-info-body-page-margin" name="verification" form="person-info-body-form-1" id="check-image-input"/>
								<!--<span class="span-inline-block person-info-body-page1-imgverification bground-special .person-info-body-page-margin" style="margin-left:14px"></span>-->
								<span class="span-inline-block person-info-body-page-text person-info-body-page-margin"><img src=" /foru/index.php/Home/Person/verify/id/'+Math.random()" onclick="this.src='/foru/index.php/Home/Person/verify/id/'+Math.random()" id="check-image"/></span>
							
							</div>
						</div>
						<!--3-->
						<form action="<?php echo U('/Home/Person/phone');?>" class="person-info-body-page-eletop margin-form" method="get" id="person-info-body-form-1">
							<input type="button" value="提交" class="bground-special text-white person-info-body-page-input person-info-body-page-submit" id="body-form-1-button"/>
							<input type="submit" style="display: none;" id="body-form-1-submit"/>
						</form>
					</div>
					
					
					<div class="person-info-body-page2  none">
						<div class="person-info-body person-info-body-2">
							<!--1-->
							<span class="glyphicon glyphicon-comment text-special span-inline-block person-info-body-page-margin"></span>
							<span class="person-info-body-page-text span-inline-block person-info-body-page-margin">邮箱验证:</span>
							<input type="text" placeholder="请输入收到的邮箱验证码" class="person-info-body-page-input span-inline-block person-info-body-page-margin" name="mailcode" form="person-info-body-form-2" id="person-info-body-form-message"/>
							<!-- <span class="span-inline-block person-info-body-page-text person-info-body-page-margin">请输入收到的邮箱验证码</span> -->
							<button id="resent-secword" class="bground-special">重新发送验证码</button>
							<p><br /></p>
						</div>
						<!--3-->
						<form action="#" class="person-info-body-page-eletop margin-form" method="get" id="person-info-body-form-2">
							<input type="button" value="提交" class="bground-special text-white person-info-body-page-input person-info-body-page-submit" id="body-form-2-button"/>
						</form>
					</div>
					
					<div class="person-info-body-page3 none">
						<div class="person-info-body person-info-body-3">
							<!--1-->
							<span class="glyphicon glyphicon-lock text-special span-inline-block person-info-body-page-margin"></span>
							<span class="person-info-body-page-text span-inline-block person-info-body-page-margin">输入新密码:</span>
							<input type="password" class="person-info-body-page-input span-inline-block person-info-body-page-margin" name="phone" form="person-info-body-form-3" id="person-info-body-form-paword-1"/>
							<span class="span-inline-block person-info-body-page-text person-info-body-page-margin person-info-body-page-text-long">8-20位字符，建议由数字，字母和符号两种以上的组合</span>
							<p><br /></p>
							<!--2-->
							<div class="person-info-body-page-eletop">
								<span class="glyphicon glyphicon-lock text-special span-inline-block person-info-body-page-margin"></span>
								<span class="person-info-body-page-text span-inline-block person-info-body-page-margin">确认新密码:</span>
								<input type="password" class="person-info-body-page-input span-inline-block person-info-body-page-margin" name="verification" form="person-info-body-form-3" id="person-info-body-form-paword-2"/>
								<span class="span-inline-block person-info-body-page-text person-info-body-page-margin">再次输入新密码</span>
							
							</div>
						</div>
						<!--3-->
						<form action="#" class="person-info-body-page-eletop margin-form" method="get" id="person-info-body-form-3">
							<input type="button" value="提交" class="bground-special text-white person-info-body-page-input person-info-body-page-submit" id="body-form-3-button"/>
						</form>
					</div>
					
					
					<div class="person-info-body-page4 none">
						<span class="person-info-body-page4-container">&nbsp;<span class="glyphicon glyphicon-ok" style="color:white"></span></span>
						<span class="person-info-body-page4-text">恭喜你，重置密码成功！</span>
					</div>
				
				</div>
			</div>			
		</div>

		<footer>
	<div id="foot-part1" class="clearfix wrapper">
		<ul>
			<li>
				<dl>
					<dd><img src="/foru/Public/img/footer/footer1.png" alt=""></dd>
					<dt>
						<div>正品保障</div>
						<div>全场正品，行货保障</div>
					</dt>
				</dl>
			</li>
			<li>
				<dl>
					<dd><img src="/foru/Public/img/footer/footer2.png" alt=""></dd>
					<dt>
						<div>新手指南</div>
						<div>快速登录，无需注册</div>
					</dt>
				</dl>
			</li>
			<li>
				<dl>
					<dd><img src="/foru/Public/img/footer/footer3.png" alt=""></dd>
					<dt>
						<div>货到付款</div>
						<div>货到付款，安心便捷</div>
					</dt>
				
				</dl>
			</li>
			<li>
				<dl>
					<dd><img src="/foru/Public/img/footer/footer4.png" alt=""></dd>
					<dt>
						<div>维修保障</div>
						<div>服务保证，全国联保</div>
					</dt>
				</dl>
			</li>
			<li>
				<dl>
					<dd><img src="/foru/Public/img/footer/footer5.png" alt=""></dd>
					<dt>
						<div>无忧退货</div>
						<div>无忧退货，7日尊享</div>
					</dt>
				</dl>
			</li>
			<li>
				<dl>
					<dd><img src="/foru/Public/img/footer/footer6.png" alt=""></dd>
					<dt>
						<div>会员权益</div>
						<div>会员升级，尊贵特权</div>
					</dt>
				</dl>
			</li>
		</ul>
	</div>
	<div id="foot-part2" class="clearfix wrapper">
		<ul>
			<li>
				<dl>
					<dd>常用服务</dd>
					<dt>
						<ul>
							<li><a>问题咨询</a></li>
							<li><a>催办订单</a></li>
							<li><a>报修退换货</a></li>
							<li><a>上门安装</a></li>
						</ul>
					</dt>
				</dl>
			</li>
			<li>
				<dl>
					<dd>购物</dd>
					<dt>
						<ul>
							<li><a>怎样购物</a></li>
							<li><a>积分优惠券介绍</a></li>
							<li><a>订单状态说明</a></li>
							<li><a>易迅礼品卡介绍</a></li>
						</ul>
					</dt>
				</dl>
			</li>
			<li>
				<dl>
					<dd>付款</dd>
					<dt>
						<ul>
							<li><a>货到付款</a></li>
							<li><a>在线支付</a></li>
							<li><a>其他支付方式</a></li>
							<li><a>发票说明</a></li>
						</ul>
					</dt>
				</dl>
			</li>
			<li>
				<dl>
					<dd>配送</dd>
					<dt>
						<ul>
							<li><a>配送服务说明</a></li>
							<li><a>价格保护</a></li>
						</ul>
					</dt>
				</dl>
			</li>
			<li>
				<dl>
					<dd>售后</dd>
					<dt>
						<ul>
							<li><a>售后服务政策</a></li>
							<li><a>退换货服务流程</a></li>
							<li><a>优质售后服务</a></li>
							<li><a>特色服务指南</a></li>
							<li><a>服务时效承诺</a></li>
						</ul>
					</dt>
				</dl>
			</li>
			<li>
				<dl>
					<dd>商家合作</dd>
					<dt>
						<ul>
							<li><a>企业采购</a></li>
						</ul>
					</dt>
				</dl>
			</li>
		</ul>
	</div>
	<!-- <div id="foot-part3" class="clearfix wrapper">
		<div></div>
		<div></div>
		<div></div>
		<div></div>
	</div> -->
	<div id="foot-part4" class="clearfix text-light">
		<span>©2015苏州英爵伟信息科技服务有限公司</span>
		<a href="http://www.miitbeian.gov.cn">京ICP证030173号</a>
	</div>
</footer>
		<div id="campus-background">
	<div id="campus">
		<div id="campus-close">
			×
		</div>
		<div id="campus-head">
			<span>请选择学校</span>
			<input type="text" id="campus-search" placeholder="请输入学校的名字"/>
		</div>
		<div id="campus-main">
			<div id="campus-item">
				<ul id="campus-location">
					<?php if(is_array($cities)): foreach($cities as $key=>$city): if(empty($_COOKIE['cityId'])): $_COOKIE['cityId'] = '1'; endif; ?>				
						<?php if(cookie('cityId') == $city['city_id']): ?><li data-city="<?php echo ($city["city_id"]); ?>" class="active"><?php echo ($city["city_name"]); ?></li>
							
							<?php else: ?><li data-city="<?php echo ($city["city_id"]); ?>"><?php echo ($city["city_name"]); ?></li><?php endif; endforeach; endif; ?>
				</ul>
			</div>

			<div id="campus-content">
				<ul>
					
				</ul>
			</div>
		</div>
	</div>
</div>

        <script type="text/javascript" src="/foru/Public/script/plugins/jquery-1.11.2.js"></script>
		<script type="text/javascript" src="/foru/Public/script/plugins/jquery.cookie.js"></script>
		<script type="text/javascript">
              var checkpwordUrl="<?php echo U('/Home/Person/Phone');?>";
              var changepwordUrl="<?php echo U('/Home/Person/changePWord');?>";
              var checkMailPostUrl="<?php echo U('/Home/Person/checkMailPost');?>";
              var $campusId=$("#index-header").attr("data-campusId");
	    </script>
		<script src="/foru/Public/script/resetpword.js" type="text/javascript" charset="utf-8"></script>
		<script src="/foru/Public/script/common.js" type="text/javascript" charset="utf-8"></script>
	</body>
	</body>
</html>