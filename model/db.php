<?php
$servername = "localhost";
$username = "sk_kennn_cn";
$password = "a6btJrNwZH4jAYbE";
$dbname = "sk_kennn_cn";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);

// 检查连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

function alert($str, $url) {
    echo "<script>alert('$str');location.href='$url';</script>";
}

