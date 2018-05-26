<?php 
@$id=$_GET['id'];
mysql_connect('localhost','root','12345678')or die(mysql_error());
mysql_select_db('ide');
mysql_query('set names utf8');
//拼接sql语句，删除
$sql="delete from item_goods where goods_id=$id";
if(mysql_query($sql)){
	header('location:admin.php');
}else{
	die(mysql_error());
}

?>