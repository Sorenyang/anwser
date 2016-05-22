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
			<th>标题</th>
			<th>所属分类</th>
			<th>点击次数</th>
			<th>发布时间</th>
			<th>操作</th>
		</tr>
		<?php if(is_array($blog)): foreach($blog as $key=>$v): ?><tr>
				<td><?php echo ($v["id"]); ?></td>

				<td>
				<?php echo ($v["title"]); if(is_array($v["attr"])): foreach($v["attr"] as $key=>$value): ?><strong style='color:<?php echo ($value["color"]); ?>'>【<?php echo ($value["name"]); ?>】</strong><?php endforeach; endif; ?>
				
				</td>
				<td><?php echo ($v["catename"]); ?></td>
				<td><?php echo ($v["click"]); ?></td>
				<td><?php echo (date('y-m-d H:i',$v["time"])); ?></td>
				<td>
					<a href="<?php echo U(GROUP_NAME.'/Blog/reback',array('id'=>$v['id']));?>">还原</a>
					<a href="<?php echo U(GROUP_NAME.'/Blog/delete',array('id'=>$v['id']));?>">彻底删除</a>	
				</td>
			</tr><?php endforeach; endif; ?>

	</table>
	
</body>
</html>