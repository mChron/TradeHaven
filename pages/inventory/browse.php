<!DOCTYPE html>
<!-- Filename: browse.php
Author: Marcus Chronabery
Date: 11/7/18-->
<html>
    <head>
        <title>Trade Haven - Buy Inventory</title>
        <?php include "../../pages/common/includes.html" ?>
        <link href="css/browse.css" rel="stylesheet">
        <script src="js/browse.js"></script>
    </head>
    <body>
        <?php 
            include "../../pages/common/header.php";
            include "../../pages/common/login_modal.php";
            include "../../pages/common/footer.php";
            include "../../pages/inventory/add_to_cart_modal.php";
            include "detailed_card_view.php" ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div id="browse-jumbotron" class="jumbotron">
                        <div id="cart-add-success" class="hidden alert alert-success">
                            Your card(s) have successfully been added to your cart.
                        </div>
                        <div id="cart-add-failure" class="hidden alert alert-success">
                            Your card(s) could not be added to your cart.
                        </div>
                        <h2>Buy Inventory</h2>
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Card Name</th>
                                    <th>Card Color(s)</th>
                                    <th>Card Type</th>
                                    <th>Card Condition</th>
                                    <th># Available</th>
                                    <th>Price/Card</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include "../../../db_connect.php";
                                    $result = mysqli_query($mysqli, "SELECT * FROM simple_card_view;");
                                    $row = mysqli_fetch_array($result);
                                    while ($row != null) {
                                        print "<tr>
                                            <td class=\"card-id hidden\">{$row[0]}</td>
                                            <td class=\"card-name\" colspan=\"1\">
                                                <span class='name'>{$row[1]}</span>
                                                <a href=\"#\" data-toggle='modal' data-target='#detailed-card-view-modal'>
                                                    <img class=\"detailed-view clickable\" src=\"images/glyphicons/glyphicons-28-search.png\" data-toggle='tooltip' data-placement='top' title='Detailed View'/>
                                                </a>
                                                <a target='_blank' href=\"https://api.scryfall.com/cards/named?exact={$row[1]}&format=image&version=normal\">
                                                    <img class=\"card-image\" src=\"images/glyphicons/glyphicons-12-camera.png\" data-toggle='tooltip' data-placement='top' title='Card Image' />
                                                </a>
                                            </td>
                                            <td class=\"card-color\" colspan=\"1\">$row[2]</td>
                                            <td class=\"card-type\" colspan=\"1\">$row[3]</td>
                                            <td class=\"card-condition\" colspan=\"1\">$row[4]</td>
                                            <td class=\"card-quantity\" colspan=\"1\">$row[5]</td>
                                            <td class=\"card-price\" colspan=\"1\">$$row[6]</td>";
                                        if ($loggedIn) {
                                            print '<td class="btn-column" colspan="1"><img class="clickable add-to-cart" src="images/open-chest.png" height="30" width="30" data-placement="left" data-toggle="tooltip" title="Add To Cart" /></td>';
                                        }
                                        print '</tr>';
                                        $row = mysqli_fetch_array($result);
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
