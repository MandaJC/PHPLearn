<?php
/**
 * Created by PhpStorm.
 * User: lyzwj
 * Date: 2018/6/28
 * Time: 19:17
 */
//获取客户端传入的json数据，用户名和密码
include("connectsql.php");
//获取客户端传入的json数据，用户名和密码
$json = $_REQUEST;
$name = $json["name"];
$sql = "SELECT portrait FROM headimg WHERE name='$name'";
$result = $conn->query($sql);
$row = $result->fetch();
if ($row == null) {
    $response['portrait'] = "不存在";
} else {
    $response['portrait'] = $row["portrait"];
}
$conn = null;
header('Content-type: application/json');
echo json_encode($response);
?>