<?php
include "../model/db.php";
// 查询SQL语句
$sql = "SELECT * FROM playusers"; 
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $users = array();
    while($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
    // 返回JSON格式的数据
    echo json_encode($users);
} else {
    echo "0 结果";
}

// 关闭连接
$conn->close();
?>
