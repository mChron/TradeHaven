/* Filename: common.js
Author: Marcus Chronabery
Date: 9/17/18 */
var numSpinner;

$(function() {
    $("#login-form").submit(validateLoginForm);
    initializeValidatables();
    initializeDatePickers();
    $(".number-spinner button").on("click", function(e) {
        updateNumberSpinnerValue($(this));
    });
    $(".number-spinner input")
    .on("paste", function(e) {
        $(this).change();
    })
    .on("change", function(e) {
        ensureNumeric($(this));
    })
    .on("keypress", function(e) {
        blockNonNumericKeypress(e);
    });
    initializeNumSpinner();
    $(".remove-row").click(removeRow);
    checkForHash();
});

function checkForHash() {
    let hash = location.hash;
    location.hash = hash.substring(hash.lastIndexOf("#"));
}

/**
 * Ensure the value in the provided input field was numeric, if not default to 1.
 * @param {type} input The input field to validate the value on.
 */
function ensureNumeric(input) {
    var parsed = parseInt($(input).val());
    if (!isNaN(parsed)) {
        $(input).val(parsed);
    }
    else {
        $(input).val(1);
    }
}

/**
 * Block a non numeric keypress event. Used on number spinner components
 * @param {type} e A keypress event to intercept
 */
function blockNonNumericKeypress(e) {
    if (e.keyCode < 48 || e.keyCode > 57) {
        e.preventDefault();
    }
}

/**
 * Remove the row in which this remove-row icon resides.
 */
function removeRow() {
    // clean up the tooltip from the DOM as well
    var tipId = $(this).attr("aria-describedby");
    $("#" + tipId).remove();
    $(this).parents("tr").remove();
}

/**
 * Initialize all elements with tooltips on the page.
 */
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

/**
 * Toggles the visibility of a validation warning
 * @param {String} prefix The prefix of the validation warning element.
 * @param {boolean} truth Whether or not to display the validation warning. Default true
 */
function toggleWarning(prefix, truth = true) {
    toggleWarningById(prefix + "-validation-warning", truth);
}

/**
 * Toggle a warning by it's id based on the truth param.
 * @param {String} id The id of the warning to toggle.
 * @param {boolean} truth Whether the warning should be shown.
 */
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
    let evt = new Event("validatablesInitialized",
    {"detail": "Fields with the validatable-required class have been initialized."});
    $(".validatable-required").each(initValidatable);
    document.dispatchEvent(evt);
}

/**
 * Initialize all date picker components on the page.
 */
function initializeDatePickers() {
    $(".input-group.date").each(initDatePicker);
}

/**
 * Iterator function to initialize a datepicker from the list.
 * <br />
 * Options include:
 * <ul>
 * <li>start date</li>
 * <li>max view mode (days, months, years, decades)</li>
 * <li>orientation from the input group</li>
 * <li>multi date selection</li>
 * <li>date highlighting</li>
 * <li>autoclose when a date is selected</li>
 * <li>highlight today</li>
 * <li>etc...</li>
 * </ul>
 * @param {type} indx Obj index in the list.
 * @param {type} obj The datepicker object
 */
function initDatePicker(indx, obj) {
    $(obj).datepicker({
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

/**
 * Iterator function to initialize a validatable field, i.e. add a hidden 
 * warning message for a required field to be toggled when appropriate.
 * @param {type} indx Index in the list.
 * @param {type} obj The validatable object to initialize.
 */
function initValidatable(indx, obj) {
    var fieldName = $(obj).attr("title").toLowerCase();
    var text = "* " + titleCase(fieldName) + " Required";
    fieldName = fieldName.replace(/ /g, "-");
    var element = document.createElement("label");
    $(element).prop("id", fieldName + "-validation-warning");
    $(element).addClass("validation-warning d-none required-warning");
    $(element).html(text);
    var parent = $(this).parents()[0];
    if ($(this).hasClass("validatable-after-parent")) {
        $(parent).after(element);
    }
    else {
        $(parent).append(element);
    }
}

/**
 * Convert a string to title case, e.g. "test" -> "Test" or 
 * "test series of words" -> "Test Series Of Words"
 * @param {type} s The string to convert to title case.
 * @returns {String} The converted string.
 */
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

/**
 * Produce a string where the first character is capitalized.
 * @param {type} s The string to convert.
 * @returns {String} The converted string.
 */
function titleCaseSimple(s) {
    var head = s.substring(0,1).toUpperCase();
    var tail = s.substring(1);
    return head + tail;
}

/**
 * Convert multiple words in a string to title case.
 * @param {type} s The string to convert to title case
 * @returns {String} The converted string
 */
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

/**
 * Update a number spinner components value. Maximum value is currently set at
 * 10 and minimum of 1.
 * @param {type} btn The number spinner button pressed.
 */
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

/**
 * Initialize the base number spinner object.
 */
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
        $(input).change();
    })
    .on("change", function(e) {
        ensureNumeric(input);
    })
    .on("keypress", function(e) {
        blockNonNumericKeypress(e);
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

/**
 * Get a new instance of a number spinner with the listeners also copied.
 * @returns {object} A deep clone of the number spinner
 */
function getNewNumberSpinner() {
    return $(numSpinner).clone(true);
}

/**
 * Add the required tooltip properties to a given dom object that needs
 * to have a popover tooltip.
 * @param {type} obj The object that needs the tooltip information.
 * @param {type} dir The direction the tooltip should display.
 * @param {type} title The text that should be displayed in the tooltip.
 */
function addTooltipProperties(obj, dir, title) {
    $(obj).attr("data-toggle", "tooltip");
    $(obj).attr("data-placement", dir);
    $(obj).attr("title", title);
    $(obj).tooltip();
}
