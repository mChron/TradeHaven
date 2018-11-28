<?php
include "../../db_connect.php";
session_start();
$nextPurchase = mysqli_fetch_array(mysqli_query($mysqli, "select if(max(purchase_id), max(purchase_id), 0) + 1 as next_purchase from user_purchase_relation"))["next_purchase"];
$user = $_SESSION["customer_id"];
$rows = sizeof($_POST["card-id"]);
$index = 0;
while ($index < $rows) {
    $card = $_POST["card-id"][$index];
    $condition = strtolower($_POST["card-condition"][$index]);
    $quantity = $_POST["card-quantity"][$index++];
    $query = "insert into user_purchases(purchase_id, card_id, card_condition, card_quantity) values({$nextPurchase}, {$card}, (select condition_id from conditions where lower(condition_name) = '{$condition}'), {$quantity})";
    if (!mysqli_query($mysqli, $query)) {
        print '<p style="color: red;">Could not update user purchases because:<br>' . mysqli_error($mysqli) . '.</p>';
    }
    if (!mysqli_query($mysqli, "update cards set card_quantity = (card_quantity - {$quantity}) where card_id = {$card}")) {
        print '<p style="color: red;">Could not update card count because:<br>' . mysqli_error($mysqli) . '.</p>';
    }
}
if (!mysqli_query($mysqli, "insert into user_purchase_relation(purchase_id, user_id) values({$nextPurchase}, {$user})")) {
    print '<p style="color: red;">Could not relate user to purchase because:<br>' . mysqli_error($mysqli) . '.</p>';
}
header("Location: ../pages/inventory/browse.php?success=true");