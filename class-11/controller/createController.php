<?php
    
    session_start();
    include './../env.php';
    $title= trim($_REQUEST['title']);
    $description= trim($_REQUEST['description']);
    $author= trim($_REQUEST['author']);
    $errors= [];

    if(empty($title)){
        $errors['title_error'] = 'Title Must Be Required';
    }else {
        if(strlen($title) > 50){
            $errors['title_error'] = 'Title is too long';
        }
    }

    if(empty($description)){
        $errors['description_error'] = 'Description Must Be Required';
    }else {
        if(strlen($description) > 500){
            $errors['description_error'] = 'Description is too long';
        }
    }

    if(empty($author)){
        $errors['author_error'] = 'Author Must Be Required';
    }else {
        if(strlen($author) > 40){
            $errors['author_error'] = 'Author is too long';
        }
    }

    if(count($errors)> 0){
        $_SESSION = $errors;
        header('location: ../create.php');
    }else{
        
        $query= "INSERT INTO posts (title, description, author) VALUES ('$title', '$description', '$author')";    

        $result= mysqli_query($connection, $query);
        
        if($result){
            $_SESSION['msg'] = "Post Uploaded Successfully";
            header("location: ./../create.php");
        }else{
            $_SESSION = "Something Wrong";
            header('location: ./../create.php');
        }
        
    }
?>
