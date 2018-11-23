/* Filename: signup.js
Author: Marcus Chronabery
Date: 9/9/18 */
$(function() {
    loadStates();
    // click event for the same as shipping checkbox
    $("#same-as-shipping-checkbox").click(function() {
        modifyBillingAddress(this.checked);
        $("#billing-address-row .validation-warning").each(function() {
            toggleWarningById("#" + this.id, false);
        });
    });
    $("#signup-form").submit(validateSignupForm);
    $("#signup-form").on("reset", function(e) {
        $(".validation-warning").each(function() {
            toggleWarningById("#" + this.id, false);
        });
        $("#billing-address-row [disabled]").removeAttr("disabled");
    });
    $(document).on("validatablesInitialized", updateSignupValidatables);
});

function updateSignupValidatables() {
    $("#contact-information-fieldset .row").each(function() {
        let left = $(this).find(".column")[0];
        let right = $(this).find(".column")[1];
        $(left).addClass("left");
        $(right).addClass("right");
    });
}

/*
 * Listener for the same as shipping checkbox.
 * Disables the billing address fields if the box is checked and removes any values.
 * Re-enables when unchecked.
 */
function modifyBillingAddress(checked) {
    if (!checked) {
        $("#billing-address-row input, #billing-address-row select").removeAttr("disabled");
    }
    else {
        $("#billing-address-row input").prop("disabled", "disabled").val("");
        $("#signup-billing-state-select").prop("disabled", "disabled").prop("selectedIndex", 0);
    }
}

/*
 * Load the information from the states.json file and iterate over each object
 * For each object append an item to the states dropdown list with the appropriate display text and value.
 */
function loadStates() {
    $.ajax({
        dataType:"json",
        url: "dictionaries/states.json",
        success: function(data) {
            $(data).each(function(key, value) {
                var opt = document.createElement("option");
                opt.value = value["val"];
                $(opt).html(value["text"]);
                $("#signup-shipping-state-select").append(opt);
                $("#signup-billing-state-select").append($(opt).clone());
            });
            $("#signup-shipping-state-select option[value='" + $("#signup-shipping-state-select").attr("value") + "']").attr("selected", "selected");
            $("#signup-billing-state-select option[value='" + $("#signup-billing-state-select").attr("value") + "']").attr("selected", "selected");
        }
    });
}

/*
 * Method to validate the various fields of the signup form.
 */
function validateSignupForm(e) {
    e.preventDefault();
    var emailRegEx = new RegExp(".+@.+[.][a-z]{2,4}$");
    var email = $("#signup-email-input").val();
    var zipRegEx = new RegExp("[0-9]{5}");
    var phoneRegEx = new RegExp("^[0-9]{3}[\- ]{1}[0-9]{3}[\- ]{1}[0-9]{4}$");
    var phoneRegEx2 = new RegExp("^[0-9]{10}$");
    var phone = $("#signup-phone-input").val();
    var houseRegEx = new RegExp("^[0-9]{1,5}$");
    var shipHouse = $("#signup-shipping-house-input").val();
    var billHouse = $("#signup-billing-house-input").val();
    $("#signup-form input.validatable-required, #signup-form select.validatable-required").each(function() {
        let id = $($(this).parents()[0]).children(".required-warning").attr("id");
        if (id.indexOf("bill") >= 0 && !$("#same-as-shipping-checkbox").prop("checked")) {
            let val = $(this).val();
            toggleWarningById("#" + id, !val);
        }
    });
    $(".zip").each(function() {
        let id = $($(this).parents()[0]).find(".format-warning").attr("id");
        let val = $(this).val();
        toggleWarningById("#" + id, val && !zipRegEx.test(val));
    })
    toggleWarning("#valid-email", email && !emailRegEx.test(email));
    toggleWarning("#phone-format", phone && !phoneRegEx.test(phone) && !phoneRegEx2.test(phone));
    toggleWarning("#pass-match", $("#signup-password-input").val() !== $("#signup-password-confirm-input").val());
    toggleWarning("#ship-house-format", shipHouse && !houseRegEx.test(shipHouse));
    if (!$("#same-as-shipping-checkbox").prop("checked")) {
        toggleWarning("#bill-house-format", billHouse && !houseRegEx.test(billHouse));
    }
    if ($(".validation-warning:visible").length === 0) {
        $("#signup-form").off("submit");
        $("#signup-form").submit();
    }
}
