/* 
 * filename: events.js
 * author: Marcus Chronabery
 * date: 10/08/18
 */
$(function() {
    $("#event-privacy-btn").click(function() {
        if ($(this).html() === "Private (Invite Only)") {
            $(this).html("Public");
        }
        else {
            $(this).html("Private (Invite Only)");
        }
        $(this).blur();
    }) ;
    $("#create-event-form").submit(validateEventForm);
    $("#event-date-input").change(validateDateInput);
});

/**
 * Validates the input for the date field. If date entered is prior to today 
 * the value will default to today. If the valid is today or a future value 
 * but is in a form other than mm/dd/yyyy, the value will be formatted to conform.
 */
function validateDateInput() {
    var today = new Date();
    var val = new Date($(this).val());
    var invalid;
    if(val.toString() === "Invalid Date") {
        val = today;
        invalid = true;
    }
    if (invalid || val < today) {
        var newVal = formatDateString(today);
        $(this).val(newVal);
    }
    else {
        $(this).val(formatDateString(val));
    }
}

/**
 * Return a formatted string from the provided date. If the object is not a
 * valid date, today's date is used.
 * @param {type} date The date to format
 * @returns {String} A formatted date with the form mm/dd/yyyy
 */
function formatDateString(date) {
    if (date === undefined || !(date instanceof Date)) {
        date = new Date();
    }
    var mm = prependZerosLengthN(date.getMonth() + 1, 2);
    var dd = prependZerosLengthN(date.getDate(), 2);
    var yyyy = date.getFullYear();
    return mm + "/" + dd + "/" + yyyy;
}

/**
 * Prepends the provided string with zeros up to length n.
 * If the provided string is already at/beyond length n, you will just get the 
 * last n characters of the provided string.
 * @param {type} str The string to prepend with zeros
 * @param {type} n The desired length of string to return
 * @returns {String} The provided string prepended with zeros, or the last n
 * characters of the provided string if the length was beyond n.
 */
function prependZerosLengthN(str, n) {
    var sliceIndx = 0 - n;
    if (str === undefined) {
        throw "Cannot format provided argument. Not a string.";
    }
    else if (str.toString().length < n) {
        while (str.toString().length < n) {
            str = "0" + str;
        }
    }
    return str.toString().slice(sliceIndx);
}

/**
 * Validate the events form for required attributes.
 * @param {type} e The triggered event, should be the submit of the form.
 */
function validateEventForm(e) {
    e.preventDefault();
    toggleWarning("#event-name", !$("#event-name-input").val());
    toggleWarning("#event-date", !$("#event-date-input").val());
    toggleWarning("#event-description", !$("#event-description").val());
    toggleWarning("#description-length", $("#event-description").val().length < 250);
}
