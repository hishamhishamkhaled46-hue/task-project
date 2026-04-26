<?php
// session_start();
include("fun/conn.php");
$id = $_SESSION['login'];


$select = "SELECT * FROM `pr` WHERE id = $id";
$result = $conn -> query($select);
$pr = $result -> fetch_assoc();
$name = $pr['name'];

// print_r($name);
// exit();

 
?>
<table class="table  table-hover table-bordered text-center ">
                <thead class="thead-dark bg-info" >
                  <tr>
                    <th scope="col">id</th>
                    <th scope="col">name</th>
                    <th scope="col">password</th>
                    <th scope="col">email</th>
                    <th scope="col">grnder</th>
                    <th scope="col">pr</th>
                    <!-- <th scope="col">count</th> -->
                    <th scope="col">controls</th>
                  </tr>
                </thead>
                <tbody>
 <?php
 
    $select = "SELECT * FROM users";
    $result = $conn->query($select);
    while($users = $result->fetch_assoc()){

 ?>
                 <tr>
                    <th scope="row"><?= $users['id'] ?></th>
                    <th scope="row"><?= $users['username'] ?></th>
                    <th scope="row"><?= $users['password'] ?></th>
                    <th scope="row"><?= $users['email'] ?></th>
                    <th scope="row"><?php $cat_id = $users['grnder'];
                    $select_cat =" SELECT * FROM `gendr` WHERE id ='$cat_id'";
                    $result_cat =$conn->query($select_cat);
                    $cat = $result_cat->fetch_assoc();
                    echo $cat['name'];
                    ?></th>

                    <th scope="row"><?php $brand_id = $users['pr'];
                    $select_brand =" SELECT * FROM `pr` WHERE id ='$brand_id'";
                    $result_brand =$conn->query($select_brand);
                    $brand = $result_brand->fetch_assoc();
                    echo $brand['name'];
                    ?></th>

                    <th scope="row">
                        <a href="?action=edit&id=<?= $users['id'] ?>" class="btn btn-primary">Edit</a>
                        <?php
                          if ($name === "owner") {
                        ?>
                        <a href="fun/delete_users.php?id=<?= $users['id'] ?>" class="btn btn-danger" style = "">Delete</a>
                        <?php
                          }
                        ?>
                    </th>
                  </tr>

    <?php  }  ?>              
                </tbody>
              </table>

                        <a href="?action=add" class="btn btn-success">Add</a>
