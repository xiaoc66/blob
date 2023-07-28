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
			<h3>用户面板</h3>
			<ul class="scrollbar-hover">
				<li>
					<h4><i class="icon icon-user"></i> <span>用户管理</span> <i class="icon icon-double-angle-right"></i></h4>
					<ol>
				        <li><a href="javascript:;" data-url="user/EditPassword.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>修改个人资料</span></a></li>
						<?
						if($r[dogroup])
						{
						?>
				        <li><a href="javascript:;" data-url="user/ListGroup.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理用户组</span></a></li>
						<?
						}
						if($r[douserclass])
						{
						?>
						<li><a href="javascript:;" data-url="user/UserClass.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理部门</span></a></li>
						<?
						}
						if($r[douser])
						{
						?>
						<li><a href="javascript:;" data-url="user/ListUser.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理用户</span></a></li>
						<?
						}
						if($r[dolog])
						{
						?>
						<li><a href="javascript:;" data-url="user/ListLog.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理登陆日志</span></a></li>
						<li><a href="javascript:;" data-url="user/ListDolog.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理操作日志</span></a></li>
						<?
						}
						if($r[doadminstyle])
						{
						?>
						<li><a href="javascript:;" data-url="template/AdminStyle.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理后台风格</span></a></li>
						<?
						}
						?>
				      </ol>
				</li>

				<?
				if($r[domember]||$r[domemberf])
				{
				?>
				<li>
					<h4><i class="icon icon-group"></i> <span>会员管理</span> <i class="icon icon-double-angle-right"></i></h4>
					<ol>
						<?
						if($r[domember])
						{
						?>
						<li><a href="javascript:;" data-url="member/ListMember.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理会员</span></a></li>
						<li><a href="javascript:;" data-url="member/ListMemberMore.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理会员(详细)</span></a></li>
						<li><a href="javascript:;" data-url="member/ClearMember.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>批量清理会员</span></a></li>
						<?
						}
						if($r['domembergroup'])
						{
						?>
						<li><a href="javascript:;" data-url="member/ListMemberGroup.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>会员组</span></a></li>
						<?php
						}
						if($r['doingroup'])
						{
						?>
						<li><a href="javascript:;" data-url="member/ListInGroup.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>会员内部组</span></a></li>
						<?php
						}
						if($r['doviewgroup'])
						{
						?>
						<li><a href="javascript:;" data-url="member/ListViewGroup.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>会员访问组</span></a></li>
						<?php
						}
						if($r['domadmingroup'])
						{
						?>
						<li><a href="javascript:;" data-url="member/ListMAdminGroup.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>会员管理组</span></a></li>
						<?php
						}
						if($r[domemberf])
						{
						?>
						<li><a href="javascript:;" data-url="member/ListMemberF.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理会员字段</span></a></li>
						<li><a href="javascript:;" data-url="member/ListMemberForm.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理会员表单</span></a></li>
						<?
						}
						?>
				      </ol>
				</li>
				<?
				}
				?>

				<?
				if($r[dospacestyle]||$r[dospacedata])
				{
				?>
				<li>
					<h4><i class="icon icon-home"></i> <span>会员空间管理</span> <i class="icon icon-double-angle-right"></i></h4>
					<ol>
						<?
						if($r[dospacestyle])
						{
						?>
				        <li><a href="javascript:;" data-url="member/ListSpaceStyle.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理空间模板</span></a></li>
						<?
						}
						if($r[dospacedata])
						{
						?>
						<li><a href="javascript:;" data-url="member/MemberGbook.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理空间留言</span></a></li>
						<li><a href="javascript:;" data-url="member/MemberFeedback.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理空间反馈</span></a></li>
						<?
						}
						?>
				      </ol>
				</li>
				<?
				}
				?>

				<?
				if($r[domemberconnect])
				{
				?>
				<li>
					<h4><i class="icon icon-cogs"></i> <span>外部接口</span> <i class="icon icon-double-angle-right"></i></h4>
					<ol>
						<li><a href="javascript:;" data-url="member/MemberConnect.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理外部登录接口</span></a></li>
				      </ol>
				</li>
				<?
				}
				?>

				<?
				if($r[docard]||$r[dosendemail]||$r[domsg]||$r[dobuygroup])
				{
				?>
				<li>
					<h4><i class="icon icon-cog"></i> <span>其他功能</span> <i class="icon icon-double-angle-right"></i></h4>
					<ol>
						<?
						if($r[dobuygroup])
						{
						?>
				        <li><a href="javascript:;" data-url="member/ListBuyGroup.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理充值类型</span></a></li>
						<?
						}
						if($r[docard])
						{
						?>
						<li><a href="javascript:;" data-url="member/ListCard.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>管理点卡</span></a></li>
						<li><a href="javascript:;" data-url="member/GetFen.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>批量赠送点数</span></a></li>
						<?
						}
						if($r[dosendemail])
						{
						?>
						<li><a href="javascript:;" data-url="member/SendEmail.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>批量发送邮件</span></a></li>
						<?
						}
						if($r[domsg])
						{
						?>
						<li><a href="javascript:;" data-url="member/SendMsg.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>批量发送短消息</span></a></li>
						<li><a href="javascript:;" data-url="member/DelMoreMsg.php<?=$ecms_hashur['whehref']?>"><i class="icon icon-angle-right"></i> <span>批量删除短消息</span></a></li>
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