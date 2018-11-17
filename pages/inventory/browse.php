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
        <?php include "../../pages/common/header.php" ?>
        <?php include "../../pages/common/login_modal.php"?>
        <?php include "../../pages/common/footer.php" ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div id="browse-jumbotron" class="jumbotron">
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
                                                {$row[1]}
                                                <img class=\"detailed-view clickable\" src=\"images/glyphicons/glyphicons-28-search.png\" data-toggle='tooltip' data-placement='top' title='Detailed View' />
                                                <a href=\"https://api.scryfall.com/cards/named?exact={$row[1]}&format=image&version=normal\">
                                                    <img class=\"card-image\" src=\"images/glyphicons/glyphicons-12-camera.png\" data-toggle='tooltip' data-placement='top' title='Card Image' />
                                                </a>
                                            </td>
                                            <td class=\"card-color\" colspan=\"1\">$row[2]</td>
                                            <td class=\"card-type\" colspan=\"1\">$row[3]</td>
                                            <td class=\"card-condition\" colspan=\"1\">$row[4]</td>
                                            <td class=\"card-quantity\" colspan=\"1\">$row[5]</td>
                                            <td class=\"card-price\" colspan=\"1\">$$row[6]</td>";
                                        print '<td class="btn-column" colspan="1"><img class="clickable" src="images/open-chest.png" height="30" width="30" data-placement="left" data-toggle="tooltip" title="Add To Cart" /></td>
                                        </tr>';
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
