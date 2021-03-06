/* Filename: contact.js
Author: Marcus Chronabery
Date: 9/17/18 */
$(function() {
    $("#contact-form").submit(validateContactForm);
});

/*
 * Validate the various elements for the contact us form.
 * @param {type} e The submit event for the form.
 */
function validateContactForm(e) {
    e.preventDefault();
    var reg = new RegExp(".+@.+[.][a-z]{2,4}$");
    toggleWarning("#subject", !$("#contact-subject").val());
    toggleWarning("#message", !$("#contact-message").val());
    toggleWarning("#message-length", $("#contact-message").val().length < 250);
    toggleWarning("#name", !$("#contact-name").val());
    toggleWarning("#email", !$("#contact-email").val());
    toggleWarning("#valid-email", !reg.test($("#contact-email").val()));
}