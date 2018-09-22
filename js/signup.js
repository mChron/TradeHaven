/* Filename: signup.js
Author: Marcus Chronabery
Date: 9/9/18 */
$(function() {
    loadStates();
    // click event for the same as shipping checkbox
    $("#same-as-shipping-checkbox").click(function() {
        modifyBillingAddress(this.checked);
        toggleWarning("#billing-house", false);
        toggleWarning("#billing-street", false);
        toggleWarning("#billing-city", false);
        toggleWarning("#billing-state", false);
        toggleWarning("#billing-zip", false);
    });
    $("#signup-form").submit(validateSignupForm);
    $("#signup-form").on("reset", function(e) {
        $(".validation-warning").each(function() {
            toggleWarningById("#" + this.id, false);
        });
    });
});

/*
 * Listener for the same as shipping checkbox.
 * Disables the billing address fields if the box is checked and removes any values.
 * Re-enables when unchecked.
 */
function modifyBillingAddress(checked) {
    if (!checked) {
        $("#signup-billing-house-input").removeAttr("disabled");
        $("#signup-billing-street-input").removeAttr("disabled");
        $("#signup-billing-city-input").removeAttr("disabled");
        $("#signup-billing-state-select").removeAttr("disabled");
        $("#signup-billing-zip-input").removeAttr("disabled");
    }
    else {
        $("#signup-billing-house-input").prop("disabled", "disabled").val("");
        $("#signup-billing-street-input").prop("disabled", "disabled").val("");
        $("#signup-billing-city-input").prop("disabled", "disabled").val("");
        $("#signup-billing-state-select").prop("disabled", "disabled").prop("selectedIndex", 0);
        $("#signup-billing-zip-input").prop("disabled", "disabled").val("");
    }
}

/*
 * Load the information from the states.json file and iterate over each object
 * For each object append an item to the states dropdown list with the appropriate display text and value.
 */
function loadStates() {
    $.ajax({
        dataType:"json",
        url: "/netbeans_project/dictionaries/states.json",
        success: function(data) {
            $(data).each(function(key, value) {
                var opt = document.createElement("option");
                opt.value = value["val"];
                $(opt).html(value["text"]);
                $("#signup-shipping-state-select").append(opt);
                $("#signup-billing-state-select").append($(opt).clone());
            });
        }
    });
}

/*
 * Method to validate the various fields of the signup form.
 */
function validateSignupForm(e) {
    e.preventDefault();
    var reg = new RegExp(".+@.+[.][a-z]{2,4}$");
    toggleWarning("#first-name", !$("#signup-firstname-input").val());
    toggleWarning("#last-name", !$("#signup-lastname-input").val());
    toggleWarning("#signup-email", !$("#signup-email-input").val());
    toggleWarning("#valid-email", !reg.test($("#signup-email-input").val()));
    toggleWarning("#phone", !$("#signup-phone-input").val());
    toggleWarning("#signup-password", !$("#signup-password-input").val());
    toggleWarning("#confirm-password", !$("#signup-password-confirm-input").val());
    toggleWarning("#pass-match", $("#signup-password-input").val() !== $("#signup-password-confirm-input").val());
    toggleWarning("#shipping-house", !$("#signup-shipping-house-input").val());
    toggleWarning("#shipping-street", !$("#signup-shipping-street-input").val());
    toggleWarning("#shipping-city", !$("#signup-shipping-city-input").val());
    toggleWarning("#shipping-state", !$("#signup-shipping-state-select").val());
    toggleWarning("#shipping-zip", !$("#signup-shipping-zip-input").val());

    if (!$("#same-as-shipping-checkbox").prop("checked")) {
        toggleWarning("#billing-house", !$("#signup-billing-house-input").val());
        toggleWarning("#billing-street", !$("#signup-billing-street-input").val());
        toggleWarning("#billing-city", !$("#signup-billing-city-input").val());
        toggleWarning("#billing-state", !$("#signup-billing-state-select").val());
        toggleWarning("#billing-zip", !$("#signup-billing-zip-input").val());
    }
}