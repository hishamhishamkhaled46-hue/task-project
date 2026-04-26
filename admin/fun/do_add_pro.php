<?php

// echo"<pre>";
// print_r($_POST);

// print_r($_FILES);

// exit();

$name = $_POST['name'];
$price = $_POST['price'];
$count = $_POST['count'];
$description = $_POST['description'];
$category = $_POST['category'];
$brand = $_POST['brand'];

$total = count($_FILES['image']['name']);
$name_image = [];

for ($i=0; $i < $total; $i++) { 
  $img_name = $_FILES['image']['name'][$i];
  $img_tmp = $_FILES['image']['tmp_name'][$i];
  $img_size = $_FILES['image']['size'][$i];

  $img_exp = explode("." , $img_name);
  $img_ext = end($img_exp);
  
  $allow_ext = ['jpg' , 'jpeg' , 'bmp' , 'gif' , 'png'];

  if (!in_array($img_ext , $allow_ext)) {
      echo "image type error";
      exit();
   }

  if ($img_size > 3000000) {
    echo "file is too large";
    exit();

   }

    $new_img_name = time().rand().$img_name;

  if ( move_uploaded_file($img_tmp , "../image/$new_img_name")) {
  
    $name_image[] = $new_img_name;
  }
 
}
include("conn.php");

$img_str = implode("," , $name_image);

$safe_name = mysqli_real_escape_string($conn,$name);
$safe_descr = mysqli_real_escape_string($conn,$description);


$inserte = "INSERT INTO products( name, price, image, cat, brand, count, descr) VALUES ('$safe_name','$price','$img_str','$category','$brand','$count','$safe_descr')";
$conn -> query($inserte);
header("location:../products.php");

?>