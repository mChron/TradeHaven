/* Filename: cart.js
Author: Marcus Chronabery
Date: 11/28/18 */
$(function() {
    sumCardPrices();
    if (getUrlParameter("success") === "true") {
        $("#buy-modal").modal();
        $("#buy-modal .modal-footer button").hide();
    }
    $(".remove-from-cart").on("click", function() {
        let row = $(this).parents("tr");
        $("#remove-row-id").val($(row).attr("id"));
        $("#remove-card-id").val($(row).find(".card-id").html());
        $("#remove-card-name").html($(row).find(".name").html());
        $("#remove-from-cart-modal").modal();
    });
    $("#confirm-remove-card").click(function() {
        $.ajax({
            url: "php/remove_from_cart.php",
            method: "POST",
            data: {"card_id": $("#remove-card-id").val()},
            success: function(result) {
                if (!result) {
                    $("#cart-remove-success").removeClass("hidden");
                    // css, timeout, callback
                    // display message for 2 seconds then fade out over 2 seconds
                    setTimeout(function() {
                        $("#cart-remove-success").animate({opacity: "0"}, 2000, function() {
                            $("#cart-remove-success").addClass("hidden");
                            $("#cart-remove-success").animate({opacity: "100"});
                        });
                    }, 2000);
                }
                else {
                    $("#cart-remove-failure").removeClass("hidden");
                }
            }
        });
        $("#" + $("#remove-row-id").val()).remove();
        sumCardPrices();
    });
    $("#checkout-submit").click(function() {
        let cardIds = [],
            cardConditions = [],
            cardQuantities = [],
            cardPrices = [];
        $(".cart-row").each(function() {
            cardIds.push($(this).find(".card-id").html());
            cardConditions.push($(this).find(".card-condition").html());
            cardQuantities.push($(this).find(".card-quantity").html());
            cardPrices.push($(this).find(".card-price").html().substring(1));
        });
        $.ajax({
            url: "php/purchaseFormProcess.php",
            method: "POST",
            data: {
                "card-id": cardIds,
                "card-condition": cardConditions,
                "card-quantity": cardQuantities,
                "card-price": cardPrices
            },
            success: function(result) {
                if (!result) {
                    window.location.href = window.location.href + "?success=true";
                }
                else {
                    console.log(result);
                }
            }
        });
    });
});

function sumCardPrices() {
    var sum = 0;
    var totals = $(".card-total").map(function() {
        return parseFloat($(this).html().substring(1));
    });
    for (let i = 0; i < totals.length; i++) {
        sum+=totals[i];
    }
    $("#cart-total").html("$" + sum.toFixed(2));
}