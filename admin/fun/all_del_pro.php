<?php

     include("conn.php");
    $all_id = implode(',' , $_POST['product_id']);
   

    $delete = "DELETE FROM `products` WHERE id IN ($all_id)";
    $conn -> query($delete);
    header("location:../products.php");

?>