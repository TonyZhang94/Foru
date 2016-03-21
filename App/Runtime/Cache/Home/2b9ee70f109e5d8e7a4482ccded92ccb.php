<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="/foru/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="/foru/Public/css/commonstyle.css" rel="stylesheet" />
		<link href="/foru/Public/css/style.css" rel="stylesheet"/>
	
		<title>For优 商品信息</title>
		<style>
			body{
				background-color: #fff;
			}
		</style>
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
				<!-- <ul class="breadcrumb">
					<li><a href="<?php echo U('Index/index');?>">首页</a></li>
					<li><a href="#">小优推荐</a></li>
					<li class="active"><a href="#">有机草莓</a></li>
				</ul> -->
			</div>
		</div>

		<div class="wrapper">
			<div class="goods-info-index w clearfix">
				<div class="goods-info-img fl">
					<dl>
						<dt>
							<img src="<?php echo ($good['img'][0]); ?>" alt="">
						</dt>
						<dd>
							<span class="pointer left-pointer">&lt;</span>

							<div id="good-info-slide">
								<ul class="clearfix">	
								    <?php if(is_array($good['img'])): foreach($good['img'] as $key=>$img): ?><li><img src="<?php echo ($img); ?>" alt=""></li><?php endforeach; endif; ?>
								</ul>		
							</div>
							<span class="pointer right-pointer">&gt;</span>
							<input type="" value="0" class="none">
						</dd>
					</dl>
				</div>
				<div class="goods-info-detailed fl">
					<div class="img-and-detailed-head">
						<h1><?php echo ($good["name"]); ?></h1>
						
						<p><?php echo ($good["message"]); ?></p>
					</div>
					<div class="img-and-detailed-body">
						<dl class="clearfix">
							<dt>价格:</dt>
							<dd>
							  <?php if($good["is_discount"] == 1): ?><span class="discount-price">￥<?php echo ($good["discount_price"]); ?></span>
								<span class="bef-price">原价:￥<?php echo ($good["price"]); ?></span>
								<?php else: ?><span class="discount-price">￥<?php echo ($good["price"]); ?></span><?php endif; ?>
							</dd>
						</dl>
						<dl  class="clearfix">
							<dt>评价:</dt>
							<dd>
							    <?php $__FOR_START_5132__=1;$__FOR_END_5132__=6;for($i=$__FOR_START_5132__;$i < $__FOR_END_5132__;$i+=1){ if($good['grade']>=$i) echo '<span class="glyphicon glyphicon-star eval-star eval-star-positive"></span>'; else echo '<span class="glyphicon glyphicon-star eval-star"></span>'; } ?>						
								<span><?php echo ($good["grade"]); ?></span>
							</dd>
						</dl>
						<dl  class="clearfix">
							<dt>配送至:</dt>
							<dd>
								<p><?php echo ($campus["campus_name"]); ?></p>
							</dd>
						</dl>
						<dl  class="clearfix">
							<dt>数量:</dt>
							<dd>
								<td>
									<a class="sub-goods">-</a>
									<input id="goods-count" class="goods-count" type="text" value="1" disabled="true">
									<a class="add-goods">+</a>
								</td>
							</dd>
						</dl>
						<div>
							<button class="buy-now">立即购买</button>
							<button class="put-cart">加入购物车</button>
						</div>
					</div>
				</div>
				<input type="text" id="campusId-none" class="none" value="<?php echo ($campus["campus_id"]); ?>">
				<input type="text" id="foodId-none" class="none" value="<?php echo ($good["food_id"]); ?>">
			</div>
			<div class="img-and-evaluate w">
				<div class="img-and-evaluate-head">
					<ul class="clearfix">
						<!-- <li><a>图文详情</a></li> -->
						<li class="active"><a>商品评价</a></li>
					</ul>
				</div>
				<div id="evaluate-body">
					<table>
						<colgroup>
							<col width="100">
							<col width="1000">
						</colgroup>
						<thead>
							<tr>
								<th>
									<span class="eval-scores"><?php echo ($good["grade"]); ?></span>
									<span>分</span>
								</th>
								<th>
									 <?php $__FOR_START_24917__=1;$__FOR_END_24917__=6;for($i=$__FOR_START_24917__;$i < $__FOR_END_24917__;$i+=1){ if($good['grade']>=$i) echo '<span class="glyphicon glyphicon-star eval-star eval-star-positive"></span>'; else echo '<span class="glyphicon glyphicon-star eval-star"></span>'; } ?>	
								</th>
							</tr>
						</thead>
						<tbody>			
						    <?php if(is_array($comments)): foreach($comments as $key=>$com): ?><tr class="eval-info-detailed">
								<td>
									<img src="<?php echo ((isset($com["img_url"]) && ($com["img_url"] !== ""))?($com["img_url"]):'/foru/Public/img/user-img.png'); ?>" alt="">
								</td>
								<td>
									<div class="eval-info-detailed-score">
										<?php $__FOR_START_4927__=1;$__FOR_END_4927__=6;for($i=$__FOR_START_4927__;$i < $__FOR_END_4927__;$i+=1){ if($good['grade']>=$i) echo '<span class="glyphicon glyphicon-star eval-star eval-star-positive"></span>'; else echo '<span class="glyphicon glyphicon-star eval-star"></span>'; } ?>
										<span><?php echo ($com["grade"]); ?>分</span>
									</div>
									<div class="eval-info-detailed-mark">
										<?php echo ($com["comment"]); ?>
									</div>
								</td>	
							</tr><?php endforeach; endif; ?>			
						</tbody>
					</table>
					
					<div>
						
					</div>
				</div>
				
				<div id="goods-img-detailed" class="none w">
				    <?php if(is_array($good['img'])): foreach($good['img'] as $key=>$img): ?><img src="<?php echo ($img); ?>" alt=""><?php endforeach; endif; ?>				
				</div>
			</div>
			<div class="msg-page">
		    	 <div class="page"><?php echo ($page); ?></div>
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

		<script type="text/javascript" src="/foru/Public/script/plugins/jquery-1.11.2.js"></script>
		<script type="text/javascript" src="/foru/Public/script/plugins/fly.js"></script>
		<script type="text/javascript" src="/foru/Public/script/plugins/jquery.cookie.js"></script>
		<script type="text/javascript">
               var $campusId=$("#index-header").attr('data-campusId');
		</script>
		<script src="/foru/Public/script/goodsinfo.js"></script>
		<script type="text/javascript" src="/foru/Public/script/common.js"></script>
	</body>
</html>