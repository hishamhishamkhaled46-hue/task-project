<?php
include("fun/conn.php");
$id = $_GET['id'];

$select = "SELECT * FROM `products` WHERE id = '$id'";
$result = $conn -> query($select);
$product = $result -> fetch_assoc();
// print_r($product);
?>
<form method="POST" action="fun/do_edit_pro.php?id=<?=$id?>" enctype="multipart/form-data">

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">product name:</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value ="<?=$product['name']?>">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">price:</label>
    <input type="number" class="form-control" id="exampleInputPassword1" name="price" value ="<?=$product['price']?>">
  </div>

    <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">count:</label>
    <input type="number" class="form-control" id="exampleInputPassword1" name="count" value ="<?=$product['count']?>">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">description:</label>
    <textarea type="text" class="form-control" id="exampleInputPassword1" name="description" style="height: 150px;" ><?=$product['descr']?>"</textarea>
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">image:</label>
    <input type="file" class="form-control" id="exampleInputPassword1" name="image[]" value ="<?=$product['image'] ?> "multiple>
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
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">brand:</label>
   <select class="form-select" aria-label="Default select example" name="brand" value ="<?=$product['brand']?>">
    <?php
      $select_brand=" SELECT * FROM `brand`";
    //   print_r($select_brand);
      $result_brand=$conn->query($select_brand);
      while ($brand= $result_brand->fetch_assoc()) {
    ?>
     <option value="<?=$brand['id']?>" <?php
     if ($brand['id'] === $product['brand']) {
      echo "selected";
     }
     
     ?>><?=$brand['name']?></option>
    <?php
      }
    ?>
   </select>
  </div>

   <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">category:</label>
   <select class="form-select" aria-label="Default select example" name="category" value ="<?=$product['category']?>">
    <?php
      $select_category=" SELECT * FROM `category`";
    //   print_r($select_category);
      $result_category=$conn->query($select_category);
      while ($category= $result_category->fetch_assoc()) {
    ?>
     <option value="<?=$category['id']?>" <?php
     if ($category['id'] === $product['cat']) {
      echo "selected";
     }
     
     ?>><?=$category['name']?></option>
    <?php
      }
    ?>
   </select>
  </div>

  <button type="submit" class="btn btn-success form-control">update product</button>
</form>

