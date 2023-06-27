<?php
@session_start();
if(!isset($_SESSION['username'])){
   echo"<script>window.open('admin_login.php','_self')</script>";
 }
?>

<h3 class="text-center.text-sucess">All Users</h3>
<table class="table table-bordered mt-5">
   <thead class="bg-infoo">

   <?php
$get_payments="select * from `user_table`";
$result=mysqli_query($con,$get_payments);
$row_count=mysqli_num_rows($result);


if($row_count==0){
    echo "<h2 class='text-danger text-center mt-5'>No Users yet</h2>";
}else{
    echo"</tr>
<th>SL no</th>
<th>Username</th>
<th>User email</th>
<th>User image</th>
<th>User address</th>
<th>User mobile</th>
<th>Delete</th>
 </tr>
</thead>
<tbody class='bg-secondary text-light'>";
    $numbers=0;
    while($row_data=mysqli_fetch_assoc($result)){
        $user_id=$row_data['user_id'];
        $username=$row_data['user_name'];
        $user_email=$row_data['user_email'];
        $user_image=$row_data['user_image'];
        $user_address=$row_data['user_address'];
        $user_mobile=$row_data['user_mobile'];
        $numbers++;
        echo "
        <tr>
           <td>$numbers</td>
           <td>$username</td>
           <td>$user_email</td>
           <td><img src='../users_area/user_images/$user_image'alt='$username' class='product_image'/></td>
           <td>$user_address</td>
           <td>$user_mobile</td>
           <td><a href='' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
     </tr>";


    }
}
?>


   
</tbody>
</table>