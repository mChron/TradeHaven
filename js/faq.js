/* 
 * file: faq.js
 * author: Marcus Chronabery
 * date: 10/28/2018
 */
$(function() {
    initializeToc();
    $(".topic, .sub-topic").click(function(e) {
        let anchor = document.getElementById($(this).children().first().html());
        $(anchor).parent(0).css({"border": "solid 5px yellow"}).animate({
            "borderBottomWidth": "0px",
            "borderTopWidth": "0px",
            "borderLeftWidth": "0px",
            "borderRightWidth": "0px"
        }, 2000);
    });
});

function initializeToc() {
    $(".toc-header, .toc-sub-header").each(function(indx, value) {
        let anchor = document.createElement("a");
        anchor.id = value.innerHTML;
        $(value).prepend(anchor);
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