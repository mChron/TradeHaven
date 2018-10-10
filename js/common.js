/* Filename: common.js
Author: Marcus Chronabery
Date: 9/17/18 */
var numSpinner;

$(function() {
    $("#login-form").submit(validateLoginForm);
    //reset login warnings when modal is dismissed
    $("#login-modal").on("hidden.bs.modal", function() {
        toggleWarning("#login-email", false);
        toggleWarning("#login-password", false);
    });
    initializeValidatables();
    initializeDatePickers();
    $(".number-spinner button").on("click", function(e) {
        updateNumberSpinnerValue($(this));
    });
    $(".number-spinner input").on("paste", function(e) {
        $(this).change();
    });
    $(".number-spinner input").on("change", function(e) {
        var parsed = parseInt($(this).val());
        if (!isNaN(parsed)) {
            $(this).val(parsed);
        }
        else {
            $(this).val(1);
        }
    });
    $(".number-spinner input").on("keypress", function(e) {
        if (e.keyCode < 48 || e.keyCode > 57) {
            e.preventDefault();
        }
    });
    initializeNumSpinner();
    $(".remove-row").click(removeRow);
});

function removeRow() {
    // clean up the tooltip from the DOM as well
    var tipId = $(this).attr("aria-describedby");
    $("#" + tipId).remove();
    $(this).parents("tr").remove();
}

function initializeTooltips() {
    $("[data-toggle='tooltip']").tooltip();
}

/*
 * Validate the fields in the login form.
 */
function validateLoginForm(e) {
    e.preventDefault();
    toggleWarning("#login-email", !$("#login-email").val());
    toggleWarning("#login-password", !$("#login-pass").val());
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
    $(".validatable-required").each(initValidatable);
}

function initializeDatePickers() {
    $(".input-group.date").each(initDatePicker);
}

function initDatePicker(indx, val) {
    $(val).datepicker({
        startDate: "today",
        maxViewMode: 2,
        orientation: "bottom auto",
        multidate: false,
        daysOfWeekHighlighted: "0,6",
        autoclose: true,
        todayHighlight: true
    }).on("show", function(e) {
        $(".datepicker").find("table").removeClass("table-condensed").addClass("table table-sm");
    });
}

function initValidatable(indx, val) {
//    console.log(val);
    var fieldName = $(val).attr("title").toLowerCase();
    var text = "* " + titleCase(fieldName) + " Required";
    fieldName = fieldName.replace(/ /g, "-");
    var element = document.createElement("label");
    $(element).prop("id", fieldName + "-validation-warning");
    $(element).addClass("validation-warning d-none");
    $(element).html(text);
    var parent = $(this).parents()[0];
    if ($(this).hasClass("validatable-after-parent")) {
        $(parent).after(element);
    }
    else {
        $(parent).append(element);
    }
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

function initializeNumSpinner() {
    numSpinner = document.createElement("div");
    $(numSpinner).addClass("input-group number-spinner");
    
    var subtract = document.createElement("span");
    $(subtract).addClass("input-group-btn");
    $(numSpinner).append(subtract);
    
    var subBtn = document.createElement("button");
    $(subBtn).addClass("btn btn-default");
    $(subBtn).attr("data-dir", "dwn");
    $(subtract).append(subBtn);
    $(subBtn).click(function() {
        updateNumberSpinnerValue($(this));
    });
    
    var subImg = document.createElement("img");
    $(subImg).prop("src", "images/glyphicons/glyphicons-434-minus.png");
    $(subBtn).append(subImg);
    
    var input = document.createElement("input");
    $(input).prop("type", "text");
    $(input).addClass("form-control text-center");
    $(input).val(1);
    $(numSpinner).append(input);
    $(input).on("paste", function(e) {
        $(this).change();
    })
    .on("change", function(e) {
        var parsed = parseInt($(this).val());
        if (!isNaN(parsed)) {
            $(this).val(parsed);
        }
        else {
            $(this).val(1);
        }
    })
    .on("keypress", function(e) {
        if (e.keyCode < 48 || e.keyCode > 57) {
            e.preventDefault();
        }
    });
    
    var add = document.createElement("span");
    $(add).addClass("input-group-btn");
    $(numSpinner).append(add);
    
    var addBtn = document.createElement("button");
    $(addBtn).addClass("btn btn-default");
    $(addBtn).attr("data-dir", "up");
    $(add).append(addBtn);
    $(addBtn).click(function() {
        updateNumberSpinnerValue($(this));
    });
    
    var addImg = document.createElement("img");
    $(addImg).prop("src", "images/glyphicons/glyphicons-433-plus.png");
    $(addBtn).append(addImg);
}

function getNewNumberSpinner() {
    return $(numSpinner).clone(true);
}

function addTooltipProperties(obj, dir, title) {
    $(obj).attr("data-toggle", "tooltip");
    $(obj).attr("data-placement", dir);
    $(obj).attr("title", title);
    $(obj).tooltip();
}
