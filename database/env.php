<?php
$dbHost ='localhost';
$dbUserName ='root';
$dbPassword ='';
$dbName ='todo_app';


$conn = mysqli_connect($dbHost,$dbUserName,$dbPassword,$dbName);
if(!$conn){
      echo "Db Connection failed";
}
?>