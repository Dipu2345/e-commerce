<?php
include('../includes/connect.php');
session_start();
if(!isset($_SESSION['username'])){
  echo"<script>window.open('admin_login.php','_self')</script>";
}
if(isset($_POST['submit'])){
     $product_title=$_POST['product_title'];
    $description=$_POST['description'];
     $product_keywords=$_POST['product_keywords'];
     $product_category=$_POST['product_category'];
     $product_brands=$_POST['product_brands'];
     $product_price=$_POST['product_price'];
   $product_status="true";
   //acessing image
    $product_image1=$_FILES['product_image1']['name'];
     $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];
   
   //acessing image temp name
    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];
    $temp_image3=$_FILES['product_image3']['tmp_name'];


  if($product_title==''or $description==''or $product_keywords==''or $product_category==''
  or $product_brands==''or $product_price==''or $product_image1=='' or $product_image2==''
  or $product_image3==''){
      echo "<script>alert('plese fill all the fields')</script>";
      exit();
  }
  else{
    move_uploaded_file($temp_image1,"./product_images/$product_image1");
    move_uploaded_file($temp_image2,"./product_images/$product_image2");
    move_uploaded_file($temp_image3,"./product_images/$product_image3");
    
    //insert_query
    $insert_products="INSERT INTO `products`(product_title,product_description,	product_keywords,	category_id,
        brand_id,product_image1,product_image2,product_image3,product_price,date,status) VALUES('$product_title',
        '$description','$product_keywords','$product_category','$product_brands','$product_image1',
        '$product_image2','$product_image3','$product_price',NOW(),'$product_status')";

        $result_query=mysqli_query($con,$insert_products);
        if($result_query){
            echo "<script>alert('sucessfully inserted the products')</script>";
        }

}

}




?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>insert products</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
  .formm{
    border: 2px solid black;
  }
  
</style>

  </head>


<body class="bg-light">
      <div class="container mt-3">
       
        <form action="insert_product.php" method="post" enctype="multipart/form-data" class="formm">
        <h1 class="text-center">Insert Products</h1>
          <div class="form-outline mb-4 w-50 m-auto ">
            <!---title-->
           <label for="product_title" class="form-label">product title</label>
           <input type="text" name="product_title" id="product_title" class="form-control" autocomplete="off" >
            </div>
            <!---description-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label"> product Description</label>
                <input type="text" name="description" id="description" class="form-control" autocomplete="off" >
            </div>
            <!---keywords-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-label"> product Keywords</label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control" autocomplete="off" >
            </div>
             <!---categories-->
             <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" id="" class="form-select">
                    <option value="">select a category</option>
                    <?php
                         $select_query="Select * from `categories`";
                         $result_query=mysqli_query($con,$select_query);
                          while($row=mysqli_fetch_assoc($result_query)){
                            $category_title=$row['category_title'];
                            $category_id=$row['category_id'];
                            echo "<option value=' $category_id'>$category_title</option>";
                          }
                          ?>
                </select>
               </div>
            <!---brands-->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_brands" id="" class="form-select">
                    <option value="">select a brands</option>
                    <?php
                         $select_query="Select * from `brands`";
                         $result_query=mysqli_query($con,$select_query);
                          while($row=mysqli_fetch_assoc($result_query)){
                            $brand_title=$row['brand_title'];
                            $brand_id=$row['brand_id'];
                            echo "<option value=' $brand_id'>$brand_title</option>";
                          }
                          ?>
          </select>
             </div>
              <!---image1-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label"> product Image 1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" autocomplete="off" >
            </div>
            <!---image2-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label"> product Image 2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control" autocomplete="off" >
            </div>
            <!---image3-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label"> product Image 3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control" autocomplete="off" >
            </div>
             <!---price-->
             <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label"> product Price</label>
                <input type="text" name="product_price" id="product_price" class="form-control" autocomplete="off">
            </div>
           <div class="form-outline mb-4 w-50 m-auto">
             <input type="submit" name="submit" class="btn btn-info mb-3 px-3" value="Insert Products">
         
         </div>


        </form>



      </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
</body>

</html>