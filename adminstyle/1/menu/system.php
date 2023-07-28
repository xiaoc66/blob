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
			<h3>系统设置</h3>
			<ul class="scrollbar-hover">

				<?
				if($r[dopublic]||$r[dofirewall]||$r[dosetsafe]||$r[dopubvar])
				{
				?>
				<li>
					<h4><i class="icon icon-cog"></i> <span>系统设置</span> <i class="icon icon-double-angle-right"></i></h4>
					<ol>
						<?
						if($r[dopublic])
						{
						?>
				        <li><a href="javascript:;" data-url="SetEnews.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>系统参数设置</span></a></li>
						<li><a href="javascript:;" data-url="pub/SetRewrite.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>伪静态参数设置</span></a></li>
						<li><a href="javascript:;" data-url="pub/SetPageCache.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>动态页缓存设置</span></a></li>
						<li><a href="javascript:;" data-url="pub/SetDigg.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>DIGG顶设置</span></a></li>
						<?
						}
						if($r[dopubvar])
						{
						?>
				        <li><a href="javascript:;" data-url="pub/ListPubVar.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>扩展变量</span></a></li>
						<?
						}
						if($r[dosetsafe])
						{
						?>
				        <li><a href="javascript:;" data-url="pub/SetSafe.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>安全参数配置</span></a></li>
						<?
						}
						if($r[dofirewall])
						{
						?>
						<li><a href="javascript:;" data-url="pub/SetFirewall.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>网站防火墙</span></a></li>
						<?
						}
						?>
					</ol>
				</li>
				<?
				}
				?>

				<?
				if($r[dochangedata]||$r[dopostdata])
				{
				?>
				  <li>
					<h4><i class="icon icon-repeat"></i> <span>数据更新</span> <i class="icon icon-double-angle-right"></i></h4>
					<ol>
						<?
						if($r[dochangedata])
						{
						?>
						<li><a href="javascript:;" data-url="ReHtml/ChangeData.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>数据更新中心</span></a></li>
						<li><a href="javascript:;" data-url="ReHtml/ReInfoUrl.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>更新信息页地址</span></a></li>
						<li><a href="javascript:;" data-url="ReHtml/ChangePageCache.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>更新动态页缓存</span></a></li>
						<li><a href="javascript:;" data-url="ReHtml/DoUpdateData.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>数据整理</span></a></li>
						<?
						}
						if($r[dopostdata])
						{
						?>
						<li><a href="javascript:;" data-url="PostUrlData.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>远程发布</span></a></li>
						<?
						}
						?>
				   	</ol>
				</li>
				<?
				}
				?>

				<?
				if($r[dof]||$r[dom]||$r[dotable])
				{
				?>
				<li>
					<h4><i class="icon icon-hdd"></i> <span>数据表与系统模型</span> <i class="icon icon-double-angle-right"></i></h4>
					<ol>
				        <li><a href="javascript:;" data-url="db/AddTable.php?enews=AddTable<?=$ecms_hashur['ehref']?>"><i class="icon icon-angle-right"></i> <span>新建数据表</span></a></li>
						<li><a href="javascript:;" data-url="db/ListTable.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理数据表</span></a></li>
				  	</ol>
				</li>
				<?
				}
				?>

				<?
				if($r[dodo]||$r[dotask])
				{
				?>
				<li>
					<h4><i class="icon icon-list-ol"></i> <span>计划任务</span> <i class="icon icon-double-angle-right"></i></h4>
					<ol>
						<?
						if($r[dodo])
						{
						?>
				        <li><a href="javascript:;" data-url="ListDo.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理刷新任务</span></a></li>
						<?
						}
						if($r[dotask])
						{
						?>
						<li><a href="javascript:;" data-url="other/ListTask.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理计划任务</span></a></li>
						<?
						}
						?>
				  	</ol>
				</li>
				<?
				}
				?>

				<?
				if($r[doworkflow])
				{
				?>
				 <li>
					<h4><i class="icon icon-sort-by-order"></i> <span>工作流</span> <i class="icon icon-double-angle-right"></i></h4>
					<ol>
				        <li><a href="javascript:;" data-url="workflow/AddWf.php?enews=AddWorkflow<?=$ecms_hashur['ehref']?>"><i class="icon icon-angle-right"></i> <span>增加工作流</span></a></li>
						<li><a href="javascript:;" data-url="workflow/ListWf.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理工作流</span></a></li>
				  	</ol>
				</li>
				<?
				}
				?>

				<?
				if($r[doyh])
				{
				?>
				<li>
					<h4><i class="icon icon-book"></i> <span>优化方案</span> <i class="icon icon-double-angle-right"></i></h4>
					<ol>
						<li><a href="javascript:;" data-url="db/ListYh.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理优化方案</span></a></li>
					</ol>
				</li>
				<?
				}
				?>

				<?php
				if($r['domoreport'])
				{
				?>
				<li>
					<h4><i class="icon icon-laptop"></i> <span>网站多访问端</span> <i class="icon icon-double-angle-right"></i></h4>
					<ol>
						<li><a href="javascript:;" data-url="moreport/ListMoreport.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理网站访问端</span></a></li>
				    </ol>
				</li>
				<?
				}
				?>

				<?
				if($r[domenu])
				{
				?>
				<li>
					<h4><i class="icon icon-list-alt"></i> <span>扩展菜单</span> <i class="icon icon-double-angle-right"></i></h4>
					<ol>
						<li><a href="javascript:;" data-url="other/MenuClass.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理菜单</span></a></li>
				 	</ol>
				</li>
				<?
				}
				?>

				<?
				if($r[dodbdata]||$r[doexecsql])
				{
				?>
				<li>
					<h4><i class="icon icon-tasks"></i> <span>备份与恢复数据</span> <i class="icon icon-double-angle-right"></i></h4>
					<ol>
						<?
						if($r[dodbdata])
						{
						?>
				        <li><a href="javascript:;" data-url="ebak/ChangeDb.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>备份数据</span></a></li>
						<li><a href="javascript:;" data-url="ebak/ReData.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>恢复数据</span></a></li>
						<li><a href="javascript:;" data-url="ebak/ChangePath.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理备份目录</span></a></li>
						<?
						}
						if($r[doexecsql])
						{
						?>
						<li><a href="javascript:;" data-url="db/DoSql.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>执行SQL语句</span></a></li>
						<?
						}
						?>
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
