<?php
$name = $_GET['name'];
include("conn.php");


$name = $_POST['name'];
$pass = $_POST['password'];
$em = $_POST['email'];
$gn = $_POST['gender'];
$pr = $_POST['pr'];

// $select_pr = "SELECT * FROM `pr` WHERE id = '$pr'";
//  $result_pr = $conn -> query($select_pr);
//  $pr_pr = $result_pr->fetch_assoc();
//  $name_pr = $pr_pr['name'];


// if ($name === "owner") {
// $inserte = "INSERT INTO users(username, password, email, grnder, pr) VALUES ('$name','$pass','$em','$gn','$pr')";
// $conn -> query($inserte);
// header("location:../users.php");
// }

// if ($name === "admin" && $name_pr === "admin" || $name_pr === "supervisor") {
// $inserte = "INSERT INTO users(username, password, email, grnder, pr) VALUES ('$name','$pass','$em','$gn','$pr')";
// $conn -> query($inserte);
// header("location:../users.php");

// }

// if ($name === "supervisor" && $name_pr === "supervisor") {
// $inserte = "INSERT INTO users(username, password, email, grnder, pr) VALUES ('$name','$pass','$em','$gn','$pr')";
// $conn -> query($inserte);
// header("location:../users.php");
   
// }else{ header("location:../users.php"); }


$inserte = "INSERT INTO users(username, password, email, grnder, pr) VALUES ('$name','$pass','$em','$gn','$pr')";
$conn -> query($inserte);
header("location:../users.php");
?>