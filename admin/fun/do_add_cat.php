<?php
// echo"<pre>";
// print_r($_POST);

// print_r($_FILES);

// exit();

$name = $_POST['name'];


include("conn.php");
$inserte = "INSERT INTO category(name) VALUES ('$name')";
$conn -> query($inserte);
header("location:../category.php");
?>