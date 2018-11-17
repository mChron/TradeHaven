<!DOCTYPE html>
<!-- Filename: events.php
Author: Marcus Chronabery
Date: 11/7/18 -->
<html>
    <head>
        <title>Trade Haven - Events</title>
        <?php include "../pages/common/includes.html" ?>
        <link href="css/bootstrap-datepicker.min.css" rel="stylesheet">
        <link href="css/events.css" rel="stylesheet">
        <script src="js/bootstrap-datepicker.min.js"></script>
        <script src="js/events.js"></script>
    </head>
    <body>
        <?php include "../pages/common/header.php" ?>
        <?php include "../pages/common/login_modal.php"?>
        <?php include "../pages/common/footer.php" ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div id="events-jumbotron" class="jumbotron">
                        <h2>Events</h2>
                        <form id="create-event-form" action="#" method="POST" role="form" novalidate>
                            <fieldset id="event-details-fieldset">
                                <legend id="event-details-legend">Event Details</legend>
                                <div class="container-fluid" id="details-wrapper">
                                    <div class="row col-md-12" id="name-and-privacy-row">
                                        <div class="column col-md-4">
                                            <label id="event-name-label">Event Name</label>
                                            <input class="form-control" id="event-name-input" title="Event Name" name="event-name" />
                                        </div>
                                        <div class="col-md-4 column">
                                            <label id="event-privacy-label" for="#event-privacy-btn">Event Privacy</label>
                                            <div id="priv-btn-wrapper">
                                                <button id="event-privacy-btn" type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false">
                                                    Public
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <label id="event-name-validation-warning" class="validation-warning d-none">* Event Name Required</label>
                                    <div class="row col-md-12">
                                        <div class="col-md-4 column">
                                            <label id="event-date-label">Event Date</label>
                                            <div class="input-group date" id="event-datepicker">
                                                <input class="form-control validatable-required validatable-after-parent" type="text" id="event-date-input" title="Event Date" name="event-date" placeholder="mm/dd/yyyy"/>
                                                <span class="input-group-append"><img class="input-group-addon input-group-text clickable" src="images/glyphicons/glyphicons-157-show-thumbnails.png" /></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row col-md-12">
                                        <div id="description-wrapper" class="column col-md-12">
                                            <label for="#event-description" id="content-label">Event Description</label>
                                            <div class="input-group">
                                                <textarea id="event-description" class="form-control validatable-required validatable-after-parent" title="Event Details" name="event-description" required></textarea>
                                            </div>
                                            <label id="description-length-validation-warning" class="validation-warning d-none">* Please Provide At Least 250 Characters</label>
                                        </div>
                                    </div>
                                    <div id="events-button-wrapper" class="row col-md-12">
                                        <button class="btn btn-primary button-custom" type="submit" id="submit-event">Submit</button>
                                        <a class="btn btn-light button-custom" href="index.html" id="cancel-event">Cancel</a>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
