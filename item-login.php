<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">

<title>无标题文档</title>
</head>
<body class="text-center">
<?php 
if(isset($_POST['button'])){//判断是否点击了按钮
	//用户输入的用户名和密码
	$username=$_POST['username'];
	$pwd=$_POST['pwd'];
	//连接数据库
	mysql_connect('localhost:3306','root','12345678') or die('数据库连接失败');
	mysql_select_db('ide');//选择数据库
	mysql_query('set names utf8');//设置客户端字符编码
	$sql="select * from user where username='$username' and password='$pwd'";
	$rs=mysql_query($sql);
	//获取结果集的记录数
	if(mysql_num_rows($rs)==1){
		header('location:showgoods.php');//用header(location:url地址)跳转页面
	}else{
		echo "<script>alert('登陆失败')</script>";
	}
}
?>
    <form action="" method="post" class="form-signin" style="width: 100%;max-width: 330px;padding: 15px;margin: 30px auto;">
      <img class="mb-4" src="images/login.jpg" alt="" width="102" height="102">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="" class="sr-only">User address</label>
      <input type="text" id="inputText" class="form-control" placeholder="Email address" required autofocus style="height: 45px;border-radius: 0px;" name="username" type="text">
      <label for="inputPassword" class="sr-only" >Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" required style="height: 45px;border-top:none; border-radius: 0px;" name="pwd" type="password">
      <div class="checkbox mb-3" style="width: 120px;margin: 10px auto;">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-bottom: 10px;" name="button">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
  </body>
</html>