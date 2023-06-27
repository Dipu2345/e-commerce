<?php
$con = mysqli_connect("localhost", "root", "", "mystore") or die("connect error");

if (!$con) {
    echo "error in connection";
}
