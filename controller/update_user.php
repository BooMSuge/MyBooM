<?php
include "../model/db.php";

$id = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];
$amount = $_POST['amount'];

$amount = empty($amount) ? NULL : $amount;

$checkSql = "SELECT * FROM playusers WHERE username = ? AND id != ?";
$stmt = $conn->prepare($checkSql);
$stmt->bind_param("si", $username, $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
	echo json_encode(["success" => false, "message" => "用户名已存在"]);
	exit;
}

$sql = "UPDATE playusers SET username = ?, password = ?, amount = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
if ($stmt === false) {
	echo json_encode(["success" => false, "message" => "SQL语句准备失败: " . $conn->error]);
	exit;
}

$stmt->bind_param("sssi", $username, $password, $amount, $id);
if ($stmt->execute()) {
	echo json_encode(["success" => true, "message" => "用户信息更新成功"]);
} else {
	echo json_encode(["success" => false, "message" => "更新失败: " . $stmt->error]);
}
