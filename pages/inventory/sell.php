<!DOCTYPE html>
<!-- Filename: sell.php
Author: Marcus Chronabery
Date: 11/7/18 -->
<html>
    <head>
        <title>Trade Haven - Sell Inventory</title>
        <?php include "../../pages/common/includes.html" ?>
        <link href="css/sell.css" rel="stylesheet">
        <script src="js/sell.js"></script>
    </head>
    <body>
        <?php
            include "../../pages/common/header.php";
            include "../../pages/common/login_modal.php";
            include "../../pages/inventory/sell_cards_feedback_modal.php";
            include "../../pages/common/footer.php";
            include "../../pages/inventory/sell_cards_edit_modal.php";
        ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div id="sell-jumbotron" class="jumbotron">
                        <h2>Sell Inventory</h2>
                        <form id="sale-form" action="php/sellFormProcess.php" method="POST">
                            <table id="sell-cards-table" class="table table-bordered table-striped table-hover">
                                <thead id="sell-table-header">
                                    <tr id="sell-header-row">
                                        <th id="sell-name-header" >Card Name</th>
                                        <th id="sell-condition-header" >Card Condition</th>
                                        <th id="sell-available-header" ># To Sell</th>
                                        <th id="sell-price-header" >Estimated Price/Card</th>
                                        <th id="btn-column-header" ></th>
                                    </tr>
                                </thead>
                                <tbody id="sell-table-body">
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4">
                                            <span id="add-sell-card" class="btn btn-light button-custom">
                                                <img src="images/stack.png" height="40" width="40" />Add Cards
                                            </span>
                                        </td>
                                        <td>
                                            <span id="remove-all-cards" class="btn btn-light button-custom">
                                                <img height="40" width="40" src="images/card-burn.png" />Remove All
                                            </span>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                            <div id="button-wrapper">
                                <button class="btn btn-primary button-custom" type="submit" id="submit-sale">Submit Sale</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
