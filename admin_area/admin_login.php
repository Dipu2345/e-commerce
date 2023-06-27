<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!--bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    

    <!--font awesom link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
     body{
        overflow: hidden;
     }
        </style>
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Login

        </h2>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-xl-5">
                <img src="../img/adminreg.jpeg" alt="Admin Registration"
                class="img-fluid">
        </div>
        <div class="col-lg-6 col-xl-4">
            <form action="" method="post">
                <div class="form-outline mb-4">
                     <label for="username" class="form-label">Username</label>
                     <input type="text" id="username" name="username" 
                     placeholder="Enter your username" required="required"
                     class="form-control">
                </div>
                
                <div class="form-outline mb-4">
                     <label for="password" class="form-label">password</label>
                     <input type="password" id="password" name="password" 
                     placeholder="Enter your password" required="required"
                     class="form-control">
                </div>
                
     
                <input type="submit" class="bg-secondary bg-gradient py-2 px-3 border-0" name="admin_login" value="Login">
                <p class="small fw-bold mt-2 pt-1">Don't you have an account? <a href="admin_registration.php" class="link-danger">Register</a></p>
                 </form>
        </div>

    </div>
</body>
</html>
<?php
@session_start();

include('../includes/connect.php');
if (isset($_POST['admin_login'])) {
   $username = $_POST['username'];
   $password = $_POST['password'];
   $select_query = "select * from admin_table where admin_name='$username'";
   $result = mysqli_query($con, $select_query);
   $row_count = mysqli_num_rows($result);
   $row_data = mysqli_fetch_assoc($result);
  





   if ($row_count > 0) {
      $_SESSION['username'] = $username;

      if (password_verify($password, $row_data['admin_password'])) {
         // echo"<script>alert('login sucessfully');</script>";
         if ($row_count == 1 and $row_count_cart == 0) {
            $_SESSION['username'] = $username;
            
            echo"<script>alert('login sucessful');</script>";
            echo "<script>window.open('index.php','_self');</script>";
         } else {
            $_SESSION['username'] = $username;

            echo"<script>alert('login sucessful');</script>";
            echo "<script>window.open('index.php','_self');</script>";
         }
      } else {
         echo "<script>alert('invalid credential');</script>";
      }
   } else {
      echo "<script>alert('invalid credential')</script>";
   }
}





?>