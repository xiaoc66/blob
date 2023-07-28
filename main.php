<?php
define('EmpireCMSAdmin','1');
require("../class/connect.php");
require("../class/db_sql.php");
require("../class/functions.php");
require("../member/class/user.php");
$link=db_connect();
$empire=new mysqlquery();
//验证用户
$lur=is_login();
$logininid=(int)$lur['userid'];
$loginin=$lur['username'];
$loginrnd=$lur['rnd'];
$loginlevel=(int)$lur['groupid'];
$loginadminstyleid=$lur['adminstyleid'];
//ehash
$ecms_hashur=hReturnEcmsHashStrAll();
//我的状态
$user_r=$empire->fetch1("select pretime,preip,loginnum,preipport from {$dbtbpre}enewsuser where userid='$logininid'");
$gr=$empire->fetch1("select groupname from {$dbtbpre}enewsgroup where groupid='$loginlevel'");
//管理员统计
$adminnum=$empire->gettotal("select count(*) as total from {$dbtbpre}enewsuser");
$date=date("Y-m-d");
$noplnum=$empire->gettotal("select count(*) as total from {$dbtbpre}enewspl_".$public_r['pldeftb']." where checked=1");
//未审核会员
$nomembernum=$empire->gettotal("select count(*) as total from ".eReturnMemberTable()." where ".egetmf('checked')."=0");
//过期广告
$outtimeadnum=$empire->gettotal("select count(*) as total from {$dbtbpre}enewsad where endtime<'$date' and endtime<>'0000-00-00'");
//签发信息
$qfinfonum=$empire->gettotal("select count(*) as total from {$dbtbpre}enewswfinfo where checktno=0 and (groupid like '%,".$lur['groupid'].",%' or userclass like '%,".$lur['classid'].",%' or username like '%,".$lur['username'].",%')");
//系统信息
	if(function_exists('ini_get')){
        $onoff = ini_get('register_globals');
    } else {
        $onoff = get_cfg_var('register_globals');
    }
    if($onoff){
        $onoff="打开";
    }else{
        $onoff="关闭";
    }
    if(function_exists('ini_get')){
        $upload = ini_get('file_uploads');
    } else {
        $upload = get_cfg_var('file_uploads');
    }
    if ($upload){
        $upload="可以";
    }else{
        $upload="不可以";
    }
	if(function_exists('ini_get')){
        $uploadsize = ini_get('upload_max_filesize');
    } else {
        $uploadsize = get_cfg_var('upload_max_filesize');
    }
	if(function_exists('ini_get')){
        $uploadpostsize = ini_get('post_max_size');
    } else {
        $uploadpostsize = get_cfg_var('post_max_size');
    }
//开启
$register_ok="开启";
if($public_r[register_ok])
{$register_ok="关闭";}
$addnews_ok="开启";
if($public_r[addnews_ok])
{$addnews_ok="关闭";}
//版本
@include("../class/EmpireCMS_version.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="initial-scale=1,maximum-scale=1, minimum-scale=1">
		<title>帝国CMS后台管理系统</title>
		<link rel="stylesheet" href="<?=$a?>adminstyle/<?=$loginadminstyleid?>/dist/css/zui.min.css" />
		<link rel="stylesheet" href="<?=$a?>adminstyle/<?=$loginadminstyleid?>/style/css/style.css">
  		<!--[if lt IE 9]>
		  	<script src="<?=$a?>adminstyle/<?=$loginadminstyleid?>/dist/lib/ieonly/html5shiv.js"></script>
		<![endif]-->
  		<!--[if lt IE 9]>
		  	<script src="<?=$a?>adminstyle/<?=$loginadminstyleid?>/dist/lib/ieonly/respond.js"></script>
		<![endif]-->
		<style>
			.table{margin: 0px;}
			.alert{margin: 15px 0px 0px 0px;}
		</style>
	</head>
	<body class="box">
		<div class="row">
			<div class="col-sm-12">
				<div class="alert alert-danger-inverse with-icon alert-dismissable iis">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				    <i class="icon-remove-sign"></i>
				    <div class="content"><strong>注意!</strong><p>请先将项目部署到服务环境下再进行访问，否则将无法正常显示！</p></div>
				</div>
			</div>

	        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
	            <div class="mini-stat bg-blue">
	                <span class="mini-stat-icon">
	                	<i class="icon icon-user"></i>
	                </span>
	                <div class="mini-stat-info">
	                	<span>用户名</span>
	                    <?=$loginin?>
	                </div>
	            </div>
	        </div><div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
	            <div class="mini-stat bg-primary">
	                <span class="mini-stat-icon">
	                	<i class="icon icon-group"></i>
	                </span>
	                <div class="mini-stat-info">
	                	<span>用户组</span>
	                    <?=$gr[groupname]?>
	                </div>
	            </div>
	        </div><div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
	            <div class="mini-stat bg-info">
	                <span class="mini-stat-icon">
	                	<i class="icon icon-bar-chart-alt"></i>
	                </span>
	                <div class="mini-stat-info">
	                	<span>登录次数</span>
	                    <?=$user_r[loginnum]?>
	                </div>
	            </div>
	        </div><div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
	            <div class="mini-stat bg-red">
	                <span class="mini-stat-icon">
	                	<i class="icon icon-time"></i>
	                </span>
	                <div class="mini-stat-info">
	                	<span>上次登录</span>
	                    <?=$user_r[pretime]?date('Y-m-d H:i:s',$user_r[pretime]):'---'?>
	                </div>
	            </div>
	        </div><div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
	            <div class="mini-stat bg-green">
	                <span class="mini-stat-icon">
	                	<i class="icon icon-location-arrow"></i>
	                </span>
	                <div class="mini-stat-info">
	                	<span>上次登录IP</span>
	                    <?=$user_r[preip]?$user_r[preip].':'.$user_r[preipport]:'---'?>
	                </div>
	            </div>
	        </div><div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
	            <div class="mini-stat bg-special">
	                <span class="mini-stat-icon">
	                	<i class="icon icon-checked"></i>
	                </span>
	                <div class="mini-stat-info">
	                	<span>签发信息</span>
	                    <?=$qfinfonum?>
	                </div>
	            </div>
	        </div>
        </div>

        <div class="row">
	  		<div class="col-sm-12">
				<div class="panel">
		    		<div class="panel-heading">快捷菜单</div>
		    		<div class="panel-body">
		    			<table class="table table-bordered table-hover" style="margin: 0px;">
					        <tr>
					          <td height="25" bgcolor="#FFFFFF"><strong>信息操作</strong>：&nbsp;&nbsp;<a href="AddInfoChClass.php<?=$ecms_hashur['whehref']?>">增加信息</a>&nbsp;&nbsp;
					            <a href="ListAllInfo.php<?=$ecms_hashur['whehref']?>">管理信息</a>&nbsp;&nbsp; <a href="ListAllInfo.php?ecmscheck=1<?=$ecms_hashur['ehref']?>">审核信息</a>
					            &nbsp;&nbsp; <a href="workflow/ListWfInfo.php<?=$ecms_hashur['whehref']?>">签发信息</a>(<strong><font color="#FF0000"><?=$qfinfonum?></font></strong>)&nbsp;&nbsp; <a href="openpage/AdminPage.php?leftfile=<?=urlencode('../pl/PlNav.php'.$ecms_hashur['whehref'])?>&mainfile=<?=urlencode('../pl/PlMain.php'.$ecms_hashur['whehref'])?>&title=<?=urlencode('管理评论')?><?=$ecms_hashur['ehref']?>">管理评论</a>&nbsp;&nbsp; <a href="sp/UpdateSp.php<?=$ecms_hashur['whehref']?>">更新碎片</a>&nbsp;&nbsp; <a href="special/UpdateZt.php<?=$ecms_hashur['whehref']?>">更新专题</a>&nbsp;&nbsp; <a href="info/InfoMain.php<?=$ecms_hashur['whehref']?>">数据统计</a></td>
					        </tr>
					        <tr>
					          <td height="25" bgcolor="#FFFFFF"><strong>栏目操作</strong>：&nbsp;&nbsp;<a href="ListClass.php<?=$ecms_hashur['whehref']?>">管理栏目</a>&nbsp;&nbsp;
					            <a href="special/ListZt.php<?=$ecms_hashur['whehref']?>">管理专题</a>&nbsp;&nbsp; <a href="ListInfoClass.php<?=$ecms_hashur['whehref']?>">管理采集</a>
					            &nbsp;&nbsp; <a href="openpage/AdminPage.php?leftfile=<?=urlencode('../file/FileNav.php'.$ecms_hashur['whehref'])?>&title=<?=urlencode('管理附件')?><?=$ecms_hashur['ehref']?>">附件管理</a>&nbsp;&nbsp;
					            <a href="SetEnews.php<?=$ecms_hashur['whehref']?>">系统参数设置</a>&nbsp;&nbsp; <a href="ReHtml/ChangeData.php<?=$ecms_hashur['whehref']?>">数据更新中心</a></td>
					        </tr>
					        <tr>
					          <td height="25" bgcolor="#FFFFFF"><strong>用户操作</strong>：&nbsp;&nbsp;<a href="member/ListMember.php?sear=1&schecked=1<?=$ecms_hashur['ehref']?>">审核会员</a>&nbsp;&nbsp;
					            <a href="member/ListMember.php<?=$ecms_hashur['whehref']?>">管理会员</a> &nbsp; <a href="user/ListLog.php<?=$ecms_hashur['whehref']?>">管理登陆日志</a>
					            &nbsp;&nbsp; <a href="user/ListDolog.php<?=$ecms_hashur['whehref']?>">管理操作日志</a>&nbsp;&nbsp; <a href="user/EditPassword.php<?=$ecms_hashur['whehref']?>">修改个人资料</a>&nbsp;&nbsp;
					            <a href="user/UserTotal.php<?=$ecms_hashur['whehref']?>">用户发布统计</a></td>
					        </tr>
					        <tr>
					          <td height="25" bgcolor="#FFFFFF"><strong>反馈管理</strong>：&nbsp;&nbsp;<a href="tool/gbook.php<?=$ecms_hashur['whehref']?>">管理留言</a>&nbsp;&nbsp;
					            <a href="tool/feedback.php<?=$ecms_hashur['whehref']?>">管理反馈信息</a>&nbsp;&nbsp;<a href="DownSys/ListError.php<?=$ecms_hashur['whehref']?>">管理错误报告</a>&nbsp;&nbsp;
					            <a href="#empirecms" onClick="window.open('openpage/AdminPage.php?leftfile=<?=urlencode('../ShopSys/pageleft.php'.$ecms_hashur['whehref'])?>&mainfile=<?=urlencode('../ShopSys/ListDd.php'.$ecms_hashur['whehref'])?>&title=<?=urlencode('商城系统管理')?><?=$ecms_hashur['ehref']?>','AdminShopSys','');">管理订单</a>&nbsp;&nbsp;<a href="pay/ListPayRecord.php<?=$ecms_hashur['whehref']?>">管理支付记录</a>&nbsp;&nbsp;
					            <a href="PathLevel.php<?=$ecms_hashur['whehref']?>">查看目录权限状态</a></td>
					        </tr>
					      </table>
		    		</div>
		  		</div>
	  		</div>
	  	</div>

	  	<div class="row">
	  		<div class="col-sm-12">
	  			<div class="panel">
		    		<div class="panel-heading">程序说明</div>
		    		<div class="panel-body">
		    			<p><a href="http://ecms.phome.net/" target="_blank">EMPIRECMS</a>版权由漳州市芗城帝兴软件开发有限公司所有。<strong>EMPIRECMS(后台美化版) V2.4</strong>由<a href="https://www.8ye.net/" target="_blank">八爷源码源码</a>移植修复</p>
		    			<p>
		    				<span class="label label-info">PC</span>
		    				<span class="label label-danger">WAP</span>
		    				<span class="label label-success">ZUI</span>
							<span class="label label-primary">IE8+</span>
							<span class="label label-info">Firefox</span>
							<span class="label label-danger">Chrome</span>
							<span class="label label-warning">响应式</span>
						</p>
		    			<div class="alert alert-danger">
							友情提示：本模板由八爷源码修复移植，修复部分错误地方，请认准后购买！<a href="https://www.8ye.net" target="_blank">八爷源码官网</a>购买咨询。
		    			</div>
		    		</div>
		  		</div>
			</div>
	  	</div>

		<div class="row">
	  		<div class="col-sm-6 col-lg-6">
				<div class="panel">
		    		<div class="panel-heading">网站信息</div>
		    		<div class="panel-body">
		    			<table class="table table-bordered table-hover">
							<tr>
								<td width="150">会员注册:</td>
								<td><?=$register_ok?> </td>
							</tr>
								<td>会员投稿:</td>
								<td><?=$addnews_ok?></td>
							</tr>
							<tr>
								<td>管理员个数:</td>
								<td><a href="user/ListUser.php<?=$ecms_hashur['whehref']?>"><?=$adminnum?></a> 人</td>
							</tr>
							<tr>
								<td>未审核评论:</td>
								<td><a href="openpage/AdminPage.php?leftfile=<?=urlencode('../pl/PlNav.php'.$ecms_hashur['whehref'])?>&mainfile=<?=urlencode('../pl/ListAllPl.php?checked=2'.$ecms_hashur['ehref'])?>&title=<?=urlencode('管理评论')?><?=$ecms_hashur['ehref']?>"><?=$noplnum?></a> 条</td>
							</tr>
							<tr>
								<td>未审核会员:</td>
								<td><a href="member/ListMember.php?sear=1&schecked=1<?=$ecms_hashur['ehref']?>"><?=$nomembernum?></a> 人</td>
							</tr>
							<tr>
								<td>过期广告:</td>
								<td><a href="tool/ListAd.php?time=1<?=$ecms_hashur['ehref']?>"><?=$outtimeadnum?></a> 个</td>
							</tr>
							<tr>
								<td>登陆者IP:</td>
								<td><? echo egetip();?></td>
							</tr>
							<tr>
								<td>程序版本:</td>
								<td>v<?=EmpireCMS_VERSION?> Free <?=EmpireCMS_LASTTIME?></td>
							</tr>
							<tr>
								<td>程序编码:</td>
								<td><?=EmpireCMS_CHARVER?></td>
							</tr>
						</table>
		    		</div>
		  		</div>
	  		</div>

			<div class="col-sm-6 col-lg-6">
				<div class="panel">
		    		<div class="panel-heading">服务器信息</div>
		    		<div class="panel-body">
						<table class="table table-bordered table-hover">
							<tr>
								<td width="150">服务器软件:</td>
								<td><?=$_SERVER['SERVER_SOFTWARE']?></td>
							</tr>
							<tr>
								<td>操作系统:</td>
								<td><? echo defined('PHP_OS')?PHP_OS:'未知';?></td>
							</tr>
							<tr>
								<td>PHP版本:</td>
								<td><? echo @phpversion();?></td>
							</tr>
							<tr>
								<td>MYSQL版本:</td>
								<td><? echo do_eGetDBVer(0);?></td>
							</tr>
							<tr>
								<td>全局变量:</td>
								<td><?=$onoff?>(建议关闭)</td>
							</tr>
							<tr>
								<td>魔术引用:</td>
								<td><?=MAGIC_QUOTES_GPC?'开启':'关闭'?>(建议开启)</td>
							</tr>
							<tr>
								<td>上传文件:</td>
								<td><?=$upload?>(最大文件：<?=$uploadsize?>，表单：<?=$uploadpostsize?></td>
							</tr>
							<tr>
								<td>当前时间:</td>
								<td><? echo date("Y-m-d H:i:s");?></td>
							</tr>
							<tr>
								<td>使用域名:</td>
								<td><?=$_SERVER['HTTP_HOST']?></td>
							</tr>
						</table>
		    		</div>
		  		</div>
	  		</div>
  		</div>

  		<div class="row">
	  		<div class="col-sm-6 col-lg-6">
				<div class="panel">
		    		<div class="panel-heading">官方信息</div>
		    		<div class="panel-body">
		    			<table class="table table-bordered table-hover">
							<tr>
				              	<td>帝国官方主页</td>
				              	<td><a href="http://www.phome.net" target="_blank">http://www.phome.net</a></td>
				            </tr>
				            <tr>
				              	<td>帝国官方论坛</td>
				              	<td><a href="http://bbs.phome.net" target="_blank">http://bbs.phome.net</a></td>
				            </tr>
				            <tr>
				              	<td>帝国产品中心</td>
				              	<td><a href="http://www.phome.net/product/" target="_blank">http://www.phome.net/product/</a></td>
				            </tr>
				            <tr>
				              	<td>公司网站</td>
				              	<td><a href="http://www.digod.com" target="_blank">http://www.digod.com</a></td>
				            </tr>
						</table>
		    		</div>
		  		</div>
	  		</div>

			<div class="col-sm-6 col-lg-6">
				<div class="panel">
		    		<div class="panel-heading">EmpireCMS 开发团队</div>
		    		<div class="panel-body">
						<table class="table table-bordered table-hover">
							<tr>
				              	<td>版权所有</td>
				              	<td><a href="http://www.digod.com" target="_blank">漳州市芗城帝兴软件开发有限公司</a></td>
				            </tr>
				            <tr>
				              	<td>开发与支持团队</td>
				              	<td>wm_chief、amt、帝兴、小游、zeedy</td>
				            </tr>
				            <tr>
				              	<td>特别感谢</td>
				              	<td>禾火木风、yingnt、hicode、sooden、老鬼、小林、天浪歌、TryLife、5starsgeneral</td>
				            </tr>
						</table>
		    		</div>
		  		</div>
	  		</div>
  		</div>

		<script type="text/javascript" src="<?=$a?>adminstyle/<?=$loginadminstyleid?>/dist/lib/jquery/jquery.js"></script>
		<script type="text/javascript" src="<?=$a?>adminstyle/<?=$loginadminstyleid?>/dist/js/zui.min.js" ></script>
		<script type="text/javascript" src="<?=$a?>adminstyle/<?=$loginadminstyleid?>/style/js/page.js"></script>
	</body>
</html>
