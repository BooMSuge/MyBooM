<?php
include "../model/db.php"; // 数据库连接
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bossUsername = $_POST['boss_username'];
    $gameCategory = $_POST['game_category'];
    $customerService = $_POST['customer_service'];
    $notes = $_POST['notes'];
    $gameup = $_POST['gameup'];
    $starttime = $_POST['start_time'];

    $stmt = $conn->prepare("INSERT INTO order_records (boss_username, game_category, customer_service, notes, gameup, start_time) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $bossUsername, $gameCategory, $customerService, $notes, $gameup, $starttime); // 绑定参数
    // 绑定其他参数...

    if ($stmt->execute()) {
        echo "记录已成功添加";
    } else {
        echo "错误: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
