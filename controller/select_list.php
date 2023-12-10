<?php
include "../model/db.php"; // 数据库连接

$bossNickname = isset($_GET['boss_username']) ? $_GET['boss_username'] : '';
$gameCategory = isset($_GET['game_category']) ? $_GET['game_category'] : '';
$customerService = isset($_GET['customer_service']) ? $_GET['customer_service'] : '';
$state = isset($_GET['state']) ? $_GET['state'] : '';

// 构建查询语句
$sql = "SELECT o.id, o.boss_username, o.game_category, o.customer_service, o.start_time, o.notes, o.gameup, o.state, o.play_user, p.amount AS playuser_amount, o.st_time
FROM order_records o
JOIN playusers p ON o.boss_username = p.username WHERE 1";

// 应用过滤条件
if ($bossNickname !== '') {
    $sql .= " AND o.boss_username LIKE '%" . $conn->real_escape_string($bossNickname) . "%'";
}
if ($gameCategory !== '') {
    $sql .= " AND o.game_category LIKE '%" . $conn->real_escape_string($gameCategory) . "%'";
}
if ($customerService !== '') {
    $sql .= " AND o.customer_service LIKE '%" . $conn->real_escape_string($customerService) . "%'";
}
if ($state !== '') {
    $sql .= " AND o.state = '" . $conn->real_escape_string($state) . "'";
}

// 执行查询
$result = $conn->query($sql);

$data = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    $result->free();
}

// 关闭数据库连接
$conn->close();

// 构建符合规范的JSON响应
$response = [
    'code' => 0,
    'msg'  => '',
    'count' => count($data),
    'data' => $data
];

header('Content-Type: application/json');
echo json_encode($response);
?>
