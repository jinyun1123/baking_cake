<?php
header('Content-Type: application/json');
require_once("db.php"); //  db.php

// 連線資料庫
$conn = new mysqli("localhost", "root", "", "baking_cake");
if ($conn->connect_error) {
    echo json_encode([]); // 回傳空陣列避免報錯
    exit;
}

// 接收查詢參數
$name = $_GET["name"] ?? "";
$phone = $_GET["phone"] ?? "";
$email = $_GET["email"] ?? "";

// 查詢語句
$sql = "SELECT name, phone, course, date, message FROM cake_booking WHERE 1=1";
if (!empty($name)) {
    $sql .= " AND name LIKE '%" . $conn->real_escape_string($name) . "%'";
}
if (!empty($phone)) {
    $sql .= " AND phone LIKE '%" . $conn->real_escape_string($phone) . "%'";
}
if (!empty($email)) {
    $sql .= " AND email LIKE '%" . $conn->real_escape_string($email) . "%'";
}


// 執行查詢
$result = $conn->query($sql);
$data = [];

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// 回傳 JSON
echo json_encode($data);
$conn->close();
?>