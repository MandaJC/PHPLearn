<?php
/**
 * Created by PhpStorm.
 * User: lyzwj
 * Date: 2018/6/29
 * Time: 10:16
 */
include("connectsql.php");
$sql = "SELECT id, name, portrait,comment FROM headimg natural join testjoin";
$result = $conn->query($sql);
$row = $result->fetchAll();
echo json_encode($row);

