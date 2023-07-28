<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
$r=ReturnLeftLevel($loginlevel);
//菜单显示
$showfastmenu=$empire->gettotal("select count(*) as total from {$dbtbpre}enewsmenuclass where classtype=1 limit 1");//常用菜单
$showextmenu=$empire->gettotal("select count(*) as total from {$dbtbpre}enewsmenuclass where classtype=3 limit 1");//扩展菜单
$showshopmenu=stristr($public_r['closehmenu'],',shop,')?0:1;
//图片识别
if(stristr($_SERVER['HTTP_USER_AGENT'],'MSIE 6.0'))
{
	$menufiletype='.gif';
}
else
{
	$menufiletype='.png';
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="initial-scale=1,maximum-scale=1, minimum-scale=1">
		<title>EmpireCMS</title>
		<link rel="stylesheet" href="<?=$a?>adminstyle/<?=$loginadminstyleid?>/dist/css/zui.min.css" />
		<link rel="stylesheet" href="<?=$a?>adminstyle/<?=$loginadminstyleid?>/dist/lib/tabs/zui.tabs.min.css">
		<link rel="stylesheet" href="<?=$a?>adminstyle/<?=$loginadminstyleid?>/style/css/style.css" />
  		<!--[if lt IE 9]>
		  	<script src="<?=$a?>adminstyle/<?=$loginadminstyleid?>/dist/lib/ieonly/html5shiv.js"></script>
		<![endif]-->
  		<!--[if lt IE 9]>
		  	<script src="<?=$a?>adminstyle/<?=$loginadminstyleid?>/dist/lib/ieonly/respond.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="header">

			<div class="header_logo">
				<i class="icon icon-cube-alt"></i>
				<span>EmpireCMS</span>
			</div>
			<div class="header_nav_bt">
				<i class="icon icon-bars"></i>
			</div>

			<div class="header_nav">
                <ul class="header_nav_ul">
                    <li><a href="adminstyle/1/left.php?ecms=system<?=$ecms_hashur['ehref']?>" target="nav"><i class="icon icon-cog"></i> <span>系统设置</span></a></li>
                    <li><a href="ListEnews.php<?=$ecms_hashur['whehref']?>" target="nav" class="hover"><i class="icon icon-edit"></i> <span>信息管理</span></a></li>
                    <li><a href="adminstyle/1/left.php?ecms=classdata<?=$ecms_hashur['ehref']?>" target="nav"><i class="icon icon-bars"></i> <span>栏目管理</span></a></li>
                    <li><a href="adminstyle/1/left.php?ecms=template<?=$ecms_hashur['ehref']?>" target="nav"><i class="icon icon-stack"></i> <span>模板管理</span></a></li>
                    <li><a href="adminstyle/1/left.php?ecms=usercp<?=$ecms_hashur['ehref']?>" target="nav"><i class="icon icon-user"></i> <span>用户管理</span></a></li>
                    <li><a href="adminstyle/1/left.php?ecms=tool<?=$ecms_hashur['ehref']?>" target="nav"><i class="icon icon-file-code"></i> <span>插件管理</span></a></li>

                    <li style="<?=$showshopmenu?'':'display:none'?>"><a href="" data-size="fullscreen" data-type="iframe" data-title="商城管理" data-toggle="modal" data-url="openpage/AdminPage.php?leftfile=<?=urlencode('../ShopSys/pageleft.php'.$ecms_hashur['whehref'])?>&mainfile=<?=urlencode('../other/OtherMain.php'.$ecms_hashur['whehref'])?>&title=<?=urlencode('商城系统管理')?><?=$ecms_hashur['ehref']?>"><i class="icon icon-shopping-cart"></i> <span>商城管理</span></a></li>
                    <li><a href="adminstyle/1/left.php?ecms=other<?=$ecms_hashur['ehref']?>" target="nav"><i class="icon icon-wrench"></i> <span>其他设置</span></a></li>
                    <li style="<?=$showextmenu?'':'display:none'?>"><a href="adminstyle/1/left.php?ecms=extend<?=$ecms_hashur['ehref']?>" target="nav"><i class="icon icon-cube-alt"></i> <span>扩展管理</span></a></li>
                    <li><a href="adminstyle/1/left.php?ecms=fastmenu<?=$ecms_hashur['ehref']?>" target="nav"><i class="icon icon-sliders"></i> <span>常用功能</span></a></li>
                </ul>
			</div>

			<div class="header_user">
            	<b><a href="/" target="_blank" style="color:#fff"><i class="icon icon-desktop"></i></a></b>
                
				<b data-size="fullscreen" data-type="iframe" data-title="数据刷新" data-url="ReHtml/ChangeData.php<?=$ecms_hashur['whehref']?>" data-toggle="modal"><i class="icon icon-spin icon-refresh"></i></b>
				
				<b class="set"><i class="icon icon-spin icon-cog"></i></b>

				<div class="btn-group">
				  	<button type="button" data-toggle="dropdown">
				    	<i class="icon icon-user"></i> <span class="caret"></span>
				  	</button>
				  	<ul class="dropdown-menu pull-right" role="menu">
					    <li><a href="" data-size="fullscreen" data-type="iframe" data-title="个人信息" data-toggle="modal" data-url="user/EditPassword.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-user"></i> 个人信息</a></li>
					    <li class="divider"></li>
					    <li><a href="enews.php?enews=exit<?=$ecms_hashur['href']?>"><i class="icon icon-signout"></i> 退出系统</a></li>
				  	</ul>
				</div>
			</div>
		</div>

		<div class="main">
			<div class="m_nav">
				<iframe src="ListEnews.php<?=$ecms_hashur['whehref']?>" name="nav" frameborder="no" border="0" marginwidth="0" marginheight="0" scrolling="no" allowtransparency="yes"></iframe>
			</div>

			<div class="content">
				<div class="tabs" id="tabsExample">
				  	<div class="tabs-navbar">
				  		<div class="dropdown">
							<b class="btn" data-toggle="dropdown"><i class="icon icon-window-alt"></i> <em>标签页操作</em> <span class="caret"></span></b>
					  		<ul class="dropdown-menu pull-right">
					  			<li><a href="###" class="navbar_sx"><i class="icon icon-refresh"></i> 刷新当前</a></li>
					    		<li><a href="###" class="navbar_gb"><i class="icon icon-ban-circle"></i> 全部关闭</a></li>
					    		<li class="divider"></li>
					    		<li><a href="###" class="navbar_hf"><i class="icon icon-history"></i> 恢复关闭</a></li>
					  		</ul>
						</div>
				  	</div>
				  	<div class="tabs-container"></div>
				</div>
			</div>

			<div class="set_box">
				<h4>功能设置</h4>
				<ul>
					<li class="skin_blue active">蓝色</li>
					<li class="skin_green">绿色</li>
					<li class="skin_red">红色</li>
					<li class="skin_yellow">黄色</li>
					<li class="skin_Violet">紫色</li>
				</ul>
				<div class="switch_box">
					<hr>
					<div class="switch">
						<input type="checkbox" name="screenfull">
						<label>全屏模式</label>
					</div>
					<div class="switch">
						<input type="checkbox" name="screensmall">
						<label>小屏模式</label>
					</div>

					<hr>
                	
                    <button type="button" class="btn btn-primary btn-block clear"><i class="icon icon-trash"></i> 清除缓存</button>
                	<button type="button" class="btn btn-primary btn-block lock switch"><i class="icon icon-lock"></i> 临时锁屏</button>
                    
                    <hr>
					
                    <button type="button" class="btn btn-primary btn-block" data-moveable="ture" data-width="1000" data-height="600" data-type="iframe" data-url="template/MakeBq.php<?=$ecms_hashur['whehref']?>" data-toggle="modal"><i class="icon icon-window"></i> 自动生成标签</button>
					<button type="button" class="btn btn-primary btn-block switch" data-moveable="ture" data-width="1000" data-height="600" data-type="iframe" data-url="template/EnewsBq.php<?=$ecms_hashur['whehref']?>" data-toggle="modal"><i class="icon icon-code"></i> 查看标签语法</button>
                    
                    <hr>
					
					<button type="button" class="btn btn-block" data-size="fullscreen" data-type="iframe" data-url="openpage/AdminPage.php?leftfile=<?=urlencode('../template/dttemppageleft.php'.$ecms_hashur['whehref'])?>&title=<?=urlencode('动态页面模板管理')?><?=$ecms_hashur['ehref']?>" data-toggle="modal">动态页面模板管理</button>
				</div>
			</div>
		</div>

		<script type="text/javascript" src="<?=$a?>adminstyle/<?=$loginadminstyleid?>/dist/lib/jquery/jquery.js"></script>
		<script type="text/javascript" src="<?=$a?>adminstyle/<?=$loginadminstyleid?>/dist/js/zui.min.js" ></script>
		<script type="text/javascript" src="<?=$a?>adminstyle/<?=$loginadminstyleid?>/dist/lib/tabs/zui.tabs.min.js" ></script>
		<script type="text/javascript" src="<?=$a?>adminstyle/<?=$loginadminstyleid?>/style/js/screenfull.js" ></script>
		<script type="text/javascript" src="<?=$a?>adminstyle/<?=$loginadminstyleid?>/style/js/index.js"></script>

		<script>
			//定义标签页
			var tabs = [
				{
				    title: '后台首页',
				    url: 'main.php<?=$ecms_hashur['whehref']?>',
				    type: 'iframe',
				    forbidClose: true
				}
			];
			$('#tabsExample').tabs({tabs: tabs});
		</script>

	</body>
</html>
