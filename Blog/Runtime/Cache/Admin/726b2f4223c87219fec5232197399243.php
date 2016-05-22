<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>用户信息修改页</title>
	<link rel="stylesheet" href="__PUBLIC__/Css/public.css" />
</head>
<body>
	<form action="<?php echo U(GROUP_NAME.'/User/updateHandle');?>" method="post">
		<table class="table">
			<tr>
				<th colspan="2">修改用户信息</th>
			</tr>
			<tr>
				<td align="right" >用户名</td>
				<td>
					<input type="text" name="username"  value="<?php echo ($user["username"]); ?>" />
				</td>
			</tr>
			<tr>
				<td align="right">用户密码</td>
				<td>
					<input type="text" name="password" value="<?php echo ($user["password"]); ?>" />
				</td>
			</tr>
			<tr>
					<td colspan="2" align="center">
						<input type="hidden" name='id'value="<?php echo ($user['id']); ?>" />
						<input type="submit" value="保存" />
					</td>
			</tr>
		</table>	
	</form>

</body>
</html>