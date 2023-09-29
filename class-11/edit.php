<?php
    session_start();
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
    <title>Blogs Update</title>
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

    <?php
    echo isset ($_SESSION['msg']) ? $_SESSION['msg']:'';
    ?>
<section>
    <form action="./controller/updateController.php?id=<?=$posts['id']?>" method="POST">
        <p class="text">Post Title:</p> <input value="<?=$posts['title']?>" type="text" placeholder="Post Title" name="title"> <br><br>
            <?php
                echo isset($_SESSION['title_error']) ? $_SESSION['title_error']:"";
            ?>
        <p class="text">Post Description:</p> <textarea cols="30" rows="5" placeholder="Post Description" name="description"><?=$posts['description']?></textarea> <br><br>
            <?php
                echo isset($_SESSION['description_error']) ? $_SESSION['description_error']:"";
            ?>
         <p class="text">Author Name:</p> <input value="<?=$posts['author']?>" type="text" placeholder="Post Author" name="author"> <br><br>
            <?php
                echo isset($_SESSION['author_error']) ? $_SESSION['author_error']:"";
            ?>
        <button type="submit">Add New Post</button>
    </form>
</section>

<!-- footer start -->
    <footer>
            <p>&copy; All Right Reserved By Rakib</p>
    </footer>
<!-- footer end -->

</body>
</html>

<?php
    session_unset();
?>