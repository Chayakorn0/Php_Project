<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>บันทึกข้อมูลพนักงาน</title>
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
    <div class="container mt-5">
        <h1 class="text-center mb-5"><strong>บันทึกข้อมูลพนักงาน <i class="fa-solid fa-user-check"></i></strong></h1>
        <hr>
        <form action="showData.php" method="POST">
            <div class="form-group mt-5 my-3">
                <label for="firstname" class="fs-4 mb-3">ชื่อ</label>
                <input type="text" name="fname" class="form-control fs-4 shadow p-2 mb-5 bg-body-tertiary rounded" required>
            </div>
            <div class="form-group my-3">
                <label for="lastname" class="fs-4 mb-3">นามสกุล</label>
                <input type="text" name="lname" class="form-control fs-4 shadow p-2 mb-5 bg-body-tertiary rounded" required>
            </div>
            <div class="form-group my-3">
                <label for="department" class="fs-4 mb-3">แผนก</label>
                <input type="text" name="department" class="form-control fs-4 shadow p-2 mb-5 bg-body-tertiary rounded" required>
            </div>
            <div class="form-group my-3">
                <label for="salary" class="fs-4 mb-3">เงินเดือน</label>
                <input type="text" name="salary" class="form-control fs-4 shadow p-2 mb-5 bg-body-tertiary rounded" required>
            </div>
            <div class="text-center mt-5">
                <input type="submit" value="บันทึกข้อมูล" class="mt-3 btn btn-success fs-5 mx-1">
                <input type="reset" value="ล้างข้อมูล" class="mt-3 btn btn-warning fs-5 mx-1">
                <a href="index.php" class="mt-3 btn btn-primary fs-5 mx-1">กลับหน้าเเรก</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>