<!DOCTYPE html>
<!-- Filename: cart.php
Author: Marcus Chronabery
Date: 11/7/18-->
<html>
    <head>
        <title>Trade Haven - My Cart</title>
        <?php include "../../pages/common/includes.html" ?>
        <link rel="stylesheet" href="css/cart.css">
        <script src="js/cart.js" type="text/javascript" />
    </head>
    <body>
        <?php 
            include "../../pages/common/header.php";
            include "../../pages/common/login_modal.php";
            include "../../pages/common/footer.php";
            include "../../pages/inventory/remove_from_cart_modal.php";
            include "../../pages/inventory/buy_cards_feedback_modal.php";
        ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div id="cart-jumbotron" class="jumbotron">
                        <div id="cart-remove-success" class="hidden alert alert-success">
                            Your card(s) have successfully been removed from your cart.
                        </div>
                        <div id="cart-remove-failure" class="hidden alert alert-danger">
                            Your card(s) could not be removed from your cart.
                        </div>
                        <h2>My cart</h2>
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Card Name</th>
                                    <th>Card Color(s)</th>
                                    <th>Card Type</th>
                                    <th>Card Condition</th>
                                    <th>Card Quantity</th>
                                    <th>Price/Card</th>
                                    <th>Total Card Price</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
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
                                    }
                                    else {
                                        $result = mysqli_query($mysqli, "SELECT scv.card_id, scv.card_name, scv.card_color, scv.type_name, scv.condition_name, ccr.card_quantity, scv.card_price, (scv.card_price * ccr.card_quantity) as card_total FROM simple_card_view scv inner join cart_card_relation ccr on ccr.card_id = scv.card_id and ccr.cart_id = {$_SESSION['cart_id']};");
                                        $row = mysqli_fetch_array($result);
                                        $row_n = 0;
                                        while ($row != null) {
                                            print "<tr class='cart-row' id='row-{$row_n}' >
                                                <td class=\"card-id hidden\">{$row[0]}</td>
                                                <td class=\"card-name\" colspan=\"1\">
                                                    <span class='name'>{$row[1]}</span>
                                                    <a target='_blank' href=\"https://api.scryfall.com/cards/named?exact={$row[1]}&format=image&version=normal\">
                                                        <img class=\"card-image\" src=\"images/glyphicons/glyphicons-12-camera.png\" data-toggle='tooltip' data-placement='top' title='Card Image' />
                                                    </a>
                                                </td>
                                                <td class=\"card-color\" colspan=\"1\">$row[2]</td>
                                                <td class=\"card-type\" colspan=\"1\">$row[3]</td>
                                                <td class=\"card-condition\" colspan=\"1\">$row[4]</td>
                                                <td class=\"card-quantity\" colspan=\"1\">$row[5]</td>
                                                <td class=\"card-price\" colspan=\"1\">$$row[6]</td>
                                                <td class=\"card-total\" colspan=\"1\">$$row[7]</td>";
                                            if ($loggedIn) {
                                                print '<td class="btn-column" colspan="1"><img class="clickable remove-from-cart" src="images/glyphicons/glyphicons-198-remove-circle.png" height="30" width="30" data-placement="left" data-toggle="tooltip" title="Remove Card" /></td>';
                                            }
                                            print '</tr>';
                                            $row = mysqli_fetch_array($result);
                                            $row_n++;
                                        }
                                    }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5"></td>
                                    <td class="total-cell" style="border-top:solid 3px black" colspan="1">Cart Total</td>
                                    <td class="total-cell" style="border-top:solid 3px black" id="cart-total"></td>
                                </tr>
                            </tfoot>
                        </table>
                        <button id="checkout-submit" class="btn btn-primary button-custom">Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script type="text/javascript">
        initializeTooltips();
    </script>
</html>