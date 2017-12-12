<?php
 	$username=$_POST['username'];
 	$pwd=$_POST['pwd'];
 	//用户名不能为空
 	if($username == ''){
 		exit("用户名不能为空");
 	}
 	//密码不能为空
 	if($pwd ==''){
 		exit("密码不能为空");
 	}
 	$link=mysqli_connect("localhost","root","","love");
 	if($link){
 		mysqli_query($link,"set names utf8");
 		$pwd=md5($pwd);//将密码设置为乱码
 		$sql="select * from user where username='{$username}' and pwd='{$pwd}'";
 		$re=mysqli_query($link,$sql);
 		$data=mysqli_fetch_assoc($re);
 		if($data){
 		echo "<script language='javascript'>"; 
		echo " location='index.html';"; 
		echo "</script>";
 		 }
 		 else{
 		echo "用户名与密码不正确";
 	}}
  ?>