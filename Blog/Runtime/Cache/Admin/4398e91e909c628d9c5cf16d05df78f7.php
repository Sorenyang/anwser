<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>属性添加页</title>
	<link rel="stylesheet" href="__PUBLIC__/Css/public.css" />
</head>
<body>
	<form action="<?php echo U(GROUP_NAME.'/User/addHandel');?>" method="post">
		<table class="table">
			<tr>
				<th colspan="2">添加用户</th>
			</tr>
			<tr>
				<td align="right" >用户名称</td>
				<td>
					<input type="text" name="username" />
				</td>
			</tr>
			<tr>
				<td align="right">用户密码</td>
				<td>
					<input type="text" name="password" />
				</td>
			</tr>
			<tr>
					<td colspan="2" align="center">
						<input type="submit" value="保存" />
					</td>
			</tr>
		</table>	
	</form>

</body>
</html>