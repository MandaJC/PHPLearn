<?php
/**
 * Created by PhpStorm.
 * User: lyzwj
 * Date: 2018/6/28
 * Time: 10:39
 */
include("connectsql.php");
//$name=$password=$sex=$province=$city=$portrait="";//声明数据库内容
$c=$_POST;
$name=$c['name'];
//echo $name;
//$b=$c['password'];
$portrait=$_FILES['portrait'];
//echo $_FILES["portrait"]["name"];

$root_path = "./";//要改的
$access_path="upload/";
$base_path = $root_path . $access_path;

if(!is_dir($base_path)){
    mkdir($base_path,0777,true);
}

//$target_path = $base_path . basename( $_FILES ['portrait'] ['name'] );
$target_path = $base_path . $_FILES ['portrait']['name'];
//echo " " . $target_path;

if (!file_exists($target_path))
{
    move_uploaded_file ( $_FILES ['portrait'] ['tmp_name'], $target_path );
}
$load_path=$access_path . $_FILES["portrait"]["name"];
//echo $load_path;
$sql = "INSERT INTO headimg(name, portrait) VALUES ('$name', '$load_path')";
$result = $conn->exec($sql);
$response = array(
    'name' => $name,
//    'password' => $b,
    'portrait' => $load_path,
);
echo json_encode($response);