<!DOCTYPE html>
<!-- Filename: sell_history.php
Author: Marcus Chronabery
Date: 11/7/18 -->
<html>
    <head>
        <title>Trade Haven - Sell History</title>
        <?php include "../../pages/common/includes.html" ?>
        <script src="js/sell_history.js"></script>
        <link href="css/transaction_history.css" rel="stylesheet">
    </head>
    <body>
        <?php
            include "../../pages/common/header.php";
            include "../../pages/common/login_modal.php";
            include "../../pages/common/footer.php";
            include "../../pages/inventory/transaction_details_modal.php";
        ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div id="sell-history-jumbotron" class="jumbotron">
                        <h2>Sell History</h2>
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Sale Transaction ID</th>
                                    <th>Transaction Date/Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include "../../../db_connect.php";
                                    $loggedIn = isset($_SESSION['customer_id']);
                                    if ($loggedIn) {
                                        $result = mysqli_query($mysqli, "select sale_id, transaction_date from user_sale_relation where user_id = {$_SESSION['customer_id']}");
                                        if ($result) {
                                            $row = mysqli_fetch_array($result);
                                            while ($row != null) {
                                                print "<tr>
                                                    <td class='sale-id clickable transaction-view'><span class='transaction-id'>{$row[0]}</span></td>
                                                    <td class='sale-date'>{$row[1]}</td>
                                                    </tr>";
                                                $row = mysqli_fetch_array($result);
                                            }
                                        }
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
