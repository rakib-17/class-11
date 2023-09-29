<?php
include './env.php';
$query = "SELECT * FROM posts";
$result = mysqli_query($connection,$query);
$posts = mysqli_fetch_all($result,1);
 
?>

 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog List</title>
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

<section>
    <table>
        <thead>
        <tr >
        <th scope="col">Sl.No.</th>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col">Author</th>
        <th scope="col">Action</th>
        </tr>
        </thead>

        <?php
            foreach($posts as $key=> $post){   
        ?>
        <tbody>
            <tr>
                <th scope='row'><?= ++$key?></th>
                <td><?= $post['title']?></td>
                <td><?= strlen($post['description']) > 30 ? substr($post['description'],0,30)."..." : $post['description'] ?> </td>
                <td><?= $post['author']?></td>
                <td>
                <a href="./view.php?id=<?= $post['id']?>" class="view-btn">View</a>
                <a href="./edit.php?id=<?= $post['id']?>"class="edit-btn">Edit</a>
                <a href="./controller/deleteContoller.php?id=<?= $post['id']?>"class="dlt-btn">Delete</a>
                </td>
        <?php
            } 
        ?>
            </tr> 
        </tbody>              
    </table>
</section>

<!-- footer start -->
    <footer>
            <p>&copy; All Right Reserved By Rakib</p>
    </footer>
<!-- footer end -->

</body>
</html>