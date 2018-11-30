/* 
 * file: browse_history.js
 * created: 11/29/2018
 * author: Marcus Chronabery
 */
$(function() {
    $(".transaction-view").click(function() {
        let transactionId = $(this).find(".transaction-id").html();
        // url, data (query params), callback
        $.getJSON(document.url + '../../php/lookup_sale.php', {"purchase_id": transactionId, "sale": false}, function(data) {
            // array of column information
            $(data).each(function() {
                let name = document.createElement("td");
                $(name).html(this["0"]);
                let condition = document.createElement("td");
                $(condition).html(this["1"]);
                let quantity = document.createElement("td");
                $(quantity).html(this["2"]);
                let price = document.createElement("td");
                $(price).html(this["3"]);
                let row = document.createElement("tr");
                $("#transaction-details-table tbody").append(row);
                $(row).append(name);
                $(row).append(condition);
                $(row).append(quantity);
                $(row).append(price);
            });
            $("#transaction-details-modal").modal();
        });
    });
    $("#transaction-details-modal").on("hidden.bs.modal", function() {
        $("#transaction-details-modal tbody tr").remove();
    });
});