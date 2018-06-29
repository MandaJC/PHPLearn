<?php
/**
 * Created by PhpStorm.
 * User: lyzwj
 * Date: 2018/6/28
 * Time: 18:14
 */

$servername = "localhost";
$username = "root";
$password = "zcl";
$dbname = "test";
$port = "3306";
try {
    $conn = new PDO("mysql:host=$servername;port=3306;dbname=$dbname", $username, $password);
    $conn->exec("SET CHARACTER SET utf8");
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}