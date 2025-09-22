<?php //資料庫連線設定
$servername = "localhost";
$username = "root";  // 預設通常是 root
$password = "";      // 如果你有設密碼請填入
$dbname = "baking_cake";  // 你的資料庫名稱

$conn = new mysqli($servername, $username, $password, $dbname);

// 檢查連線是否成功
if ($conn->connect_error) {
    die("連線失敗: " . $conn->connect_error);
}
?>