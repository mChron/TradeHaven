<?php
    session_start();
    $_SESSION['customer_id'] = null;
    $_SESSION['customer_first_name'] = null;
    $_SESSION['customer_last_name'] = null;
    $_SESSION['purchasePending'] = null;
    session_write_close();
    header("Location: ../index.php");