
<form method="POST" action="fun/do_add_pro.php" enctype="multipart/form-data">

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">product name:</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">price:</label>
    <input type="number" class="form-control" id="exampleInputPassword1" name="price">
  </div>

    <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">count:</label>
    <input type="number" class="form-control" id="exampleInputPassword1" name="count">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">description:</label>
    <textarea type="text" class="form-control" id="exampleInputPassword1" name="description" style="height: 150px;"></textarea>
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">image:</label>
    <input type="file" class="form-control" id="exampleInputPassword1" name="image[]" multiple>
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">brand:</label>
   <select class="form-select" aria-label="Default select example" name="brand">
    <?php
      $select_brand=" SELECT * FROM `brand`";
    //   print_r($select_brand);
      $result_brand=$conn->query($select_brand);
      while ($brand= $result_brand->fetch_assoc()) {
    ?>
     <option value="<?=$brand['id']?>"><?=$brand['name']?></option>
    <?php
      }
    ?>
   </select>
  </div>

   <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">category:</label>
   <select class="form-select" aria-label="Default select example" name="category">
    <?php
      $select_category=" SELECT * FROM `category`";
    //   print_r($select_category);
      $result_category=$conn->query($select_category);
      while ($category= $result_category->fetch_assoc()) {
    ?>
     <option value="<?=$category['id']?>"><?=$category['name']?></option>
    <?php
      }
    ?>
   </select>
  </div>

  <button type="submit" class="btn btn-success form-control">Add</button>
</form>

