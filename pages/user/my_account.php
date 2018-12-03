<!DOCTYPE html>
<!-- Filename: my_account.php
Author: Marcus Chronabery
Date: 11/10/18

TODO: Remove the body of this page and reuse the signup page, but remove the
reset button for the form and populate with a specific user's information. -->
<html lang="en">
    <head>
        <title>Trade Haven - My Account</title>
        <?php include "../../pages/common/includes.html" ?>
        <link href="css/signup.css" rel="stylesheet">
        <script src="js/signup.js"></script>
    </head>
    <body>
        <?php
            include "../../pages/common/header.php";
            include "../../pages/common/login_modal.php";
            include "../../pages/common/footer.php";
            include "../../../db_connect.php";
            // session started in header, simply reference it here
            $loggedIn = isset($_SESSION['customer_id']);
            if (!$loggedIn) {
                echo '<script type="text/javascript">$(function() {'
                . '$("button").attr("disabled", "disabled");'
                . '$("#login-form").remove();'
                . '$("#login-err").removeClass("d-none");'
                . '$("#login-err").html("You are not logged in! Returning home.");'
                . '$("#login-modal .modal-footer").remove();'
                . '$("#login-modal").modal("show");'
                . 'setTimeout(function() {location.href="index.php";}, 3000);'
                . '});</script>';
                // initialize all user information to avoid displaying any errors.
                $userRow = [];
                $userRow['user_id'] = '';
                $userRow['first_name'] = '';
                $userRow['last_name'] = '';
                $userRow['email'] = '';
                $userRow['phone_number'] = '';
                $addressElements = ['house', 'street', 'city', 'state', 'zip'];
                foreach ($addressElements as $key => $value) {
                    $userRow['ship_'.$value] = '';
                    $userRow['bill_'.$value] = '';
                }
            }
            else {
                $userQuery = "select * from user_detailed_view where user_id = {$_SESSION['customer_id']}";
                $userResult = mysqli_query($mysqli, $userQuery);
                if ($userResult) {
                    $userRow = mysqli_fetch_array($userResult);
                }
            }
        ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div id="signup-jumbotron" class="jumbotron">
                        <form action="php/signupFormProcess.php" method="POST" id="signup-form">
                            <h2>My Account</h2>
                            <hr />
                            <h5>Contact Information</h5>
                            <div class="container-fluid">
                                <div class="row" id="signup-name-row">
                                    <div class="col-md-4 column">
                                        <label for="#signup-firstname-input">First Name</label>
                                        <?php
                                            echo "<input class='form-control hidden' id='signup-id-input' name='user_id' value='{$userRow['user_id']}'/>";
                                            echo "<input class='form-control' id='signup-firstname-input' name='first' value='{$userRow['first_name']}'/>";
                                        ?>
                                    </div>
                                    <div class="col-md-4 column">
                                        <label for="#signup-lastname-input">Last Name</label>
                                        <?php
                                            echo "<input class='form-control' id='signup-lastname-input' name='last' value='{$userRow['last_name']}'/>";
                                        ?>
                                    </div>
                                </div>
                                <br/>
                                <div class="row" id="signup-email-row">
                                    <div class="col-md-4 column">
                                        <label for="#signup-email-input">Email</label>
                                        <?php
                                            echo "<input class='form-control' type='email' id='signup-email-input' name='email' value='{$userRow['email']}'/>";
                                        ?>
                                    </div>
                                    <div class="col-md-4 column">
                                        <label for="#signup-phone-input">Phone Number</label>
                                        <?php
                                            echo "<input class='form-control' id='signup-phone-input' name='phone' value='{$userRow['phone_number']}'/>";
                                        ?>
                                    </div>
                                </div>
                                <br/>
                                <div class="row" id="signup-password-row">
                                    <div class="col-md-4 column">
                                        <label for="#signup-password-input">Password</label>
                                        <input class="form-control" type="password" id="signup-password-input" name="password"/>
                                    </div>
                                    <div class="col-md-4 column">
                                        <label for="#signup-password-confirm-input">Confirm Password</label>
                                        <input class="form-control" type="password" id="signup-password-confirm-input" name="confirm"/>
                                    </div>
                                </div>
                            </div>
                            <hr />
                            <h5>Purchasing Information</h5>
                            <div class="container-fluid">
                                <h6>Shipping Address</h6>                            
                                <div class="row" id="shipping-address-row">
                                    <div class="col-md-1 column">
                                        <label for="#signup-shipping-house-input">House/Apt #</label>
                                        <?php
                                            echo "<input class='form-control' id='signup-shipping-house-input' name='ship-house' value='{$userRow['ship_house']}'/>";
                                        ?>
                                    </div>
                                    <div class="col-md-2 column">
                                        <label for="#signup-shipping-street-input">Street</label>
                                        <?php
                                            echo "<input class='form-control' id='signup-shipping-street-input' name='ship-street' value='{$userRow['ship_street']}'/>";
                                        ?>
                                    </div>
                                    <div class="col-md-2 column">
                                        <label for="#signup-shipping-city-input">City</label>
                                        <?php
                                            echo "<input class='form-control' id='signup-shipping-city-input' name='ship-city' value='{$userRow['ship_city']}'/>";
                                        ?>
                                    </div>
                                    <div class="col-md-2 column">
                                        <label for="#signup-shipping-state-select">State</label>
                                        <?php
                                            echo "<select class='form-control' id='signup-shipping-state-select' name='ship-state' value='{$userRow['ship_state']}'>
                                                <option class='disabled' disabled value='-1'>Select Your State</option>
                                            </select>";
                                        ?>
                                    </div>
                                    <div class="col-md-1 column">
                                        <label for="#signup-shipping-zip-input">Zip Code</label>
                                        <?php
                                            echo "<input class='form-control' id='signup-shipping-zip-input' name='ship-zip' value='{$userRow['ship_zip']}'/>";
                                        ?>
                                    </div>
                                </div>
                                <br/>
                                <div class="row col-md-12">
                                    <div class="column">
                                        <h6>Billing Address</h6>
                                    </div>
                                    <div class="column col-md-4">
                                        <input type="checkbox" id="same-as-shipping-checkbox"/>
                                        <label for="#same-as-shipping-checkbox">Same As Shipping Address</label>
                                    </div>
                                </div>
                                <div class="row" id="billing-address-row">
                                    <div class="col-md-1 column">
                                        <label for="#signup-billing-house-input">House/Apt #</label>
                                        <?php
                                            echo "<input class='form-control' id='signup-billing-house-input' name='bill-house' value='{$userRow['bill_house']}'/>";
                                        ?>
                                    </div>
                                    <div class="col-md-2 column">
                                        <label for="#signup-billing-street-input">Street</label>
                                        <?php
                                            echo "<input class='form-control' id='signup-billing-street-input' name='bill-street' value='{$userRow['bill_street']}'/>";
                                        ?>
                                    </div>
                                    <div class="col-md-2 column">
                                        <label for="#signup-billing-city-input">City</label>
                                        <?php
                                            echo "<input class='form-control' id='signup-billing-city-input' name='bill-city' value='{$userRow['bill_city']}'/>";
                                        ?>
                                    </div>
                                    <div class="col-md-2 column">
                                        <label for="#signup-billing-state-select">State</label>
                                        <?php
                                            echo "<select class='form-control' id='signup-billing-state-select' name='bill-state' value='{$userRow['bill_state']}'>
                                                <option class='disabled' disabled value='-1'>Select Your State</option>
                                            </select>";
                                        ?>
                                    </div>
                                    <div class="col-md-1 column">
                                        <label for="#signup-billing-zip-input">Zip Code</label>
                                        <?php
                                            echo "<input class='form-control' id='signup-billing-zip-input' name='bill-zip' value='{$userRow['bill_zip']}'/>";
                                        ?>
                                    </div>
                                </div>
                                <br />
                                <span>
                                    <button class="btn btn-primary" type="submit" id="signup-submit">Submit Changes</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
