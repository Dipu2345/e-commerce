<?php
include('../includes/connect.php');
session_start();
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Checkout</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="./index.css">
  <style>
    .text {
      font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
      padding: 0px 10px;
      background:linear-gradient(to left,#515153,#9f9fa1);
      color: white;
      border-radius: 10px;
      padding:0px 20px;
      margin-right: 15px;
     
    }
    .pa-1 {
      padding: 0px 10px;
    }
    .nav-item a{
      color: white;
      text-decoration: none;
      background: transparent;
      font-weight: 500;
    }
    .txt{
      color: white;
    }
    .nav-item a:hover{
      transition: 0.3s;
    font-style: italic;
      color: white;
    }
    .bg-infoo{
      background-color: blue;
    }
    
    .cursive {
      font-family: cursive;
    }
    .navbar{
      background-color: rgb(40, 40, 204);
    }
  
  </style>
</head>

<body>
  <!---navbar-->
  <div class="container-fluid p-0">
    <!--first child-->
    <nav class="navbar navbar-expand-lg ">
      <div class="container-fluid">
      <h2 class="text">G<sub>O</sub> K a r t</h2>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 pa-1">
            <li class="nav-item">
              <a class="nav-link active fw-bold" aria-current="page" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold" href="../display_all.php">Products</a>
            </li>
            <?php
            if (isset($_SESSION['username'])) {
              echo "  <li class='nav-item'>
                   <a class='nav-link fw-bold' href='profile.php'>My Account</a>
                   </li>";
                  } else {
                         echo "<li class='nav-item'>
                   <a class='nav-link fw-bold' href='user_registration.php'>Register</a>
                    </li>";
                     }



            ?>
            <li class="nav-item">
              <a class="nav-link fw-bold" href="../contact.php">contact</a>
            </li>
            
          </ul>
          <form class="d-flex" action="../search_product.php" method="get">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">

            <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">
          </form>
        </div>
      </div>
    </nav>
   
  </div>
  <!--second child-->
  <div class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav me-auto">
      
      <?php
        ///welcome guest
        if(!isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <a href='#' class='nav-link fw-bold '>Welcome guest</a>
        </li>";
     }
     else{
       echo "<li class='nav-item'>
       <a href='' class='nav-link fw-bold'>Welcome ". $_SESSION['username']."</a>
     </li>";
     }
     //user name

      if(!isset($_SESSION['username'])){
           echo "<li class='nav-item'>
           <a href='./user_login.php' class='nav-link fw-bold'>Login</a>
         </li>";
      }
      else{
        echo "<li class='nav-item'>
        <a href='logout.php' class='nav-link fw-bold'>Logout</a>
      </li>";
      }
      
      
      ?>
      
    </ul>
  </div>
  <!-----third child-->
  <div class="bg-light">
    <h3 class="text-center">Hidden Store</h3>
    <p class="text-center fw-bold cursive">Communications is the heart of e-commerce and community</p>
  </div>
  <!---fourth child-->

  <div class="row">
    <div class="col-md-10">
      <!--products-->
      <div class="row">
     <?php 
      if(!isset($_SESSION['username'])){
        include('user_login.php');
      }
      else{
        include('payment.php');
      }
     
     
     
     
     
     
     ?>
      </div>
      <!--col end-->
    </div>
  </div>
    





  <!--last child----->

  <!--include footer-->
  

  </div>
  <?php include("../includes/footer.php")  ?> 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>