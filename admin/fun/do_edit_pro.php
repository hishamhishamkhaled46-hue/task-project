<?php
include("conn.php");

$id = $_GET['id'];

$name = $_POST['name'];
$price = $_POST['price'];
$count = $_POST['count'];
$description = $_POST['description'];
$category = $_POST['category'];
$brand = $_POST['brand'];


if (isset($_FILES['image']) && $_FILES['image']['error'][0] === 0) {
    
    $uploaded_images = [];
    $files = $_FILES['image'];
    $allow_ext = ['jpg', 'jpeg', 'bmb', 'gif', 'png'];

  
    foreach ($files['name'] as $key => $img_name) {
        $img_tmp  = $files['tmp_name'][$key];
        $img_size = $files['size'][$key];
        
        $img_exp = explode(".", $img_name);
        $img_ext = strtolower(end($img_exp));

      
        if (!in_array($img_ext, $allow_ext)) {
            echo "خطأ في نوع الصورة: " . $img_name;
            exit();
        }

     
        if ($img_size > 3000000) {
            echo "الملف كبير جداً: " . $img_name;
            exit();
        }

      
        $new_img_name = time() . rand(1000, 9999) . "_" . $img_name;
        
    
        if (move_uploaded_file($img_tmp, "../image/$new_img_name")) {
            $uploaded_images[] = $new_img_name;
        }
    }

   
    $images_string = implode(',', $uploaded_images);

   
    $update = "UPDATE products SET 
                name='$name',
                price='$price',
                image='$images_string',
                cat='$category',
                brand='$brand',
                count='$count',
                descr='$description' 
               WHERE id = '$id'";

} else {

    $update = "UPDATE products SET 
                name='$name',
                price='$price',
                cat='$category',
                brand='$brand',
                count='$count',
                descr='$description' 
               WHERE id = '$id'";
}

$conn->query($update);
header("location:../products.php");
?>