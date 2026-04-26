<?php
// echo"<pre>";
// print_r($_POST);

// print_r($_FILES);

// exit();
$id =  $_GET['id'];
$name = $_POST['name'];
// $price = $_POST['price'];
// $count = $_POST['count'];
// $description = $_POST['description'];
// $image = $_POST['image'];
// $category = $_POST['category'];
// $brand = $_POST['brand'];

// $img_name = $_FILES['image']['name'];
// $img_tmp = $_FILES['image']['tmp_name'];
// $img_size = $_FILES['image']['size'];
// 
// $img_exp = explode("." , $img_name);
// $img_ext = end($img_exp);

// $allow_ext = ['jpg' , 'jpeg' , 'bmb' , 'gif' , 'png'];
//
// if (!in_array($img_ext , $allow_ext)) {
    // echo "image type error";
    // exit();
// }

// if ($img_size > 3000000) {
    // echo "file is too large";
    // exit();
// }

// $new_img_name = time().rand().$img_name;
//
// move_uploaded_file($img_tmp , "../image/$new_img_name");

include("conn.php");
$inserte = "UPDATE brand SET name='$name' WHERE id ='$id'";
$conn -> query($inserte);
header("location:../brand.php");
?>