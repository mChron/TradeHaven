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
        <?php include "../../pages/common/header.php" ?>
        <?php include "../../pages/common/login_modal.php"?>
        <?php include "../../pages/common/footer.php" ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div id="sell-jumbotron" class="jumbotron">
                        <h2>Sell Inventory</h2>
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
                                        <img id="add-sell-card" class="clickable" data-toggle="tooltip" data-placement="top" title="Add Cards" src="images/stack.png" height="40" width="40" />
                                    </td>
                                    <td>
                                        <img id="remove-all-cards" class="clickable" data-toggle="tooltip" data-placement="top" title="Remove All" height="40" width="40" src="images/card-burn.png" />
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
