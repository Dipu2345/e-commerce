<?php
include('../includes/connect.php');
if(isset($_POST["admin_registration"])){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $hash_password=password_hash($password,PASSWORD_DEFAULT);
    $cnf_pass=$_POST['confirm_password'];
    $select_query="SELECT * from admin_table where admin_name='$username'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    //selecct query for user email check
    $select_query1="SELECT * from admin_table where admin_email='$email'";
    $result1=mysqli_query($con,$select_query1);
    $rows_count1=mysqli_num_rows($result1);
   //condition before submiting form
    if($rows_count>0){
      echo "<script>alert('username already exist')</script>";
    }
    elseif($password!=$cnf_pass){
      echo "<script>alert('password don't match)</script>";
    }
    elseif($rows_count1>0){
      echo "<script>alert('email already exist')</script>";

    }
    else{
        $user_reg="INSERT INTO `admin_table`(admin_name,admin_email,admin_password) 
        VALUES('$username','$email','$hash_password')";
         $user_result=mysqli_query($con,$user_reg);
     

    if($user_result){
       echo "<script>alert('Registration  sucessful')</script>";
    }
    else{
      die(mysqli_error($con));
    }
   }
    }


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
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
        <h2 class="text-center mb-5">Admin Registration </h2>
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-6 col-xl-5">
                <img src="../img/adminreg.jpeg" alt="Admin Registration"
                class="img-fluid">
            </div>
        <div class="col-lg-6 col-xl-4">
            <form action="admin_registration.php" method="post">
                <div class="form-outline mb-4">
                     <label for="username" class="form-label">Username</label>
                     <input type="text" id="username" name="username" 
                     placeholder="Enter your username" required="required"
                     class="form-control" >
                </div>
                <div class="form-outline mb-4">
                     <label for="email" class="form-label">Email</label>
                     <input type="email" id="email" name="email" 
                     placeholder="Enter your email" required="required"
                     class="form-control">
                </div>
                <div class="form-outline mb-4">
                     <label for="password" class="form-label">password</label>
                     <input type="password" id="password" name="password" 
                     placeholder="Enter your password" required="required"
                     class="form-control">
                </div>
                <div class="form-outline mb-4">
                     <label for="confirm_password" class="form-label">Confirm password</label>
                     <input type="password" id="confirm_password" name="confirm_password" 
                     placeholder="Enter your confirm password" required="required"
                     class="form-control">
                </div>
                <input type="submit" class="bg-info py-2 px-3 border=0" name="admin_registration" value="Register"/>
                <p class="small fw-bold mt-2 pt-1">Do you already have an account? <a href="admin_login.php" class="link-danger">Login</a></p>
    </form>
        </div>

    </div>
   
</body>
</html>