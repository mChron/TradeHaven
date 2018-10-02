/* Filename: load_nav.js
Author: Marcus Chronabery
Date: 9/8/18 */
$(function() {
    loadHeaderAndFooterAjax();
    loadCommonModalAjax("Login", "Login", "pages/user/login_modal_content.html");
});

/*
 * Replaces the placeholder character in the footer with the current year.
 */
function loadCopyrightYear() {
    var d = new Date();
    var cpy = $("#cpy").html().toString();
    $("#cpy").html(cpy.replace("_", d.getFullYear()));
}

/*Load header and footer via ajax*/
function loadHeaderAndFooterAjax() {
    $.ajax({
        dataType:"html",
        url: "pages/common/header.html",
        success: function(data) {
            var head = $(data)[3];
            $(document.body).append($(head).clone());
            setActiveNavLink();
        }
    });
    $.ajax({
        dataType:"html",
        url: "pages/common/footer.html",
        success: function(data) {
            var foot = $(data)[3];
            $(document.body).append($(foot).clone());
            loadCopyrightYear();
        }
    });
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

/*Load common modal with content from the provided url via ajax */
function loadCommonModalAjax(modalTitle, mainBtnText, url) {
    $.ajax({
        dataType:"html",
        url: "pages/common/common_centered_modal.html",
        success: function(modalData) {
            $.ajax({
                dataType:"html",
                url: url,
                success: function(data) {
                    var content = $(modalData)[3];
                    var prefix = modalTitle.toString().toLowerCase() + "-";
                    var modal = $(content);

                    // set modal element ids to reflect which modal they belong to
                    modal.prop("id", prefix + "modal");
                    $(modal).find(".modal-content").prop("id", prefix + "modal-content");
                    $(modal).find(".modal-body").prop("id", prefix + "modal-body");
                    $(modal).find("#" + prefix + "modal-body").html($(data)[3]);
                    $(modal).find(".modal-header").prop("id", prefix + "modal-header");
                    $(modal).find(".modal-title").html(modalTitle);

                    // modify the submit button on the modal to reflect it's purpose
                    var modalSubmitBtn = $(modal).find(".modal-footer button.btn-primary");
                    $(modalSubmitBtn).html(mainBtnText);
                    $(modalSubmitBtn).prop("id", prefix + "submit");
                    $(modalSubmitBtn).click(function() {
                        $("#login-form").submit();
                    });
                    $(document.body).append($(content).clone());
                    $(".modal").addClass("show");
                }
            });
        }
    });
}