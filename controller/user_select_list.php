<?php
include "../model/db.php"; // 数据库连接

session_start();
$currentUsername = $_SESSION['user'] ?? ''; // 确保当前用户名已定义

$gameCategory = $_GET['game_category'] ?? '';
$customerService = $_GET['customer_service'] ?? '';
$state = $_GET['state'] ?? '';

$sql = "SELECT o.*, p.amount AS playuser_amount FROM order_records o JOIN playusers p ON o.boss_username = p.username WHERE o.boss_username = ?";

$params = [$currentUsername]; // 初始化参数数组
$types = "s"; // 参数类型

if ($gameCategory !== '') {
    $sql .= " AND o.game_category LIKE ?";
    $params[] = '%' . $gameCategory . '%';
    $types .= "s";
}
if ($customerService !== '') {
    $sql .= " AND o.customer_service LIKE ?";
    $params[] = '%' . $customerService . '%';
    $types .= "s";
}
if (isset($state) && $state !== '') {
    $sql .= " AND o.state = ?";
    $params[] = $state;
    $types .= "s";
}

$stmt = $conn->prepare($sql);
$stmt->bind_param($types, ...$params);
$stmt->execute();
$result = $stmt->get_result();

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

$stmt->close();
$conn->close();

$response = [
    'code' => 0,
    'msg'  => '',
    'count' => count($data),
    'data' => $data
];

header('Content-Type: application/json');
echo json_encode($response);
?>
