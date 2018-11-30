$(function() {
    initializeTooltips();
    $(".detailed-view").click(function() {
        let cardId = $(this).parents("td").prev("td").html();
        // url, data (query params), callback
        $.getJSON(document.url + '../../php/lookup_card.php', {"card_id": cardId}, function(data) {
            // array of column information
            let i = $(".card-col").length;
            for (let x = 0; x < i; x++) {
                $($(".card-col")[x]).html(data[x+1]);
            }
        });
    });
    $("#card-num-spinner").addClass("submit-card-quantity");
    $(".add-to-cart").click(function() {
        let row = $(this).parents("tr");
        $("#submit-card-id").val($(row).find(".card-id").html());
        $("#card-num-spinner").html(getNewNumberSpinner(new Number($(row).find(".card-quantity").html()).valueOf()));
        $("#submit-card-name").html($(row).find(".name").html());
        $("#add-to-cart-modal").modal();
    });
    $("#submit-add-to-cart").click(function() {
        $("#add-to-cart-modal").modal("hide");
        $.ajax({
            url: "php/add_to_cart.php",
            method: "POST",
            data: {
                "card-id": $("#submit-card-id").val(),
                "card-quantity": $("#card-num-spinner .spinner-input").val()
            },
            success: function(result) {
                if (!result) {
                    $("#cart-add-success").removeClass("hidden");
                    // css, timeout, callback
                    // display message for 2 seconds then fade out over 2 seconds
                    setTimeout(function() {
                        $("#cart-add-success").animate({opacity: "0"}, 2000, function() {
                            $("#cart-add-success").addClass("hidden");
                            $("#cart-add-success").animate({opacity: "100"});
                        });
                    }, 2000);
                }
                else {
                    $("#cart-add-failure").removeClass("hidden");
                }
            }
        });
    });
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
}
