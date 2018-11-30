<!DOCTYPE html>
<!-- Filename: transaction_details_modal.php
Author: Marcus Chronabery
Date: 11/29/18-->
<div id="transaction-details-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detailed Transaction View</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- end modal header--> 
            <div id="transaction-details-modal-body" class="modal-body">
                <table id="transaction-details-table" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Card Name</th>
                            <th>Card Condition</th>
                            <th>Card Quantity</th>
                            <th>Price/Card</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <!-- end modal body -->
            <div class="modal-footer">
                <button type="button" class="btn btn-light button-custom" data-dismiss="modal">Close</button>
            </div>
            <!-- end modal footer -->
        </div>
    </div>
</div>
