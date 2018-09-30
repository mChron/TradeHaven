/* file:sell.js
 * author: Marcus Chronabery
 * date: 9-29-18
 */
var conditionSelect;
var conditions = ["new", "like new", "used", "some damage"];

$(function() {
    $("#add-sell-card").click(function() {
        var rows = $("#sell-table-body").children("tr").length;
        if (rows < 10) {
            addNewRow(rows + 1);
            $("html, body").animate({ scrollTop: $(document).height() }, "slow");
        }
    });
    $("#remove-all-cards").click(function() {
        $("#sell-table-body").children("tr").remove();
    });
    initializeConditionSelect();
    $("[data-toggle='tooltip']").tooltip();
    $("button[data-toggle='tooltip']").click(function() {
        $(this).tooltip("hide");
    });
});

function addNewRow(index) {
    var tr = document.createElement("tr");
    var name = document.createElement("td");
    $(name).html("Test Card " + index);
    var editImg = document.createElement("img");
    $(editImg).prop("src", "images/glyphicons/glyphicons-31-pencil.png");
    $(editImg).addClass("clickable edit-sell-card");
    $(editImg).prop("height", 30);
    $(editImg).prop("width", 30);
    addTooltipProperties(editImg, "top", "Change Card");
    $(name).append(editImg);
    $(tr).append(name);
    var condition = $(conditionSelect).clone();
    $(tr).append(condition);
    var numSpinner = document.createElement("td");
    $(numSpinner).append(getNewNumberSpinner());
    $(tr).append(numSpinner);
    var price = document.createElement("td");
    $(price).html("$" + ((index * 2) + 1) /100);
    $(tr).append(price);
    var removeBtn = document.createElement("td");
    var removeImg = document.createElement("img");
    $(removeImg).click(removeRow);
    $(removeImg).addClass("clickable remove-row");
    $(removeImg).prop("src", "images/glyphicons/glyphicons-198-remove-circle.png");
    $(removeImg).prop("height", 30);
    $(removeImg).prop("width", 30);
    $(removeBtn).append(removeImg);
    addTooltipProperties(removeImg, "left", "Remove Card");
    $(tr).append(removeBtn);
    $("#sell-table-body").append(tr);
}

function initializeConditionSelect() {
    conditionSelect = document.createElement("td");
    var select = document.createElement("select");
    $(select).addClass("form-control custom-select");
    $(conditions).each(function(index, value) {
        var opt = document.createElement("option");
        var val = titleCase(value);
        $(opt).val(val);
        $(opt).html(val);
        $(select).append(opt);
    });
    $(conditionSelect).append(select);
}