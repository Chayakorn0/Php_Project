<?php
require("DBconnect.php");
$name = $_POST["empname"];
$sql = "SELECT * FROM employee WHERE fname LIKE '%$name%' ORDER BY fname ASC";

$result = mysqli_query($con, $sql);
$count = mysqli_num_rows($result);
$order = 1;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อมูลพนักงาน</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mali&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <style>
        * {
            font-family: "Mali", cursive;
            font-weight: 400;
            font-style: normal;
        }
    </style>
</head>

<body>
    <div class="container mt-4 text-center">
        <h1 class="mb-4"><strong>ข้อมูลพนักงานทั้งหมด <i class="fa-solid fa-users"></i></strong></h1>
        <hr>
        <h3 class="mb-4">พนักงานที่ค้นหา</h3>
        <?php if ($count > 0) { ?>
            <table class="table table-hover mt-5 mb-5 fs-5">
                <thead class="table-dark">
                    <tr>
                        <th>ลำดับ</th>
                        <th>ชื่อ</th>
                        <th>นามสกุล</th>
                        <th>แผนกงาน</th>
                        <th>ระดับเงินเดือน</th>
                        <th>แก้ไขข้อมูล</th>
                        <th>ลบข้อมูล</th>
                        <th>ลบหลายรายการ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_object($result)) { ?>
                        <tr>
                            <td><?php echo $order++ ?></td>
                            <td><?php echo $row->fname ?></td>
                            <td><?php echo $row->lname ?></td>
                            <td><?php echo $row->department ?></td>
                            <td><?php $salary =  $row->salary;
                                echo number_format($salary, 2), " บาท"; ?></td>
                            <td>
                                <a href="editForm.php?idemp=<?php echo $row->id; ?>"
                                    class="btn btn-warning fs-5" onclick="return confirm('คุณต้องการแก้ไขข้อมูลหรือไม่?')">แก้ไขข้อมูล</a>
                            </td>
                            <td>
                                <a href="deleteQueryString.php?idemp=<?php echo $row->id; ?>"
                                    class="btn btn-danger fs-5" onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่?')">ลบข้อมูล</a>
                            </td>
                            <form action="multipledelete.php" method="POST">
                                <td>
                                    <input type="checkbox" name="idcheck[]" class="form-check-input" value="<?php echo $row->id ?>">
                                </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading fs-1"><strong>เฮ้!</strong></h4>
                <p class="fs-3">ไม่พบพนักงานที่ค้นหา</p>
            </div>
        <?php } ?>
        <a href="index.php" class="btn btn-primary fs-5 mx-1">กลับหน้าเเรก</a>
        <?php if ($count > 0) { ?>
            <input type="submit" value="ลบข้อมูลหลายรายการ" class="btn btn-danger fs-5 mx-1" onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่?')">
        <?php } ?>
        </form>
        <?php if ($count > 0) { ?>
            <button class="btn btn-success fs-5 mx-1" onclick="checkAll()">เลือกทั้งหมด</button>
            <button class="btn btn-warning fs-5 mx-1" onclick="uncheckAll()">ยกเลิกรายการ</button>
        <?php } ?>
    </div>
    <script>
        function checkAll() {
            var form_ele = document.forms[1].length;
            for (i = 0; i < form_ele - 1; i++) {
                document.forms[1].elements[i].checked = true;
            }
        }

        function uncheckAll() {
            var form_ele = document.forms[1].length;
            for (i = 0; i < form_ele - 1; i++) {
                document.forms[1].elements[i].checked = false;
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>
