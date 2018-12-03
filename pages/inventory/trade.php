<!DOCTYPE html>
<!-- Filename: trade.php
Author: Marcus Chronabery
Date: 11/7/18 -->
<html>
    <head>
        <title>Trade Haven - Trade Status</title>
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
                                $statusResults = mysqli_query($mysqli, "select * from trade_status");
                                print "<div class=\"row\">";
                                $numStatusRows = mysqli_num_rows($statusResults);
                                $statusRow = mysqli_fetch_row($statusResults);
                                $self = $_SESSION['customer_first_name']." ".$_SESSION['customer_last_name'];
                                while ($statusRow != null) {
                                    $statusId = $statusRow['0'];
                                    if ($statusId % 2 != 0) {
                                        if ($statusId === "{$numStatusRows}") {
                                            print "</div>";
                                        }
                                        else if ($statusId != "1") {
                                            print "</div><br /><div class=\"row\">";
                                        }
                                    }
                                    else {
                                        print "<div class=\"col-md-1\"></div>";
                                    }
                                    print "
                                        <div class=\"col-md-5 status-column\">
                                            <h5>{$statusRow['1']}<img class='status-desc' src='images/glyphicons/glyphicons-195-question-sign.png' height='20' width='20' data-toggle='tooltip' data-placement='right' title='{$statusRow['2']}'/></h5>
                                            <table class=\"header-table table table-bordered table-striped table-hover\">
                                                <thead>
                                                    <tr>
                                                        <th class='id-header condensed'>ID</th>
                                                        <th class='requester-header condensed'>Requester</th>
                                                        <th class='requested-header condensed'>Trade User</th>
                                                        <th class='date-header condensed'>Request Date</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        <div class='nested'>
                                            <table class=\"table table-bordered table-striped table-hover\">
                                                <tbody>";
                                    $result = mysqli_query($mysqli, 
                                        "select trade_request_id, CONCAT(users1.first_name, \" \", users1.last_name) as requester, CONCAT(users2.first_name, \" \", users2.last_name) as requested,
                                        request_date 
                                        from trade_request
                                        inner join users as users1 on users1.user_id = requester_user_id
                                        inner join users as users2 on users2.user_id = requested_user_id
                                        where (requester_user_id = {$_SESSION['customer_id']} or requested_user_id = {$_SESSION['customer_id']})
                                        and request_status_id = {$statusId}
                                        order by trade_request_id");
                                    while (($row = mysqli_fetch_array($result))!= null) {
                                        print "
                                            <tr id=\"request-{$row['trade_request_id']}\">
                                                <td class='id' colspan='1'>{$row['trade_request_id']}</td>";
                                        $req = $row['requester'];
                                        $requested = $row['requested'];
                                        if ($req == $self) {
                                            print "<td class='requester' colspan='1'>You</td>";
                                        }
                                        else {
                                            print "<td class='requester' colspan='1'>{$req}</td>";
                                        }
                                        if ($requested == $self) {
                                            print "<td class='requested' colspan='1'>You</td>";
                                        }
                                        else {
                                            print "<td class='requested' colspan='1'>{$requested}</td>";
                                        }
                                        print "
                                                <td class='date' colspan='1'>{$row['request_date']}</td>
                                            </tr>
                                        ";
                                    }
                                    print "
                                                </tbody>
                                            </table>
                                        </div></div>";
                                    $statusRow = mysqli_fetch_row($statusResults);
                                }
                            }
                        ?>
                    </div><!-- End Trade Jumbotron -->
                </div>
            </div>
        </div>
    </body>
    <script type="text/javascript">
        $(".id").width($(".id-header").width());
        $(".requester").width($(".requester-header").width());
        $(".requested").width($(".requested-header").width());
        $(".date").width($(".date-header").width());
        initializeTooltips();
    </script>
</html>
