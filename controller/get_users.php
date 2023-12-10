<?php
include "../model/db.php"; // 数据库连接

// 获取数据的函数
function fetchData($conn, $query)
{
    $result = $conn->query($query);
    return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
}

// 准备查询
$playusersQuery = "SELECT username FROM playusers";
$usersQuery = "SELECT username FROM users";
$gameCategoriesQuery = "SELECT game_name FROM game_categories";

// 执行查询并获取数据
$playusers = fetchData($conn, $playusersQuery);
$users = fetchData($conn, $usersQuery);
$gameCategories = fetchData($conn, $gameCategoriesQuery);

// 输出JSON格式的数据
header('Content-Type: application/json');
echo json_encode(["playusers" => $playusers, "users" => $users, "gameCategories" => $gameCategories]);

$conn->close();
