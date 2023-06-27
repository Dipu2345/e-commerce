<?php
include('connect.php');
include('../functions/common_function.php');
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Go cart</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="./index.css">
  <style>
     .text{
            font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            padding:0px 10px;
            font-weight: 500;
            color:red;
        }
        .pa-1{
          padding: 0px 10px;
        }
        .cursive {
  font-family: cursive;
}
.card-img-top{
  width: 100%;
  height: 200px;
 
}
.color{
  background-color:lightblue;
}
.nav-item{
  transition: 0.3s;
  box-shadow: 10px 10 10px 10px blue;
}
.nav-item:hover{
  box-shadow: 10px 10 10px 10px blue;
  border-radius: 20px;
  
  font-size: 20px;
  color: red;
  transition: 0.3s;
}
  </style>
</head>

<body>
  <!---navbar-->
  <div class="container-fluid p-0">
    <!--first child-->
    <nav class="navbar navbar-expand-lg navbar-light color ">
      <div class="container-fluid">
           <h2 class="text">Go Kart</h2>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 pa-1">
            <li class="nav-item">
              <a class="nav-link active fw-bold" aria-current="page" href="../mp_demo/index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold" href="../display_all.php">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold" href="#">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold" href="#">contact</a>
            </li>
           
            <li class="nav-item">
              <a class="nav-link fw-bold" href="#"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item();?></sup></a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold" href="#">Total price:100/-</a>
            </li>
          </ul>
          <form class="d-flex" action="search_product.php" method="get">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
          
           <input type="submit" value="search"class="btn btn-outline-light" name="search_data_product">
          </form>
        </div>
      </div>
    </nav>
  </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>