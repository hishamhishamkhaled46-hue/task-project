<?php
include("fun/conn.php");
$id = $_GET['id'];
// $name = $_GET['name'];
$id_pr =$_SESSION['login'];
// print_r($id_pr);
// exit();
$select = "SELECT * FROM `users` WHERE id = $id";
$result = $conn -> query($select);
$product = $result -> fetch_assoc();

?>
<form method="POST" action="fun/do_edit_users.php?id=<?=$id?>" enctype="multipart/form-data">

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">username:</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value ="<?=$product['username']?>">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">password:</label>
    <input type="number" class="form-control" id="exampleInputPassword1" name="password" value ="<?=$product['password']?>">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">email:</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="email" value ="<?=$product['email']?>">
  </div>

  <!-- <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">description:</label>
    <textarea type="text" class="form-control" id="exampleInputPassword1" name="description" style="height: 150px;" ><?=$product['descr']?>"</textarea>
  </div> -->

  <!-- <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">image:</label>
    <input type="file" class="form-control" id="exampleInputPassword1" name="image" value ="<?=$product['image']?>">
    <img src="image/<?=$product['image']?>" style="width: 150px;height: 150px;">
  </div> -->

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">gender:</label>
   <select class="form-select" aria-label="Default select example" name="gender" value ="<?=$product['grnder']?>">
    <?php
      $select_gender=" SELECT * FROM `gendr`";
    //   print_r($select_gender);
      $result_gender=$conn->query($select_gender);
      while ($gender= $result_gender->fetch_assoc()) {
    ?>
     <option value="<?=$gender['id']?>" <?php
     if ($gender['id'] === $product['id']) {
      echo "selected";
     }
     
     ?>><?=$gender['name']?></option>
    <?php
      }
    ?>
   </select>
  </div>

   <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">pr:</label>
   <select class="form-select" aria-label="Default select example" name="pr" value ="<?=$product['pr']?>">
    <?php
      $select_pr=" SELECT * FROM `pr` WHERE id >= $id_pr";
      $result_pr=$conn->query($select_pr);
      while ($pr= $result_pr->fetch_assoc()) {
    ?>
     <option value="<?=$pr['id']?>" <?php
     if ($pr['id'] === $product['pr']) {
      echo "selected";
     }
     
     ?>><?=$pr['name']?></option>
    <?php
      }
    ?>
   </select>
  </div>

  <a href=""><button type="submit" class="btn btn-success form-control">update users</button></a>
</form>

