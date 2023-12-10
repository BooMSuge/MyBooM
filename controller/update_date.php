<?php
include "../model/db.php"; // 数据库连接
// 检查是否有 POST 请求

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 获取前端发送的数据
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $play_user = isset($_POST['play_user']) ? $_POST['play_user'] : '';
    $gameup = isset($_POST['gameup']) ? $_POST['gameup'] : '';
    $start_time = isset($_POST['start_time']) ? $_POST['start_time'] : '';
    $st_time = isset($_POST['st_time']) ? $_POST['st_time'] : '';
    $state = isset($_POST['state']) ? $_POST['state'] : '';
    $notes = isset($_POST['notes']) ? $_POST['notes'] : '';

    // 准备SQL查询语句，使用占位符
    $sql = "UPDATE order_records SET gameup=?, start_time=?, st_time=?, play_user=?, state=?, notes=? WHERE id=?";

    // 使用预处理语句
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssi", $gameup, $start_time, $st_time, $play_user,$state, $notes, $id);

    // 执行预处理语句
    if ($stmt->execute()) {
        echo "success";
    } 
    // 关闭预处理语句和连接
    $stmt->close();
    $conn->close();
}
?>
