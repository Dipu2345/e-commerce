<?php

if (isset($_GET['delete_payment'])) {
    $delete_payment = $_GET['delete_payment'];
    //echo $delete_id;
    //delete query


    $delete_product = "Delete from user_payments where payment_id=$delete_payment";
    $result_product = mysqli_query($con, $delete_product);
    if ($result_product) {
        echo "<script>alert('Payment deleted successfully')</script>";
        echo "<script>window.open('./index.php?list_payment','_self')</script>";
    }
}
?>