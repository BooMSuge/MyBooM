<?php
session_start();
include "../model/db.php"; // 数据库连接

// 获取当前登录的用户名
$currentUsername = $_SESSION['user']; // 替换 'user' 为实际存储用户名的会话键

// 确保用户名已设置
if (!isset($currentUsername)) {
    // 可以返回错误或重定向到登录页面
    die("用户未登录");
}


$stmt = $conn->prepare("SELECT o.id, o.boss_username, o.game_category, o.customer_service, o.start_time, o.notes, o.gameup, o.state, o.play_user, p.amount AS playuser_amount, o.st_time FROM order_records o JOIN playusers p ON o.boss_username = p.username WHERE o.boss_username = ?");

// 绑定参数
$stmt->bind_param("s", $currentUsername);

// 执行查询
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $data = array();

    // 输出每行数据
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    // 返回 Layui 表格期望的 JSON 数据格式
    $response = array(
        "code" => 0,
        "msg" => "",
        "count" => count($data),
        "data" => $data
    );
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // 没有数据时也返回符合规范的响应
    echo json_encode(array("code" => 0, "msg" => "无数据", "count" => 0, "data" => []));
}

// 关闭连接
$stmt->close();
$conn->close();
?>