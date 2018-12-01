<!DOCTYPE html>
<!-- Filename: browse.php
Author: Marcus Chronabery
Date: 11/7/18-->
<html>
    <head>
        <title>Trade Haven - Browse Users</title>
        <?php include "../../pages/common/includes.html" ?>
        <link href="css/browse.css" rel="stylesheet">
        <script src="js/browse.js"></script>
    </head>
    <body>
        <?php 
            include "../../pages/common/header.php";
            include "../../pages/common/login_modal.php";
            include "../../pages/common/footer.php";
            // session started in header, simply reference it here
            $loggedIn = isset($_SESSION['customer_id']);
            if (!$loggedIn) {
                echo '<script type="text/javascript">$(function() {'
                . '$("button").attr("disabled", "disabled");'
                . '$("#login-form").remove();'
                . '$("#login-err").removeClass("d-none");'
                . '$("#login-err").html("You are not logged in! Returning home.");'
                . '$("#login-modal").modal("show");'
                . 'setTimeout(function() {location.href="index.php";}, 3000);'
                . '});</script>';
            }
            ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div id="users-jumbotron" class="jumbotron">
                        <h2>Browse Users</h2>
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Signup Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include "../../../db_connect.php";
                                    $result = mysqli_query($mysqli, "SELECT user_id, CONCAT(first_name, ' ', LEFT(last_name, 1), '.') as name, signup_date FROM `users` where user_id != {$_SESSION['customer_id']} order by 2 asc;");
                                    $row = mysqli_fetch_array($result);
                                    while ($row != null) {
                                        print "<tr>
                                            <td class=\"user-id hidden\">{$row[0]}</td>
                                            <td class=\"user-name\" colspan=\"1\">{$row[1]}</td>
                                            <td class=\"user-signup-date\" colspan=\"1\">$row[2]</td>";
                                        print '<td class="btn-column" colspan="1"><img class="clickable" src="images/card-exchange.png" height="30" width="30" data-placement="left" data-toggle="tooltip" title="Trade With User" /></td>';
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
