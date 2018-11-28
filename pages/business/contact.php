<!DOCTYPE html>
<!-- Filename: contact.php
Author: Marcus Chronabery
Date: 11/7/18 -->
<html lang="en">
    <head>
        <?php include "../../pages/common/includes.html" ?>
        <title>Trade Haven - Contact Us</title>
        <meta name="author" content="Marcus Chronabery">
        <link href="css/contact_us.css" rel="stylesheet">
        <script src="js/contact.js"></script>
    </head>
    <body>
        <?php include "../../pages/common/header.php" ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div id="contact-jumbotron" class="jumbotron">
                        <form id="contact-form" action="php/contactFormProcess.php" method="POST" novalidate>
                            <h2>Contact Us</h2>
                            <div id="subject-wrapper" class="row col-md-6">
                                <label for="contact-subject" id="subject-label">Subject</label>
                                <div class="input-group">
                                    <input id="contact-subject" class="form-control col-md-8 validatable-required validatable-after-parent" title="Subject" name="contact-subject" required/>
                                </div>
                            </div>
                            <div id="message-wrapper" class="row col-md-12">
                                <label for="contact-content" id="content-label">Message</label>
                                <div class="input-group">
                                    <textarea id="contact-message" class="form-control validatable-required validatable-after-parent" title="Message" name="contact-message" required></textarea>
                                </div>
                                <label id="message-length-validation-warning" class="validation-warning d-none">* Please Provide At Least 250 Characters</label>
                            </div>
                            <div id="name-and-email-wrapper" class="row">
                                <div id="contact-name-wrapper" class="col-md-6">
                                    <label for="contact-name" id="name-label">Name</label>
                                    <div class="input-group">
                                        <input class="form-control col-md-8 validatable-required validatable-after-parent" id="contact-name" title="Name" name="contact-name" required/>
                                    </div>
                                </div>
                                <div id="contact-email-wrapper" class="col-md-4">
                                    <label for="contact-email" id="email-label">Email</label>
                                    <div class="input-group">
                                        <input class="form-control col-md-12 validatable-required validatable-after-parent" id="contact-email" type="email" title="Contact Email" name="contact-email" placeholder="example@somewhere.com" required/>
                                    </div>
                                    <span id="valid-email-wrapper">
                                        <label id="contact-valid-email-validation-warning" class="validation-warning d-none">* Email must be of the format: someUser@domain.com(.net, .org, .mail, .gov, .co)</label>
                                    </span>
                                </div>
                            </div>
                            <div id="contact-button-wrapper" class="row col-md-12">
                                <button class="btn btn-primary button-custom" type="submit" id="submit-contact">Submit</button>
                                <a class="btn btn-light button-custom" href="index.html" id="cancel-contact">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php include "../../pages/business/contact_feedback_modal.php"?>
        <?php include "../../pages/common/footer.php" ?>
    </body>
</html>