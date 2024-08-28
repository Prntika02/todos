<?php
session_start();
include "./database/env.php";
$id =$_REQUEST['id'];
$query = "SELECT * FROM todos WHERE id='$id'";
$res = mysqli_query($conn,$query);
$post = mysqli_fetch_assoc($res);


if($post == null){
    header("Location:./404.php");
    exit();
}

// var_dump($post);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <!-- NAV STARTS -->


<?php
include "./include/navber.php"
?>


 <!-- NAV ENDS -->
<div class="col-lg-5 mx-auto">
<div class="card">
    <div class="card-header">Edite ToDo</div>
<div class="card-body">
<form method="POST" action="./controller/todoUpdate.php">

   <input type="hidden" name="id" value="<?=$post['id'] ?? null ?>">
   
    <input value="<?=$post['title'] ?? null ?>" type="text" name="title" class="form-control my-2" placeholder="Todo Titel">
   
    <p class="text-danger">
    <?= $_SESSION ['errors'] ['title_error'] ?? null ?>
    </p>

<textarea name="detail" class="form-control  my-2" placeholder="Todo Detail"><?=$post['detail']?? null ?></textarea>

<p class="text-danger">
    <?= $_SESSION ['errors'] ['detail_error'] ?? null ?>
    </p>

<button class="btn btn-primary rounded-0">Update ToDo</button>

</form>



</div>
</div>

</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>

</body>
</html>
<?php
session_unset();