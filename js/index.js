/* 
 * file: index.js
 * author: Marcus Chronabery
 * date: 10/18/18
 */

$(function() {
    let carousels = Math.floor(window.innerWidth / (242 + 15));
    let mainCarousel = $("#card-carousel-0");
    let mainId = "card-carousel";
    if (carousels > 1) {
        for (let i = 1; i < carousels; i++) {
            let newId = mainId + "-" + i;
            let cloned = $(mainCarousel).clone();
            $(cloned).attr("id", newId);
            $("#carousel-row").append(cloned);
            $("#" + newId + " a").attr("href", "#" + newId);
        }
    }
    let item = document.createElement("div");
    item.className = "carousel-item";
    let a = document.createElement("a");
    let img = document.createElement("img");
    img.className = "d-block";
    img.height = "343";
    img.width = "242";
    $(a).append(img);
    $(item).append(a);
    $.ajax({
        url :"images/cards/promotional/promotional_links.json",
        method : "GET",
        success : function(data) {
            $(data.links).each(function(indx, link) {
                let toggle = document.createElement("li");
                let cardCarousel = indx % (carousels);
                let carouselId = "#" + mainId + "-" + cardCarousel;
                let slides = carouselId + " .carousel-inner";
                $(toggle).attr("data-target", carouselId);
                let elem = $(item).clone();
                let altLink = getAltLink(link.name);
                $(elem).find("a").attr("href", altLink);
                $(elem).find("img")
                        .attr("src", link.url)
                        .attr("alt", link.name);
                $(elem).find("img").on("error", function() {
                    d = new Date();
                    $(this).attr("src", "images/cards/promotional/" + $(this).attr("alt") + "?" + d.getTime());
                });
                $(slides).append(elem);
                $(carouselId + " .carousel-indicators").append(toggle);
                $(toggle).attr("data-slide-to", $(slides).children().length - 1);
            });
            $(".carousel-inner, .carousel-indicators").each(function() {
                $(this).children().first().addClass("active");
            });
        }
    });
});

function getAltLink(cardName) {
    let indx = cardName.indexOf("-") + 1;
    let set = cardName.substring(0, indx - 1);
    let rest = cardName.substring(indx);
    indx = rest.indexOf("-") + 1;
    let num = rest.substring(0, indx);
    rest = rest.substring(indx);
    indx = rest.indexOf(".");
    let name = rest.substring(0, indx);
    return "https://scryfall.com/card/" + set + "/" + num + "/" + name;
}