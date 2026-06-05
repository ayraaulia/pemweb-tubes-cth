<?php
session_start();
include 'db.php';

if(!isset($_SESSION['username'])){
    header("Location: login.php");
}

if(isset($_POST['post'])){
    $content = $_POST['content'];
    $user = $_SESSION['username'];

    $query = "INSERT INTO posts(username,content) VALUES('$user','$content')";
    mysqli_query($conn,$query);
}

$posts = mysqli_query($conn,"SELECT * FROM posts ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav>
    <h1>CommunityHub</h1>
    <div>
        <a href="logout.php">Logout</a>
    </div>
</nav>

<div class="dashboard">

    <div class="post-box">
        <form method="POST">
            <textarea name="content" placeholder="Tulis postingan..." style="width:100%;height:100px;padding:10px;"></textarea>
            <br><br>
            <button type="submit" name="post">Posting</button>
        </form>
    </div>

    <?php while($row = mysqli_fetch_assoc($posts)) { ?>

    <div class="post">
        <h3><?php echo $row['username']; ?></h3>
        <p><?php echo $row['content']; ?></p>
    </div>

    <?php } ?>

</div>

</body>
</html>
