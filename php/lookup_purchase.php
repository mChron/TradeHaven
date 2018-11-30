<?php
    include "../../db_connect.php";
    $result = mysqli_query($mysqli, "SELECT * FROM detailed_card_view where card_id = {$_GET['card_id']};");
    print json_encode(mysqli_fetch_array($result));
    exit;