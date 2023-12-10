<?php
require_once "../model/db.php";

// 确保接收到的是 POST 请求
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // 获取 POST 数据
    $user = isset($_POST['username']) ? $_POST['username'] : '';
    $pass = isset($_POST['password']) ? $_POST['password'] : '';

    // 防止 SQL 注入
    $user = mysqli_real_escape_string($conn, $user);
    $pass = mysqli_real_escape_string($conn, $pass);

    // 查询数据库
    $sql = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
    $result = $conn->query($sql);

    // 准备响应数组
    $response = array();

    if ($result->num_rows > 0) {
        // 用户是管理员
        session_start();
        $_SESSION['admin'] = $user;
        $_SESSION['user_type'] = 'admin';
        $response['error'] = false;
        $response['redirect'] = '../admin/index.php';
    } else {
        // 用户名或密码错误
        $response['error'] = true;
        $response['message'] = '用户名或密码错误';
    }

    // 返回 JSON 格式的响应
    header('Content-Type: application/json');
    echo json_encode($response);

    // 关闭数据库连接
    $conn->close();
} else {
    // 如果不是 POST 请求，返回错误
    header('Content-Type: application/json');
    echo json_encode(['error' => true, 'message' => 'Invalid request']);
}
?>
