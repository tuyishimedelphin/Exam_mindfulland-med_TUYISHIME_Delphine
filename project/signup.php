<?php
$con = mysqli_connect("localhost", "root", "", "users");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

$id = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];
$sql = "INSERT INTO users (id, username, password) VALUES ('$id', '$username', '$password')";
if (mysqli_query($con, $sql)) {
    echo "<script>alert('Recorded')</script>";
    header("Location: login.html");


} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
mysqli_close($con);
?>
