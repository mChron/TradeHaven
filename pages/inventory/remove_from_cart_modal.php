<!DOCTYPE html>
<!-- Filename: contact_feedback_modal.php
Author: Marcus Chronabery
Date: 11/7/18-->
<div id="remove-from-cart-modal" class="modal fade show" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div id="remove-from-cart-modal-content" class="modal-content">
            <div id="remove-from-cart-modal-header" class="modal-header">
                <h5 class="modal-title">Are you sure?</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- end modal header--> 
            <div id="sell-modal-body" class="modal-body">
                <input id="remove-row-id" class="hidden" />
                <input id="remove-card-id" class="hidden" />
                <div class="container">
                    <div class="alert alert-success d-block">
                        <p>
                            Are you sure you want to remove all <h6 id="remove-card-name"></h6> cards from your cart?
                        </p>
                    </div>
                </div>
            </div>
            <!-- end modal body -->
            <div class="modal-footer">
                <button class="btn btn-light button-custom" data-dismiss="modal">Cancel</button>
                <button id="confirm-remove-card" class="btn btn-primary button-custom" data-dismiss="modal">Remove Card(s)</button>
            </div>
            <!-- end modal footer -->
        </div>
    </div>
</div>