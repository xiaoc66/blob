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
			<h3>扩展项目</h3>
			<ul class="scrollbar-hover">
			<?php
			$b=0;
			//自定义扩展菜单
			$menucsql=$empire->query("select classid,classname from {$dbtbpre}enewsmenuclass where classtype=3 and (groupids='' or groupids like '%,".intval($lur[groupid]).",%') order by myorder,classid");
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
			//没菜单
			if(!$b)
			{
				$notrecordword="<li><a href='javascript:;' data-url='other/MenuClass.php".$ecms_hashur['whehref']."'><i class='icon icon-angle-right'></i> <span>添加扩展菜单</span></a></li>";
				echo"<li><h4><i class='icon icon-cog'></i> <span>扩展管理</span> <i class='icon icon-double-angle-right'></i></h4><ol><li>$notrecordword</li></ol></li>";
			}
			?>
			</ul>
		</div>
		<script type="text/javascript" src="../<?=$loginadminstyleid?>/dist/lib/jquery/jquery.js"></script>
		<script type="text/javascript" src="../<?=$loginadminstyleid?>/dist/js/zui.min.js" ></script>
		<script type="text/javascript" src="../<?=$loginadminstyleid?>/style/js/page.js"></script>
	</body>
</html>