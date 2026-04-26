<?php
session_start();
include("conn.php");
// $id_id = $_SESSION['login'];
$id = $_GET['id'];
$name = $_GET['name'];

$name = $_POST['name'];
$pass = $_POST['password'];
$em = $_POST['email'];
$gn = $_POST['gender'];
$pr = $_POST['pr'];

//  $select_pr = "SELECT * FROM `pr` WHERE id = '$pr'";
//  $result_pr = $conn -> query($select_pr);
//  $pr_pr = $result_pr->fetch_assoc();
//  $name_pr = $pr_pr['name'];

// if ($name === "owner") {
//    $inserte = "UPDATE users SET username='$name',password='$pass',email='$em',grnder='$gn',pr='$pr' WHERE id = '$id'";
//    $conn -> query($inserte);

//    header("location:../users.php"); 
// }

// if ($name === "admin" && $name_pr === "admin" || $name_pr === "supervisor") {
//    $inserte = "UPDATE users SET username='$name',password='$pass',email='$em',grnder='$gn',pr='$pr' WHERE id = '$id'";
//    $conn -> query($inserte);

//    header("location:../users.php"); 
// }

// if ($name === "supervisor" && $name_pr === "supervisor") {
   $inserte = "UPDATE users SET username='$name',password='$pass',email='$em',grnder='$gn',pr='$pr' WHERE id = '$id'";
   $conn -> query($inserte);

   header("location:../users.php"); 
   
// }else{ header("location:../users.php"); }





?>