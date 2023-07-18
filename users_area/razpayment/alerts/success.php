<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Document</title>
</head>
<body>
<div id="container">
  <div id="success-box">
    <div class="dot"></div>
    <div class="dot two"></div>
    <div class="face">
      <div class="eye"></div>
      <div class="eye right"></div>
      <div class="mouth happy"></div>
    </div>
    <div class="shadow scale"></div>
    <div class="message"><h1 class="alert">Order Placed</h1><p>Delivery Agent Will Reach You Soon</p></div>
    <form action="" method="post">
    <button class="button-box" name="btn"><h1 class="green">continue</h1></button>
    </form>
  </div>

</div>

<!-- <footer>
  <p>made by <a href="https://codepen.io/juliepark"> julie</a> ♡
</footer> -->
    
</body>
</html>
<?php    
session_start();
  // $orderd=$_SESSION['razorpay_order_id'];
 $payment=$_POST['razorpay_payment_id'];
 $emailid=$_SESSION['raz_mail'];
 $phoneno=$_SESSION['raz_mobile'];
 $amount=$_SESSION['amount'];
  date_default_timezone_set('Asia/calcutta');
 $date=date('d-m-y h-i-s');
 $qnty=$_SESSION['raz_qnty'];
 $order_id=$_SESSION['order_id'];
 $invoice_number=$_SESSION['invoice_number'];
 $payment_mode="RAZORPAY";
//  $query="INSERT INTO order_det(order_id,payment_id,emai_id,phone_num,order_date,qnty)VALUES('$orderd','$payment',
//  '$emailid',' $phoneno',' $date','$qnty')";
//  $res=mysqli_query($con,$query);
$con=mysqli_connect("localhost","root","","mystore");
//  $insert_query = "insert into `user_payments`(order_id,invoice_number,amount,payment_mode,date) values($order_id,$invoice_number,$amount,'$payment_mode',NOW())";
//  $result = mysqli_query($con, $insert_query);
 $complete="complete";
 

$update_orders = "UPDATE `user_orders` SET order_status ='$complete'where order_id=$order_id";
$result_orders = mysqli_query($con, $update_orders);
$query1="INSERT INTO `user_payments`(order_id,invoice_number,amount,payment_mode,date) VALUES($order_id,$invoice_number,$amount,'$payment_mode',NOW())";
$update=mysqli_query($con,$query1);
if(isset($_POST['btn'])){
header('Location:http://localhost/tact_project/users_area/profile.php?my_orders');
}

?>