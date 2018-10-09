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
	$("#event-date-input").on("change", function() {
		var today = new Date();
		var val = new Date($(this).val());
		var invalid;
		if(val.toString() === "Invalid Date") {
			val = today;
			invalid = true;
		}
		var sameYear = today.getYear() === val.getYear();
		var sameMonth = today.getMonth() === val.getMonth();
		var prevYear = val.getYear() < today.getYear();
		var prevMonth = val.getMonth() < today.getMonth();
		var prevDay = val.getDate() < today.getDate();
		if (invalid || prevYear || (sameYear && prevMonth) || (sameYear && sameMonth && prevDay)) {
			var newVal = ("0" + (today.getMonth()+1)).slice(-2) + "/"
				+ ("0" + today.getDate()).slice(-2) + "/"
				+ today.getFullYear();
			$(this).val(newVal);
		}
	});
});

/*
 * Validate the events form for required attributes.
 */
function validateEventForm(e) {
    e.preventDefault();
    toggleWarning("#event-name", !$("#event-name-input").val());
    toggleWarning("#event-date", !$("#event-date-input").val());
    toggleWarning("#event-description", !$("#event-description").val());
    toggleWarning("#description-length", $("#event-description").val().length < 250);
}
