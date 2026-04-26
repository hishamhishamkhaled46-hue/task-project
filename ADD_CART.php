<?php
 session_start();

                     
 if (!isset($_SESSION['admin_id'])) {

   header("location:form.php");
   exit();
                        
 }

include("admin/fun/conn.php");

 if (isset($_GET['proid'])) {
  $pro_id = $_GET['proid'];
  $admin_id = $_SESSION['admin_id'];

  $select_al = "SELECT * FROM `cart` WHERE admin_id = $admin_id && pro_id = $pro_id";
  $result_al = $conn -> query($select_al);
//  $row_al = $result_al -> fetch_assoc();
  $num = $result_al -> num_rows ;

if ($num == 0) {
    $insert = "INSERT INTO cart( admin_id, pro_id ) VALUES ('$admin_id','$pro_id')";
  $conn -> query($insert);
  header("location:cart.php");
}else{
//   $insert = "INSERT INTO cart( admin_id, pro_id ) VALUES ('$admin_id','$pro_id')";
//   $conn -> query($insert);
  header("location:cart.php");
  // exit();
}
 }