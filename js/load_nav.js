/* Filename: load_nav.js
Author: Marcus Chronabery
Date: 9/8/18 */
$(function() {
    loadHeaderAndFooter();
    loadCommonModal("Login", "Login", $("link[rel='import'][href='pages/login_modal_content.html']")[0].import.querySelector('div'));
    loadCopyrightYear();
});

/*
 * Replaces the placeholder character in the footer with the current year.
 */
function loadCopyrightYear() {
    var d = new Date();
    var cpy = $("#cpy").html().toString();
    $("#cpy").html(cpy.replace("_", d.getFullYear()));
}

/*
 * Loads linked html docs with the relation of import.
 * Within those files selects nav elements and appends them as children of the current document.
 * Within the header we set the appropriate header link as 'active' to highlight it.
 */
function loadHeaderAndFooter() {
    $("link[rel='import']").each(function() {
        var htmlDoc = this.import;
        var htmlMessage = htmlDoc.querySelector('nav');
        if (!htmlMessage) {
            return;
        }
        document.body.appendChild(htmlMessage.cloneNode(true));
    });
    
    // get the current url and set the appropriate nav-link as active
    var url = document.location.href;
    var last = url.lastIndexOf("/");
    last = url.substring(last+1);
    $(".nav-link[href='" + last + "']").addClass("active");
    $(".nav-link[href='pages/" + last + "']").addClass("active");
}

/*
 * Loads the common modal and replaces the title and content with the provided markup.
 * Also sets elements of the modal with appropriate ids.
 */
function loadCommonModal(modalTitle, mainBtnText, modalContent) {
    $("link[rel='import']").each(function() {
        var htmlDoc = this.import;
        var modalHtml = htmlDoc.querySelector('div.modal');
        if (!modalHtml) {
            return;
        }
        var prefix = modalTitle.toString().toLowerCase() + "-";
        document.body.appendChild(modalHtml);
        var modal = $(modalHtml);
        
        // set modal element ids to reflect which modal they belong to
        modal.prop("id", prefix + "modal");
        $(modal).find(".modal-content").prop("id", prefix + "modal-content");
        $(modal).find(".modal-body").prop("id", prefix + "modal-body");
        $(modal).find("#" + prefix + "modal-body").html(modalContent);
        $(modal).find(".modal-header").prop("id", prefix + "modal-header");
        $(modal).find(".modal-title").html(modalTitle);
        
        // modify the submit button on the modal to reflect it's purpose
        var loginSubmitBtn = $(modal).find(".modal-footer button.btn-primary");
        $(loginSubmitBtn).html(mainBtnText);
        $(loginSubmitBtn).prop("id", prefix + "submit");
        $(loginSubmitBtn).click(function() {
            $("#login-form").submit();
        });
    });
}