<!DOCTYPE html>
<!-- Filename: contact_feedback_modal.php
Author: Marcus Chronabery
Date: 11/7/18-->
<div id="contact-modal" class="modal fade show" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div id="contact-modal-content" class="modal-content">
            <div id="contact-modal-header" class="modal-header">
                <h5 class="modal-title">Thanks For Contacting Us</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- end modal header--> 
            <div id="contact-modal-body" class="modal-body">
                <?php include "contact_feedback_modal_content.html" ?>
            </div>
            <!-- end modal body -->
            <div class="modal-footer">
                <button type="button" class="btn btn-light button-custom" data-dismiss="modal">Close</button>
            </div>
            <!-- end modal footer -->
        </div>
    </div>
</div>