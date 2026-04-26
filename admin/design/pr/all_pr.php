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
 
    $select = "SELECT * FROM pr ";
    $result = $conn->query($select);
    while($product = $result->fetch_assoc()){

 ?>
                 <tr>
                    <th scope="row"><?= $product['id'] ?></th>
                    <th scope="row"><?= $product['name'] ?></th>
  
                    <!-- <th scope="row"><?= $product['count'] ?></th> -->
                    <th scope="row">
                        <a href="?action=edit&id=<?= $product['id'] ?>" class="btn btn-primary">Edit</a>
                        <a href="fun/delete_pr.php?id=<?= $product['id'] ?>" class="btn btn-danger">Delete</a>

                    </th>
                  </tr>

    <?php  }  ?>              
                </tbody>
              </table>

                        <a href="?action=add" class="btn btn-success">Add</a>
