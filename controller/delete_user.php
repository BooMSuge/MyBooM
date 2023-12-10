<?php
include "../model/db.php"; // 数据库连接

$id = $_POST['id'];

// 删除 SQL 语句
$sql = "DELETE FROM playusers WHERE id = ?";
$stmt = $conn->prepare($sql);

// 绑定参数
$stmt->bind_param("i", $id); // "i" 表示参数是整数类型

// 执行
$result = $stmt->execute();

echo json_encode(["success" => $result]);
?>
