<!DOCTYPE html>
<!-- Filename: contact_feedback_modal.php
Author: Marcus Chronabery
Date: 11/7/18-->
<div id="sell-edit-modal" class="modal fade show" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div id="sell-edit-modal-content" class="modal-content">
            <div id="sell-edit-modal-header" class="modal-header">
                <h5 class="modal-title">Choose Card To Sell</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- end modal header--> 
            <div id="sell-edit-modal-body" class="modal-body">
                <input id="editRowId" class="hidden" />
                <div class="container">
                    <table class="table table-bordered table-striped table-hover">
                        <tbody>
                            <?php
                                include "../../../db_connect.php";
                                $result = mysqli_query($mysqli, "SELECT * FROM simple_card_view;");
                                $row = mysqli_fetch_array($result);
                                while ($row != null) {
                                    print "<tr class='select-card'>
                                        <td class=\"select-card-id hidden\">{$row[0]}</td>
                                        <td colspan=\"1\">
                                            <span class='clickable select-card-name'>{$row[1]}</span>
                                            <a target='_blank' href=\"https://api.scryfall.com/cards/named?exact={$row[1]}&format=image&version=normal\">
                                                <img class=\"card-image\" src=\"images/glyphicons/glyphicons-12-camera.png\" data-toggle='tooltip' data-placement='top' title='Card Image' />
                                            </a>
                                        </td>
                                        <td class=\"card-price hidden\" colspan=\"1\">$$row[6]</td></tr>";
                                    $row = mysqli_fetch_array($result);
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end modal body -->
            <div class="modal-footer">
                <button type="button" class="btn btn-light button-custom" data-dismiss="modal">Close</button>
            </div>
            <!-- end modal footer -->
        </div>
    </div>
</div>