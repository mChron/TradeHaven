<!DOCTYPE html>
<!-- Filename: dice_roller.php
Author: Marcus Chronabery
Date: 11/7/18-->
<html>
    <head>
        <title>Trade Haven - Dice Roller</title>
        <?php include "../../pages/common/includes.html" ?>
        <link href="css/dice_roller/dice.css" rel="stylesheet">
        <script src="js/three.min.js"></script>
        <script src="js/cannon.min.js"></script>
    </head>
    <body>
        <?php include "../../pages/common/header.php" ?>
        <?php include "../../pages/common/login_modal.php"?>
        <?php include "../../pages/common/footer.php" ?>
                        <div class="control_panel">
                            <!--<br />-->
                            <!--<br />-->
                            <h6>3D Dice Roller by Anton Natarov</h6>
                            <p id="loading_text">Loading libraries, please wait a bit...</p>
                            <p id="info_text">
                                All Javascript, CSS, and HTML on this page provided for free by <a href="https://plus.google.com/+AntonNatarov">Anton Natarov</a>
                                <br />
                                Please see <a href="http://a.teall.info/dice/">http://a.teall.info/dice/</a> for more information.
                            </p>
                        </div>
                        <div id="info_div" style="display: none">
                            <div class="center_field">
                                <span id="label"></span>
                            </div>
                            <div class="center_field">
                                <div class="bottom_field">
                                    <span id="labelhelp">click to continue or tap and drag again</span>
                                </div>
                            </div>
                        </div>
                        <div id="selector_div" style="display: none">
                            <div class="center_field">
                                <div id="sethelp">
                                    choose your dice set by clicking the dices or by direct input of notation,<br/>
                                    tap and drag on free space of screen or hit throw button to roll
                                </div>
                            </div>
                            <div class="center_field">
                                <input type="text" id="set" value="4d6"></input><br/>
                                <button id="clear">clear</button>
                                <button style="margin-left: 0.6em" id="throw">throw</button>
                            </div>
                        </div>
                        <div id="canvas"></div>

                        <script type="text/javascript" src="js/dice_roller/teal.js"></script>
                        <script type="text/javascript" src="js/dice_roller/dice.js"></script>
                        <script type="text/javascript" src="js/dice_roller/dice_init.js"></script>
                        <script type="text/javascript" defer="defer">
                            dice_initialize(document.body);
                        </script>
    </body>
</html>
