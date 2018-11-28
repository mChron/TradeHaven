/* file:sell.js
 * author: Marcus Chronabery
 * date: 9-29-18
 */
var conditionSelect;
var conditions = ["new", "like new", "used", "damaged"];

$(function() {
    $("#add-sell-card").click(function() {
        var rows = $("#sell-table-body").children("tr").length;
        if (rows < 10) {
            addNewRow(rows);
            $("html, body").animate({ scrollTop: $(document).height() }, "slow");
            $("#editRowId").val("card-" + rows);
            $("#sell-edit-modal").modal("show");
        }
    });
    $("#sell-edit-modal").on("hide.bs.modal", function() {
        let rowId = "#" + $("#editRowId").val();
        let editRow = $(rowId);
        if ($(editRow).find(".card-id input").val() === "-1") {
            $(editRow).remove();
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
    if (getUrlParameter("success") === "true") {
        $("#sell-modal").modal();
        $("#sell-modal .modal-footer button").hide();
    }
    $(".select-card-name").click(function() {
        let rowId = "#" + $("#editRowId").val();
        let row = $(rowId);
        let name = $(row.find(".card-name"));
        $(name).html($(this).html());
        $(row.find(".estimated-price")).html($(this).parents("tr").find(".card-price").html());
        $(row.find(".card-id input")).val($(this).parents("tr").find(".select-card-id").html());
        $("#sell-edit-modal").modal("hide");
    });
});

function addNewRow(index) {
    var tr = document.createElement("tr");
    var id = document.createElement("td");
    $(id).addClass("card-id hidden");
    var idField = document.createElement("input");
    $(idField).val("-1");
    $(idField).attr("name", "card-id[" + index + "]");
    $(id).append(idField);
    $(tr).append(id);
    $(tr).prop("id", "card-" + index);
    var name = document.createElement("td");
    var span = document.createElement("span");
    $(name).append(span);
    $(span).addClass("card-name");
    $(span).html("Sell Card " + index);
    var editImgWrap = document.createElement("a");
    $(editImgWrap).attr("data-toggle", "modal").attr("data-target", "#sell-edit-modal");
    var editImg = document.createElement("img");
    $(editImgWrap).append(editImg);
    $(editImg).prop("src", "images/glyphicons/glyphicons-31-pencil.png");
    $(editImg).addClass("clickable edit-sell-card");
    $(editImg).prop("height", 30);
    $(editImg).prop("width", 30);
    $(editImgWrap).click(function() {
        $("#editRowId").val($(this).parents("tr").attr("id"));
    });
    addTooltipProperties(editImg, "top", "Change Card");
    $(name).append(editImgWrap);
    $(tr).append(name);
    var condition = $(conditionSelect).clone();
    $(tr).append(condition);
    $(condition).find("select").attr("name", "card-condition[" + index + "]");
    var numSpinner = document.createElement("td");
    $(numSpinner).append(getNewNumberSpinner());
    $(tr).append(numSpinner);
    var price = document.createElement("td");
    $(price).addClass("estimated-price");
    $(price).html("$0.00");
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
    $(numSpinner).find("input").attr("name", "card-quantity[" + index + "]");
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