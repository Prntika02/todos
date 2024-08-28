<?php

session_start();

$title = $_REQUEST['title'];
$detail=$_REQUEST['detail'];
$errors=[];
//* VALIDATION
if( empty($title)) {
    $errors['title_error'] = "title is required";
}
if( empty($detail)) {
      $errors['detail_error'] = "detail is required";
}



//* REDIRECTION && ERROR SESSION SAVE***************
if(count($errors)>0){
    //* ERROR OCCUR
    $_SESSION['errors']=$errors;
    $_SESSION['old_data']= $_REQUEST;
    header("Location: ../index.php"); //*REDIRECT
} 
    //* NO ERROR OCCUR

 else{
    include '../database/env.php';
      $query ="INSERT INTO todos(title, detail) VALUES ('$title','$detail')";
  
     $store = mysqli_query($conn, $query);
     if($store){
        header("Location: ../index.php");
     }
}
?>