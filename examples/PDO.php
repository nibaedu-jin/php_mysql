<?php
//给浏览器的HTML头 设置为utf-8格式
header('Content-type:text/html;charset=utf-8');

//数据库连接 使用pdo方式
$id = new PDO("mysql:host=localhost;",'root','pwd')or die("数据库链接失败");
$id -> query("set names utf8");
$id -> query("use lt");

//新建变量，并将指赋为在Post中拿到的指
$username = $_POST["username"];
$password = $_POST["password"];
$email = $_POST["email"];

//sql语句 插入数据(名称，密码，邮箱)到user表
$sql = "insert into user (username,pwd,email) VALUES ('$username', '$password', '$email')";
$result = $id->query($sql) or die("失败");

if($result) {
    echo "<h1> 成功 <h1>";
    echo "<br />";
    echo "姓名是: <code> $username </code>";
    echo "<br />";
    echo "密码是: <code> $password </code>";
    echo "<br />";
    echo "邮箱是: <code> $email </code>";
}
?>
