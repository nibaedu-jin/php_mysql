<?php
// 给浏览器的HTML头 设置为utf-8格式
header('Content-type:text/html;charset=utf-8');
// 数据库链接信息
// ->> 数据库地址 本地一般为 localhost
define('db_host','127.0.0.1');
// ->> 登录数据库的用户名
define('db_user','root');
// ->> 登录数据库的密码
define('db_password','');
// ->> 登录进哪一个库
define('db_name','test');

// 从 Post 请求中获取到数据
// $username = $_POST['username'];
// $password = $_POST['password'];

// 连接数据库
$connect = mysqli_connect(db_host,db_user,db_password,db_name);
if(!$connect){
  die('数据库连接失败，错误信息：'.mysqli_connect_error());
}
$query =  "insert into user ( user_order , user_name, user_description,login_password,role_name,"
        . " organization_name,user_configuration,enable,login_frequency,last_login_time,"
        . " create_date,create_person,update_person,update_date )"
        . " values ( '10','study','学习学习再学习','123456','role_01',"
        . " '青葱','type_01','yes','10',now(),"
        . " now(),'001','001',now() )";
//echo $query;
$result = $connect->query($query);
$id = mysqli_insert_id($connect);
if( !$result ){
  echo $connect->error;
}else{
  // 反馈处理结果给前端
  echo "<h1>注册成功</h1> 用户ID为：" . $id ;
}

?>


<!--  2用户表
create table user(
  user_code int not null AUTO_INCREMENT,
  user_order int not null,
  user_name varchar(32) not null ,
  user_description varchar(32) not null,
  login_password varchar(32) not null,
  role_name varchar(32) not null,
  organization_name varchar(32) not null,
  user_configuration varchar(32) not null,
  enable varchar(32) not null,
  login_frequency varchar(32) not null,
  last_login_time varchar(32) not null,
  create_date varchar(32) not null,
  create_person varchar(32) not null,
  update_person varchar(32) not null,
  update_date varchar(32) not null,
  PRIMARY KEY (user_code)
);

insert into user ( user_order , user_name, user_description,login_password,role_name,
organization_name,user_configuration,enable,login_frequency,last_login_time,
create_date,create_person,update_person,update_date )
values
( '10','study','学习学习再学习','123456','role_01',
'青葱','type_01','yes','10',now(),
now(),'001','001',now()
)


-->
