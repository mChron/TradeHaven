<?php
    include "../../db_connect.php";
    if ($_GET['sale'] === "true") {
        $table = 'user_sales';
        $transactionId = 'sale_id';
    }
    else {
        $table = 'user_purchases';
        $transactionId = 'purchase_id';
    }
    $result = mysqli_query($mysqli,
            "SELECT cards.card_name, conditions.condition_name, us.card_quantity, us.card_price FROM {$table} us
                inner join cards on cards.card_id = us.card_id
                inner join conditions on conditions.condition_id = us.card_condition
                where us.{$transactionId} = {$_GET[$transactionId]}");
    $row = mysqli_fetch_array($result);
    print "[";
    $index = 0;
    while ($row != null) {
        if ($index != 0) {
            print ",";
        }
        print json_encode($row);    
        $row = mysqli_fetch_array($result);
        $index++;
    }
    print "]";
    exit;