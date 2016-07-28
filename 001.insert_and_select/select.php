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

// 连接数据库
$connect = mysqli_connect(db_host,db_user,db_password,db_name);
if(!$connect){
  die('数据库连接失败，错误信息：'.mysqli_connect_error());
}
$query = "select * from user";
//echo $query;
$result = $connect->query($query);
if( !$result ){
  echo $connect->error;
}else{
  echo "<table border=1>";
  echo "<tr>";
  echo "<th>用户编码</th>";
  echo "<th>用户顺序</th>";
  echo "<th>用户名</th>";
  echo "<th>用户描述</th>";
  echo "<th>登录密码</th>";
  echo "<th>角色名</th>";
  echo "<th>组织名</th>";
  echo "<th>用户配置</th>";
  echo "<th>是否有效</th>";
  echo "<th>登录频率</th>";
  echo "<th>最后登录时间</th>";
  echo "<th>创建时间</th>";
  echo "<th>创建人</th>";
  echo "<th>修改人</th>";
  echo "<th>修改时间</th>";
  echo "</tr>";

  while($row = $result->fetch_assoc()){
    echo "<tr>";
    echo "<td>" . $row['user_code'] . "</td>";
    echo "<td>" . $row['user_order'] . "</td>";
    echo "<td>" . $row['user_name'] . "</td>";
    echo "<td>" . $row['user_description'] . "</td>";
    echo "<td>" . $row['login_password'] . "</td>";
    echo "<td>" . $row['role_name'] . "</td>";
    echo "<td>" . $row['organization_name'] . "</td>";
    echo "<td>" . $row['user_configuration'] . "</td>";
    echo "<td>" . $row['enable'] . "</td>";
    echo "<td>" . $row['login_frequency'] . "</td>";
    echo "<td>" . $row['last_login_time'] . "</td>";
    echo "<td>" . $row['create_date'] . "</td>";
    echo "<td>" . $row['create_person'] . "</td>";
    echo "<td>" . $row['update_person'] . "</td>";
    echo "<td>" . $row['update_date'] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
}

?>
