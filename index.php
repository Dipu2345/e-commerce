<?php
include('./includes/connect.php');
include('./functions/common_function.php');
session_start();
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Go cart</title>
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="./index.css">
  <style>
    html{
      scroll-behavior: smooth;
    }
    .lh {
      line-height: normal;
    }

    body {
      overflow-x: hidden;
      line-height: normal;
    }

    .text {
      font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
      padding: 0px 10px;
      background:linear-gradient(to left,#515153,#9f9fa1);
      color: white;
      border-radius: 10px;
      padding:0px 20px;
      margin-right: 15px;
     
    }
    .txt{
      color: white;
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
    .bounce{
      animation: bouncing 0.6s ease infinite alternate;
    }
    @keyframes bouncing {
      0%{
        transform: translateY(0px);
      }
      100%{
        transform: translateY(10px);
      }
    }
    .lin{
        background: linear-gradient(15deg,red,blue);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .bg{
            display: flex;
            justify-content: center;
            text-align: center;
            background:#252839;
    }
    .h3{
      position: relative;
      color: #252839;
      -webkit-text-stroke: 0.3vw #383d52;

    }
    .h3::before{
       content: attr(data-text);
       position: absolute;
       top: 0;
       
       width:0;
       height: 100%;
       color: #01fe87;
       -webkit-text-stroke: 0vw #383d52;
       border-right: 2px solid  #01fe87;
       overflow: hidden;
       animation: animate 6s linear infinite;
    }
    @keyframes animate{
      0%,10%,100%{
        width: 0;
      }
      70%,90%{
        width: 100%;
      }
    }
    
    .ro{
        gap: 30px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
    }
    @keyframes fade-inout{
          0%{opacity: 0;}
          100%{opacity: 1;}

        }
        .inout{
          animation: fade-inout 4s infinite alternate ;
        }
        .side{
          height: fit-content;
        }
   
  </style>
</head>

<body>
  <!---navbar-->
  <div class="container-fluid p-0">
    <!--first child-->
    <nav class="navbar navbar-expand-lg  nav-bar">
      <div class="container-fluid">
        <h2 class="text">G<sub>O</sub> K a r t</h2>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 pa-1">
            <li class="nav-item">
              <a class=" fw-bold nav-link " aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold" href="display_all.php">Products</a>
            </li>
            <?php
            if (isset($_SESSION['username'])) {
              echo "  <li class='nav-item'>
                   <a class='nav-link fw-bold' href='./users_area/profile.php'>My Account</a>
                   </li>";
                  } else {
                         echo "<li class='nav-item'>
                   <a class='nav-link fw-bold' href='./users_area/user_registration.php'>Register</a>
                    </li>";
                     }



            ?>
            
            <li class="nav-item">
              <a class="nav-link fw-bold" href="contact.php">contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup> Cart</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold t-price" href="#">Total price: <?php total_cart_price(); ?>/-</a>
            </li>
          </ul>
          <form class="d-flex" action="search_product.php" method="get">
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
          <a href='#' class='nav-link fw-bold t-price'>Welcome guest</a>
        </li>";
      } else {
        echo "<li class='nav-item'>
       <a href='' class='nav-link fw-bold t-price'>Welcome " . $_SESSION['username'] . "</a>
     </li>";
      }

      ///     login and logout
      if (!isset($_SESSION['username'])) {
        echo "<li class='nav-item'>
           <a href='./users_area/user_login.php' class='nav-link fw-bold'>Login</a>
         </li>";
      } else {
        echo "<li class='nav-item'>
        <a href='./users_area/logout.php' class='nav-link fw-bold'>Logout</a>
      </li>";
      }


      ?>
    </ul>
  </div>
  <!-----third child-->
  <div class="bg-light lh" data-aos="fade-in">
    <h3 class="text-center   fw-bold lin bounce ">Trending</h3>
    <p class="text-center fw-bold cursive lh bounce fw-bold lin">Communications is the heart of e-commerce and community</p>
  </div>
  <!---fourth child-->
 <?php  include('ban1.php')?>

   
  <div class="row lh">
    <div class="col-md-10" data-aos="fade-in">
      <!--products-->
      <div class="row">
        <!---fetching products--->
        <?php
        //calling function
        get_all_products();
        get_unique_categories();
        get_unique_brands();
        $ip = getIPAddress();
        

        ?>
       
        <!--row end-->
      </div>
     <?php //include('ban1.php'); ?> 
      <!--col end-->
    </div>
    <div class="col-md-2 bg-secondary p-0 side">
      <!--sidenav brands to displayed-->
      <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-infoo">
          <a href="#" class="nav-link text-light">
            <h5>Brands</h5>
          </a>
        </li>
        <?php
        getbrands();
        ?>

      </ul>
      <!--catagory to displayed-->
      <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-infoo">
          <a href="#" class="nav-link ">
            <h5>Catagories</h5>
          </a>
        </li>
        <?php
        getcategories()

        ?>

      </ul>
    </div>
  </div>
  




  <!--last child----->

  <!--include footer-->
  <?php include("./includes/footer.php")  ?>

  </div>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>