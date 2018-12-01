<!DOCTYPE html>
<!-- Filename: signup.php
Author: Marcus Chronabery
Date: 11/17/18 -->
<html>
    <head>
        <title>Trade Haven - Sign Up</title>
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
                        <form method="POST" action="php/signupFormProcess.php" role="form" id="signup-form" novalidate>
                            <h2>Sign Up</h2>
                            <fieldset id="contact-information-fieldset">
                                <legend id="contact-information-legend">Contact Information</legend>
                                <div class="container-fluid">
                                    <div class="row" id="signup-name-row">
                                        <div class="col-md-4 column">
                                            <label for="#signup-firstname-input">First Name</label>
                                            <input class="form-control validatable-required " id="signup-firstname-input" title="First Name" name="first" />
                                        </div>
                                        <div class="col-md-4 column">
                                            <label for="#signup-lastname-input">Last Name</label>
                                            <input class="form-control validatable-required " id="signup-lastname-input" title="Last Name" name="last" />
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row" id="signup-email-row">
                                        <div class="col-md-4 column">
                                            <label for="#signup-email-input">Email</label>
                                            <input class="form-control validatable-required " type="email" id="signup-email-input" title="Signup Email" name="email" placeholder="someUser@domain.com"/>
                                            <span id="valid-email-wrapper">
                                                <label id="valid-email-validation-warning" class="validation-warning d-none format-warning">* Email must be of the format: someUser@domain.com(.net, .org, .mail, .gov, .co)</label>
                                            </span>
                                        </div>
                                        <div class="col-md-4 column">
                                            <label for="#signup-phone-input">Phone Number</label>
                                            <input class="form-control validatable-required " id="signup-phone-input" title="phone" name="phone" placeholder="123-456-7890"/>
                                            <span id="valid-phone-wrapper">
                                                <label id="phone-format-validation-warning" class="validation-warning d-none format-warning">* Please use 1 of these formats: 123-456-7890, 123 456 7890, 1234567890</label>
                                            </span>
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row" id="signup-password-row">
                                        <div class="col-md-4 column">
                                            <label for="#signup-password-input">Password</label>
                                            <input class="form-control validatable-required " type="password" id="signup-password-input" title="Signup Password" name="password"/>
                                        </div>
                                        <div class="col-md-4 column">
                                            <label for="#signup-password-confirm-input">Confirm Password</label>
                                            <input class="form-control validatable-required " type="password" id="signup-password-confirm-input" title="Confirm Password" name="confirm"/>
                                            <span id="pass-match-wrapper">
                                                <label id="pass-match-validation-warning" class="validation-warning d-none">* Passwords do not match</label>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset id="purchase-information-fieldset">
                                <legend id="purchase-information-legend">Purchase Information</legend>
                                <div class="container-fluid">
                                    <h6>Shipping Address</h6>                            
                                    <div class="row" id="shipping-address-row">
                                        <div class="col-md-2 column">
                                            <label class="top-label" for="#signup-shipping-house-input">House/Apt #</label>
                                            <input class="form-control validatable-required" id="signup-shipping-house-input" title="Shipping House" name="ship-house"/>
                                            <span id="valid-ship-house-wrapper">
                                                <label id="ship-house-format-validation-warning" class="validation-warning d-none format-warning">* Please enter a 1-5 digit house number</label>
                                            </span>
                                        </div>
                                        <div class="col-md-2 column">
                                            <label for="#signup-shipping-street-input">Street</label>
                                            <input class="form-control validatable-required" id="signup-shipping-street-input" title="Shipping Street" name="ship-street"/>
                                        </div>
                                        <div class="col-md-3 column">
                                            <label for="#signup-shipping-city-input">City</label>
                                            <input class="form-control validatable-required" id="signup-shipping-city-input" title="Shipping City" name="ship-city"/>
                                        </div>
                                        <div class="col-md-3 column">
                                            <label for="#signup-shipping-state-select">State</label>
                                            <select class="form-control validatable-required" id="signup-shipping-state-select" title="Shipping State" name="ship-state">
                                                <option class="disabled" disabled selected value="-1">Select Your State</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2 column">
                                            <label for="#signup-shipping-zip-input">Zip Code</label>
                                            <input class="form-control validatable-required zip" id="signup-shipping-zip-input" title="Shipping Zip" name="ship-zip"/>
                                            <span id="valid-ship-zip-wrapper">
                                                <label id="ship-zip-format-validation-warning" class="validation-warning d-none format-warning">* Please enter a 5 digit zip code</label>
                                            </span>
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
                                        <div class="col-md-2 column">
                                            <label class="top-label" for="#signup-billing-house-input">House/Apt #</label>
                                            <input class="form-control validatable-required" id="signup-billing-house-input" title="Billing House" name="bill-house"/>
                                            <span id="valid-bill-house-wrapper">
                                                <label id="bill-house-format-validation-warning" class="validation-warning d-none">* Please enter a 1-5 digit house number</label>
                                            </span>
                                        </div>
                                        <div class="col-md-2 column">
                                            <label for="#signup-billing-street-input">Street</label>
                                            <input class="form-control validatable-required" id="signup-billing-street-input" title="Billing Street" name="bill-street"/>
                                        </div>
                                        <div class="col-md-3 column">
                                            <label for="#signup-billing-city-input">City</label>
                                            <input class="form-control validatable-required" id="signup-billing-city-input" title="Billing City" name="bill-city"/>
                                        </div>
                                        <div class="col-md-3 column">
                                            <label for="#signup-billing-state-select">State</label>
                                            <select class="form-control validatable-required" id="signup-billing-state-select" title="Billing State" name="bill-state">
                                                <option class="disabled" disabled selected value="-1">Select Your State</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2 column">
                                            <label for="#signup-billing-zip-input">Zip Code</label>
                                            <input class="form-control validatable-required zip" id="signup-billing-zip-input" title="Billing Zip" name="bill-zip"/>
                                            <span id="valid-bill-zip-wrapper">
                                                <label id="bill-zip-format-validation-warning" class="validation-warning d-none format-warning">* Please enter a 5 digit zip code</label>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <span id="signup-button-panel">
                                <button class="btn btn-primary button-custom" type="submit" id="signup-submit">Submit</button>
                                <button class="btn btn-light button-custom" type="reset" id="signup-reset">Reset</button>
                            </span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>