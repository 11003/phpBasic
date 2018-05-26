<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>商品展示</title>
    <style>
table{margin: 0 auto;border-collapse: collapse;text-align: center;border:1px solid #000;}
td,th,tr{border:1px solid #000;}
</style>
</head>
<body>
<?php
mysql_connect('localhost','root','12345678');
mysql_query('set names utf8');
mysql_select_db('ide');
$rs=mysql_query("select * from item_goods");
?>

<table>
<tr>
	<th>商品标号</th>
    <th>商品名称</th>
    <th>商品类型</th>
    <th>商品图片</th>
    <th>品牌分类</th>
    <th>价格</th>
    <th>是否上架</th>
    <th>商品是否卖空</th>
</tr>
<?php
while($rows=mysql_fetch_object($rs)){
	echo '<tr>';
	echo '<td>'.$rows->goods_id.'</td>';
	echo '<td>'.$rows->goods_name.'</td>';
	echo '<td>'.$rows->goods_cate.'</td>';
	echo $rows->goods_img=""?'<td>图片暂缺</td>':'<td><img src="'.$rows->goods_img.'"/></td>';
	echo '<td style="color:red">'.$rows->goods_price.'</td>';
	echo '<td>'.$rows->brand_name.'</td>';
	echo '<td>'.$rows->is_show.'</td>';
	echo '<td>'.$rows->is_saleoff.'</td>';
	echo '</tr>';
}	

	mysql_free_result($rs);
	mysql_close($link);
?>

</table>






</body>
</html>