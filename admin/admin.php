<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
<link type="text/css" href="../css/bootstrap.min.css" rel="stylesheet"/>
<style>
table{margin: 0 auto;border-collapse: collapse;text-align: center;border:1px solid #000;}
td,th,tr{border:1px solid #000;}
</style>
<script>
function jump(id){
	if(confirm('确定要删除吗')){
		location.href='del.php?id='+id;
	}
}
</script>
</head>
<?php
$link=mysql_connect('localhost','root','12345678') or die('连接失败');
mysql_query("use ide")or die("选择失败");
mysql_query("set names utf8");
$rs=mysql_query('select * from item_goods');
?>

<table>
	<tr>
		<th>商品编号</th>
		<th>商品名称</th>
		<th>商品类型</th>
		<th>商品图片</th>
		<th>商品价格</th>
		<th>品牌分类</th>
		<th>是否上架</th>
		<th>商品是否卖空</th>
		<th>修改</th>
		<th>删除</th>
	</tr>
<a href="add.php" style="position: fixed">添加商品</a>
<?php
while($rows=mysql_fetch_assoc($rs)){
	echo '<tr>';
	echo '<td>'.$rows['goods_id'].'</td>';
	echo '<td>'.$rows['goods_name'].'</td>';
	echo '<td>'.$rows['goods_cate'].'</td>';
	echo $rows['goods_img']==''?'<td>图片暂缺</td>':'<td><img src="'.$rows['goods_img'].'"/></td>';
	echo '<td>'.$rows['goods_price'].'</td>';
	echo '<td>'.$rows['brand_name'].'</td>';
	echo '<td>'.$rows['is_show'].'</td>';
	echo '<td>'.$rows['is_saleoff'].'</td>';
	echo '<td><input type="button" value="修改" onclick="location.href=\'modify.php?id='.$rows['goods_id'].'\'"/></td>';
	echo '<td><input type="button" value="删除"  onclick="jump('.$rows['goods_id'].')"/></td>';
	echo '</tr>';
}
?>
</table>
<body>
</body>
</html>