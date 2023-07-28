<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>后台管理系统</title>
		<link rel="stylesheet" href="../<?=$loginadminstyleid?>/dist/css/zui.min.css" />
		<link rel="stylesheet" href="../<?=$loginadminstyleid?>/style/css/style.css">
  		<!--[if lt IE 9]>
		  	<script src="../<?=$loginadminstyleid?>/dist/lib/ieonly/html5shiv.js"></script>
		<![endif]-->
  		<!--[if lt IE 9]>
		  	<script src="../<?=$loginadminstyleid?>/dist/lib/ieonly/respond.js"></script>
		<![endif]-->
	</head>
	<body>

		<div class="m_nav_iframe">
			<h3>其他管理</h3>
			<ul class="scrollbar-hover">
				<?
				if($r[dobefrom]||$r[dowriter]||$r[dokey]||$r[doword])
				{
				?>
				<li>
					<h4><i class="icon icon-newspaper-o"></i> <span>新闻模型相关</span> <i class="icon icon-double-angle-right"></i></h4>
					<ol>
						<?
						if($r[dobefrom])
						{
						?>
				        <li><a href="javascript:;" data-url="NewsSys/BeFrom.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理信息来源</span></a></li>
						<?
						}
						if($r[dowriter])
						{
						?>
						<li><a href="javascript:;" data-url="NewsSys/writer.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理作者</span></a></li>
						<?
						}
						if($r[dokey])
						{
						?>
						<li><a href="javascript:;" data-url="NewsSys/key.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理内容关键字</span></a></li>
						<?
						}
						if($r[doword])
						{
						?>
						<li><a href="javascript:;" data-url="NewsSys/word.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理过滤字符</span></a></li>
						<?
						}
						?>
				      </ol>
				</li>
				<?
				}
				?>

				<?
				if($r[dodownurl]||$r[dodeldownrecord]||$r[dodownerror]||$r[dorepdownpath]||$r[doplayer])
				{
				?>
				<li>
					<h4><i class="icon icon-download-alt"></i> <span>下载模型相关</span> <i class="icon icon-double-angle-right"></i></h4>
					<ol>
						<?
						if($r[dodownurl])
						{
						?>
				        <li><a href="javascript:;" data-url="DownSys/url.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理地址前缀</span></a></li>
						<?
						}
						if($r[dodeldownrecord])
						{
						?>
						<li><a href="javascript:;" data-url="DownSys/DelDownRecord.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>删除下载记录</span></a></li>
						<?
						}
						if($r[dodownerror])
						{
						?>
						<li><a href="javascript:;" data-url="DownSys/ListError.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理错误报告</span></a></li>
						<?
						}
						if($r[dorepdownpath])
						{
						?>
						<li><a href="javascript:;" data-url="DownSys/RepDownLevel.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>批量替换地址权限</span></a></li>
						<?
						}
						if($r[doplayer])
						{
						?>
						<li><a href="javascript:;" data-url="DownSys/player.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>播放器管理</span></a></li>
						<?
						}
						?>
				      </ol>
				</li>
				<?
				}
				?>

				<?
				if($r[dopay])
				{
				?>
				<li>
					<h4><i class="icon icon-zhifubao"></i> <span>在线支付</span> <i class="icon icon-double-angle-right"></i></h4>
					<ol>
				        <li><a href="javascript:;" data-url="pay/SetPayFen.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>支付参数配置</span></a></li>
						<li><a href="javascript:;" data-url="pay/PayApi.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理支付接口</span></a></li>
						<li><a href="javascript:;" data-url="pay/ListPayRecord.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理支付记录</span></a></li>
				      </ol>
				</li>
				<?
				}
				?>

				<?
				if($r[dopicnews])
				{
				?>
				<li>
					<h4><i class="icon icon-picture"></i> <span>图片信息管理</span> <i class="icon icon-double-angle-right"></i></h4>
					<ol>
				        <li><a href="javascript:;" data-url="NewsSys/PicClass.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理图片信息分类</span></a></li>
						<li><a href="javascript:;" data-url="NewsSys/ListPicNews.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理图片信息</span></a></li>
				      </ol>
				</li>
				<?
				}
				?>
			</ul>
		</div>

		<script type="text/javascript" src="../<?=$loginadminstyleid?>/dist/lib/jquery/jquery.js"></script>
		<script type="text/javascript" src="../<?=$loginadminstyleid?>/dist/js/zui.min.js" ></script>
		<script type="text/javascript" src="../<?=$loginadminstyleid?>/style/js/page.js"></script>
	</body>
</html>