<?php
/*loginFormProcess.php
Processes the login form data and sets up the necessary
session data for the user to shop. If incorrect login 
information (bad username and/or bad password) is entered,
the user is presented with an error. 
*/
include "../../db_connect.php";
session_start();
if (isset($_SESSION['customer_id'])) {
    header("Location: ../pages/inventory/browse.php");
}
$rowsWithMatchingLoginName = mysqli_query($mysqli, "SELECT * FROM users WHERE email = '$_POST[logEmail]'");
$numRecords = mysqli_num_rows($rowsWithMatchingLoginName);
if ($numRecords == 0)
{
    //No records were retrieved, so ...
//    header("Location: ../pages/no_records");
    echo "OH DEAR";
}
if ($numRecords == 1)
{
    $row = mysqli_fetch_array($rowsWithMatchingLoginName);
    if ($_POST[logPassword] == $row['password'])
    {
        $_SESSION['customer_id'] = $row['user_id'];
        $_SESSION['customer_first_name'] = $row['first_name'];
        $_SESSION['customer_last_name'] = $row['last_name'];
        $_SESSION['cart_id'] = mysqli_fetch_array(mysqli_query($mysqli, "select cart_id from cart_user where user_id = {$_SESSION['customer_id']}"))['cart_id'];
        $productID = $_SESSION['purchasePending'];
        if ($productID != "")
        {
            unset($_SESSION['purchasePending']);
            $destination =
                "../pages/shoppingCart.php?productID=$productID";
            $goto  = "Location: $destination";
        }
        else
        {
            $destination = getenv('HTTP_REFERER'); 
            $goto  = "Location: ".$destination;
        }
        header($goto);
    }
    else
    {
        //The password entered did not match the database
        //password for the login name entered, so ...
        header("Location: ../pages/badPass");
    }
}
mysqli_close($mysqli);
