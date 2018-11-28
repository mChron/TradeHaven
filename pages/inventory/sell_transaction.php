<!DOCTYPE html>
<!-- Filename: sell_transaction.php
Author: Marcus Chronabery
Date: 11/25/18 -->
<html>
    <head>
        <title>Trade Haven - Sell Transaction Details</title>
        <?php include "../../pages/common/includes.html" ?>
    </head>
    <body>
        <?php
            include "../../pages/common/header.php";
            include "../../pages/common/login_modal.php";
            include "../../pages/common/footer.php";
        ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div id="sell-history-jumbotron" class="jumbotron">
                        <h2>Sell Transaction Details</h2>
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
                                                    <td class='sale-id'>{$row[0]}</td>
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
