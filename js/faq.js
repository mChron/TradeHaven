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
        value.id = value.innerHTML;
        let link = document.createElement("a");
        link.innerHTML = value.innerHTML;
        link.href = window.location + "#" + link.innerHTML;
        let li = document.createElement("li");
        $(li).append(link);
        $("#how-to-toc").append(li);
    });
}

$(window).on("hashchange", function(e) {
    console.log(location.hash);
});