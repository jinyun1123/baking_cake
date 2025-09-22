<?php
include 'db.php'; //查詢功能 提供搜尋條件的互動頁面

$sql = "SELECT * FROM cake_booking ORDER BY date DESC, time DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <title>預約紀錄查詢</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #aaa; padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>所有預約紀錄</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>姓名</th>
            <th>電話</th>
            <th>Email</th>
            <th>預約課程</th>
            <th>預約日期</th>
            <th>預約時間</th>
            <th>人數</th>
            <th>備註</th>
            <th>建立時間</th>
        </tr>

        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row["id"] ?></td>
            <td><?= $row["name"] ?></td>
            <td><?= $row["phone"] ?></td>
            <td><?= $row["email"] ?></td>
            <td><?= $row["course"] ?></td>
            <td><?= $row["date"] ?></td>
            <td><?= $row["time"] ?></td>
            <td><?= $row["people"] ?></td>
            <td><?= $row["message"] ?></td>
            <td><?= $row["created_at"] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

<?php $conn->close(); ?>
