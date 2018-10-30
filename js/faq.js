/* 
 * file: faq.js
 * author: Marcus Chronabery
 * date: 10/28/2018
 */
$(function() {
    initializeToc();
});

function initializeToc() {
    $(".toc-header").each(function(indx, value) {
        let anchor = document.createElement("a");
        anchor.id = value.innerHTML;
        $(value).prepend(anchor);
        $(anchor).css({
            "margin-top": "-70px",
            "display": "block",
            "position": "absolute"
        });
        let link = document.createElement("a");
        link.innerHTML = anchor.id;
        link.href = window.location + "#" + anchor.id;
        let li = document.createElement("li");
        $(li).append(link);
        $("#how-to-toc").append(li);
    });
}

$(window).on("hashchange", function(e) {
    checkForHash();
});