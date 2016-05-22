<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<link rel="stylesheet" href="__PUBLIC__/Css/public.css" />
	<title>回收站</title>
</head>
<body>
	<table class="table">
		<tr>
				<th colspan="6">回收站</th>
		</tr>
		<tr>
			<th>ID</th>
			<th>用户名</th>
			<th>密码</th>
			<th>登陆时间</th>
			<th>登录ip</th>
			<th>操作</th>
		</tr>
		<?php if(is_array($users)): foreach($users as $key=>$v): ?><tr>
				<td><?php echo ($v["id"]); ?></td>
				<td><?php echo ($v["username"]); ?></td>
				<td><?php echo ($v["password"]); ?></td>
				<td><?php echo (date('y-m-d H:i',$v["logintime"])); ?></td>
				<td><?php echo ($v["loginip"]); ?></td>
				<td>
					<a href="<?php echo U(GROUP_NAME.'/User/update',array('id'=>$v['id']));?>">修改</a>
					<a href="<?php echo U(GROUP_NAME.'/User/delete',array('id'=>$v['id']));?>">删除</a>	
				</td>
			</tr><?php endforeach; endif; ?>

	</table>
	

</body>
</html>