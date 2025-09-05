<?php

// Connect
require('DBconnect.php');

// Input data
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$department = $_POST["department"];
$salary = $_POST["salary"];

// Insert data to database
$sql = "INSERT INTO Employee(fname , lname , department , salary)
        VALUES('$fname' , '$lname' , '$department' , '$salary')";
$result = mysqli_query($con, $sql);

if ($result) {
    header("location:index.php");
    exit(0);
} else {
    echo mysqli_error($con);
}