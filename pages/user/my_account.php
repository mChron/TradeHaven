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
        <?php include "../../pages/common/header.php" ?>
        <?php include "../../pages/common/login_modal.php"?>
        <?php include "../../pages/common/footer.php" ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div id="signup-jumbotron" class="jumbotron">
                        <form action="#" method="POST" id="signup-form">
                            <h2>My Account</h2>
                            <hr />
                            <h5>Contact Information</h5>
                            <div class="container-fluid">
                                <div class="row" id="signup-name-row">
                                    <div class="col-md-4 column">
                                        <label for="#signup-firstname-input">First Name</label>
                                        <input class="form-control" id="signup-firstname-input" name="firstname_field" />
                                    </div>
                                    <div class="col-md-4 column">
                                        <label for="#signup-lastname-input">Last Name</label>
                                        <input class="form-control" id="signup-lastname-input" name="lastname_field" />
                                    </div>
                                </div>
                                <br/>
                                <div class="row" id="signup-email-row">
                                    <div class="col-md-4 column">
                                        <label for="#signup-email-input">Email</label>
                                        <input class="form-control" type="email" id="signup-email-input" name="email_field"/>
                                    </div>
                                    <div class="col-md-4 column">
                                        <label for="#signup-phone-input">Phone Number</label>
                                        <input class="form-control" id="signup-phone-input" name="phone_field"/>
                                    </div>
                                </div>
                                <br/>
                                <div class="row" id="signup-password-row">
                                    <div class="col-md-4 column">
                                        <label for="#signup-password-input">Password</label>
                                        <input class="form-control" type="password" id="signup-password-input" name="password_field"/>
                                    </div>
                                    <div class="col-md-4 column">
                                        <label for="#signup-password-confirm-input">Confirm Password</label>
                                        <input class="form-control" type="password" id="signup-password-confirm-input" />
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
                                        <input class="form-control" id="signup-shipping-house-input" name="ship_house_field"/>
                                    </div>
                                    <div class="col-md-2 column">
                                        <label for="#signup-shipping-street-input">Street</label>
                                        <input class="form-control" id="signup-shipping-street-input" name="ship_street_field"/>
                                    </div>
                                    <div class="col-md-2 column">
                                        <label for="#signup-shipping-city-input">City</label>
                                        <input class="form-control" id="signup-shipping-city-input" name="ship_city_field"/>
                                    </div>
                                    <div class="col-md-2 column">
                                        <label for="#signup-shipping-state-select">State</label>
                                        <select class="form-control" id="signup-shipping-state-select" name="ship_state_field">
                                            <option class="disabled" disabled selected value="-1">Select Your State</option>
                                        </select>
                                    </div>
                                    <div class="col-md-1 column">
                                        <label for="#signup-shipping-zip-input">Zip Code</label>
                                        <input class="form-control" id="signup-shipping-zip-input" name="ship_zip_field"/>
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
                                        <input class="form-control" id="signup-billing-house-input" name="bill_house_field"/>
                                    </div>
                                    <div class="col-md-2 column">
                                        <label for="#signup-billing-street-input">Street</label>
                                        <input class="form-control" id="signup-billing-street-input" name="bill_street_field"/>
                                    </div>
                                    <div class="col-md-2 column">
                                        <label for="#signup-billing-city-input">City</label>
                                        <input class="form-control" id="signup-billing-city-input" name="bill_city_field"/>
                                    </div>
                                    <div class="col-md-2 column">
                                        <label for="#signup-billing-state-select">State</label>
                                        <select class="form-control" id="signup-billing-state-select" name="bill_state_field">
                                            <option class="disabled" disabled selected value="-1">Select Your State</option>
                                        </select>
                                    </div>
                                    <div class="col-md-1 column">
                                        <label for="#signup-billing-zip-input">Zip Code</label>
                                        <input class="form-control" id="signup-billing-zip-input" name="bill_zip_field"/>
                                    </div>
                                </div>
                                <br />
                                <span>
                                    <button class="btn btn-primary" type="submit" id="signup-submit">Submit</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
