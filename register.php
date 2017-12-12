<?php
 	$username=$_POST['username'];
 	$pwd=$_POST['pwd'];
 	$pwd2=$_POST['pwd2'];
 	//用户名不能为空
 	if($username == ''){
 		exit("用户名不能为空");
 	}
 	//密码不能为空
 	if($pwd ==''){
 		exit("密码不能为空");
 	}
 	//确认密码与密码是相同的
 	if($pwd!=$pwd2){
 		exit("密码与确认密码必须相同");
 	}
 	$link=mysqli_connect("localhost","root","","love");
 	if($link){
 		mysqli_query($link,"set names utf8");
 		$pwd=md5($pwd);
 		//查询数据库并返回值相同返回1
 		$s="select * from user where username='{$username}'";
 		$re=mysqli_query($link,$s);
 		$data=mysqli_fetch_assoc($re);
 		//判断用户名是否重名
 		if(!$data){
 		$sql="insert into user (username,pwd)values('{$username}','{$pwd}')";
 		mysqli_query($link,$sql);
 		if(mysqli_affected_rows($link)==1){
 			echo"注册成功,自动跳转至登陆界面";
 			echo "<meta http-equiv=refresh content='1; url=login.html'>"; 
 		}
 		else{
 			echo "注册失败";
 		}
 	}
 	else{
 		echo "用户名已存在";
 	}
 	}
  ?>