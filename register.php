<?php
include 'db.php';

if(isset($_POST['register'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = "INSERT INTO users(username,password) VALUES('$username','$password')";
    mysqli_query($conn,$query);

    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form-container">
    <h2>Register</h2>

    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>

        <button type="submit" name="register">Daftar</button>
    </form>
</div>

</body>
</html>
