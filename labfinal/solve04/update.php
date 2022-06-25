
<?php
include("connection.php");
error_reporting(0);
$userId = $_GET['userId'];
$qry = "select * from register_list where number= '$userId'";
$data = mysqli_query($conn, $qry);
$total = mysqli_num_rows($data);
$result = mysqli_fetch_assoc($data)
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width= device-width, initial-scale=1">
    <title>Update Form</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="container">

      <form  action="#" method="POST">

      <div class="title">
        Update Details
      </div>

      <div class="form">
        <div class="input_field">
          <label for="name">Name</label>
          <input type="text" name="name" class="input" value="<?php echo $result['name']; ?>" required>
        </div>

        <div class="input_field">
          <label for="id">Id</label>
          <input type="number" name="id" class="input" value="<?php echo $result['userId']; ?>" required>
        </div>

        <div class="input_field">
          <label for="age">Age</label>
          <input type="number" name="age" class="input" value="<?php echo $result['age']; ?>" required>
        </div>

        <div class="input_field">
          <label for="username">Username</label>
          <input type="text" name="username" class="input" value="<?php echo $result['username']; ?>" required>
        </div>
        
        <div class="input_field">
          <label for="password">Password</label>
          <input type="password" name="password" class="input" value="" required>
        </div>
        
        <div class="input_field">
          <input type="submit"  value="Update" name="update" class="btn">
        </div>

      </div>

      </form>
    </div>

  </body>
</html>

<?php
if($_POST['update']){
  $name = $_POST['name'];
  $id = $_POST['id'];
  $age = $_POST['age'];
  $username = $_POST['username'];
  $password = $_POST['password'];


  $qry = "update register_list set name='$name', userId='$id' , age='$age', username='$username', password='$password'";
  $data = mysqli_query($conn, $qry);
  if($data){
    echo "<script>alert('Record Updated')</script>";
    ?>
    <meta http-equiv="refresh" content="0 url= http://localhost/labfinal/solve04/display.php"/>
    <?php
  }
  else{
    echo "Data Update Unsuccessfull";
  }
}
 ?>
