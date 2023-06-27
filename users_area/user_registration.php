<?php
include('../includes/connect.php');
include('../functions/common_function.php');
if(isset($_POST['user_register'])){
         $user_username=$_POST['user_username'];   
         $user_email=$_POST['user_email'];
         $user_password=$_POST['user_password'];
         $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
         $conf_user_password=$_POST['conf_user_password'];  
         $user_address=$_POST['user_address'];   
         $user_contact=$_POST['user_contact']; 
         $user_image=$_FILES['user_image']['name'];  
         $user_image_temp=$_FILES['user_image']['tmp_name']; 
         $user_ip=getIPAddress();
        
                      //selsct query for username fetch
          $select_query="SELECT * from user_table where user_name='$user_username'";
          $result=mysqli_query($con,$select_query);
          $rows_count=mysqli_num_rows($result);
          //selecct query for user email check
          $select_query1="SELECT * from user_table where user_email='$user_email'";
          $result1=mysqli_query($con,$select_query1);
          $rows_count1=mysqli_num_rows($result1);
         //condition before submiting form
          if($rows_count>0){
            echo "<script>alert('username already exist')</script>";
          }
          elseif($user_password!=$conf_user_password){
            echo "<script>alert('password don't match)</script>";
          }
          elseif($rows_count1>0){
            echo "<script>alert('email already exist')</script>";

          }
          else{
             move_uploaded_file($user_image_temp,"./user_images/$user_image");
             $user_reg="INSERT INTO `user_table`(user_name,user_email,user_password,user_image,user_ip,user_address,user_mobile) 
             VALUES('$user_username','$user_email','$hash_password','$user_image','$user_ip','$user_address','$user_contact')";
              $user_result=mysqli_query($con,$user_reg);
          

         if($user_result){
            echo "<script>alert('data inserted sucessfully')</script>";
         }
         else{
           die(mysqli_error($con));
         }
        }
        //select cart item or not
        $select_cart_item="select * from cart_details where ip_address='$user_ip'";
        $result_cart=mysqli_query($con,$select_cart_item);
        $rows_count=mysqli_num_rows($result_cart);
        if($rows_count>0){
            $_SESSION['username']= $user_username;
            echo "<script>alert('You have items in your cart')</script>";
            echo "<script>window.open('checkout.php','_self');</script>";

        }
        else{
            echo "<script>window.open('../index.php','_self');</script>";

        }
        
    
}






?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <style>
   input{
    background-image: url(../img/register-background.jpg);
    background-repeat: no-repeat;
    object-fit: contain;

   }
  </style>

  </head>
<body>
    <div class="container-fluid"> 
            <h2 class="text-center">New User Registration</h2>
          <div class="row d-flex align-item-center justify-content-center">
              <div class="col-lg-12 col-xl-6">
                    <form action="user_registration.php" method="post" enctype="multipart/form-data">
                       <div class="form-outline mb-4">
                        <!--username fieled-->
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" name="user_username" id="user_username" class="form-control" placeholder="Enter username"/>
                       </div>
                       <div class="form-outline">
                        <!--user email-->
                        <label for="user_email" class="form-label"> Email</label>
                        <input type="email" name="user_email" id="user_email" class="form-control" placeholder="Enter email" />
                       </div>
                       <div class="form-outline">
                        <!--user iamge-->
                        <label for="user_image" class="form-label">image</label>
                        <input type="file" name="user_image" id="user_image" class="form-control" placeholder="choose profile picture" />
                       </div>
                       <div class="form-outline">
                        <!--user password-->
                        <label for="user_password" class="form-label">password</label>
                        <input type="password" name="user_password" id="user_password" class="form-control" placeholder="enter password" />
                       </div>
                       <div class="form-outline">
                        <!--userconfirm password-->
                        <label for="conf_user_password" class="form-label">Confirm Password</label>
                        <input type="password" name="conf_user_password" id="conf_user_password" class="form-control" placeholder="Enter correct password"/>
                       </div>
                       <div class="form-outline mb-4">
                        <!--user address-->
                        <label for="user_address" class="form-label">User Address</label>
                        <input type="text" name="user_address" id="user_address" class="form-control" placeholder="Enter Address"/>
                       </div>
                       <div class="form-outline mb-4">
                        <!--user contact-->
                        <label for="user_contact" class="form-label">Mobile Number</label>
                        <input type="text" name="user_contact" id="user_contact" class="form-control" placeholder="Enter mobile number"/>
                       </div>
                        <div class="mt-4 pt-2">
                            <input type="submit" value="Register" class="bg-info py-2 px-3 border-0" name="user_register"/>
                            <p class="small fw-blod mt-2 pt-1 mb-0">Already have an Account? 
                             <a href="user_login.php" class="text-danger text-decoration-none"> Login</a></p>
                        </div>
                     </form>
                </div>
             </div>
        



    </div>
</body>
</html>