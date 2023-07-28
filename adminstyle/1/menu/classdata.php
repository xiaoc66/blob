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
			<h3>栏目管理</h3>
			<ul class="scrollbar-hover">
				<li>
					<h4><i class="icon icon-file-text-o"></i> <span>信息相关管理</span> <i class="icon icon-double-angle-right"></i></h4>
					<ol>
				        <li><a href="javascript:;" data-url="ListAllInfo.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理信息</span></a></li>
				        <li><a href="javascript:;" data-url="ListAllInfo.php?ecmscheck=1<?=$ecms_hashur['ehref']?>"><i class="icon icon-angle-right"></i> <span>审核信息</span></a></li>
						<li><a href="javascript:;" data-url="workflow/ListWfInfo.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>签发信息</span></a></li>
						<?
						if($r[dopl])
						{
						?>
						<li><a href="javascript:;" data-url="openpage/AdminPage.php?leftfile=<?=urlencode('../pl/PlNav.php'.$ecms_hashur['whehref'])?>&mainfile=<?=urlencode('../pl/PlMain.php'.$ecms_hashur['whehref'])?>&title=<?=urlencode('管理评论')?><?=$ecms_hashur['ehref']?>"><i class="icon icon-angle-right"></i> <span>管理评论</span></a></li>
						<?
						}
						?>
						<li><a href="javascript:;" data-url="sp/UpdateSp.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>更新碎片</span></a></li>
						<li><a href="javascript:;" data-url="special/UpdateZt.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>更新专题</span></a></li>
						<li><a href="javascript:;" data-url="info/InfoMain.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>数据统计</span></a></li>
						<li><a href="javascript:;" data-url="infotop.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>排行统计</span></a></li>
				      </ol>
				</li>

				<?
				if($r[doclass]||$r[dosetmclass]||$r[doclassf])
				{
				?>
				<li>
					<h4><i class="icon icon-bars"></i><span>栏目管理</span> <i class="icon icon-double-angle-right"></i></h4>
					<ol>
						<?
						if($r[doclass])
						{
						?>
						<li><a href="javascript:;" data-url="ListClass.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理栏目</span></a></li>
						<li><a href="javascript:;" data-url="ListPageClass.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理栏目(分页)</span></a></li>
						<?
						}
						if($r[doclassf])
						{
						?>
						<li><a href="javascript:;" data-url="info/ListClassF.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>栏目自定义字段</span></a></li>
						<?
						}
						if($r[dosetmclass])
						{
						?>
						<li><a href="javascript:;" data-url="SetMoreClass.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>批量设置栏目属性</span></a></li>
						<?
						}
						?>
				      </ol>
				</li>
				<?
				}
				?>

				<?
				if($r[dozt]||$r[doztf])
				{
				?>
				<li>
					<h4><i class="icon icon-columns"></i> <span>专题管理</span> <i class="icon icon-double-angle-right"></i></h4>
					<ol>
						<?php
						if($r[dozt])
						{
						?>
				        <li><a href="javascript:;" data-url="special/ListZtClass.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理专题分类</span></a></li>
						<li><a href="javascript:;" data-url="special/ListZt.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理专题</span></a></li>
						<?php
						}
						if($r[doztf])
						{
						?>
						<li><a href="javascript:;" data-url="special/ListZtF.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>专题自定义字段</span></a></li>
						<?php
						}
						?>
				      </ol>
				</li>
				<?
				}
				?>

				<?
				if($r[doinfotype])
				{
				?>
				<li>
					<h4><i class="icon icon-th"></i> <span>标题分类管理</span> <i class="icon icon-double-angle-right"></i></h4>
					<ol>
				        <li><a href="javascript:;" data-url="info/AddInfoType.php?enews=AddInfoType<?=$ecms_hashur['ehref']?>"><i class="icon icon-angle-right"></i> <span>增加标题分类</span></a></li>
						<li><a href="javascript:;" data-url="info/InfoType.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理标题分类</span></a></li>
				      </ol>
				</li>
				<?
				}
				?>

				<?
				if($r[dosp])
				{
				?>
				<li>
					<h4><i class="icon icon-folder-close-alt"></i> <span>碎片管理</span> <i class="icon icon-double-angle-right"></i></h4>
					<ol>
				        <li><a href="javascript:;" data-url="sp/ListSpClass.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理碎片分类</span></a></li>
						<li><a href="javascript:;" data-url="sp/ListSp.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理碎片</span></a></li>
				      </ol>
				</li>
				<?
				}
				?>

				<?
				if($r[douserpage])
				{
				?>
				<li>
					<h4><i class="icon icon-copy"></i> <span>自定义页面</span> <i class="icon icon-double-angle-right"></i></h4>
					<ol>
				        <li><a href="javascript:;" data-url="template/PageClass.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理自定义页面分类</span></a></li>
						<li><a href="javascript:;" data-url="template/AddPage.php?enews=AddUserpage<?=$ecms_hashur['ehref']?>"><i class="icon icon-angle-right"></i> <span>增加自定义页面</span></a></li>
						<li><a href="javascript:;" data-url="template/ListPage.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理自定义页面</span></a></li>
				      </ol>
				</li>
				<?
				}
				?>

				<?
				if($r[douserlist])
				{
				?>
				<li>
					<h4><i class="icon icon-list"></i> <span>自定义列表</span> <i class="icon icon-double-angle-right"></i></h4>
					<ol>
						<li><a href="javascript:;" data-url="other/UserlistClass.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理自定义列表分类</span></a></li>
						<li><a href="javascript:;" data-url="other/AddUserlist.php?enews=AddUserlist<?=$ecms_hashur['ehref']?>"><i class="icon icon-angle-right"></i> <span>增加自定义列表</span></a></li>
						<li><a href="javascript:;" data-url="other/ListUserlist.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理自定义列表</span></a></li>
				      </ol>
				</li>
				<?
				}
				?>

				<?
				if($r[douserjs])
				{
				?>
				<li>
					<h4><i class="icon icon-code"></i> <span>自定义JS</span> <i class="icon icon-double-angle-right"></i></h4>
					<ol>
						<li><a href="javascript:;" data-url="other/UserjsClass.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理自定义JS分类</span></a></li>
						<li><a href="javascript:;" data-url="other/AddUserjs.php?enews=AddUserjs<?=$ecms_hashur['ehref']?>"><i class="icon icon-angle-right"></i> <span>增加自定义JS</span></a></li>
						<li><a href="javascript:;" data-url="other/ListUserjs.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理自定义JS</span></a></li>
				      </ol>
				</li>
				<?
				}
				?>

				<?
				if($r[dotags])
				{
				?>
				<li>
					<h4><i class="icon icon-tags"></i> <span>TAGS管理</span> <i class="icon icon-double-angle-right"></i></h4>
					<ol>
				        <li><a href="javascript:;" data-url="tags/SetTags.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>设置TAGS参数</span></a></li>
						<li><a href="javascript:;" data-url="tags/TagsClass.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理TAGS分类</span></a></li>
						<li><a href="javascript:;" data-url="tags/ListTags.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理TAGS</span></a></li>
				      </ol>
				</li>
				<?
				}
				?>

				<?
				if($r['doclass'])
				{
				?>
				<li>
					<h4><i class="icon icon-cog"></i> <span>头条/推荐级别</span> <i class="icon icon-double-angle-right"></i></h4>
					<ol>
				        <li><a href="javascript:;" data-url="info/ListGoodType.php?ttype=1<?=$ecms_hashur['ehref']?>"><i class="icon icon-angle-right"></i> <span>管理头条级别</span></a></li>
						<li><a href="javascript:;" data-url="info/ListGoodType.php?ttype=0<?=$ecms_hashur['ehref']?>"><i class="icon icon-angle-right"></i> <span>管理推荐级别</span></a></li>
				      </ol>
				</li>
				<?
				}
				?>

				<?
				if($r[dofile])
				{
				?>
				<li>
					<h4><i class="icon icon-file-archive"></i> <span>附件管理</span> <i class="icon icon-double-angle-right"></i></h4>
					<ol>
						<li><a href="javascript:;" data-url="openpage/AdminPage.php?leftfile=<?=urlencode('../file/FileNav.php'.$ecms_hashur['whehref'])?>&title=<?=urlencode('管理附件')?><?=$ecms_hashur['ehref']?>"><i class="icon icon-angle-right"></i> <span>管理附件</span></a></li>
				      </ol>
				</li>
				<?
				}
				?>

				<?
				if($r[docj])
				{
				?>
				<li>
					<h4><i class="icon icon-bug"></i> <span>采集管理</span> <i class="icon icon-double-angle-right"></i></h4>
					<ol>
						<li><a href="javascript:;" data-url="AddInfoC.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>增加采集节点</span></a></li>
						<li><a href="javascript:;" data-url="ListInfoClass.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理采集节点</span></a></li>
						<li><a href="javascript:;" data-url="ListPageInfoClass.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理采集节点(分页)</span></a></li>
				      </ol>
				</li>
				<?
				}
				?>

				<?
				if($r[dosearchall])
				{
				?>
				<li>
					<h4><i class="icon icon-search"></i> <span>全站全文搜索</span> <i class="icon icon-double-angle-right"></i></h4>
					<ol>
						<li><a href="javascript:;" data-url="searchall/SetSearchAll.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>全站搜索设置</span></a></li>
						<li><a href="javascript:;" data-url="searchall/ListSearchLoadTb.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理搜索数据源</span></a></li>
						<li><a href="javascript:;" data-url="searchall/ClearSearchAll.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>清理搜索数据</span></a></li>
				      </ol>
				</li>
				<?
				}
				?>

				<?
				if($r[dowap])
				{
				?>
				<li>
					<h4><i class="icon icon-mobile"></i> <span>WAP管理</span> <i class="icon icon-double-angle-right"></i></h4>
					<ol>
				        <li><a href="javascript:;" data-url="other/SetWap.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>WAP设置</span></a></li>
						<li><a href="javascript:;" data-url="other/WapStyle.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理WAP模板</span></a></li>
				      </ol>
				</li>
				<?
				}
				?>

				<?
				if($r[domovenews]||$r[doinfodoc]||$r[dodelinfodata]||$r[dorepnewstext]||$r[dototaldata]||$r[dosearchkey]||$r[dovotemod])
				{
				?>
				<li>
					<h4><i class="icon icon-cog"></i> <span>其他相关</span> <i class="icon icon-double-angle-right"></i></h4>
					<ol>
						<?
						if($r[dototaldata])
						{
						?>
				        <li><a href="javascript:;" data-url="TotalData.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>统计信息数据</span></a></li>
						<li><a href="javascript:;" data-url="user/UserTotal.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>用户发布统计</span></a></li>
						<?
						}
						if($r[dosearchkey])
						{
						?>
						<li><a href="javascript:;" data-url="SearchKey.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理搜索关键字</span></a></li>
						<?
						}
						if($r[dorepnewstext])
						{
						?>
						<li><a href="javascript:;" data-url="db/RepNewstext.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>批量替换字段值</span></a></li>
						<?
						}
						if($r[domovenews])
						{
						?>
						<li><a href="javascript:;" data-url="MoveClassNews.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>批量转移信息</span></a></li>
						<?
						}
						if($r[doinfodoc])
						{
						?>
						<li><a href="javascript:;" data-url="InfoDoc.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>信息批量归档</span></a></li>
						<?
						}
						if($r[dodelinfodata])
						{
						?>
						<li><a href="javascript:;" data-url="db/DelData.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>批量删除信息</span></a></li>
						<?
						}
						if($r[dovotemod])
						{
						?>
						<li><a href="javascript:;" data-url="other/ListVoteMod.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理预设投票</span></a></li>
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