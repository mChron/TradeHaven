<!DOCTYPE html>
<!-- Filename: detailed_card_view.php
Author: Marcus Chronabery
Date: 11/18/18-->
<div id="detailed-card-view-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detailed Card View</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- end modal header--> 
            <div class="modal-body">
                <h5>Card Name</h5>
                <p id="card-name" class="card-col"></p>
                <h5>Card Color(s)</h5>
                <p id="card-color" class="card-col"></p>
                <h5>Card Color Identity</h5>
                <p id="card-color-identity" class="card-col"></p>
                <h5>Card Layout</h5>
                <p id="card-layout" class="card-col"></p>
                <h5>Card Type</h5>
                <p id="card-type" class="card-col"></p>
                <h5>Card Mana Cost</h5>
                <p id="card-mc" class="card-col"></p>
                <h5>Card Converted Mana Cost</h5>
                <p id="card-cmc" class="card-col"></p>
                <h5>Card Sub-Types</h5>
                <p id="card-sub" class="card-col"></p>
                <h5>Card Super-Types</h5>
                <p id="card-super" class="card-col"></p>
                <h5>Card Text</h5>
                <p id="card-text" class="card-col"></p>
                <h5>Card Power</h5>
                <p id="card-power" class="card-col"></p>
                <h5>Card Toughness</h5>
                <p id="card-toughness" class="card-col"></p>
                <h5>Card Condition</h5>
                <p id="card-condition" class="card-col"></p>
                <h5>Card Quantity</h5>
                <p id="card-quantity" class="card-col"></p>
                <h5>Card Price</h5>
                <p id="card-price" class="card-col"></p>
            </div>
            <!-- end modal body -->
            <div class="modal-footer">
                <button type="button" class="btn btn-light button-custom" data-dismiss="modal">Close</button>
            </div>
            <!-- end modal footer -->
        </div>
    </div>
</div>
