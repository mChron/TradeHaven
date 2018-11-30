<?php
include "../../db_connect.php";
session_start();
$user = $_SESSION['customer_id'];
$cart = $_SESSION['cart_id'];
$card = $_POST['card_id'];

if (mysqli_query($mysqli, "delete from cart_card_relation where cart_id = {$cart} and card_id = {$card}")) {
    return true;
}
else {
    print '<p style="color: red;">Could not add the entry because:<br>' . mysqli_error($mysqli) . '.</p>';
}