<!DOCTYPE html>
<!-- Filename: contact_feedback_modal.php
Author: Marcus Chronabery
Date: 11/7/18-->
<div id="add-to-cart-modal" class="modal fade show" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div id="add-to-cart-modal-content" class="modal-content">
            <div id="add-to-cart-modal-header" class="modal-header">
                <h5 class="modal-title">How Many Would You Like?</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- end modal header--> 
            <div id="sell-modal-body" class="modal-body">
                <input id="submit-card-id" class="hidden" />
                <div class="container">
                    <h2 id="submit-card-name"></h2>
                    <div id="card-num-spinner"></div>
                </div>
            </div>
            <!-- end modal body -->
            <div class="modal-footer">
                <button id="submit-add-to-cart" class="btn btn-primary button-custom">Add To Cart</button>
            </div>
            <!-- end modal footer -->
        </div>
    </div>
</div>