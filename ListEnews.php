<?php
define('EmpireCMSAdmin','1');
require("../class/connect.php");
require("../class/db_sql.php");
require("../class/functions.php");
$link=db_connect();
$empire=new mysqlquery();
//验证用户
$lur=is_login();
$logininid=(int)$lur['userid'];
$loginin=$lur['username'];
$loginrnd=$lur['rnd'];
$loginlevel=$lur['groupid'];
$loginadminstyleid=$lur['adminstyleid'];
//ehash
$ecms_hashur=hReturnEcmsHashStrAll();

$user_r=$empire->fetch1("select adminclass,groupid from {$dbtbpre}enewsuser where userid='$logininid'");
//用户组权限
$gr=$empire->fetch1("select doall from {$dbtbpre}enewsgroup where groupid='$user_r[groupid]'");
if($gr['doall'])
{
	$fcfile='../data/fc/ListEnews.php';
}
else
{
	$fcfile='../data/fc/ListEnews'.$logininid.'.php';
}
$fclistenews='';
if(file_exists($fcfile))
{
	$fclistenews=str_replace(AddCheckViewTempCode(),'',ReadFiletext($fcfile));
}
//数据表
$changetbs='';
$dh='';
$tbi=0;
$tbsql=$empire->query("select tbname,tname from {$dbtbpre}enewstable order by tid");
while($tbr=$empire->fetch($tbsql))
{
	$tbi++;
	$changetbs.=$dh.'new ContextItem("'.$tbr['tname'].'",function(){ parent.document.main.location="ListAllInfo.php?tbname='.$tbr['tbname'].$ecms_hashur['ehref'].'"; })';
	if($tbi%3==0)
	{
		$changetbs.=',new ContextSeperator()';
	}
	$dh=',';
}
?>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>后台管理系统</title>
		<link rel="stylesheet" href="<?=$a?>adminstyle/<?=$loginadminstyleid?>/dist/css/zui.min.css" />
		<link rel="stylesheet" href="<?=$a?>adminstyle/<?=$loginadminstyleid?>/style/css/style.css">
  		<!--[if lt IE 9]>
		  	<script src="<?=$a?>adminstyle/<?=$loginadminstyleid?>/dist/lib/ieonly/html5shiv.js"></script>
		<![endif]-->
  		<!--[if lt IE 9]>
		  	<script src="<?=$a?>adminstyle/<?=$loginadminstyleid?>/dist/lib/ieonly/respond.js"></script>
		<![endif]-->
	</head>
	<body>

		<div class="m_nav_iframe">
			<h3>管理信息</h3>
			<ul class="scrollbar-hover">
				<?php
				echo $fclistenews;
				?>
			</ul>
		</div>
		<script type="text/javascript" src="<?=$a?>adminstyle/<?=$loginadminstyleid?>/dist/lib/jquery/jquery.js"></script>
		<script type="text/javascript" src="<?=$a?>adminstyle/<?=$loginadminstyleid?>/dist/js/zui.min.js" ></script>
		<script type="text/javascript" src="<?=$a?>adminstyle/<?=$loginadminstyleid?>/style/js/page.js"></script>
		<script type="text/javascript">
			$(".m_nav_iframe li:not(ol li)").each(function(){
				if($(this).find("h4").length == 0 ){
					$(this).find("a").wrap("<h4></h4>")
				}
			})
			$(".m_nav_iframe ol li a , .m_nav_iframe h4 a").each(function(){
				var jhc=String($(this).attr('data-url'));

				if(jhc.indexOf('?')==-1)jhc=jhc+'?';

				jhc=jhc.replace(/\?/,'?<?=$ecms_hashur['href']?>&');

				$(this).attr("data-url",jhc);
			    return true;
			})
		</script>
	</body>
</html>
<?php
db_close();
$empire=null;
?>