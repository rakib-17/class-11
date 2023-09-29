<?php
    
    session_start();
    include './../env.php';
    $postId = $_GET['id'];
    $title= trim($_REQUEST['title']);
    $description= trim($_REQUEST['description']);
    $author= trim($_REQUEST['author']);
    $errors= [];

    if(empty($title)){
        $errors['title_error'] = 'Title Must Be Required';
    }else {
        if(strlen($title) > 50){
            $errors['title_error'] = 'Title Field Must Be Required';
        }
    }

    if(empty($description)){
        $errors['description_error'] = 'Description Must Be Required';
    }else {
        if(strlen($description) > 500){
            $errors['description_error'] = 'Description Field Must Be Required';
        }
    }

    if(empty($author)){
        $errors['author_error'] = 'Author Must Be Required';
    }else {
        if(strlen($author) > 40){
            $errors['author_error'] = 'Author Field Must Be Required';
        }
    }

    if(count($errors)> 0){
        $_SESSION = $errors;
        header("location: ./../edit.php?id= $postId");
    }else{
        
        $query= "UPDATE posts SET title='$title',description='$description',author='$author' WHERE id= '$postId'";    

        $result= mysqli_query($connection, $query);
        
        if($result){
            $_SESSION['msg'] = "Post Updated Successfully";
            header("location: ./../edit.php?id=$postId");
        }else{
            $_SESSION = "Something Wrong";
            header("location: ./../edit.php?id=$postId");
        }
        
    }
?>
