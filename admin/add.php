<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>添加商品</title>
<script>
function check(){
	var goods_name=document.getElementById('goods_name');
	if(goods_name.value==''){
		alert('商品名称不能为空');
		goods_name.focus();
		return false;
	}
	var goods_cate=document.getElementById('goods_cate');
	if(goods_cate.value==''){
		alert('商品类型不能为空');
		goods_cate.focus();
		return false;
	}
	var brand_name=document.getElementById('brand_name');
	if(brand_name.value==''){
		alert('商品品牌不能为空');
		brand_name.focus();
		return false;
	}
	var goods_price=document.getElementById('goods_price');
	if(goods_price.value==''||isNaN(goods_price.value)){
	   	alert('商品价格不能为空');
		goods_price.focus();
		return false;
	   }
	
	var is_show=ducument.getElementById('is_show').value;
	if(is_show==''|| isNaN(is_show) || is_show>1 || is_show<0){
		alert("0是没有货了，1是已经上架的");
		is_show.select();
		return false;
	}
	
	var is_saleoff=document.getElementById('is_saleoff').value;
	if(is_saleoff==''||isNaN(is_saleoff)|| is_saleoff.indexOf('.')!=-1){
		alert("必须是整数");
		is_saleoff.select();
		return false;
	}
}	
</script>
</head>
<?php
	if(isset($_POST['button'])){
		$goods_name=$_POST['goods_name'];
		$goods_cate=$_POST['goods_cate'];	
		$goods_img=$_POST['goods_img'];
		$goods_price=$_POST['goods_price'];
		$brand_name=$_POST['brand_name'];
		$is_show=$_POST['is_show'];
		$is_saleoff=$_POST['is_saleoff'];
		
		mysql_connect('localhost','root','12345678');
		mysql_select_db('ide');
		mysql_query('set names utf8');
		
		//拼接sql语句 增加
		$sql="insert into item_goods values(NULL,'$goods_name','$goods_cate','$goods_img','$goods_price','$brand_name','$is_show','$is_saleoff')";
		
		if(mysql_query($sql)){
			echo '<script>alter("添加成功");</script>';
			header('location:admin.php');
		}else{
			echo '<script>alter("添加失败，请重新输入");</script>';
			 }
	}
?>
<body>
<form id="" name="form1" method="post" onSubmit="return check()">
	<table width="400" border="1">
		<tr>
			<td align="center" style="font-weight: 300;font-size: 20px;width:400px">添加商品</td>
		</tr>
		<tr>
			<td>商品编号</td>
			<td>
				<input type="text" name="goods_id" disabled/>
			</td>
		</tr>
		<tr>
			<td>商品名称</td>
			<td>
				<input type="text" name="goods_name"  id="goods_name"/>
			</td>
		</tr>
		<tr>
			<td>商品类型</td>
			<td>
				<input type="text" name="goods_cate"  id="goods_name"/>
			</td>
		</tr>
		<tr>
			<td>商品图片</td>
			<td>
				<input type="text" name="goods_img" value="images/icon01.png"  id="goods_name" />
			</td>
		</tr>
		<tr>
			<td>商品价格</td>
			<td><input type="text" name="goods_price"  id="goods_name"/></td>
		</tr>
		<tr>
			<td>品牌分类</td>
			<td><input type="text" name="brand_name"  id="goods_name"/></td>
		</tr>
		<tr>
			<td>是否上架</td>
			<td><input type="text" name="is_show"  id="goods_name"></td>
		</tr>
		<tr>
			<td>是否卖空</td>
			<td><input type="text" name="is_saleoff"  id="goods_name"></td>
		</tr>
		<tr>
			<td>
				<input type="submit" name="button" value="提交">
				<input type="button" name="button2" value="返回" onClick="location.href='admin.php'">
			</td>
		</tr>
	</table>
</form>
</body>
</html>