<?php
// echo"<pre>";
// print_r($_POST);

// print_r($_FILES);

// exit();
$id =  $_GET['id'];
$name = $_POST['name'];


include("conn.php");
$inserte = "UPDATE category SET name='$name' WHERE id ='$id'";
$conn -> query($inserte);
header("location:../category.php");
?>