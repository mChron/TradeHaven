/* Filename: common.js
Author: Marcus Chronabery
Date: 9/17/18 */

$(function() {
    $("#login-form").submit(validateLoginForm);
    initializeValidatables();
    $(".number-spinner button").click(function(e) {
        updateNumberSpinnerValue($(this));
    });
    $(".number-spinner").on("keypress", function(e) {
        if (e.keyCode < 48 || e.keyCode > 57) {
            e.preventDefault();
        }
    });
});

/*
 * Validate the fields in the login form.
 */
function validateLoginForm(e) {
    e.preventDefault();
    toggleWarning("#email", !$("#login-email").val());
    toggleWarning("#password", !$("#login-pass").val());
}

/*
 * Toggles the visibility of a validation warning
 * @param {type} prefix The prefix of the validation warning element.
 * @param {truth} Whether or not to display the validation warning.
 */
function toggleWarning(prefix, truth) {
    toggleWarningById(prefix + "-validation-warning", truth);
}

function toggleWarningById(id, truth) {
    var e = $(id);
    if (truth) {
        e.removeClass("d-none");
        e.addClass("d-inline");
    }
    else {
        e.removeClass("d-inline");
        e.addClass("d-none");
    }
}

/*
 * Look for all fields that are mark validatable and add a warning label after the element.
 * The message is generated from the name of the validatable element, as is the id.
 * The toggling of the element is still up to the individual page and validation. 
 */
function initializeValidatables() {
    $(".validatable-required").each(function() {
        var fieldName = this.name.toLowerCase();
        var text = "* " + titleCase(fieldName) + " Required";
        fieldName = fieldName.replace(/ /g, "-");
        var element = document.createElement("label");
        element.id = fieldName + "-validation-warning";
        $(element).addClass("validation-warning d-none");
        $(element).html(text);
        var parent = $(this).parents()[0];
        if ($(this).hasClass("validatable-after-parent")) {
            $(parent).after(element);
        }
        else {
            $(parent).append(element);
        }
    });
}

function titleCase(s) {
    if (s.length > 1) {
        if (s.indexOf(" ") < 0) {
            return titleCaseSimple(s);
        }
        else {
            return titleCaseMulti(s);
        }
    }
    else {
        return s.toUpperCase();
    }
}

/*
 * Produce a string where the first character is capitalized.
 */
function titleCaseSimple(s) {
    var head = s.substring(0,1).toUpperCase();
    var tail = s.substring(1);
    return head + tail;
}

function titleCaseMulti(s) {
    var str = "" + s;
    var arr = str.split(" ");
    var words = [];
    var final = "";
    $(arr).each(function() {
        words.push(titleCaseSimple(this));
    });
    $(words).each(function() {
        final += this + " ";
    });
    return final.substring(0, final.length - 1);
}

function updateNumberSpinnerValue(btn) {
    var oldValue = $(btn).closest(".number-spinner").find("input").val().trim();
    var newVal = 0;
    if ($(btn).attr("data-dir") === "up") {
        if (oldValue >= 10) {
            newVal = 10;
        }
        else {
            newVal = parseInt(oldValue) + 1;
        }
    }
    else if (oldValue > 1) {
        newVal = parseInt(oldValue) - 1;
    } 
    else {
        newVal = 1;
    }
    $(btn).closest(".number-spinner").find("input").val(newVal);
}