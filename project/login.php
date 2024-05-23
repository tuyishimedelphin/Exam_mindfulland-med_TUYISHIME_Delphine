<?php
session_start();
$host = "localhost";
$username = "root";
$password = "";
$database = "users";
$con = mysqli_connect($host, $username, $password, $database);
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
}

if ($_POST) {
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['password'] = $_POST['password'];
}

$a = $_SESSION['username'];
$b = $_SESSION['password'];

$re = mysqli_query($con, "SELECT * FROM users WHERE username='$a' AND password='$b'");
$res = mysqli_num_rows($re);
if ($res > 0) {
    include 'index.php';
} else {
    include 'login.html';
    echo "Incorrect Username or Password";
}

mysqli_close($con);
?>
