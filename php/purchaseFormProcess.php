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
    $quantity = $_POST["card-quantity"][$index];
    $price = $_POST["card-price"][$index++];
    $query = "insert into user_purchases(purchase_id, card_id, card_condition, card_quantity, card_price) values({$nextPurchase}, {$card}, (select condition_id from conditions where lower(condition_name) = '{$condition}'), {$quantity}, {$price})";
    $err = false;
    if (!mysqli_query($mysqli, $query)) {
        print '<p style="color: red;">Could not update user purchases because:<br>' . mysqli_error($mysqli) . '.</p>';
        $err = true;
    }
    if (!mysqli_query($mysqli, "update cards set card_quantity = (card_quantity - {$quantity}) where card_id = {$card}")) {
        print '<p style="color: red;">Could not update card count because:<br>' . mysqli_error($mysqli) . '.</p>';
        $err = true;
    }
    if (!mysqli_query($mysqli, "delete from cart_card_relation where cart_id = {$_SESSION['cart_id']}")) {
        print '<p style="color: red;">Could not clear user cart because:<br>' . mysqli_error($mysqli) . '.</p>';
        $err = true;
    }
}
if (!mysqli_query($mysqli, "insert into user_purchase_relation(purchase_id, user_id) values({$nextPurchase}, {$user})")) {
    print '<p style="color: red;">Could not relate user to purchase because:<br>' . mysqli_error($mysqli) . '.</p>';
    $err = true;
}
if ($err === true) {
    mysqli_rollback($mysqli);
}
//header("Location: ../pages/user/cart.php?success=true");