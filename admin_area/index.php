<!--connect file-->
<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!--bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    

    <!--font awesom link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!--css file-->
    <link rel="stylesheet" href="../index.css">
    <style>
        .admin_image {
            width: 100px;
            object-fit: contain;
            border: 1px solid black;
            border-radius: 20px;
        }

        .footer {

            position: absolute;

            bottom: 0;
        }

        .body {
              overflow: visible;
            /* overflow-x: hidden; */
        }

        .bg-info {
            color: black;
            background-color: white;
        }
        .product_image{
            width: 130px;
            height: 50px;
            object-fit: contain;
        }
        .product_img {
            width: 100px;
            object-fit: contain;
        }
        .navbar{
          background-color: rgb(40, 40, 204);
          color: white;
               }
               .text {
      font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
      padding: 0px 10px;
      
      color: white;
      
    }
    .bg-infoo{
        color: white;
        background-color: blue;
    }
    .nav-link{
        
       
        width: 100%;
    }
    button{
        background-color: blue;
        
    }
    .formm{
        
       border: 2px solid red;

    }
    .main{
        display: flex;
        align-items:text-center;
        justify-content: center;
    }
    .cl-white{
        color: white;
        text-decoration: none;
    }
    .cl-white:hover{
        color: red;
        cursor: not-allowed;
    }
    .cate{
        background-color: blue;
        color: white;
        box-shadow: 0.5px 0.5px 5px 5px blue;
    }
    .lin{
        background: linear-gradient(15deg,red,blue);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    </style>
</head>

<body>
    <!--navbar-->
    <div class="container-fluid p-0">
        <!--First child-->
        <nav class="navbar navbar-expand-lg ">
            <div class="container-fluid">
            <h2 class="text">G<sub>O</sub> K a r t</h2>
            <div class="">
                    <!-- <a href="#"><img src="../img/images.jpg" alt="" class="admin_image"></a> -->
                    <div class="text-light text-center"> 
                        
                        <?php  if (!isset($_SESSION['username'])) {
                         echo "<li class='nav-item'>
                                   <a href='#' class='nav-link fw-bold '>Hello guest</a>
                                   </li>";
                         } else {
                           echo "<li class='nav-item'>
                           <a href='#' class='nav-link fw-bold'>Hello " .$_SESSION['username'] . "</a>
                            </li>";
                            }
                       ?></div>
                </div>
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                  <?php  if (!isset($_SESSION['username'])) {
              echo "<li class='nav-item'>
          <a href='#' class=' fw-bold cl-white'>Welcome guest</a>
        </li>";
      } else {
        echo "<li class='nav-item'>
       <a href='' class=' fw-bold cl-white'>Welcome " . $_SESSION['username'] . "</a>
     </li>";
      }
      ?>
                    </ul>
                </nav>
            </div>
        </nav>
        <!--Second child-->
        <div class="bg-light">

            <h3 class="text-center p-2  fw-bold lin"> Admin Manage Details</h3>
        </div>
       
        <!--third child-->
        <div class="main">
            <div class="">
              

                <!--button*10>a.nav-link.text-light.bg-info.my-1-->
                <div class="button text-center">
                    <button class="my-3"><a href="insert_product.php" class="nav-link text-light my-1">Insert Products</a></button>
                    <button><a href="index.php?view_products" class="nav-link text-light my-1">View Product</a></button>
                    <button><a href="index.php?insert_category" class="nav-link text-light  my-1">Insert Catagories</a></button>
                    <button><a href="index.php?view_categories" class="nav-link text-light  my-1">view Catagories</a></button>
                    <button><a href="index.php?insert_brand" class="nav-link text-light my-1">Insert Brands</a></button>
                    <button><a href="index.php?view_brands" class="nav-link text-light  my-1">View Brands</a></button>
                    <button><a href="index.php?list_orders" class="nav-link text-light  my-1">All orders</a></button>
                    <button><a href="index.php?list_payment" class="nav-link text-light  my-1">All payments</a></button>
                    <button><a href="index.php?list_users" class="nav-link text-light  my-1">List users</a></button>
                    <?php
                     if(!isset($_SESSION['username'])){
                        
                      }
                      else{
                        ?>
                        <button><a href="admin_logout.php" class="nav-link text-light  my-1">log out</a></button>
                    <?php  }
                    ?>
                    <!-- <button><a href="admin_logout.php" class="nav-link text-light  my-1">log out</a></button> -->
                </div>
            </div>
        </div>

        <!--fourth child-->
        <div class="container my-3">
            <?php
            if (isset($_GET['insert_category'])) {
                include('insert_categories.php');
            }
            if (isset($_GET['insert_brand'])) {
                include('insert_brands.php');
            }
            if (isset($_GET['view_products'])) {
                include('view_products.php');
            }
            if (isset($_GET['edit_products'])) {
                include('edit_products.php');
            }
            if (isset($_GET['delete_product'])) {
                include('delete_product.php');
            }
            if (isset($_GET['view_categories'])) {
                include('view_categories.php');
            }
            if (isset($_GET['view_brands'])) {
                include('view_brands.php'); 
            }
            if (isset($_GET['edit_brands'])) {
                include('edit_brands.php');
            }
            if (isset($_GET['edit_category'])) {
                include('edit_category.php');
            }
            if (isset($_GET['delete_category'])) {
                include('delete_category.php');
            }
            if (isset($_GET['delete_brands'])) {
                include('delete_brands.php');
            }
            if (isset($_GET['list_orders'])) {
                include('list_orders.php');
            }
            if (isset($_GET['delete_orders'])) {
                include('delete_orders.php');
            }
            if (isset($_GET['list_payment'])) {
                include('list_payment.php');
            }
            if (isset($_GET['list_users'])) {
                include('list_users.php');
            }
            if(isset($_GET['delete_payment'])){
                include('delete_payment.php');
            }
            
            if(!isset($_SESSION['username'])){
                include('admin_login.php');
              }
     
     
     
     
     
    
            ?>
        </div>

        <!--last child-->
        <!-- <div class="bg-info p-3 text-center footer">
            <p>All rights resrved by team members</p>
        </div>-->
        <?php include("../includes/footer.php")  ?>
    </div>






    <!--bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>