/* 
 * filename: events.js
 * author: Marcus Chronabery
 * date: 10/08/18
 */
$(function() {
   $("#event-privacy-btn").click(function() {
       if ($(this).html() === "Private") {
           $(this).html("Not Private");
       }
       else {
           $(this).html("Private");
       }
       $(this).blur();
   }) ;
   $("#create-event-form").submit(validateEventForm);
});

function validateEventForm(e) {
    e.preventDefault();
    toggleWarning("#event-name", !$("#event-name-input").val());
    toggleWarning("#event-date", !$("#event-date-input").val());
    toggleWarning("#event-description", !$("#event-description").val());
    toggleWarning("#description-length", $("#event-description").val().length < 250);
}