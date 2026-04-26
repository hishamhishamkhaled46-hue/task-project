<?php
include("admin/fun/conn.php");
session_start();
if ($_SERVER['REQUEST_METHOD'] ==='POST') {
 $name = $_POST['name'];
 $pass = $_POST['pass'];
 $phone = $_POST['phone'];

 $select_al = "SELECT * FROM `admin` WHERE password = $pass";
 $result_al = $conn -> query($select_al);
//  $row_al = $result_al -> fetch_assoc();
 $num = $result_al -> num_rows ;
 
 if ($num = 0) {
 $insert="INSERT INTO admin(name, `phone number`, password) VALUES ('$name','$phone','$pass')";
  if($conn -> query($insert)){ 
  $last_id = $conn->insert_id;
  $_SESSION['admin_id'] = $last_id;
  $_SESSION['admin_name'] = $name;


}

  header("location:index.php");

 }else {
  $row_al = $result_al -> fetch_assoc();
  $last_id = $row_al['id'];
  $_SESSION['admin_id'] = $last_id;
  $_SESSION['admin_name'] = $name;
   header("location:index.php");
 }
}
 
include("inc/sit_header.php");
?>


<?php
// print_r($_POST);
// exit();

?>
 

<form class="row g-3" method="POST" action="<?= $_SERVER['PHP_SELF']?>">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label" >name</label>
    <input type="text" class="form-control" id="inputEmail4" name="name">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Password</label>
    <input type="password" class="form-control" id="inputPassword4" name="pass">
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label" >phone number</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="010########" name="phone">
  </div>
  <!-- <div class="col-12">
    <label for="inputAddress2" class="form-label">Address 2</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">City</label>
    <input type="text" class="form-control" id="inputCity">
  </div>
  <div class="col-md-4">
    <label for="inputState" class="form-label">State</label>
    <select id="inputState" class="form-select">
      <option selected>Choose...</option>
      <option>...</option>
    </select>
  </div>
  <div class="col-md-2">
    <label for="inputZip" class="form-label">Zip</label>
    <input type="text" class="form-control" id="inputZip">
  </div>
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div> -->
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Sign in</button>
  </div>
</form>