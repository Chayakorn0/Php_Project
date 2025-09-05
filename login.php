<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
        <form action="login_db.php" method="POST">
            <h1 class="h3 mb-3 fw-bold text-center">เข้าสู่ระบบ</h1>

            <?php if (isset($_SESSION['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                    ?>
                </div>
            <?php } ?>

            <div class="form-floating">
                <input type="email" class="form-control my-2" name="email" id="floatingInput" placeholder="name@example.com" required>
                <label for="floatingInput">อีเมล</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control my-2" name="password" id="floatingPassword" placeholder="รหัสผ่าน" required>
                <label for="floatingPassword">รหัสผ่าน</label>
            </div>

            <button class="btn btn-primary w-100 py-2" name="login" type="submit">เข้าสู่ระบบ</button>
            <p class="mt-5 mb-3 text-body-secondary">ยังไม่มีบัญชีใช่ไหม <a href="register.php">ลงทะเบียน</a></p>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
    </script>
</body>

</html>