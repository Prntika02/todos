
<?php
session_start();
include './database/env.php';
$query = "SELECT * FROM todos ORDER BY id DESC ";
$res = mysqli_query($conn,$query);
$posts = mysqli_fetch_all($res,1);
// 1 associative array the convert korbe....0 by defult thake indexing array the convert kore.

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>todo</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" >

</head>
<body>

<!-- nav starts -->
<?php
include './include/navber.php'

?>
<!-- nav ends -->

<!-- form section -->
<div class="col-lg-5 mx-auto">
<div class="card">
<div class="card-header"> Add Todos</div>
<div class="card body">
<table class="table table-responsive">
  <tr>
    <th>#</th>
    <th>Title</th>
    <th>Detail</th>
    <th></th>
  </tr>


<?php
foreach($posts as $key=> $post){
 ?>

  <tr>
    <td><?=++$key?></td>
    <td><?=$post['title']?></td>
    <td><?=empty($post['detail']) ? '---' :(
      strlen( $post['detail'] >11)? substr( $post['detail'],0,10).' <a href="#" class="nav-link text-primary">Read More</a>
': $post['detail'] 
    ) ?></td>
    <td>
      <a href="./editeTodo.php?id=<?=$post['id']?>" class="btn btn-primary btn-sm">Edit</a>
      <a href="./controller/todoDelete.php?id=<?=$post['id']?>" class="btn btn-danger btn-sm">Delete</a>
    </td>
  </tr>
  <?php
}
?>

</table>
</div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
<?php session_unset()?>
