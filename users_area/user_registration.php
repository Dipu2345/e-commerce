<?php
include('../includes/connect.php');
include('../functions/common_function.php');
if (isset($_POST['user_register'])) {
  $user_username = $_POST['user_username'];
  $user_email = $_POST['user_email'];
  $user_password = $_POST['user_password'];
  $hash_password = password_hash($user_password, PASSWORD_DEFAULT);
  $conf_user_password = $_POST['conf_user_password'];
  $user_address = $_POST['user_address'];
  $user_contact = $_POST['user_contact'];
  $user_image = $_FILES['user_image']['name'];
  $user_image_temp = $_FILES['user_image']['tmp_name'];
  $user_ip = getIPAddress();

  //selsct query for username fetch
  $select_query = "SELECT * from user_table where user_name='$user_username'";
  $result = mysqli_query($con, $select_query);
  $rows_count = mysqli_num_rows($result);
  //selecct query for user email check
  $select_query1 = "SELECT * from user_table where user_email='$user_email'";
  $result1 = mysqli_query($con, $select_query1);
  $rows_count1 = mysqli_num_rows($result1);
  //condition before submiting form
  if ($rows_count > 0) {
    echo "<script>alert('username already exist')</script>";
  } elseif ($user_password != $conf_user_password) {
    echo "<script>alert('password don't match)</script>";
  } elseif ($rows_count1 > 0) {
    echo "<script>alert('email already exist')</script>";

  } else {
    move_uploaded_file($user_image_temp, "./user_images/$user_image");
    $user_reg = "INSERT INTO `user_table`(user_name,user_email,user_password,user_image,user_ip,user_address,user_mobile) 
             VALUES('$user_username','$user_email','$hash_password','$user_image','$user_ip','$user_address','$user_contact')";
    $user_result = mysqli_query($con, $user_reg);


    if ($user_result) {
      echo "<script>alert('Registred  sucessfully')</script>";
      //select cart item or not
      $select_cart_item = "select * from cart_details where ip_address='$user_ip'";
      $result_cart = mysqli_query($con, $select_cart_item);
      $rows_count = mysqli_num_rows($result_cart);
      if ($rows_count > 0) {
        $_SESSION['username'] = $user_username;
        echo "<script>alert('You have items in your cart')</script>";
        echo "<script>window.open('checkout.php','_self');</script>";

      } else {
        echo "<script>window.open('../index.php','_self');</script>";

      }
    } else {
      die(mysqli_error($con));
    }
  }
  //select cart item or not
  // $select_cart_item = "select * from cart_details where ip_address='$user_ip'";
  // $result_cart = mysqli_query($con, $select_cart_item);
  // $rows_count = mysqli_num_rows($result_cart);
  // if ($rows_count > 0) {
  //   $_SESSION['username'] = $user_username;
  //   echo "<script>alert('You have items in your cart')</script>";
  //   echo "<script>window.open('checkout.php','_self');</script>";

  // } else {
  //   echo "<script>window.open('../index.php','_self');</script>";

  // }


}






?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Registration</title>
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <style>
    body {
      overflow-x: hidden;
      background-image: ;



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

    .width {
      width: 100%;
      height: 100%;
    }
  </style>

</head>

<body>

  <!-- second -->
  <div class="container-fluid m-3">
    <h2 class="text-center mb-5 lin">User Registration</h2>
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col-lg-6 col-xl-5">
        <img src="../img/user1.jpeg" alt="Admin Registration" class="img-fluid width">
      </div>
      <div class="col-lg-6 col-xl-4">
        <form action="" method="post" enctype="multipart/form-data" onclick="return">
          <div class="form-outline mb-4" data-aos="fade-in">
            <label for="user_username" class="form-label lin">Username</label>
            <input type="text" name="user_username" id="user_username" class="form-control"
              placeholder=" Plese Enter username" />
            <span id="username_error"></span>
          </div>
          <div class="form-outline mb-4" data-aos="fade-in">
            <label for="user_email" class="form-label lin"> Email</label>
            <input type="email" name="user_email" id="user_email" class="form-control" placeholder="Enter email" />
            <span id="email_error"></span>
          </div>
          <div class="form-outline mb-4" data-aos="fade-in">
            <!--user iamge-->
            <label for="user_image" class="form-label lin">image</label>
            <input type="file" name="user_image" id="user_image" class="form-control"
              placeholder="choose profile picture" />
          </div>
          <div class="form-outline mb-4" data-aos="fade-in">
            <!--user password-->
            <label for="user_password" class="form-label lin">password</label>
            <input type="password" name="user_password" id="user_password" class="form-control"
              placeholder="enter password" />
            <span id="password"></span>
          </div>
          <div class="form-outline mb-4" data-aos="fade-in">
            <label for="confirm_password" class="form-label lin">Confirm password</label>
            <input type="password" id="confirm_password" name="conf_user_password"
              placeholder="Enter your confirm password" required="required" class="form-control">
            <span id="con_pass"></span>
          </div>
          <div class="form-outline mb-4" data-aos="fade-in">
            <!--user address-->
            <label for="user_address" class="form-label lin">User Address</label>
            <input type="text" name="user_address" id="user_address" class="form-control"
              placeholder=" Plese Enter Valid Address " />
            <span id="address"></span>
          </div>
          <div class="form-outline mb-4" data-aos="fade-in">
            <!--user contact-->
            <label for="user_contact" class="form-label lin">Mobile Number</label>
            <input type="text" name="user_contact" id="user_contact" class="form-control"
              placeholder="Enter mobile number" />
            <span id="mobile"></span>
          </div>
          <input type="submit" class="btn py-2 px-3 border=0" name="user_register" value="register" id="submit_verify"/>
          <p class="small fw-bold mt-2 pt-1">Do you already have an account? <a href="user_login.php"
              class="link-danger fw-bold">Login</a></p>
        </form>
      </div>

    </div>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
      integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script>
      $(document).ready(function () {
        $("#username_error").hide();
        $("#email_error").hide();

        $("#password").hide();
        $("#con_pass").hide();
        $("#address").hide();
        $("#mobile").hide();
        let user_verify = true;
        let email_verify = true;
        let password_verify = true;
        let cnf_password_verify = true;
        let address_verify = true;
        let mobile_verify = true;



        //  username verify
        $("#user_username").keyup(function () {
          username_verify();

        });
        function username_verify() {
          let user = $("#user_username").val();
          if (user == "") {
            $("#username_error").show();
            $("#username_error").html("**Please  Enter Username ");
            $("#username_error").focus();
            $("#username_error").css("color", "red");
            $("#user_username").css("color", "red");

            user_verify = false;
            return false;
          }
          else {
            $("#user_username").css("color", "green");
            $("#username_error").hide();

          }
          if ((user.length < 4) || (user.length > 15)) {
            $("#username_error").show();
            $("#username_error").html("**length between 4-15 ");
            $("#username_error").focus();
            $("#username_error").css("color", "red");
            $("#user_username").css("color", "red");
            user_verify = false;
            return false;
          }
          else {
            $("#user_username").css("color", "green");
            $("#username_error").hide();

          }
        }
        // email
        $("#user_email").keyup(function () {
          mail_verify();
        });
        function mail_verify() {
          let email = $("#user_email").val();
          if (email == "") {
            $("#email_error").show();
            $("#email_error").html("**Please Enter Email");
            $("#email_error").focus();
            $("#email_error").css("color", "red");
            $("#user_email").css("color", "red");
            email_verify = false;
            return false;
          }
          else {
            $("#user_email").css("color", "green");
            $("#email_error").hide();
          }
          if(email.indexOf("@")==0){
            $("#email_error").show();
            $("#email_error").html("** Invalid @ position");
            $("#email_error").focus();
            $("#email_error").css("color", "red");
            $("#user_email").css("color", "red");
            email_verify = false;
            return false;
          }
          else {
            $("#user_email").css("color", "green");
            $("#email_error").hide();
          }
          if(email.charAt(email.length-4)!="."){
            $("#email_error").show();
            $("#email_error").html("** Please Enter Valid Email Address");
            $("#email_error").focus();
            $("#email_error").css("color", "red");
            $("#user_email").css("color", "red");
            email_verify = false;
            return false;
          }
          else {
            $("#user_email").css("color", "green");
            $("#email_error").hide();
          }
        }
        $("#user_password").keyup(function(){
            password_check();
        });
        function password_check(){
          let password= $("#user_password").val();
          if(password ==""){
            $("#password").show();
            $("#password").html("**Plese Enter Password");
            $("#password").focus();
            $("#password").css("color","red");
            $("#user_password").css("color","red");
            password_verify = false;
            return false

          }
          else{
            $("#user_password").css("color","green");
            $("#password").hide();
          }
          if((password.length <4) || (password.length >8)){
            $("#password").show();
            $("#password").html("** Length between 4-8");
            $("#password").focus();
            $("#password").css("color","red");
            $("#user_password").css("color","red");
            password_verify = false;
            return false

          }
          else{
            $("#user_password").css("color","green");
            $("#password").hide();
          }
        }
    //  confirm password check
    $("#confirm_password").keyup(function(){
             cnf_password();
    });
          function cnf_password(){
            let pass= $("#user_password").val();
            let cnf_pass= $("#confirm_password").val();
            if(cnf_pass ==""){
              $("#con_pass").show();
              $("#con_pass").html("Please Fill This Field");
              $("#con_pass").focus();
              $("#con_pass").css("color","red");
              $("#confirm_password").css("color","red");
              cnf_password_verify = false;
              return false;
            }
            else{
              $("#confirm_password").css("color","green");
              $("#con_pass").hide();

            }
            if(cnf_pass!=pass){
              $("#con_pass").show();
              $("#con_pass").html("Password Are Not Matching");
              $("#con_pass").focus();
              $("#con_pass").css("color","red");
              $("#confirm_password").css("color","red");
              cnf_password_verify = false;
              return false;
            }
            else{
              $("#con_pass").hide();
              $("#confirm_password").css("color","green");
            }
          }

          // address
          $("#user_address").keyup(function(){
                       address_check();
          });
          function address_check(){
            let address= $("#user_address").val();
            if(address==""){
              $("#address").show();
              $("#address").html("** Please Enter Address");
              $("#address").focus();
              $("#address").css("color","red");
              $("#user_address").css("color","green");
              address_verify = false;
              return false;
            }
            else{
              $("#user_address").css("color","green");

              $("#address").hide();
            }
          }

          // mobie verify
          $("#user_contact").keyup(function(){
            mobile_check();
          });
          function mobile_check(){
            let mobile= $("#user_contact").val();
            if(mobile == ""){
              $("#mobile").show();
              $("#mobile").html("** Please Enter  mobile Number");
              $("#mobile").focus();
              $("#mobile").css("color","red");
              $("#user_contact").css("color","red");

              mobile_verify = false;
              return false
            }
            else{
              $("#user_contact").css("color","green");

              $("#mobile").hide();
            }
            if(mobile.length>11){
              $("#mobile").show();
              $("#mobile").html("** Please Enter valid mobile Number");
              $("#mobile").focus();
              $("#mobile").css("color","red");
              $("#user_contact").css("color","red");

              mobile_verify = false;
              return false
            }
            else{
              $("#user_contact").css("color","green");

              $("#mobile").hide();
            }
          }

          // final check during submit
          $("#submit_verify").click(function(){
            user_verify = true;
           email_verify = true;
           password_verify = true;
           cnf_password_verify = true;
           address_verify = true;
           mobile_verify = true;
           username_verify();
           mail_verify();
           password_check();
           cnf_password();
           address_check();
           mobile_check();
           if(( user_verify == true) &&(email_verify == true)&&(password_verify == true)&&(cnf_password_verify == true)
           &&(address_verify == true)&&(mobile_verify == true)){
            return true;
           }
           else{
            return false;
           }

          });
      });
    </script>
</body>

</html>