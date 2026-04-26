<?php
include("fun/conn.php");
$id = $_GET['id'];
// print_r($id);
// exit();
$select = "SELECT * FROM `category` WHERE id = '$id'";
$result = $conn -> query($select);
$product = $result -> fetch_assoc();
// print_r($product);
?>
<form method="POST" action="fun/do_edit_pr.php?id=<?=$id?>" enctype="multipart/form-data">

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label"> name:</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value ="<?=$product['name']?>">
  </div>

  <button type="submit" class="btn btn-success form-control">update name</button>
</form>

