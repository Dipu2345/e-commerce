<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Welcome <?php echo $_SESSION['username'] ?></title>
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="../index.css">
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
      font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
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
    .lh {
      line-height: normal;
    }

    body {
      overflow-x: hidden;
      line-height: normal;
    }

    
    .profile_img {
      width: 90%;
      margin: auto;
      display: block;
      /*height: 100%;*/
      object-fit: contain;
    }

    .edit_image {
      width: 100px;
      height: 100px;
      object-fit: contain;
    }
    @keyframes fade-inout{
          0%{opacity: 0;}
          100%{opacity: 1;}

        }
        .inout{
          animation: fade-inout 4s infinite alternate ;
        }
        .lin{
    background: linear-gradient(15deg,red,blue);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}
.t-price{
    color:   white;
    cursor:not-allowed;
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
              <a class="nav-link fw-bold" aria-current="page" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold" href="../display_all.php">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold" href="profile.php">My Account</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold" href="../contact.php">contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup>Cart</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold t-price" href="#">Total price: <?php total_cart_price(); ?>/-</a>
            </li>
          </ul>
          <form class="d-flex" action="../search_product.php" method="get">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">

            <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">
          </form>
        </div>
      </div>
    </nav>
    <!--calling cart function-->
    <?php
    cart();
    ?>
  </div>
  <!--second child-->
  <div class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav me-auto">


      <?php
      ///welcome guest
      if (!isset($_SESSION['username'])) {
        echo "<li class='nav-item'>
          <a href='#' class='nav-link fw-bold '>Welcome guest</a>
        </li>";
      } else {
        echo "<li class='nav-item'>
       <a href='' class='nav-link fw-bold'>Welcome " . $_SESSION['username'] . "</a>
     </li>";
      }

      ///     login and logout
      if (!isset($_SESSION['username'])) {
        echo "<li class='nav-item'>
           <a href='user_login.php' class='nav-link fw-bold'>Login</a>
         </li>";
      } else {
        echo "<li class='nav-item'>
        <a href='logout.php' class='nav-link fw-bold'>Logout</a>
      </li>";
      }


      ?>
    </ul>
  </div>
  <!-----third child-->
  <div class="bg-light lh">
    <h3 class="text-center lh fw-bold lin inout">Trending</h3>
    <p class="text-center fw-bold cursive lh lin inout">Communications is the heart of e-commerce and community</p>
  </div>
  <!--fourth child-->
  <div class="row">
    <div class="col-md-2"  data-aos="fade-in">
      <ul class="navbar-nav bg-secondary text-center" style="height:100vh">
        <li class="nav-item " >
          <a class="nav-link text-light" href="#">
            <h4 class="fw-bold lin inout">Your Profile<h4>
          </a>
        </li>
        <?php

        $username = $_SESSION['username'];
        $user_image = "Select * from user_table where user_name='$username'";
        $user_image = mysqli_query($con, $user_image);
        $row_image = mysqli_fetch_array($user_image);
        $user_image = $row_image['user_image'];
        echo " <li class='nav-item'>
<img src='./user_images/$user_image' class='profile_img my-4' alt=''>
</li>";



        ?>

        <li class="nav-item">
          <a class="nav-link text-light" href="profile.php">Pending Order</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="profile.php?edit_account">Edit Account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="profile.php?my_orders">My Orders</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="profile.php?delete_account">Delete Account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="logout.php">Logout</a>
        </li>

      </ul>

    </div>
    <div class="col-md-10 text-center">

      <?php get_user_order_details();
      if (isset($_GET['edit_account'])) {
        include('edit_account.php');
      }
      if (isset($_GET['my_orders'])) {
        include('user_orders.php');
      }
      if (isset($_GET['delete_account'])) {
        include('delete_account.php');
      }


      ?>
    </div>
  </div>



  <!--last child----->

  <!--include footer-->
  <?php include("../includes/footer.php")  ?>

  </div>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>