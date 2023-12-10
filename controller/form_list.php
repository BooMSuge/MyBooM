<?php
include "../model/db.php"; // 数据库连接

// 使用更具选择性的查询
$sql = "SELECT o.id, o.boss_username, o.game_category, o.customer_service, o.start_time, o.notes, o.gameup, o.state, o.play_user, p.amount AS playuser_amount, o.st_time
FROM order_records o
JOIN playusers p ON o.boss_username = p.username;";

// 使用预处理语句
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

$data = array();
if ($result->num_rows > 0) {
    // 输出每行数据
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    // 返回 JSON 数据
    $response = ["code" => 0, "msg" => "", "count" => count($data), "data" => $data];
} else {
    $response = ["code" => 0, "msg" => "无数据", "count" => 0, "data" => []];
}

header('Content-Type: application/json');
echo json_encode($response);

// 关闭连接
$stmt->close();
$conn->close();
?>
