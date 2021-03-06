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
            

            
	<!-- 新加样式 -->
	<style>
		.help p { font-size:16px; font-weight:bold; line-height:32px; }
		.help ul { margin-bottom: 10px; }
		.help li { list-style-type:circle; margin-left:30px;}
		
	</style>

	<!-- 标题栏 -->
	<div class="main-title">
		<h2>功能概要</h2>
	</div>
	<div class="help">
		<div>
			<p>2015.11 更新内容 <span style="color:red;">new!</span></p>
			<ul>
				<li>订单页面重新布局，增添库存项、金额合计项、可打印</li>
				<li>订单模块增添“客户确认”步骤，并且订单可编辑，系统管理员也可自行帮助客户确认</li>
				<li>出库单详情增添金额合计项</li>
				<li>因排序需求，库存、商品模型进行重写，实现交叉排序</li>		
				<li>出库一览页面增添客户查询</li>
				<li>采购申请页面现在也能查看库存报警产品</li>
				<li>采购申请添加实际库存，合同单内的价格改成进货价格</li>
				<li>价格统一为默认不含税</li>
				<li>合同单列表现在能excel导出了</li>
				<li>合同单状态可以筛选查询</li>
				<li>入库一览可以用供应商进行筛选查询，以及相关字段排序</li>
				<li>库存排序新添分类、入库时间。重写模型，交叉排序，默认为以分类+产品名称的排序方式</li>
				<li>库存自由退货功能新加金额合计项</li>
				<li>分析模块各小标题修改</li>
				<li>新开发以产品单品为中心的销售数据分析表单，并添有各项功能</li>
				<li>新开发以加盟商客户为中心的销售数据分析表单，并添有各项功能</li>
				<li>新开发客户页面的出库功能模块，包括自行出库以及出库单一览</li>
				<li>新开发扫描枪直扫商品计数检验功能</li>
			</ul>
		</div>
		<div>
			<p>2015.10 更新内容</p>
			<ul>
				<li>更改打印页面样式，增加logo、抬头等</li>
				<li>增添仓库归属筛选项</li>
				<li>更改优化抬头顺序</li>
				<li>给各项提及的列表添加了部分字段的<b>排序</b>功能，点击标题栏进行排序</li>		
				<li>添加默认填表项，请在 系统-网站设置-预先配置配置 里进行填写预设</li>
				<li>优化财务明细，添加财务列表里详情查看子菜单。财务分类在添加明细的时候以选择供应商来进行分类</li>
				<li>优化订单单号，以年-月-顺序的公式进行自动生成</li>
				<li>调整订单列表，增添显示单价，金额，客户名称</li>
				<li>订单详情中的产品信息，调整以表格形式展现</li>
				<li>优化加盟商产品目录，去掉供应商、进价、包装物等信息</li>
				<li>加盟商产品目录加入筛选排序功能</li>
				<li>产品目录产品新添加属性，可标记产品为“促销产品”“新上产品”等标签，并且在列表可以筛选</li>
				<li>优化订单生成页面，添加订购人默认信息，并加入价格合计，去除字数限制</li>
				<li>完成数据分析模块里的分析一：全库存销售年间月统计，可按年份、分类以及供应商进行筛选</li>
				<li>完成数据分析模块里的分析二：全库存销售排行TOP10，可按年月、分类以及供应商进行筛选</li>
				<li>完成数据分析模块里的分析三：全产品销售额年间月统计，可按年份、分类以及供应商进行筛选</li>
				<li>完成数据分析模块里的分析四：供货商年间供货量排行，可按年份、分类进行筛选</li>
			</ul>
		</div>
		<div>
			<p>采购申请</p>
			<ul>
				<li>筛选出所需供应商的产品列表，对所需采购产品进行勾选选择</li>		
				<li>点击提交申请来创建采购计划</li>
				<li>填写计划单相应内容以生成<b>采购计划单</b></li>
			</ul>
		</div>
		<div>
			<p>申请一览</p>
			<ul>
				<li>可以对之前创建的采购计划单进行各项操作（详情、编辑、删除、生成合同）</li>		
				<li>点击相应采购计划单的创建合同列表，进入采购合同填写页面</li>
				<li>填写相应内容生成<b>采购合同单</b></li>
			</ul>
		</div>
		<div>
			<p>合同一览</p>
			<ul>
				<li>这里列出了之前所生成的所有<b>采购合同单</b></li>		
				<li>可以对这些采购合同单进行相应操作</li>
				<li>点击更改状态，可以手动记录更改此合同单的当前状态（包括尚未到货、部分到货、全部到货、已经结束、退货中等状态）</li>
				<li>点击退货按钮进入该采购合同的退货事件处理，填写相应退货单内容，生成<b>采购退货单</b></li>
			</ul>
		</div>
		<div>
			<p>采购入库</p>
			<ul>
				<li>这里列出所有之前新创建的采购合同列表</li>		
				<li>点击入库进入该合同单入库单填写页面</li>
				<li>填写相应内容进行入库操作,最终产品入库，生成<b>采购入库单</b></li>
			</ul>
		</div>
		<div>
			<p>入库单一览</p>
			<ul>
				<li>这里列出所有之前的入库单列表</li>		
				<li>点击单据详情可查看详细信息，并且可打印</li>
			</ul>
		</div>
		<div>
			<p>特殊入库</p>
			<ul>
				<li>该入库方式跳过采购申请、采购合同等正常流程，输入产品编码直接入库，请慎重操作！</li>		
			</ul>
		</div>
		<div>
			<p>查看库存</p>
			<ul>
				<li>这里能查看包括加盟商在内的库存情况，本库指代自己的库存情况</li>		
				<li>点击设置预警量，可以对各个产品进行<b>库存预警设置</b>，有最大预警和最小预警</li>
				<li>在列表页点击库存报警产品一览可以查看所有已经报警的产品</li>
			</ul>
		</div>
		<div>
			<p>操作记录</p>
			<ul>
				<li>这里记录所有的出入库单产品情况</li>
				<li>包括采购入库，采购退货，销售出库，销售退货，仓库退货，特殊入库等方式的所有记录</li>		
			</ul>
		</div>
		<div>
			<p>退货一览</p>
			<ul>
				<li>这里列出所有的退货单据</li>		
				<li>包括三种退货方式，采购退货（出库），仓库自主退货（出库），销售退货（入库）</li>
			</ul>
		</div>
		<div>
			<p>库存退货</p>
			<ul>
				<li>这里针对的是销售退货后，所积存的待退货产品，当积累的一定量时，以此功能进行退货</li>		
				<li>左上角输入产品编码以添加进退货列表，最后点击提交退货单</li>
				<li>填写相应退货单内容，生成库存自主退货单</li>
			</ul>
		</div>
		<div>
			<p>销售出库</p>
			<ul>
				<li>这里列出所有的销售订单列表，可以查看订单详情，并且对于已出库的产品进行跟踪流程</li>		
				<li>对于刚新建的订单，点击出库，进入出库页面的操作</li>
				<li>填写相应内容后，生成出库单，绑定订单，进行出库</li>
			</ul>
		</div>
		<div>
			<p>出库一览</p>
			<ul>
				<li>这里列出所有之前生成的出库单列表</li>		
				<li>可以进行各项操作，查看详细信息并且打印</li>
			</ul>
		</div>
		<div>
			<p>订单一览</p>
			<ul>
				<li>这里列出所有加盟商生成的订单列表</li>		
				<li>可以查看订单详细信息</li>
				<li>点击添加流程，追踪添加流程</li>
				<li>点击退货，进入销售退货列表，填写相应内容，生成退货单</li>
			</ul>
		</div>
		<div>
			<p>会员授权</p>
			<ul>
				<li>点击用户，添加用户，填写资料，用户添加成功</li>		
				<li>点击权限管理，在所要授权的组别一栏点击成员授权</li>
				<li>这里可以看到这个组别所有的成员</li>
				<li>在右下角填入加入该组别的会员ID（ID可以在用户信息模块查看）</li>
				<li>提交后，该用户加入该组别</li>
			</ul>
		</div>
		<div>
			<p>组别授权</p>
			<ul>
				<li>点击用户，权限管理</li>		
				<li>在所对应的组别上点击访问授权</li>
				<li>这里可以看到这个组别所有的访问权限</li>
				<li>在允许访问的模块前打勾，提交</li>
			</ul>
		</div>
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
    
</body>
</html>