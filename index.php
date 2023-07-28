<?php
define('EmpireCMSAdmin','1');
define('EmpireCMSAPage','login');
define('EmpireCMSNFPage','1');
require("../class/connect.php");
require("../class/functions.php");
//风格
$loginadminstyleid=EcmsReturnAdminStyle();
//变量处理
$empirecmskey1='';
$empirecmskey2='';
$empirecmskey3='';
$empirecmskey4='';
$empirecmskey5='';
if($_POST['empirecmskey1']&&$_POST['empirecmskey2']&&$_POST['empirecmskey3']&&$_POST['empirecmskey4']&&$_POST['empirecmskey5'])
{
	$empirecmskey1=RepPostVar($_POST['empirecmskey1']);
	$empirecmskey2=RepPostVar($_POST['empirecmskey2']);
	$empirecmskey3=RepPostVar($_POST['empirecmskey3']);
	$empirecmskey4=RepPostVar($_POST['empirecmskey4']);
	$empirecmskey5=RepPostVar($_POST['empirecmskey5']);
	$ecertkeyrndstr=$empirecmskey1.'#!#'.$empirecmskey2.'#!#'.$empirecmskey3.'#!#'.$empirecmskey4.'#!#'.$empirecmskey5;
	esetcookie('ecertkeyrnds',$ecertkeyrndstr,0);
}
elseif(getcvar('ecertkeyrnds'))
{
	$certr=explode('#!#',getcvar('ecertkeyrnds'));
	$empirecmskey1=RepPostVar($certr[0]);
	$empirecmskey2=RepPostVar($certr[1]);
	$empirecmskey3=RepPostVar($certr[2]);
	$empirecmskey4=RepPostVar($certr[3]);
	$empirecmskey5=RepPostVar($certr[4]);
}
else
{}


?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="initial-scale=1,maximum-scale=1, minimum-scale=1">
		<title>帝国CMS后台管理系统</title>
		<link rel="stylesheet" href="<?=$a?>adminstyle/<?=$loginadminstyleid?>/dist/css/zui.min.css" />
		<link rel="stylesheet" href="<?=$a?>adminstyle/<?=$loginadminstyleid?>/style/css/login.css" />
  		<!--[if lt IE 9]>
		  	<script src="<?=$a?>adminstyle/<?=$loginadminstyleid?>/dist/lib/ieonly/html5shiv.js"></script>
		<![endif]-->
  		<!--[if lt IE 9]>
		  	<script src="<?=$a?>adminstyle/<?=$loginadminstyleid?>/dist/lib/ieonly/respond.js"></script>
		<![endif]-->
		<script>
		if(self!=top)
		{
			parent.location.href='index.php';
		}
		function CheckLogin(obj){
			if(obj.username.value=='')
			{
				alert('请输入用户名');
				obj.username.focus();
				return false;
			}
			if(obj.password.value=='')
			{
				alert('请输入登录密码');
				obj.password.focus();
				return false;
			}
			if(obj.loginauth!=null)
			{
				if(obj.loginauth.value=='')
				{
					alert('请输入认证码');
					obj.loginauth.focus();
					return false;
				}
			}
			if(obj.key!=null)
			{
				if(obj.key.value=='')
				{
					alert('请输入验证码');
					obj.key.focus();
					return false;
				}
			}

			return true;
		}

		function edoshowkey(showid,vname){
			document.getElementById(showid).innerHTML='<img src="ShowKey.php?v='+vname+'&t='+Math.random()+'" name="'+vname+'KeyImg" id="'+vname+'KeyImg" align="bottom" onclick=edoshowkey("'+showid+'","'+vname+'") title="看不清楚,点击刷新">';
		}
		</script>
	</head>
	<body>
		<div class="login-container">
	        <div class="loginbox">
	            <div class="title">帝国CMS后台管理系统</div>
	            <p class="text">Sign In to your account</p>
	            <div class="or">
	                <div class="or-line"></div>
	                <div class="or-text">Login</div>
	            </div>
	            <form name="login" id="login" method="post" action="ecmsadmin.php" onSubmit="return CheckLogin(document.login);" autocomplete="off">
				    <input type="hidden" name="enews" value="login">
					<input name="eposttime" type="hidden" id="eposttime" value="0">
		            <div class="input-control has-icon-left">
						<input  type="text" name="username" class="form-control" placeholder="用户名">
					  	<label  class="input-control-icon-left"><i class="icon icon-user"></i></label>
					</div>
					<div class="input-control has-icon-left">
						<input type="password" name="password" class="form-control" placeholder="密码">
					  	<label class="input-control-icon-left"><i class="icon icon-key"></i></label>
					</div>
					<?php
					  if($ecms_config['esafe']['loginauth'])
					  {
					?>
					<div class="input-control has-icon-left">
						<input name="loginauth" type="text" class="form-control" placeholder="认证码" id="loginauth">
					  	<label class="input-control-icon-left"><i class="icon icon-lock"></i></label>
					</div>
					<?php
					  }
					?>
					<div class="input-control has-icon-left">
						<select name="equestion" id="equestion" class="form-control" onChange="if(this.options[this.selectedIndex].value==0){showanswer.style.display='none';}else{showanswer.style.display='';}">
			                <option value="0">无安全提问</option>
			                <option value="1">母亲的名字</option>
			                <option value="2">爷爷的名字</option>
			                <option value="3">父亲出生的城市</option>
			                <option value="4">您其中一位老师的名字</option>
			                <option value="5">您个人计算机的型号</option>
			                <option value="6">您最喜欢的餐馆名称</option>
			                <option value="7">驾驶执照的最后四位数字</option>
		              	</select>
					  	<label class="input-control-icon-left"><i class="icon icon-question"></i></label>
					</div>
					<div class="input-control has-icon-left" id="showanswer">
						<input name="eanswer" type="text" class="form-control" placeholder="答案" id="eanswer">
					  	<label class="input-control-icon-left"><i class="icon icon-pencil"></i></label>
					</div>
					<?php
					  if(empty($public_r['adminloginkey']))
					  {
					?>
					<div class="input-control has-icon-left has-icon-right">
						<input type="text" name="key" class="form-control" placeholder="验证码">
						<label  class="input-control-label-right text-right text-red" id="checkkeyshowkey"><a href="#EmpireCMS" onClick="edoshowkey('checkkeyshowkey','checkkey');" title="点击显示验证码">点击显示</a></label>
					  	<label class="input-control-icon-left"><i class="icon icon-shield"></i></label>
					</div>
					<?php
					  }
					?>
		            <div class="input-control">
		                <input type="submit" class="btn btn-block btn-primary" value="登录">
		            </div>
		            <input name="empirecmskey1" type="hidden" id="empirecmskey1" value="<?php echo $empirecmskey1;?>">
	              	<input name="empirecmskey2" type="hidden" id="empirecmskey2" value="<?php echo $empirecmskey2;?>">
	              	<input name="empirecmskey3" type="hidden" id="empirecmskey3" value="<?php echo $empirecmskey3;?>">
	              	<input name="empirecmskey4" type="hidden" id="empirecmskey4" value="<?php echo $empirecmskey4;?>">
	              	<input name="empirecmskey5" type="hidden" id="empirecmskey5" value="<?php echo $empirecmskey5;?>">
	            </form>
	        </div>
	        <div class="copyright">
	        	<p>帝国CMS7.5 后台美化版V2.4 由 <a target="_blank" href="https://www.8ye.net">八爷源码</a> 移植美化</p>
	        </div>
	    </div>
	    <script>
		if(document.login.equestion.value==0){
			showanswer.style.display='none';
		}
		</script>
	</body>
</html>
