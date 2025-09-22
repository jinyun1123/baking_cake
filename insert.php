<?php
include 'db.php'; //表單處理 處理表單送出，寫入資料庫

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $course = $_POST["course"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $people = $_POST["people"];
    $message = $_POST["message"];

    $sql = "INSERT INTO cake_booking (name, phone, email, course, date, time, people, message, created_at)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $name, $phone, $email, $course, $date, $time, $people, $message);

    if ($stmt->execute()) {
        echo "<script>alert('預約成功！'); window.location.href='signup.html';</script>";
    } else {
        echo "錯誤: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
