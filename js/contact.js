/* Filename: contact.js
Author: Marcus Chronabery
Date: 9/17/18 */
$(function() {
    $("#contact-form").submit(validateContactForm);
    if (getUrlParameter("success") === "true") {
        $("#contact-modal").modal();
    }
});

/*
 * Validate the various elements for the contact us form.
 * @param {type} e The submit event for the form.
 */
function validateContactForm(e) {
    e.preventDefault();
    var emailRegEx = new RegExp(".+@.+[.][a-z]{2,4}$");
    toggleWarning("#subject", !$("#contact-subject").val());
    toggleWarning("#message", !$("#contact-message").val());
    toggleWarning("#message-length", $("#contact-message").val().length < 250);
    toggleWarning("#name", !$("#contact-name").val());
    toggleWarning("#contact-email", !$("#contact-email").val());
    var email = $("#contact-email").val();
    toggleWarning("#contact-valid-email", email && !emailRegEx.test(email));
    if ($("#contact-form .validation-warning:visible")[0] === undefined) {
        $(this).unbind("submit").submit();
    }
}