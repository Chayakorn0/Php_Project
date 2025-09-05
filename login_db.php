<?php
session_start();
require('config.php');

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
}

if (empty($email)) {
    $_SESSION['error'] = "โปรดกรอกอีเมล";
    header("location: login.php");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'] = "โปรดกรอกอีเมลให้ถูกต้อง";
    header("location: login.php");
} else if (empty($password)) {
    $_SESSION['error'] = "โปรดกรอกรหัสผ่าน";
    header("location: login.php");
} else {
    try {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $userData = $stmt->fetch();

        if ($userData && password_verify($password, $userData['password'])) {
            $_SESSION['user_id'] = $userData['id'];
            header("location: dashboard.php");
        } else {
            $_SESSION['error'] = "อีเมลหรือรหัสผ่านไม่ถูกต้อง";
            header("location: login.php");
        }
    } catch (PDOException $e) {
        $_SESSION['error'] = "มีบางอย่างผิดพลาด โปรดลองอีกครั้ง";
        header("location: login.php");
    }
}