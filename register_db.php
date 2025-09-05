<?php
session_start();
require 'config.php';
$minLength = 6;

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
}

if (empty($username)) {
    $_SESSION['error'] = "กรุณากรอกชื่อผู้ใช้";
    header("location: register.php");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'] = "กรุณากรอกอีเมลให้ถูกต้อง";
    header("location: register.php");
} else if (strlen($password) < $minLength) {
    $_SESSION['error'] = "กรุณากรอกรหัสผ่านให้ถูกต้อง";
    header("location: register.php");
} else if ($password !== $confirmPassword) {
    $_SESSION['error'] = "รหัสผ่านไม่ตรงกัน";
    header("location: register.php");
} else {
    $checkUsername = $pdo->prepare("SELECT COUNT(*) FROM users WHERE username = ?");
    $checkUsername->execute([$username]);
    $userNameExists = $checkUsername->fetchColumn();

    $checkEmail = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
    $checkEmail->execute([$email]);
    $userEmailExists = $checkEmail->fetchColumn();

    if ($userNameExists) {
        $_SESSION['error'] = "ชื่อผู้ใช้นี้ถูกใช้ไปเล้ว";
        header("location: register.php");
    } else if ($userEmailExists) {
        $_SESSION['error'] = "อีเมลนี้ถูกใช้ไปเล้ว";
        header("location: register.php");
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        try {
            $stmt = $pdo->prepare("INSERT INTO users(username , email , password) VALUES(?,?,?)");
            $stmt->execute([$username, $email, $hashedPassword]);

            $_SESSION['success'] = "ลงทะเบียนสำเร็จ";
            header("location: login.php");
        } catch (PDOException $e) {
            $_SESSION['error'] = "มีบางอย่างผิดพลาด โปรดลองอีกครั้ง";
            echo "ลงทะเบียนไม่สำเร็จ: " . $e->getMessage();
            header("location: register.php");
        }
    }
}
