<?php
include("fun/conn.php");
?>
<table class="table  table-hover table-bordered text-center ">
                <thead class="thead-dark bg-info" >
                  <tr>
                    <th scope="col">id</th>
                    <th scope="col">name</th>
                    <!-- <th scope="col">price</th>
                    <th scope="col">image</th>
                    <th scope="col">category</th>
                    <th scope="col">brand</th>
                    <th scope="col">count</th> -->
                    <th scope="col">controls</th>
                  </tr>
                </thead>
                <tbody>
 <?php
 
    $select = "SELECT * FROM brand ";
    $result = $conn->query($select);
    while($brand = $result->fetch_assoc()){

 ?>
                 <tr>
                    <th scope="row"><?= $brand['id'] ?></th>
                    <th scope="row"><?= $brand['name'] ?></th>
                    <!-- <th scope="row"><?= $brand['price'] ?></th>
                    <th scope="row"><img src="image/<?= $brand['image']?>" style = 'width:100px ; height:100px'></th>
                    <th scope="row"><?php $cat_id = $brand['cat'];
                    // $select_cat =" SELECT * FROM `category` WHERE id ='$cat_id'";
                    // $result_cat =$conn->query($select_cat);
                    // $cat = $result_cat->fetch_assoc();
                    // echo $cat['name'];
                    ?></th>

                    <th scope="row"><?php $brand_id = $product['brand'];
                    // $select_brand =" SELECT * FROM `brand` WHERE id ='$brand_id'";
                    // $result_brand =$conn->query($select_brand);
                    // $brand = $result_brand->fetch_assoc();
                    // echo $brand['name'];
                    ?></th>
                    <th scope="row"><?= $product['count']?></th> -->



                   
                    <!-- <th scope="row"><img src="images/<?= $product['image'] ?>" style="width:60px;height:60px"></th> -->
                    <!-- <th scope="row"><?= $product['count'] ?></th> -->
                    <th scope="row">
                        <a href="?action=edit&id=<?= $brand['id'] ?>" class="btn btn-primary">Edit</a>
                        <a href="fun/delete_brand.php?id=<?= $brand['id'] ?>" class="btn btn-danger">Delete</a>

                    </th>
                  </tr>

    <?php  }  ?>              
                </tbody>
              </table>

                        <a href="?action=add" class="btn btn-success">Add</a>
