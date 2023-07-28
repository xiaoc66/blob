<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
//模板组
$gid=(int)$_GET['gid'];
if(!$gid)
{
	if($ecms_config['sets']['deftempid'])
	{
		$gid=$ecms_config['sets']['deftempid'];
	}
	elseif($public_r['deftempid'])
	{
		$gid=$public_r['deftempid'];
	}
	else
	{
		$gid=1;
	}
}
$tempgroup="";
$tgname="";
$tgsql=$empire->query("select gid,gname,isdefault from {$dbtbpre}enewstempgroup order by gid");
while($tgr=$empire->fetch($tgsql))
{
	$tgselect="";
	if($tgr['gid']==$gid)
	{
		$tgname=$tgr['gname'];
		$tgselect=" selected";
	}
	$tempgroup.="<option value='".$tgr['gid']."'".$tgselect.">".$tgr['gname']."</option>";
}
if(empty($tgname))
{
	printerror("ErrorUrl","");
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
			<h3>
				模板管理
				<div class="input-group" style="margin: 0px;position: absolute;right: 10px; top: 12px;">
			        <select class="form-control" style="font-size: 12px;" name="selecttempgroup" onChange="self.location.href='left.php?<?=$ecms_hashur['ehref']?>&ecms=template&gid='+this.options[this.selectedIndex].value">
			          	<?=$tempgroup?>
			        </select>
				</div>
			</h3>
			<ul class="scrollbar-hover">

				<?
				if($r[dotemplate])
				{
				?>
				<li>
					<h4><i class="icon icon-desktop"></i> <span>首页模板</span> <i class="icon icon-double-angle-right"></i></h4>
					<ol>
				        <li><a href="javascript:;" data-url="template/EditPublicTemp.php?tname=indextemp&gid=<?=$gid?><?=$ecms_hashur['ehref']?>"><i class="icon icon-angle-right"></i> <span>首页模板</span></a></li>
						<li><a href="javascript:;" data-url="template/ListIndexpage.php?gid=<?=$gid?><?=$ecms_hashur['ehref']?>"><i class="icon icon-angle-right"></i> <span>管理首页方案</span></a></li>
				 	</ol>
				</li>
				<?
				}
				?>

				<?
				if($r[dotemplate])
				{
				?>
				<li>
					<h4><i class="icon icon-columns"></i> <span>封面模板</span> <i class="icon icon-double-angle-right"></i></h4>
					<ol>
				        <li><a href="javascript:;" data-url="template/ClassTempClass.php?gid=<?=$gid?><?=$ecms_hashur['ehref']?>"><i class="icon icon-angle-right"></i> <span>管理封面模板分类</span></a></li>
						<li><a href="javascript:;" data-url="template/ListClasstemp.php?gid=<?=$gid?><?=$ecms_hashur['ehref']?>"><i class="icon icon-angle-right"></i> <span>管理封面模板</span></a></li>
				 	</ol>
				</li>
				<?
				}
				?>

				<?
				if($r[dotemplate])
				{
				?>
				<li>
					<h4><i class="icon icon-bars"></i> <span>列表模板</span> <i class="icon icon-double-angle-right"></i></h4>
					<ol>
				        <li><a href="javascript:;" data-url="template/ListtempClass.php?gid=<?=$gid?><?=$ecms_hashur['ehref']?>"><i class="icon icon-angle-right"></i> <span>管理列表模板分类</span></a></li>
						<li><a href="javascript:;" data-url="template/ListListtemp.php?gid=<?=$gid?><?=$ecms_hashur['ehref']?>"><i class="icon icon-angle-right"></i> <span>管理列表模板</span></a></li>
				      </ol>
				</li>
				<?
				}
				?>

				<?
				if($r[dotemplate])
				{
				?>
				<li>
					<h4><i class="icon icon-table"></i> <span>内容模板</span> <i class="icon icon-double-angle-right"></i></h4>
					<ol>
				        <li><a href="javascript:;" data-url="template/NewstempClass.php?gid=<?=$gid?><?=$ecms_hashur['ehref']?>"><i class="icon icon-angle-right"></i> <span>管理内容模板分类</span></a></li>
						<li><a href="javascript:;" data-url="template/ListNewstemp.php?gid=<?=$gid?><?=$ecms_hashur['ehref']?>"><i class="icon icon-angle-right"></i> <span>管理内容模板</span></a></li>
				      </ol>
				</li>
				<?
				}
				?>

				<?
				if($r[dotemplate])
				{
				?>
				<li>
					<h4><i class="icon icon-search"></i> <span>搜索模板</span> <i class="icon icon-double-angle-right"></i></h4>
					<ol>
						<li><a href="javascript:;" data-url="template/SearchtempClass.php?gid=<?=$gid?><?=$ecms_hashur['ehref']?>"><i class="icon icon-angle-right"></i> <span>管理搜索模板分类</span></a></li>
						<li><a href="javascript:;" data-url="template/ListSearchtemp.php?gid=<?=$gid?><?=$ecms_hashur['ehref']?>"><i class="icon icon-angle-right"></i> <span>管理搜索模板</span></a></li>
				      </ol>
				</li>
				<?
				}
				?>

				<?
				if($r[dotemplate])
				{
				?>
				<li>
					<h4><i class="icon icon-tags"></i> <span>标签模板</span> <i class="icon icon-double-angle-right"></i></h4>
					<ol>
				        <li><a href="javascript:;" data-url="template/BqtempClass.php?gid=<?=$gid?><?=$ecms_hashur['ehref']?>"><i class="icon icon-angle-right"></i> <span>管理标签模板分类</span></a></li>
						<li><a href="javascript:;" data-url="template/ListBqtemp.php?gid=<?=$gid?><?=$ecms_hashur['ehref']?>"><i class="icon icon-angle-right"></i> <span>管理标签模板</span></a></li>
				      </ol>
				</li>
				<?
				}
				?>

				<?
				if($r[dotempvar])
				{
				?>
				<li>
					<h4><i class="icon icon-node"></i> <span>公共模板变量</span> <i class="icon icon-double-angle-right"></i></h4>
					<ol>
				        <li><a href="javascript:;" data-url="template/TempvarClass.php?gid=<?=$gid?><?=$ecms_hashur['ehref']?>"><i class="icon icon-angle-right"></i> <span>管理模板变量分类</span></a></li>
						<li><a href="javascript:;" data-url="template/ListTempvar.php?gid=<?=$gid?><?=$ecms_hashur['ehref']?>"><i class="icon icon-angle-right"></i> <span>管理模板变量</span></a></li>
				      </ol>
				</li>
				<?
				}
				?>

				<?
				if($r[dotemplate])
				{
				?>
				<li>
					<h4><i class="icon icon-layout"></i> <span>公共模板</span> <i class="icon icon-double-angle-right"></i></h4>
					<ol>
						<li><a href="javascript:;" data-url="template/EditPublicTemp.php?tname=cptemp&gid=<?=$gid?><?=$ecms_hashur['ehref']?>"><i class="icon icon-angle-right"></i> <span>控制面板模板</span></a></li>
						<li><a href="javascript:;" data-url="template/EditPublicTemp.php?tname=schalltemp&gid=<?=$gid?><?=$ecms_hashur['ehref']?>"><i class="icon icon-angle-right"></i> <span>全站搜索模板</span></a></li>
						<li><a href="javascript:;" data-url="template/EditPublicTemp.php?tname=searchformtemp&gid=<?=$gid?><?=$ecms_hashur['ehref']?>"><i class="icon icon-angle-right"></i> <span>高级搜索表单模板</span></a></li>
						<li><a href="javascript:;" data-url="template/EditPublicTemp.php?tname=searchformjs&gid=<?=$gid?><?=$ecms_hashur['ehref']?>"><i class="icon icon-angle-right"></i> <span>横向搜索JS模板</span></a></li>
						<li><a href="javascript:;" data-url="template/EditPublicTemp.php?tname=searchformjs1&gid=<?=$gid?><?=$ecms_hashur['ehref']?>"><i class="icon icon-angle-right"></i> <span>纵向搜索JS模板</span></a></li>
						<li><a href="javascript:;" data-url="template/EditPublicTemp.php?tname=otherlinktemp&gid=<?=$gid?><?=$ecms_hashur['ehref']?>"><i class="icon icon-angle-right"></i> <span>相关信息模板</span></a></li>
						<li><a href="javascript:;" data-url="template/EditPublicTemp.php?tname=gbooktemp&gid=<?=$gid?><?=$ecms_hashur['ehref']?>"><i class="icon icon-angle-right"></i> <span>留言板模板</span></a></li>
						<li><a href="javascript:;" data-url="template/EditPublicTemp.php?tname=pljstemp&gid=<?=$gid?><?=$ecms_hashur['ehref']?>"><i class="icon icon-angle-right"></i> <span>评论JS调用模板</span></a></li>
						<li><a href="javascript:;" data-url="template/EditPublicTemp.php?tname=downpagetemp&gid=<?=$gid?><?=$ecms_hashur['ehref']?>"><i class="icon icon-angle-right"></i> <span>最终下载页模板</span></a></li>
						<li><a href="javascript:;" data-url="template/EditPublicTemp.php?tname=downsofttemp&gid=<?=$gid?><?=$ecms_hashur['ehref']?>"><i class="icon icon-angle-right"></i> <span>下载地址模板</span></a></li>
						<li><a href="javascript:;" data-url="template/EditPublicTemp.php?tname=onlinemovietemp&gid=<?=$gid?><?=$ecms_hashur['ehref']?>"><i class="icon icon-angle-right"></i> <span>在线播放地址模板</span></a></li>
						<li><a href="javascript:;" data-url="template/EditPublicTemp.php?tname=listpagetemp&gid=<?=$gid?><?=$ecms_hashur['ehref']?>"><i class="icon icon-angle-right"></i> <span>列表分页模板</span></a></li>
						<li><a href="javascript:;" data-url="template/EditPublicTemp.php?tname=loginiframe&gid=<?=$gid?><?=$ecms_hashur['ehref']?>"><i class="icon icon-angle-right"></i> <span>登陆状态模板</span></a></li>
						<li><a href="javascript:;" data-url="template/EditPublicTemp.php?tname=loginjstemp&gid=<?=$gid?><?=$ecms_hashur['ehref']?>"><i class="icon icon-angle-right"></i> <span>JS调用登陆模板</span></a></li>
				      </ol>
				</li>
				<?
				}
				?>

				<?
				if($r[dotemplate])
				{
				?>
				<li>
					<h4><i class="icon icon-code"></i> <span>JS模板</span> <i class="icon icon-double-angle-right"></i></h4>
					<ol>
						<li><a href="javascript:;" data-url="template/JsTempClass.php?gid=<?=$gid?><?=$ecms_hashur['ehref']?>"><i class="icon icon-angle-right"></i> <span>管理JS模板分类</span></a></li>
						<li><a href="javascript:;" data-url="template/ListJstemp.php?gid=<?=$gid?><?=$ecms_hashur['ehref']?>"><i class="icon icon-angle-right"></i> <span>管理JS模板</span></a></li>
				      </ol>
				</li>
				<?
				}
				?>

				<?
				if($r[dotemplate])
				{
				?>
				<li>
					<h4><i class="icon icon-comment-alt"></i> <span>评论列表模板</span> <i class="icon icon-double-angle-right"></i></h4>
					<ol>
						<li><a href="javascript:;" data-url="template/AddPltemp.php?enews=AddPlTemp&gid=<?=$gid?><?=$ecms_hashur['ehref']?>"><i class="icon icon-angle-right"></i> <span>增加评论模板</span></a></li>
						<li><a href="javascript:;" data-url="template/ListPltemp.php?gid=<?=$gid?><?=$ecms_hashur['ehref']?>"><i class="icon icon-angle-right"></i> <span>管理评论模板</span></a></li>
				      </ol>
				</li>
				<?
				}
				?>

				<?
				if($r[dotemplate])
				{
				?>
				<li>
					<h4><i class="icon icon-print"></i> <span>打印模板</span> <i class="icon icon-double-angle-right"></i></h4>
					<ol>
						<li><a href="javascript:;" data-url="template/AddPrinttemp.php?enews=AddPrintTemp&gid=<?=$gid?><?=$ecms_hashur['ehref']?>"><i class="icon icon-angle-right"></i> <span>增加打印模板</span></a></li>
						<li><a href="javascript:;" data-url="template/ListPrinttemp.php?gid=<?=$gid?><?=$ecms_hashur['ehref']?>"><i class="icon icon-angle-right"></i> <span>管理打印模板</span></a></li>
				      </ol>
				</li>
				<?
				}
				?>

				<?
				if($r[dotemplate])
				{
				?>
				<li>
					<h4><i class="icon icon-copy"></i> <span>自定义页面模板</span> <i class="icon icon-double-angle-right"></i></h4>
					<ol>
				        <li><a href="javascript:;" data-url="template/AddPagetemp.php?enews=AddPagetemp&gid=<?=$gid?><?=$ecms_hashur['ehref']?>"><i class="icon icon-angle-right"></i> <span>增加自定义页面模板</span></a></li>
						<li><a href="javascript:;" data-url="template/ListPagetemp.php?gid=<?=$gid?><?=$ecms_hashur['ehref']?>"><i class="icon icon-angle-right"></i> <span>管理自定义页面模板</span></a></li>
				      </ol>
				</li>
				<?
				}
				?>

				<?
				if($r[dotemplate])
				{
				?>
				<li>
					<h4><i class="icon icon-chat"></i> <span>投票模板</span> <i class="icon icon-double-angle-right"></i></h4>
					<ol>
						<li><a href="javascript:;" data-url="template/AddVotetemp.php?enews=AddVoteTemp&gid=<?=$gid?><?=$ecms_hashur['ehref']?>"><i class="icon icon-angle-right"></i> <span>增加投票模板</span></a></li>
						<li><a href="javascript:;" data-url="template/ListVotetemp.php?gid=<?=$gid?><?=$ecms_hashur['ehref']?>"><i class="icon icon-angle-right"></i> <span>管理投票模板</span></a></li>
				      </ol>
				</li>
				<?
				}
				?>

				<?
				if($r[dobq])
				{
				?>
				<li>
					<h4><i class="icon icon-cog"></i> <span>标签</span> <i class="icon icon-double-angle-right"></i></h4>
					<ol>
						<li><a href="javascript:;" data-url="template/BqClass.php?gid=<?=$gid?><?=$ecms_hashur['ehref']?>"><i class="icon icon-angle-right"></i> <span>管理标签分类</span></a></li>
						<li><a href="javascript:;" data-url="template/ListBq.php?gid=<?=$gid?><?=$ecms_hashur['ehref']?>"><i class="icon icon-angle-right"></i> <span>管理标签</span></a></li>
				      </ol>
				</li>
				<?
				}
				?>

				<?
				if($r['dotempgroup']||$r['dotemplate'])
				{
				?>
				<li>
					<h4><i class="icon icon-th"></i> <span>模板组管理</span> <i class="icon icon-double-angle-right"></i></h4>
					<ol>
					<?php
					if($r['dotemplate'])
					{
					?>
						<li><a href="javascript:;" data-url="template/EditTempid.php?gid=<?=$gid?><?=$ecms_hashur['ehref']?>"><i class="icon icon-angle-right"></i> <span>修改模板ID</span></a></li>
					<?php
					}
					?>
					<?php
					if($r['dotempgroup'])
					{
					?>
						<li><a href="javascript:;" data-url="template/TempGroup.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>导入/导出模板组</span></a></li>
					<?php
					}
					?>
				      </ol>
				</li>
				<?
				}
				?>

				<?
				if($r[dotemplate])
				{
				?>
				<li>
					<h4><i class="icon icon-cog"></i> <span>其他相关</span> <i class="icon icon-double-angle-right"></i></h4>
					<ol>
				        <li><a href="javascript:;" data-url="template/LoadTemp.php?gid=<?=$gid?><?=$ecms_hashur['ehref']?>"><i class="icon icon-angle-right"></i> <span>批量导入栏目模板</span></a></li>
						<li><a href="javascript:;" data-url="template/ChangeListTemp.php?gid=<?=$gid?><?=$ecms_hashur['ehref']?>"><i class="icon icon-angle-right"></i> <span>批量更换列表模板</span></a></li>
						<li><a href="javascript:;" data-url="template/RepTemp.php?gid=<?=$gid?><?=$ecms_hashur['ehref']?>"><i class="icon icon-angle-right"></i> <span>批量替换模板字符</span></a></li>
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