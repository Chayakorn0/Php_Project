<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mali&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <style>
        * {
            font-family: "Mali", cursive;
            font-weight: 400;
            font-style: normal;
        }

        html,
        body {
            height: 100%;
        }

        .form-signin {
            max-width: 330px;
            padding: 1rem;
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }
    </style>
</head>

<body>

    <div class="container">
        <?php include('nav.php'); ?>
    </div>
    
    <main class="form-signin w-100 m-auto">
        <form action="register_db.php" method="POST">
            <h1 class="h3 mb-3 fw-bold text-center">ลงทะเบียน</h1>

            <?php if (isset($_SESSION['success'])) { ?>
                <div class="alert alert-success" role="alert">
                    <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                </div>
            <?php } ?>

            <?php if (isset($_SESSION['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                    ?>
                </div>
            <?php } ?>

            <div class="form-floating">
                <input type="text" class="form-control my-2" name="username" placeholder="กรอกชื่อผู้ใช้" required>
                <label for="username">ชื่อผู้ใช้</label>
            </div>

            <div class="form-floating">
                <input type="email" class="form-control my-2" name="email" placeholder="กรอกอีเมล required">
                <label for="floatingInput">อีเมล</label>
            </div>

            <div class="form-floating">
                <input type="password" class="form-control my-2" name="password" placeholder="รหัสผ่าน" required>
                <label for="floatingPassword">รหัสผ่าน</label>
            </div>

            <div class="form-floating">
                <input type="password" class="form-control my-2" name="confirm_password" placeholder="ยืนยันรหัสผ่าน" required>
                <label for="floatingPassword">ยืนยันรหัสผ่าน</label>
            </div>

            <button class="btn btn-primary w-100 py-2" type="submit" name="register">Sign up</button>
            <p class="mt-5 mb-3 text-body-secondary">มีบัญชีเเล้วใช่ไหม <a href="login.php">เข้าสู่ระบบ</a></p>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
    </script>
</body>

</html>