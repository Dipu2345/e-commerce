<?php
session_start();
if (isset($_GET['order_id'])) {

    $order_id = $_GET['order_id'];
    $id = $_SESSION['order_id'];
    $co = mysqli_connect("localhost", "root", "", "mystore");
    $query = "SELECT * from `user_orders` WHERE order_id=$order_id";
    $run = mysqli_query($co, $query);
    $row_fetch = mysqli_fetch_assoc($run);
    $user_id = $row_fetch['user_id'];
    // getting user data
    $query1 = "select * from user_table where user_id=$user_id";
    $run1 = mysqli_query($co, $query1);
    $row_fetch1 = mysqli_fetch_assoc($run1);
    $email = $row_fetch1['user_email'];
    $phone = $row_fetch1['user_mobile'];
    $invoice_number = $row_fetch['invoice_number'];
    $_SESSION['invoice_number'] = $invoice_number;

    $amount_due = $row_fetch['amount_due'];
    $_SESSION['amount'] = $amount_due;
    $total_product = $row_fetch['total_products'];

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            background: linear-gradient(120deg, #2980b9, #8e44ad);
            height: 100vh;
            overflow: hidden;
        }

        .center {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
            background: white;
            border-radius: 10px;
        }

        .center h3 {
            text-align: center;
            padding: 0 0 20px 0;
            border-bottom: 1px solid silver;
        }

        .center form {
            padding: 0 40px;
            box-sizing: border-box;
        }

        form .txt_field {
            position: relative;
            border-bottom: 2px solid #adadad;
            margin: 30px 0;

        }

        .txt_field input {
            width: 100%;
            padding: 0 5px;
            height: 40px;
            font-size: 16px;
            border: none;
            background: none;
            outline: none;
        }

        .txt_field label {
            position: absolute;
            top: 50%;
            left: 5px;
            color: #adadad;
            transform: translateY(-50%);
            font-size: 16px;
            pointer-events: none;
            transition: .5s;
        }

        .txt_field span::before {
            content: '';
            position: absolute;
            top: 40px;
            left: 0;
            width: 100%;
            height: 2px;
            background: #2691d9;

        }

        .txt_field input:focus~label,
        .txt_field input:valid~label {
            top: -5px;
            color: #2691d9;
        }

        button {
            width: 100%;
            height: 40px;
            border: 1px solid;
            background: #2691d9;
            border-radius: 25px;
            font-size: 18px;
            color: #e9f4fb;
            font-weight: 700;
            cursor: pointer;
            outline: none;
        }

        button:hover {
            border-color: #2691d9;
            transition: .5s;

        }
    </style>
</head>

<body>
    <div class="center">
        <h3> Razorpay payment</h3>

        <form action="razorpay-php/Razorpay.php" method="post">
            <div class="txt_field">
                <input type="text" name="name" id="name" />
                <span></span>
                <label for="">Name</label>
            </div>
            <div class="txt_field">
                <input type="text" name="price" id="price" value="<?php echo $amount_due; ?>" />
                <span></span>
                <label for="">Price</label>
            </div>
            <div class="txt_field">
                <input type="text" name="qnty" value="<?php echo $total_product; ?>" >
                <span></span>
                <label for="">quantity</label>
            </div>



            <div class="txt_field">
                <input type="email" name="email" id="emailid" value="<?php echo $email; ?>" required>
                <span></span>
                <label for="">Email</label>
            </div>

            <div class="txt_field">
                <input type="number" name="phoneno" id="phoneno" value="<?php echo $phone; ?>" required>
                <span></span>
                <label for="">MOB No</label>
            </div>
            <button type="submit" id="pay">Confirm</button>
    </div>
    </form>
    </div>
    </div>

    <!-- second -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"
        integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script> 

    <!-- Owl Carousel Js file -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha256-pTxD+DSzIwmwhOqTFN+DB+nHjO4iAsbgfyFq5K5bcE0=" crossorigin="anonymous"></script> 

    <!--  isotope plugin cdn  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"
        integrity="sha256-CBrpuqrMhXwcLLUd5tvQ4euBHCdh7wGlDfNz8vbu/iI=" crossorigin="anonymous"></script> 

</body>

</html>
<!-- down -->
<!-- <html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> -->
<!-- <title>Checkout</title> -->


<!-- Bootstrap CDN -->
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->

<!-- Owl-carousel CDN -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" /> -->

<!-- font awesome icons -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" /> -->

<!-- Custom CSS file -->
<!-- <link rel="stylesheet" href="checkout.css"> -->
<!-- </head>
<body> -->
<!-- <div class="container">
    <div class="row justify-content-center"></div>
        <div class="col-lg-6 px-4 pb-4">
            <h4 class="text-center text-info p-2">Complete your Order</h4>
            <div class="jumbotron p-3 mb-2 text-center">

            </div>
            <form action="razorpay-php/Razorpay.php" method="post"> -->

<!-- <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                        <input type="text" id="fname" name="name" placeholder="your name" value="">
                        
                        <label for="mobile"><i class="fa fa-envelope"></i> mobile</label>
                        <input type="text" id="mobile" name="mobile" placeholder="your mobile" value="" required>

                        <label for="email"><i class="fa fa-envelope"></i> Email</label>
                        <input type="text" id="email" name="email" placeholder="your Email" value="" required>
                        
                        <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                        <input type="text" id="adr" name="address" placeholder="Your Address" required>
                        
                        <label for="city"><i class="fa fa-institution"></i> City</label>
                        <input type="text" id="city" name="city" placeholder="your city" required> -->

<!-- <div class="row">
                            <div class="col-50">
                                <label for="state">State</label>
                                <input type="text" id="state" name="state" placeholder="Your city" required>
                            </div>
                            <div class="col-50">
                                <label for="zip">Zip</label>
                                <input type="text" id="zip" name="zip" placeholder="your zip" required>
                            </div>

                            <div class="col-50">
                                <label for="totalAmounnt">TotalAmount (in Rupees)</label>
                                <input type="text" id="" name="amount" placeholder="" value="5" readonly/>
                            </div>

                        </div>      <button class="btn btn-warning mt-3" type="submit">Proceed to Buy</button>
                    </div> -->



<!-- </form> -->
<!-- </div> -->
<!-- </div> -->


<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> -->

<!-- Owl Carousel Js file -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha256-pTxD+DSzIwmwhOqTFN+DB+nHjO4iAsbgfyFq5K5bcE0=" crossorigin="anonymous"></script> -->

<!--  isotope plugin cdn  -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js" integrity="sha256-CBrpuqrMhXwcLLUd5tvQ4euBHCdh7wGlDfNz8vbu/iI=" crossorigin="anonymous"></script> -->

<!-- </body> -->
<!-- </html> -->