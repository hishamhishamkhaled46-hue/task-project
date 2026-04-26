<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
// session_start();
include("fun/conn.php");
$id = $_SESSION['login'];

                  $select = "SELECT * FROM pr WHERE id = $id";
                  $result = $conn -> query($select);
                  $pr = $result->fetch_assoc();
                  $name = $pr['name'];
                           
?>
<form action="fun/all_del_pro.php" method="POST">
<table class="table  table-hover table-bordered text-center ">
                <thead class="thead-dark bg-info" >
                  <tr>
                    <th scope="col">check</th>                   
                    <th scope="col">id</th>
                    <th scope="col">name</th>
                    <th scope="col">price</th>
                    <th scope="col">image</th>
                    <th scope="col">category</th>
                    <th scope="col">brand</th>
                    <th scope="col">count</th>
                    <th scope="col">controls</th>
                  </tr>
                </thead>
                <tbody>
 <?php


   $select = "SELECT * FROM products ";
    $result = $conn->query($select);
    while($product = $result->fetch_assoc()){
      
      ?>
      <tr>
        <td> <input type="checkbox" name="product_id[]" value="<?=$product['id']?>"></td>
        <td> <?= $product["id"] ?> </td>
        <td> <?= $product["name"] ?> </td>
        <td> <?= $product["price"] ?> </td>
              <th scope="row"><div class="images" style="display:flex;gap: 5px;"><?php
                    $all_imag = explode("," , $product['image']);
                    // $total = count($all_imag);
                    foreach ($all_imag as $img) { 
                      if (!empty($img)) {
                      ?>
                       <img src="image/<?=$img?>" style = 'width:50px ; height:50px;object-fit:cover'>
                      <?php
                    } 
                    }
                     ?> 
                    </div></th>

          <th scope="row"><?php $cat_id = $product['cat'];
                    $select_cat =" SELECT * FROM `category` WHERE id ='$cat_id'";
                    $result_cat =$conn->query($select_cat);
                    $cat = $result_cat->fetch_assoc();
                    echo $cat['name'];
                    ?></th>

                       <th scope="row"><?php $brand_id = $product['brand'];
                    $select_brand =" SELECT * FROM `brand` WHERE id ='$brand_id'";
                    $result_brand =$conn->query($select_brand);
                    $brand = $result_brand->fetch_assoc();
                    echo $brand['name'];
                    ?></th>

                       <th scope="row"><?= $product['count']?></th>

                        <th scope="row">
                        <a href="?action=edit&id=<?= $product['id'] ?>" class="btn btn-primary">Edit</a>

                      <?php
                          if ($name === "owner") {
                        ?>
                        <a href="fun/delete_pro.php?id=<?= $product['id'] ?>" class="btn btn-danger" >Delete</a>
                        <?php
                          }
                        ?>
                    </th>

      </tr>
   <?php }

 
   ?>
                </tbody>
              </table>
               <a href="?action=add" class="btn btn-success">Add</a>
               <!-- <input type="submit" name="delet_btn" class="btn btn-success"> -->
               <button class="btn btn-danger" type="submit" name="delet_btn">Delete All </button>
</form>
                       
