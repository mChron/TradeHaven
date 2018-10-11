$(function() {
    loadTestData(9);
});

/**
 * Load test data into the inventory table.
 * @param {type} n The number of rows to load.
 */
function loadTestData(n) {
    var img = document.createElement("img");
    $(img).addClass("clickable");
    $(img).prop("src", "images/open-chest.png");
    $(img).prop("height", "30");
    $(img).prop("width", "30");
    $(img).attr("data-placement", "left");
    $(img).attr("data-toggle", "tooltip");
    $(img).attr("title", "Add To Cart");
    for(let i = 0; i < n; i++) {
        let row = document.createElement("tr");
        let c1 = document.createElement("td");
        $(c1).html("Test Card" + i);
        let c2 = document.createElement("td");
        $(c2).html("Test Condition" + i);
        let c3 = document.createElement("td");
        $(c3).html(10 + i);
        let c4 = document.createElement("td");
        $(c4).html("$" + ((i+1) * (i+2))/100);
        let c5 = document.createElement("td");
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
