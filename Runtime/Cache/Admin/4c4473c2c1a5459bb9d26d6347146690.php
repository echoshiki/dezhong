<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo ($meta_title); ?>|德众进销存管理系统</title>
    <link href="/Public/favicon.ico" type="image/x-icon" rel="shortcut icon">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/base.css" media="all">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/common.css" media="all">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/module.css">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/style.css" media="all">
	<link rel="stylesheet" type="text/css" href="/Public/Admin/css/<?php echo (C("COLOR_STYLE")); ?>.css" media="all">

   <!--  <link rel="stylesheet" type="text/css" href="/Public/static/bootstrap/css/bootstrap.min.css" media="all"> -->

     <!--[if lt IE 9]>
    <script type="text/javascript" src="/Public/static/jquery-1.10.2.min.js"></script>
    <![endif]--><!--[if gte IE 9]><!-->
    <script type="text/javascript" src="/Public/static/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.mousewheel.js"></script>
    <!--<![endif]-->
    
</head>
<body>
    <!-- 头部 -->
    <div class="header">
        <!-- Logo -->
        <span class="logo"></span>
        <!-- /Logo -->

        <!-- 主导航 -->
        <ul class="main-nav">
            <?php if(is_array($__MENU__["main"])): $i = 0; $__LIST__ = $__MENU__["main"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i; if( $menu['title'] == "商品" && session('user_auth.group_id') == C('JOIN_GROUP') ) { ?>
                        <li class="<?php echo ((isset($menu["class"]) && ($menu["class"] !== ""))?($menu["class"]):''); ?>"><a href="<?php echo (u($menu["url"])); ?>">采购</a></li>
                <?php } elseif( $menu['title'] == "销售" && session('user_auth.group_id') == C('JOIN_GROUP') ) { ?>
                        <li class="<?php echo ((isset($menu["class"]) && ($menu["class"] !== ""))?($menu["class"]):''); ?>"><a href="<?php echo (u($menu["url"])); ?>">单据</a></li>
                <?php } else { ?>
                        <li class="<?php echo ((isset($menu["class"]) && ($menu["class"] !== ""))?($menu["class"]):''); ?>"><a href="<?php echo (u($menu["url"])); ?>"><?php echo ($menu["title"]); ?></a></li>
                <?php } endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <!-- /主导航 -->

        <!-- 用户栏 -->
        <div class="user-bar">
            <a href="javascript:;" class="user-entrance"><i class="icon-user"></i></a>
            <ul class="nav-list user-menu hidden">
                <li class="manager">你好，<em title="<?php echo session('user_auth.username');?>"><?php echo session('user_auth.username');?></em></li>
                <li><a href="<?php echo U('User/updatePassword');?>">修改密码</a></li>
                <li><a href="<?php echo U('User/updateNickname');?>">修改昵称</a></li>
                <li><a href="<?php echo U('Public/logout');?>">退出</a></li>
            </ul>
        </div>
    </div>
    <!-- /头部 -->

    <!-- 边栏 -->
    <div class="sidebar">
        <!-- 子导航 -->
        
            <div id="subnav" class="subnav">
                <?php if(!empty($_extra_menu)): ?>
                    <?php echo extra_menu($_extra_menu,$__MENU__); endif; ?>
                <?php if(is_array($__MENU__["child"])): $i = 0; $__LIST__ = $__MENU__["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub_menu): $mod = ($i % 2 );++$i;?><!-- 子导航 -->
                    <?php if(!empty($sub_menu)): if(!empty($key)): ?><h3><i class="icon icon-unfold"></i><?php echo ($key); ?></h3><?php endif; ?>
                        <ul class="side-sub-menu">
                            <?php if(is_array($sub_menu)): $i = 0; $__LIST__ = $sub_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li>
                                <?php if($menu['title'] == "订单一览" && session('user_auth.group_id') == C('JOIN_GROUP')) { ?>
                                        <a class="item" href="<?php echo (u($menu["url"])); ?>">采购订单</a>
                                <?php } elseif($menu['title'] == "出库一览" && session('user_auth.group_id') == C('JOIN_GROUP')) { ?>
                                        <a class="item" href="<?php echo (u($menu["url"])); ?>">销售订单</a>
                                <?php } else { ?>
                                        <a class="item" href="<?php echo (u($menu["url"])); ?>"><?php echo ($menu["title"]); ?></a>
                                <?php } ?>
                                </li>

                                <?php if($menu['title'] == "商品目录" && session('user_auth.group_id') == C('JOIN_GROUP')) { ?>
                                    <li><a class="item" href="/index.php?s=/Admin/Psi/order.html">采购订单</a></li>
                                <?php } endforeach; endif; else: echo "" ;endif; ?>
                        </ul><?php endif; ?>
                    <!-- /子导航 --><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        
        <!-- /子导航 -->
    </div>
    <!-- /边栏 -->

    <!-- 内容区 -->
    <div id="main-content">
        <div id="top-alert" class="fixed alert alert-error" style="display: none;">
            <button class="close fixed" style="margin-top: 4px;">&times;</button>
            <div class="alert-content">这是内容</div>
        </div>
        <div id="main" class="main">
            
            <!-- nav -->
            <?php if(!empty($_show_nav)): ?><div class="breadcrumb">
                <span>您的位置:</span>
                <?php $i = '1'; ?>
                <?php if(is_array($_nav)): foreach($_nav as $k=>$v): if($i == count($_nav)): ?><span><?php echo ($v); ?></span>
                    <?php else: ?>
                    <span><a href="<?php echo ($k); ?>"><?php echo ($v); ?></a>&gt;</span><?php endif; ?>
                    <?php $i = $i+1; endforeach; endif; ?>
            </div><?php endif; ?>
            <!-- nav -->
            

            
<style>
	.columns-mod { width:460px; }
	.columns-mod th { width:auto; }
	.sys-info th, .sys-info td { padding:6px 0; line-height:18px; height:18px;}
	.fb .fl { margin-left:30px; }

</style>

	<!-- 标题栏 -->
	<div class="main-title"> <h2>出库2单详情</h2></div>
	<div class="cf">
		<div class="fl">
			<a class="btn" href="<?php echo U('Psi/out_info');?>&id=<?php echo I('get.id');?>&print=1" target="_blank" >打印单据</a>
			<span style="font-weight:bold;">出库单编号：</span>
            <?php echo ($_list["no"]); ?>&nbsp;&nbsp;&nbsp;
            <span style="font-weight:bold;">订购单编号：</span>
			<?php echo ($_list["from_no"]); ?>&nbsp;&nbsp;&nbsp;
        </div>
        <div class="fr">
            <span style="font-weight:bold;">出货日期：</span>
            <?php echo (date('Y-m-d H:i',$_list["date"])); ?>&nbsp;&nbsp;&nbsp;
            <span style="font-weight:bold;">操作时间：</span>
            <?php echo (date('Y-m-d H:i',$_list["time"])); ?>&nbsp;&nbsp;&nbsp;
            <span style="font-weight:bold;">操作员：</span>
            <?php echo (get_username($_list["user"])); ?>&nbsp;&nbsp;&nbsp;
        </div>
    </div>
	    <!-- 数据列表 -->
    <div class="data-table table-striped">
		<table class="">
	    <thead>
	        <tr>
	        	<th class="row-selected row-selected"><input class="check-all" type="checkbox"/></th>
				<th class="">Id</th>
				<th class="">产品编码</th>
				<th class="">产品名称</th>
				<th class="">OE号</th>
				<th class="">箱号</th>
				<th class="">适用车型</th>
				<th class="">单位</th>
				<th class="">销售价</th>
				<th class="">销售价(非税)</th>
				<th class="">本期出库数</th>
			</tr>
	    </thead>
	    <tbody>
			<?php if(!empty($_list)): if(is_array($_list["info"])): $i = 0; $__LIST__ = $_list["info"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(!empty($vo["code"])): ?><tr>
					<td><input class="ids" type="checkbox" name="id[]" value="<?php echo ($vo["id"]); ?>" /></td>
					<td><?php echo ($vo["id"]); ?></td>
		            <td><a href="<?php echo U('Psi/stock_info');?>&id=<?php echo ($vo["id"]); ?>"><?php echo ($vo["code"]); ?></a></td>
		            <td><?php echo ($vo["name"]); ?></td>
					<td><?php echo ($vo["OE"]); ?></td>
					<td><?php echo ($vo["box_no"]); ?></td>
					<td><?php echo ($vo["standard"]); ?></td>
					<td><?php echo ($vo["unit"]); ?></td>
					<td><?php echo ($vo["sale_price"]); ?></td>
					<td><?php echo ($vo["sale_price_off"]); ?></td>
					<td><?php echo ($vo["num"]); ?></td>
				</tr><?php endif; ?>
				<?php $sum += $vo['num']; endforeach; endif; else: echo "" ;endif; ?>
			<tr>
				<td colspan="8" style="text-align:center; font-weight:bold;"> 合  计 </td>
				<td> —— </td>
				<td> —— </td>
				<td><?php echo ($sum); ?></td>
			</tr>
			<tr>
				<td colspan="3" style="text-align:center; font-weight:bold;"> 单据备注 </td>
				<td colspan="8"><?php echo ($_list["note"]); if(empty($_list["note"])): ?>暂无<?php endif; ?></td>
			</tr>
			<?php else: ?>
			<td colspan="9" class="text-center"> aOh! 暂时还没有内容! </td><?php endif; ?>
		</tbody>
	    </table>
		</div>
	    <div class="page">
	        <?php echo ($_page); ?>
	    </div>
		<div class="data-table table-striped" style="width:500px;">
			<table class="">
			    <thead>
			        <tr>
			        	<th>Id</th>
						<th width="">包装品名称</th>
						<th width="">成本价格</th>
						<th width="">库存量</th>
						<th width="">出货数</th>
					</tr>
			    </thead>
			    <tbody>
					<?php if(is_array($_list["exinfo"])): $i = 0; $__LIST__ = $_list["exinfo"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
							<td><?php echo ($vo["id"]); ?></td>
				            <td><?php echo ($vo["name"]); ?></td>
				            <td><?php echo ($vo["price"]); ?></td>
							<td><?php echo ($vo["num"]); ?></td>
							<td><?php echo ($vo["num_in"]); ?></td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					<tr>
						<td colspan="5" style="color:red">其他固定包装品各出库：<?php echo ($sum); ?></td>
					</tr>
				</tbody>
		    </table>
		</div>
	    <div class="fl" style="float:right !important;">
	    	<span style="font-weight:bold">业务员：</span>
			<?php echo ($_list["info1"]); ?>&nbsp;&nbsp;&nbsp;
			<span style="font-weight:bold">开票：</span>
			<?php echo ($_list["info2"]); ?>&nbsp;&nbsp;&nbsp;
			<span style="font-weight:bold">主管：</span>
			<?php echo ($_list["info3"]); ?>&nbsp;&nbsp;&nbsp;
			<span style="font-weight:bold">会计：</span>
			<?php echo ($_list["info4"]); ?>&nbsp;&nbsp;&nbsp;
			<span style="font-weight:bold">审核：</span>
			<?php echo ($_list["info5"]); ?>&nbsp;&nbsp;&nbsp;
	    	<span style="font-weight:bold">仓库：</span>
			<?php echo ($_list["info6"]); ?>&nbsp;&nbsp;&nbsp;
			<span style="font-weight:bold">物流：</span>
			<?php echo ($_list["info7"]); ?>&nbsp;&nbsp;&nbsp;
	    </div>    

        </div>
        <div class="cont-ft">
            <div class="copyright">
                <div class="fl">感谢使用德众进销存管理系统</div>
                <div class="fr">V1.0 Beta</div>
            </div>
        </div>
    </div>
    <!-- /内容区 -->
    <script type="text/javascript">
    (function(){
        var ThinkPHP = window.Think = {
            "ROOT"   : "", //当前网站地址
            "APP"    : "/index.php?s=", //当前项目地址
            "PUBLIC" : "/Public", //项目公共目录地址
            "DEEP"   : "<?php echo C('URL_PATHINFO_DEPR');?>", //PATHINFO分割符
            "MODEL"  : ["<?php echo C('URL_MODEL');?>", "<?php echo C('URL_CASE_INSENSITIVE');?>", "<?php echo C('URL_HTML_SUFFIX');?>"],
            "VAR"    : ["<?php echo C('VAR_MODULE');?>", "<?php echo C('VAR_CONTROLLER');?>", "<?php echo C('VAR_ACTION');?>"]
        }
    })();
    </script>
    <script type="text/javascript" src="/Public/static/think.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/common.js"></script>
    <script type="text/javascript">
        +function(){
            var $window = $(window), $subnav = $("#subnav"), url;
            $window.resize(function(){
                $("#main").css("min-height", $window.height() - 130);
            }).resize();

            /* 左边菜单高亮 */
            url = window.location.pathname + window.location.search;
            url = url.replace(/(\/(p)\/\d+)|(&p=\d+)|(\/(id)\/\d+)|(&id=\d+)|(\/(group)\/\d+)|(&group=\d+)/, "");
            $subnav.find("a[href='" + url + "']").parent().addClass("current");

            /* 左边菜单显示收起 */
            $("#subnav").on("click", "h3", function(){
                var $this = $(this);
                $this.find(".icon").toggleClass("icon-fold");
                $this.next().slideToggle("fast").siblings(".side-sub-menu:visible").
                      prev("h3").find("i").addClass("icon-fold").end().end().hide();
            });

            $("#subnav h3 a").click(function(e){e.stopPropagation()});

            /* 头部管理员菜单 */
            $(".user-bar").mouseenter(function(){
                var userMenu = $(this).children(".user-menu ");
                userMenu.removeClass("hidden");
                clearTimeout(userMenu.data("timeout"));
            }).mouseleave(function(){
                var userMenu = $(this).children(".user-menu");
                userMenu.data("timeout") && clearTimeout(userMenu.data("timeout"));
                userMenu.data("timeout", setTimeout(function(){userMenu.addClass("hidden")}, 100));
            });

	        /* 表单获取焦点变色 */
	        $("form").on("focus", "input", function(){
		        $(this).addClass('focus');
	        }).on("blur","input",function(){
				        $(this).removeClass('focus');
			        });
		    $("form").on("focus", "textarea", function(){
			    $(this).closest('label').addClass('focus');
		    }).on("blur","textarea",function(){
			    $(this).closest('label').removeClass('focus');
		    });

            // 导航栏超出窗口高度后的模拟滚动条
            var sHeight = $(".sidebar").height();
            var subHeight  = $(".subnav").height();
            var diff = subHeight - sHeight; //250
            var sub = $(".subnav");
            if(diff > 0){
                $(window).mousewheel(function(event, delta){
                    if(delta>0){
                        if(parseInt(sub.css('marginTop'))>-10){
                            sub.css('marginTop','0px');
                        }else{
                            sub.css('marginTop','+='+10);
                        }
                    }else{
                        if(parseInt(sub.css('marginTop'))<'-'+(diff-10)){
                            sub.css('marginTop','-'+(diff-10));
                        }else{
                            sub.css('marginTop','-='+10);
                        }
                    }
                });
            }
        }();
    </script>
    
	<script type="text/javascript">
	    //导航高亮
	    highlight_subnav('<?php echo U('Psi/out_list');?>');
	</script>

</body>
</html>