<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
//特殊提示
if($GLOBALS['ecmsadderrorurl'])//增加信息
{
	$error='<br>'.$error.'<br><br><a href="'.$GLOBALS['ecmsadderrorurl'].'">返回信息列表</a>';
}

//风格
$loginadminstyleid=EcmsReturnAdminStyle();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="initial-scale=1,maximum-scale=1, minimum-scale=1">
<title>信息提示</title>
<link rel="stylesheet" href="<?=$a?>adminstyle/<?=$loginadminstyleid?>/dist/css/zui.min.css" />
<?php
if(!$noautourl)
{
?>
<SCRIPT language=javascript>
var secs=2;//3秒
for(i=1;i<=secs;i++)
{ window.setTimeout("update(" + i + ")", i * 1000);}
function update(num)
{
if(num == secs)
{ <?=$gotourl_js?>; }
else
{ }
}
</SCRIPT>
<?
}
?>
<style type="text/css">
body{
	background:#f5f5f5;
}
.modal{
	display:block;
	margin-top:150px;
}
.modal p{
	text-align:center;
}
</style>
</head>

<body>



<div class="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">关闭</span></button>
        <h4 class="modal-title">信息提示</h4>
      </div>
      <div class="modal-body">
        <p><font size="+2"><?=$error?></font></p>
        <p><a href="<?=$gotourl?>">如果您的浏览器没有自动跳转，请点击这里</a></p>
      </div>
    </div>
  </div>
</div>

</body>
</html>