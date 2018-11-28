<?php
include "../../db_connect.php";
session_start();
$nextSale = mysqli_fetch_array(mysqli_query($mysqli, "select if(max(sale_id), max(sale_id), 0) + 1 as next_sale from user_sale_relation"))["next_sale"];
$user = $_SESSION["customer_id"];
$rows = sizeof($_POST["card-id"]);
$index = 0;
while ($index < $rows) {
    $card = $_POST["card-id"][$index];
    $condition = strtolower($_POST["card-condition"][$index]);
    $quantity = $_POST["card-quantity"][$index++];
    $query = "insert into user_sales(sale_id, card_id, card_condition, card_quantity) values({$nextSale}, {$card}, (select condition_id from conditions where lower(condition_name) = '{$condition}'), {$quantity})";
    if (!mysqli_query($mysqli, $query)) {
        print '<p style="color: red;">Could not add the entry because:<br>' . mysqli_error($mysqli) . '.</p>';
    }
}
if (!mysqli_query($mysqli, "insert into user_sale_relation(sale_id, user_id) values({$nextSale}, {$user})")) {
    print '<p style="color: red;">Could not add the user_sale_relation entry because:<br>' . mysqli_error($mysqli) . '.</p>';
}
header("Location: ../pages/inventory/sell.php?success=true");