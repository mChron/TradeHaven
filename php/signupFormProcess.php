<?php

include "../../db_connect.php";
session_start();
$loggedIn = isset($_SESSION['customer_id']);
if (!$loggedIn) {
    // Execute the query:
    if (mysqli_query($mysqli, "INSERT INTO users (first_name, last_name, email, phone_number, password) VALUES ('{$_POST['first']}', '{$_POST['last']}', '{$_POST['email']}', '{$_POST['phone']}', '{$_POST['password']}')")) {
        if (mysqli_query($mysqli, "INSERT INTO shipping_addresses (user_id, house_num, street, city, state, zip) VALUES ((select user_id from users where email = '{$_POST['email']}'), '{$_POST['ship-house']}', '{$_POST['ship-street']}', '{$_POST['ship-city']}', '{$_POST['ship-state']}', '{$_POST['ship-zip']}')")) {
            if ($_POST['bill-house'] === "") {
                if (mysqli_query($mysqli, "INSERT INTO billing_addresses (user_id, house_num, street, city, state, zip) VALUES ((select user_id from users where email = '{$_POST['email']}'), '{$_POST['ship-house']}', '{$_POST['ship-street']}', '{$_POST['ship-city']}', '{$_POST['ship-state']}', '{$_POST['ship-zip']}')")) {
                    print '<p>Added user</p>';
                }
            }
            else {
                if (mysqli_query($mysqli, "INSERT INTO billing_addresses (user_id, house_num, street, city, state, zip) VALUES ((select user_id from users where email = '{$_POST['email']}'), '{$_POST['bill-house']}', '{$_POST['bill-street']}', '{$_POST['bill-city']}', '{$_POST['bill-state']}', '{$_POST['bill-zip']}')")) {

                }
            }
        }
        header("Location: ../index.php");
    } else {
        print '<p style="color: red;">Could not add the entry because:<br>' . mysqli_error($mysqli) . '.</p>';
    }
}
else {
    if (mysqli_query($mysqli, "update users set first_name = '{$_POST['first']}', last_name = '{$_POST['last']}', email = '{$_POST['email']}', phone_number = '{$_POST['phone']}' where user_id = '{$_POST['user_id']}'")) {
        if ($_POST['password'] !== "") {
            mysqli_query($mysqli, "update users set password = '{$_POST['password']}' where user_id = '{$_POST['user_id']}'");
        }
        if (mysqli_query($mysqli, "update shipping_addresses set house_num = '{$_POST['ship-house']}', street = '{$_POST['ship-street']}', city = '{$_POST['ship-city']}', state = '{$_POST['ship-state']}', zip = '{$_POST['ship-zip']}' where user_id = '{$_POST['user_id']}'")) {
            if ($_POST['bill-house'] === "") {
                if (mysqli_query($mysqli, "INSERT INTO billing_addresses (user_id, house_num, street, city, state, zip) VALUES ((select user_id from users where email = '{$_POST['email']}'), '{$_POST['ship-house']}', '{$_POST['ship-street']}', '{$_POST['ship-city']}', '{$_POST['ship-state']}', '{$_POST['ship-zip']}')")) {
                    print '<p>Added user</p>';
                }
            }
            else {
                if (mysqli_query($mysqli, "update billing_addresses set house_num = '{$_POST['bill-house']}', street = '{$_POST['bill-street']}', city = '{$_POST['bill-city']}', state = '{$_POST['bill-state']}', zip = '{$_POST['bill-zip']}' where user_id = '{$_POST['user_id']}'")) {

                }
            }
        }
        header("Location: ../pages/user/my_account.php");
    } else {
        print '<p style="color: red;">Could not add the entry because:<br>' . mysqli_error($mysqli) . '.</p>';
    }
}