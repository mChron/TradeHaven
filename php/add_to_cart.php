<?php
include "../../db_connect.php";
session_start();
$user = $_SESSION['customer_id'];
$cart = $_SESSION['cart_id'];
$card = $_POST['card-id'];
$quantity = $_POST['card-quantity'];

if (mysqli_query($mysqli, "insert into cart_card_relation(cart_id, card_id, card_quantity) values ({$cart}, {$card}, {$quantity}) ON DUPLICATE KEY update card_quantity = card_quantity + {$quantity}")) {
    return true;
}
else {
    print '<p style="color: red;">Could not add the entry because:<br>' . mysqli_error($mysqli) . '.</p>';
}