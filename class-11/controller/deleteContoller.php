<?php
include './../env.php';
$postId = $_GET['id'];
$query = "DELETE FROM posts WHERE id = '$postId'" ;
$result =  mysqli_query($connection,$query);
header("Location: ./../list.php");
?>