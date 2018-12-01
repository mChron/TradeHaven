<!DOCTYPE html>
<!-- Filename: trade.php
Author: Marcus Chronabery
Date: 11/7/18 -->
<html>
    <head>
        <title>Trade Haven - Trade</title>
        <?php include "../../pages/common/includes.html" ?>
        <link href="css/trade.css" rel="stylesheet"/>
    </head>
    <body>
        <?php include "../../pages/common/header.php" ?>
        <?php include "../../pages/common/login_modal.php"?>
        <?php include "../../pages/common/footer.php" ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div id="trade-jumbotron" class="jumbotron">
                        <h2>Trade</h2>
                        <?php
                            include "../../../db_connect.php";
                            $statusResults = mysqli_query($mysqli, "select * from trade_status");
                            print "<div class=\"row\">";
                            $numStatusRows = mysqli_num_rows($statusResults);
                            $statusRow = mysqli_fetch_row($statusResults);
                            while ($statusRow != null) {
                                $statusId = $statusRow['0'];
                                if ($statusId % 2 != 0) {
                                    if ($statusId === "{$numStatusRows}") {
                                        print "</div>";
                                    }
                                    else {
                                        print "</div><div class=\"row\">";
                                    }
                                }
                                else {
                                    print "<div class=\"col-md-1\"></div>";
                                }
                                print "
                                    <div class=\"col-md-5 status-column\">
                                        <h2>{$statusRow['1']}</h2>
                                        <table class=\"table table-bordered table-striped table-hover\">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Requester</th>
                                                    <th>Trade User</th>
                                                    <th>Request Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>";
                                $result = mysqli_query($mysqli, 
                                    "select trade_request_id, CONCAT(users1.first_name, \" \", users1.last_name) as requester, CONCAT(users2.first_name, \" \", users2.last_name) as requested,
                                    request_date 
                                    from trade_request
                                    inner join users as users1 on users1.user_id = requester_user_id
                                    inner join users as users2 on users2.user_id = requested_user_id
                                    where requester_user_id = {$_SESSION['customer_id']} or requested_user_id = {$_SESSION['customer_id']}
                                    and request_status_id = {$statusId}
                                    order by trade_request_id");
                                while (($row = mysqli_fetch_array($result))!= null) {
                                    print "
                                        <tr id=\"request-{$row['trade_request_id']}\">
                                            <td>{$row['trade_request_id']}</td>
                                            <td>{$row['requester']}</td>
                                            <td>{$row['requested']}</td>
                                            <td>{$row['request_date']}</td>
                                        </tr>
                                    ";
                                }
                                print "
                                            </tbody>
                                        </table>
                                    </div>";
                                $statusRow = mysqli_fetch_row($statusResults);
                            }
                        ?>
                    </div><!-- End Trade Jumbotron -->
                </div>
            </div>
        </div>
    </body>
</html>
