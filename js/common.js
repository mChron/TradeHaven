/* Filename: common.js
Author: Marcus Chronabery
Date: 9/17/18 */
var DEFAULT_NUM_SPIN_MAX = 10;

$(function() {
    $("#login-form").submit(validateLoginForm);
    initializeValidatables();
    initializeDatePickers();
    //set jumbotron minimum height to fill space between header and footer
    $(".jumbotron").css("min-height", window.innerHeight - $("#footer").height() - $("#header").height());
    $(".jumbotron").css("min-width", window.innerWidth);
    $(".spinner-input")
    .on("paste", function(e) {
        $(this).change();
    })
    .on("change", function(e) {
        ensureNumeric($(this));
    })
    .on("keypress", function(e) {
        blockNonNumericKeypress(e);
    });
    $(".remove-row").click(removeRow);
    checkForHash();
    $(window).on("hashChange", function(e) {
        checkForHash();
    });
    $(".return-to-top").click(function() {
        $(window).scrollTop(0);
    });
    $(".dropdown").on("mouseover", function(e) {
        $(this).children(".dropdown-toggle").dropdown("toggle").blur();
    });
    $(".dropdown").on("mouseout", function(e) {
        $(this).removeClass("show");
        $(this).children(".dropdown-menu").removeClass("show");
        $(this).children(".dropdown-toggle").blur();
    });
    setInterval("displayTime()", 1000);
    $(".log-out").click(function() {
        $.ajax({
            "url": document.url + "/../php/logout.php",
            "method": "GET",
            "success": function(e) {
                location.href = "index.php";
            }
        });
    });
});

function displayTime() {
    let d = new Date();
    $("#date").html(d.toDateString("EE, MMM d"));
    let hr = d.getHours();
    let mid = hr > 12 ? "pm" : "am";
    hr = hr % 12;
    hr = hr < 10 ? "0" + hr : hr;
    let min = d.getMinutes();
    min = min < 10 ? "0" + min : min;
    let sec = d.getSeconds();
    sec = sec < 10 ? "0" + sec : sec;
    $("#time").html(hr + ":" + min + ":" + sec + mid);
}

/*Set the current page link to 'active' in the navigation bar*/
function setActiveNavLink() {
    // get the current url and set the appropriate nav-link as active
    var url = document.location.href;
    var link = url.substring(url.lastIndexOf("/") + 1);
    $(".nav-link")
    .filter(function() {
        return this.href.match(link);
    })
    .addClass("active");
    $(".dropdown-item")
    .filter(function() {
        return this.href.match(link);
    })
    .addClass("active")
    .parents(0)
    .addClass("active");
}

function checkForHash() {
    let hash = location.hash;
    location.hash = hash.substring(hash.lastIndexOf("#"));
}

/**
 * Ensure the value in the provided input field was numeric, if not default to 1.
 * @param {type} input The input field to validate the value on.
 */
function ensureNumeric(input, max) {
    var parsed = parseInt($(input).val());
    if (!isNaN(parsed)) {
        if (parsed > max) {
            $(input).val(max);
        }
        else if (parsed < 1) {
            $(input).val(1);
        }
        else {
            $(input).val(parsed);
        }
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
    if ($("#login-form .validation-warning:visible")[0] === undefined) {
        $("#login-form").off("submit");
        $("#login-form").submit();
    }
}

/*
 * Replaces the placeholder character in the footer with the current year.
 */
function loadCopyrightYear() {
    var d = new Date();
    var cpy = $("#cpy").html().toString();
    $("#cpy").html(cpy.replace("_", d.getFullYear()));
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

function getUrlParameter(name) {
    name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
    var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
    var results = regex.exec(location.search);
    return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
};

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
function updateNumberSpinnerValue(btn, max) {
    var oldValue = new Number($(btn).closest(".number-spinner").find(".spinner-input").val().trim()).valueOf();
    var newVal = 0;
    if ($(btn).attr("data-dir") === "up") {
        if (oldValue >= max) {
            console.log("over max");
            console.log(oldValue);
            console.log(max);
            newVal = max;
        }
        else {
            console.log("bump");
            newVal = parseInt(oldValue) + 1;
        }
    }
    else if (oldValue > 1) {
        console.log("old > 1")
        newVal = parseInt(oldValue) - 1;
    } 
    else {
        console.log("default to 1")
        newVal = 1;
    }
    $(btn).closest(".number-spinner").find(".spinner-input").val(newVal);
}

/**
 * Initialize the base number spinner object.
 */
function initializeNumSpinner(max) {
    let spinner = document.createElement("div");
    $(spinner).addClass("input-group number-spinner");
    
    var subtract = document.createElement("span");
    $(subtract).addClass("input-group-btn");
    $(spinner).append(subtract);
    
    var subBtn = document.createElement("button");
    $(subBtn).addClass("btn btn-custom");
    $(subBtn).attr("type", "button");
    $(subBtn).attr("data-dir", "dwn");
    $(subtract).append(subBtn);
    $(subBtn).click(function() {
        updateNumberSpinnerValue($(this), max);
    });
    
    var subImg = document.createElement("img");
    $(subImg).prop("src", "images/glyphicons/glyphicons-434-minus.png");
    $(subBtn).append(subImg);
    
    var input = document.createElement("input");
    $(input).prop("type", "text");
    $(input).addClass("form-control text-center spinner-input");
    $(input).val(1);
    $(spinner).append(input);
    $(input).on("paste", function(e) {
        $(input).change();
    })
    .on("change", function(e) {
        ensureNumeric(input, max);
    })
    .on("keypress", function(e) {
        blockNonNumericKeypress(e);
    });
    
    var add = document.createElement("span");
    $(add).addClass("input-group-btn");
    $(spinner).append(add);
    
    var addBtn = document.createElement("button");
    $(addBtn).addClass("btn btn-default");
    $(addBtn).attr("type", "button");
    $(addBtn).attr("data-dir", "up");
    $(add).append(addBtn);
    $(addBtn).click(function() {
        updateNumberSpinnerValue($(this), max);
    });
    
    var addImg = document.createElement("img");
    $(addImg).prop("src", "images/glyphicons/glyphicons-433-plus.png");
    $(addBtn).append(addImg);
    return spinner;
}

/**
 * Get a new instance of a number spinner with the listeners also copied.
 * @returns {object} A deep clone of the number spinner
 */
function getNewNumberSpinner(max) {
    return initializeNumSpinner(max);
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

