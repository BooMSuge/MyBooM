<?php
include "../model/db.php";
// 当表单提交时处理数据
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 获取表单数据并进行适当的清理
    $username = $conn->real_escape_string($_POST['username']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // 检查密码是否匹配
    if ($password !== $confirmPassword) {
        echo "两次密码不一样,请重试";
        exit;
    }


// 检查用户名是否已存在
    $checkUserSql = "SELECT * FROM playusers WHERE username = '$username'";
    $result = $conn->query($checkUserSql);
    if ($result->num_rows > 0) {
        echo "用户名已存在";
        exit;
    }
    // 插入数据到数据库
    $sql = "INSERT INTO playusers (username, password) VALUES ('$username', '$confirmPassword')";
       if ($conn->query($sql) === TRUE) {
        echo "账号添加成功";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>
