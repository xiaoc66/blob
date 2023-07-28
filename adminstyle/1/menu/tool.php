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
			<h3>插件管理</h3>
			<ul class="scrollbar-hover">
				<?
				if($r[doad])
				{
				?>
				<li>
					<h4><i class="icon icon-carousel"></i> <span>广告系统</span> <i class="icon icon-double-angle-right"></i></h4>
					<ol>
				        <li><a href="javascript:;" data-url="tool/AdClass.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理广告分类</span></a></li>
						<li><a href="javascript:;" data-url="tool/ListAd.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理广告</span></a></li>
				      </ol>
				</li>
				<?
				}
				?>

				<?
				if($r[dovote])
				{
				?>
				<li>
					<h4><i class="icon icon-bar-chart"></i> <span>投票系统</span> <i class="icon icon-double-angle-right"></i></h4>
					<ol>
				        <li><a href="javascript:;" data-url="tool/AddVote.php?enews=AddVote<?=$ecms_hashur['ehref']?>"><i class="icon icon-angle-right"></i> <span>增加投票</span></a></li>
						<li><a href="javascript:;" data-url="tool/ListVote.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理投票</span></a></li>
				      </ol>
				</li>
				<?
				}
				?>

				<?
				if($r[dolink])
				{
				?>
				<li>
					<h4><i class="icon icon-link"></i> <span>友情链接管理</span> <i class="icon icon-double-angle-right"></i></h4>
					<ol>
				        <li><a href="javascript:;" data-url="tool/LinkClass.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理友情链接分类</span></a></li>
						<li><a href="javascript:;" data-url="tool/ListLink.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理友情链接</span></a></li>
				      </ol>
				</li>
				<?
				}
				?>

				<?
				if($r[dogbook])
				{
				?>
				<li>
					<h4><i class="icon icon-pencil"></i> <span>留言板管理</span> <i class="icon icon-double-angle-right"></i></h4>
					<ol>
				        <li><a href="javascript:;" data-url="tool/GbookClass.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理留言分类</span></a></li>
						<li><a href="javascript:;" data-url="tool/gbook.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理留言</span></a></li>
						<li><a href="javascript:;" data-url="tool/DelMoreGbook.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>批量删除留言</span></a></li>
				      </ol>
				</li>
				<?
				}
				?>

				<?
				if($r[dofeedback]||$r[dofeedbackf])
				{
				?>
				<li>
					<h4><i class="icon icon-envelope"></i> <span>信息反馈管理</span> <i class="icon icon-double-angle-right"></i></h4>
					<ol>
						<?
						if($r[dofeedbackf])
						{
						?>
				        <li><a href="javascript:;" data-url="tool/FeedbackClass.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理反馈分类</span></a></li>
						<li><a href="javascript:;" data-url="tool/ListFeedbackF.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理反馈字段</span></a></li>
						<?
						}
						if($r[dofeedback])
						{
						?>
						<li><a href="javascript:;" data-url="tool/feedback.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理信息反馈</span></a></li>
						<?
						}
						?>
				      </ol>
				</li>
				<?
				}
				?>

				<?
				if($r[donotcj])
				{
				?>
				<li>
					<h4><i class="icon icon-ban-circle"></i> <span>防采集插件</span> <i class="icon icon-double-angle-right"></i></h4>
					<ol>
						<li><a href="javascript:;" data-url="template/NotCj.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理防采集随机字符</span></a></li>
				      </ol>
				</li>
				<?
				}
				?>

				<?php
				$b=0;
				//自定义插件菜单
				$menucsql=$empire->query("select classid,classname from {$dbtbpre}enewsmenuclass where classtype=2 and (groupids='' or groupids like '%,".intval($lur[groupid]).",%') order by myorder,classid");
				while($menucr=$empire->fetch($menucsql))
				{
					$menujsvar='diymenu'.$menucr['classid'];
					$b=1;
				?>
				<li>
					<h4><i class="icon icon-cog"></i> <span><?=$menucr['classname']?></span> <i class="icon icon-double-angle-right"></i></h4>
					<ol>
						<?php
						$menusql=$empire->query("select menuid,menuname,menuurl,addhash from {$dbtbpre}enewsmenu where classid='$menucr[classid]' order by myorder,menuid");
						while($menur=$empire->fetch($menusql))
						{
							if(!(strstr($menur['menuurl'],'://')||substr($menur['menuurl'],0,1)=='/'))
							{
								$menur['menuurl']='../../'.$menur['menuurl'];
							}
							$menu_ecmshash='';
							if($menur['addhash'])
							{
								if(strstr($menur['menuurl'],'?'))
								{
									$menu_ecmshash=$menur['addhash']==2?$ecms_hashur['href']:$ecms_hashur['ehref'];
								}
								else
								{
									$menu_ecmshash=$menur['addhash']==2?$ecms_hashur['whhref']:$ecms_hashur['whehref'];
								}
								$menur['menuurl'].=$menu_ecmshash;
							}
						?>
				        <li><a href="javascript:;" data-url="<?=$menur['menuurl']?>"><i class="icon icon-angle-right"></i> <span><?=$menur['menuname']?></span></a></li>
						<?php
						}
						?>
				      </ol>
				</li>
				<?php
				}
				?>
			</ul>
		</div>

		<script type="text/javascript" src="../<?=$loginadminstyleid?>/dist/lib/jquery/jquery.js"></script>
		<script type="text/javascript" src="../<?=$loginadminstyleid?>/dist/js/zui.min.js" ></script>
		<script type="text/javascript" src="../<?=$loginadminstyleid?>/style/js/page.js"></script>
	</body>
</html>