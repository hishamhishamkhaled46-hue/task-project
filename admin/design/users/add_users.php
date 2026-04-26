<?php
include("fun/conn.php");
$id = $_SESSION['login'];
// $name = $_GET['name'];
?>
<form method="POST" action="fun/do_add_users.php" enctype="multipart/form-data">

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">username:</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" >
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">password:</label>
    <input type="number" class="form-control" id="exampleInputPassword1" name="password" >
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">email:</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="email" >
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">gender:</label>
   <select class="form-select" aria-label="Default select example" name="gender" >
    <?php
      $select_gender=" SELECT * FROM `gendr`";
      print_r($select_gender);
      $result_gender=$conn->query($select_gender);
      while ($gender= $result_gender->fetch_assoc()) {
    ?>
     <option value="<?=$gender['id']?>"><?=$gender['name']?></option>
     <<?php
      }
      ?>
   </select>
  </div>

   <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">pr:</label>
   <select class="form-select" aria-label="Default select example" name="pr" >
    <?php
      $select_pr=" SELECT * FROM `pr` WHERE id >= $id ";
      $result_pr=$conn->query($select_pr);
      while ($pr= $result_pr->fetch_assoc()) {
    ?>
     <option value="<?=$pr['id']?>"><?=$pr['name']?></option>
     <?php
      }
     ?>
   </select>
  </div>

  <a href=""><button type="submit" class="btn btn-success form-control">Add users</button></a>
</form>

