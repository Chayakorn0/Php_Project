<?php

require('DBconnect.php');
$id_arr = $_POST['idcheck'];
$multiple_id = implode(",", $id_arr);

$sql = "DELETE FROM employee WHERE id in ($multiple_id)";
$result = mysqli_query($con, $sql);

if ($result) {
    header("location:index.php");
    exit(0);
} else {
    echo "เกิดข้อผิดพลาด <br>";
    echo "<a href='index.php'>กลับหน้าแรก</a>";
}