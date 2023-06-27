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
    <title>Go cart-Cart details</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!--css file-->

    <link rel="stylesheet" href="./index.css">
    <style>
        body{
            position: relative;
        }
       .foot{
        margin-bottom: 0px;
        padding-bottom: 0px;
        width: 100%;
        height: 10%;
        bottom: 0;
        z-index: 0;
       
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
        background-color: rgb(40, 40, 204);
       }
       .text {
      font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
      padding: 0px 10px;
      
      color: white;
      
    }
   .font-color{
    color: white;
    /* background-color:rgb(40, 40, 204) ; */
   }
    .navbar{
        
        background-color: rgb(40, 40, 204);
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

      .pa-1 {
            padding: 0px 10px;
        }

        .cursive {
            font-family: cursive;
        }

        .cart_img {
            width: 80px;
            height: 80px;
            object-fit: contain;
        }
        .width{
            width: 90px;
        }
        .empty{
            width: 50%;
            height: 50%;
            object-fit: contain;
            display:flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            position: relative;
            margin: auto;
            left: 25%;
           
        }
        .navbar{
      background-color: rgb(40, 40, 204);
    }
    .input-button{
       
        border-radius: 5px;
        color: white;
        background-color: rgb(82, 77, 233);
        transition: 0.3s;
        border: none;
      

    }
    .input-button:hover{
        background-color: rgb(39, 32, 130);
        transition: 0.3s;
        color: white;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
      
       

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
                            <a class="nav-link  fw-bold" aria-current="page" href="index.php">Home</a>
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
                            <a class="nav-link fw-bold" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup>Cart</a>
                        </li>

                    </ul>
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
            //welcome guest and username
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
           //login nd logout
      if(!isset($_SESSION['username'])){
           echo "<li class='nav-item'>
           <a href='./users_area/user_login.php' class='nav-link fw-bold'>Login</a>
         </li>";
      }
      else{
        echo "<li class='nav-item'>
        <a href='./users_area/logout.php' class='nav-link fw-bold'>Logout</a>
      </li>";
      }
      
      
      ?>
        </ul>
    </div>
    <!-----third child-->
    <div class="bg-light">
        <h3 class="text-center">Hiden Store</h3>
        <p class="text-center fw-bold cursive">Communications is the heart of e-commerce and community</p>
    </div>




    <!--fourth child-table-->
    <div class="container">
        <div class="row">
            <form action="cart.php" method="post" class="m-0">
            <table class="table table-bordered text-center">
                
                    <!--php code to display dynamic data-->
                    <?php
                    global $con;
                    $get_ip_add = getIPAddress();
                    $total_price = 0;
                    $cart_query = "Select * from cart_details where ip_address='$get_ip_add' ";
                    $result = mysqli_query($con, $cart_query);
                    $result_count=mysqli_num_rows($result);

                  
                    if($result_count>0){
                        echo "<thead>
                        <tr>
                            <th>Product Title</th>
                            <th>Product Image</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Remove</th>
                            <th colspan='2'>Operations</th>
                        </tr>
                    </thead>
                    <tbody>";
                    while ($row = mysqli_fetch_array($result)) {
                        $product_id = $row['product_id'];
                        $select_products = "Select * from products where product_id='$product_id' ";
                        $result_products = mysqli_query($con, $select_products);
                        while ($row_product_price = mysqli_fetch_array($result_products)) {
                            $product_price = array($row_product_price['product_price']);
                            $price_table = $row_product_price['product_price'];
                            $product_title = $row_product_price['product_title'];
                            $product_image1 = $row_product_price['product_image1'];
                            $product_values = array_sum($product_price); //[500]
                            $total_price += $product_values; //500


                    ?>
                            <tr>
                                <td><h5><?php echo $product_title;?></h5></td>
                                <td><img src="./admin_area/product_images/<?php echo $product_image1;?>" alt="" class="cart_img"></td>
                                <td><input type="text" name="quantity"class="form-control width w-20"/></td>
                                <?php
                                   
                                   
                                    if(isset($_POST['update'])){
                                        
                                        $get_ip_add = getIPAddress();
                                          $quantities=$_POST["quantity"];
                                         if($quantities==''){
                                            echo "<script>alert('plese fill quantity');</script>";
                                         }
                                         else{

                                         
                                          //if cart emoty code written here
                                        $update_cart="UPDATE `cart_details` SET quantity=$quantities WHERE ip_address='$get_ip_add'";
                                        $result_product=mysqli_query($con,$update_cart);
                                       $total_price=$total_price*$quantities;
                                         }
                                          
                                }
                               
                                ?>
                                <td><?php echo  $price_table;?>/-</td>
                                <td><input type="checkbox" name="removeitem[]" value="<?php 
                                echo $product_id;?>"></td>
                                <td>
                                     <input type="submit" value="update_cart" class=" input-button px-3 py-2 mb-1 border-0 mx-3" name="update"> 
                                    <!-- <button class="bg-info px-3 py-2 border-0 mx-3" name="update_cart" value="update_cart">Update</button>
                                    <button class="bg-info px-3 py-2 border-0 mx-3">Remove</button> -->
                                    <input type="submit" value="remove_cart" class=" input-button px-3 py-2 border-0 mx-3" name="remove"> 
                                </td>
                            </tr>
                    <?php }  } }
                    else{
                        //cart enppty image 
                       echo "<h2 class='text-center text-danger '> cart is empty!</h2>";
                       echo "<img src='./img/empty_cart.png' alt='' class=' text-center empty m-0'>";

                    }
                    ?>

                </tbody>
            </table>

            <!--subtotal-->
            <div class="d-flex mb-5">
                <?php
                 global $con;
                 
                 $get_ip_add = getIPAddress();  
                 $cart_query = "Select * from cart_details where ip_address='$get_ip_add' ";
                 $result = mysqli_query($con, $cart_query);
                 $result_coun=mysqli_num_rows($result);
                 if($result_coun>0){
                    echo "<h4 class='px-3'>Subtotal:<strong class='text-dark'>$total_price/-</strong></h4>
                    <input type='submit' value='continue shopping' class=' input-button px-3 py-2 mb-1 border-0 mx-3' name='continue_shopping'> 
                    <button class='input-button px-3 py-2 border-0 mx-3'><a href='./users_area/checkout.php' class='font-color text-decoration-none'>Checkout</a></button>";
                 }
                 else{
                    echo "<input type='submit' value='continue shopping' class='input-button px-3 py-2 mb-1 border-0 mx-3' name='continue_shopping'> ";
                 }
                
                if(isset($_POST['continue_shopping'])){
                    echo "<script>window.open('index.php','_self');</script>";
                }
                
                ?>
               
            </div>
        </div>
    </div>
    </form>
    <!--function to remove item-->
    <?php 
       function remove_cart_item(){
        global $con;
        if(isset($_POST['remove'])){
            foreach($_POST['removeitem'] as $remove_id){
                echo $remove_id;
                $delete_query="DELETE from `cart_details` where product_id=$remove_id";
                $run_delete=mysqli_query($con,$delete_query);
                if($run_delete){
                    echo "<script>window.open('cart.php','_self');</script>";
                }
                
            }
        }
    }
   
    echo $remove_item = remove_cart_item(); 
    
    
    ?>
   

    <!--last child----->

    <!--include footer-->
    

    

      
    <!--bootstrap js link-->
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <div class="foot">
          <p>all right reserved by the team</p>
       </div>
</body>

</html>