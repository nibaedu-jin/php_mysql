<?php
// 给浏览器的HTML头 设置为utf-8格式
header('Content-type:text/html;charset=utf-8');


// 数据库链接信息
// ->> 数据库地址 本地一般为 localhost
define('db_host','localhost');
// ->> 登录数据库的用户名
define('db_user','root');
// ->> 登录数据库的密码
define('db_password','password');
// ->> 登录进哪一个库
define('db_name','user');

// 从 Post 请求中获取到数据
$username = $_POST['username'];
$password = $_POST['password'];

// 连接数据库
$connect = mysqli_connect(db_host,db_user,db_password,db_name);
if(!$connect){
  die('数据库连接失败，错误信息：'.mysqli_connect_error());
}
$query = "INSERT INTO account( user, count )
VALUES ('".$username."','".$password."')";
//echo $query;
$result = $connect->query($query);
if( !$result ){
  echo $connect->error;
}else{
  echo $result;
  // 反馈处理结果给前端
  echo "<h1>注册成功</h1>";
}

?>
