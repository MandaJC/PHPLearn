<?php
/**
 * Created by PhpStorm.
 * User: lyzwj
 * Date: 2018/6/29
 * Time: 10:42
 */
//echo "<table style='border: solid 1px black;'>";
//echo "<tr><th>Id</th><th>Firstname</th><th>Lastname</th></tr>";

class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return parent::current();
    }

    function beginChildren() {
        echo "{";
    }

    function endChildren() {
        echo "},";
    }
}

$servername = "localhost";
$username = "root";
$password = "zcl";
$dbname = "test";
$port = "3306";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM headimg");
    $stmt->execute();

    // 设置结果集为关联数组
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
        echo '"'.$k.'"'.":".'"'.$v.'"'.",";
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
//echo "</table>";
?>