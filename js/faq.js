/* 
 * file: faq.js
 * author: Marcus Chronabery
 * date: 10/28/2018
 */
$(function() {
    initializeToc();
});

function initializeToc() {
    $(".toc-header, .toc-sub-header").each(function(indx, header) {
        let anchor = document.createElement("a");
        anchor.id = header.innerHTML.trim();
        $(header).prepend(anchor);
        $(anchor).css({
            "margin-top": "-70px",
            "display": "block",
            "position": "absolute"
        });
        let li = document.createElement("li");
        let link = document.createElement("a");
        link.innerHTML = anchor.id;
        link.href = window.location + "#" + anchor.id;
        $(li).append(link);
        if ($(this).hasClass("toc-header")) {
            $(li).addClass("topic");
            $("#how-to-toc").append(li);
            let returnToTop = document.createElement("button");
            returnToTop.innerHTML = "Return To Top";
            returnToTop.className = "btn button-custom return-to-top";
            $(returnToTop).click(function() {document.body.scrollTop = 0; document.documentElement.scrollTop = 0;});
            $(header).append(returnToTop);
        }
        else {
            $(li).addClass("sub-topic");
            if ($(".topic").last().find(".sub-list")[0] === undefined) {
                let sublist = document.createElement("ol");
                sublist.className = "sub-list";
                $(".topic").last().append(sublist);
            }
            $(".sub-list").last().append(li);
        }
    });
}

$(window).on("hashchange", function(e) {
    checkForHash();
});