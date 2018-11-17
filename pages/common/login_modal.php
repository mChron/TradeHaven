<!DOCTYPE html>
<!-- Filename: common_centered_modal.html
Author: Marcus Chronabery
Date: 9/7/18-->
<div id="login-modal" class="modal fade show" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div id="login-modal-content" class="modal-content">
            <div id="login-modal-header" class="modal-header">
                <h5 class="modal-title">Login</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- end modal header--> 
            <div id="login-modal-body" class="modal-body">
                <?php include "login_modal_content.html" ?>
            </div>
            <!-- end modal body -->
            <div class="modal-footer">
                <button type="button" class="btn btn-light button-custom" data-dismiss="modal">Close</button>
                <button id="login-submit" type="submit" onclick="submitLogin()" class="btn btn-primary button-custom">Login</button>
            </div>
            <!-- end modal footer -->
        </div>
    </div>
</div>
<script>
    $("#login-modal").find(".validatable-required").each(initValidatable);
    //reset login warnings when modal is dismissed
    $("#login-modal").on("hidden.bs.modal", function(e) {
        toggleWarning("#login-email", false);
        toggleWarning("#login-password", false);
    });
    function submitLogin() {
        $("#login-form").submit();
    }
</script>