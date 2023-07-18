<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>User Registration</title>
   <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
   <style>
      body {
         overflow-x: hidden;
        background-color: #3800ff12;
      }
      .btn {
      border: 2px solid blue;
      background-color: blue;
      color: white;
      transition: 0.3s;
      font-weight: bolder;
    }

    .btn:hover {
      background-color: white;
      border: 2px solid blue;
      color: blue;
      font-weight: bolder;

    }
      .lin {
      background: linear-gradient(15deg, red, blue);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .form-control {
      border: none;
      border-bottom: 2px solid blue;
      
      /* transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out; */
    }

    .form-control:hover {
      color: blue;
     
    }
   </style>

</head>

<body>
   <!-- second -->
   <div class="container-fluid m-3">
      <h2 class="text-center mb-5 lin">USER LOGIN </h2>
      <div class="row d-flex justify-content-center">
         <div class="col-lg-6 col-xl-5">
            <img src="../img/user.png" alt="Admin Registration" class="img-fluid">
         </div>
         <div class="col-lg-6 col-xl-4">
            <form action="user_login.php" method="post">
               <div class="form-outline mb-4"  data-aos="fade-in">
                  <!--username fieled-->
                  <label for="user_username" class="form-label">Username</label>
                  <input type="text" name="user_username" id="user_username" placeholder="Enter Username"
                     class="form-control " />
               </div>

               <div class="form-outline mb-4"  data-aos="fade-in">
                  <!--user password-->
                  <label for="user_password" class="form-label">password</label>
                  <input type="password" name="user_password" id="user_password" placeholder="Enter Password"
                     class="  form-control" />
               </div>

               <div class="mt-4 pt-2"  data-aos="fade-in">
                  <input type="submit" value="Login" class="btn py-2 px-3 " name="user_Login" />
                  <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an Account?
                     <a href="user_registration.php" class="text-danger text-decoration-none fw-bold"> Register</a>
                  </p>
               </div>
         </div>

      </div>
   </div>
   <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</html>
<?php
@session_start();
include('../functions/common_function.php');
include('../includes/connect.php');
if (isset($_POST['user_Login'])) {
   $user_username = $_POST['user_username'];
   $user_password = $_POST['user_password'];
   $select_query = "select * from user_table where user_name='$user_username'";
   $result = mysqli_query($con, $select_query);
   $row_count = mysqli_num_rows($result);
   $row_data = mysqli_fetch_assoc($result);
   
   
   
    
   $user_ip = getIPAddress();
   //cart item
   $select_query_cart = "select * from `cart_details` where ip_address='$user_ip'";
   $select_cart = mysqli_query($con, $select_query_cart);
   $row_count_cart = mysqli_num_rows($select_cart);




   if ($row_count > 0) {
      $_SESSION['username'] = $user_username;

      if (password_verify($user_password, $row_data['user_password'])) {
         // echo"<script>alert('login sucessfully');</script>";
         if ($row_count == 1 and $row_count_cart == 0) {
            $_SESSION['username'] = $user_username;
            $user_id=$row_data['user_id'];
             $_SESSION['user_order_id']=$user_id;
   
            echo "<script>alert('login sucessful');</script>";
            echo "<script>window.open('profile.php','_self');</script>";
         } else {
            $user_id=$row_data['user_id'];
           $_SESSION['user_order_id']=$user_id;
   
            $_SESSION['username'] = $user_username;

            echo "<script>alert('login sucessful');</script>";
            echo "<script>window.open('payment.php','_self');</script>";
         }
      } else {
         echo "<script>alert('invalid credential');</script>";
      }
   } else {
      echo "<script>alert('invalid credential')</script>";
   }
}





?>