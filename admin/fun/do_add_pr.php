<?php
// echo"<pre>";
// print_r($_POST);

// print_r($_FILES);

// exit();

$name = $_POST['name'];


include("conn.php");
$inserte = "INSERT INTO pr(name) VALUES ('$name')";
$conn -> query($inserte);
header("location:../pr.php");
?>