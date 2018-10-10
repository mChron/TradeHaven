$(function() {
    loadTestData(9);
});

function loadTestData(n) {
    var img = document.createElement("img");
    $(img).addClass("clickable");
    $(img).prop("src", "images/open-chest.png");
    $(img).prop("height", "30");
    $(img).prop("width", "30");
    $(img).attr("data-placement", "left");
    $(img).attr("data-toggle", "tooltip");
    $(img).attr("title", "Add To Cart");
    for(var i = 0; i < n; i++) {
        var row = document.createElement("tr");
        var c1 = document.createElement("td");
        $(c1).html("Test Card" + i);
        var c2 = document.createElement("td");
        $(c2).html("Test Condition" + i);
        var c3 = document.createElement("td");
        $(c3).html(10 + i);
        var c4 = document.createElement("td");
        $(c4).html("$" + ((i+1) * (i+2))/100);
        var c5 = document.createElement("td");
        $(c5).html($(img).clone());
        $(row).append(c1);
        $(row).append(c2);
        $(row).append(c3);
        $(row).append(c4);
        $(row).append(c5);
        $("tbody").append(row);
    }
    initializeTooltips();
}
