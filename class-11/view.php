<?php
    include './env.php';
    $postId = $_GET['id'];
    $query = "SELECT * FROM posts WHERE id= '$postId'";
    $result = mysqli_query($connection,$query);
    $posts = mysqli_fetch_assoc($result);
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs View</title>
    <link rel="stylesheet" href="color.css">
</head>
<body>
    <header>
        <h1> Blog Website </h1>
    

<!-- nav Start -->
    <nav>
        <ul>
            <li><a href="./index.php">Home</a></li>
            <li><a href="./controller/createController.php">Add Post</a></li>
            <li><a href="./list.php">Post List</a></li>
        </ul>
    </nav>
<!-- nav end -->

</header>

    <h1><?=$posts['title']?></h1>
    <p><?=$posts['description']?></p>
    <p>By <?=$posts['author']?></p>

<!-- footer start -->
    <footer>
            <p>&copy; All Right Reserved By Rakib</p>
    </footer>
<!-- footer end -->

</body>
</html>