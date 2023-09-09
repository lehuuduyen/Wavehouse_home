jQuery(document).ready(function () {
    // Category Modal
    $("#category").autocomplete({
        minChars: 1,
        cache: false,
        source: function (request, response) {
            var params = {};
            params['search'] = request.term;
            $.ajax({
                url: "api/category" + "?" + jQuery.param(params),
                type: 'GET',
                dataType: "json",
                success: function (data) {
                    console.log(data)
                    console.log(data.length)
                    if (data.length == 0) {
                        var noOption = { "": "-- Không tìm thấy --" };
                        response(noOption);
                    } else {
                        response(data);
                    }                    
                },
            });
        },
        select: function (event, ui) {
            $("#category").val(ui.item.label);
            $("#categoryIdHidden").val(ui.item.value);
            return false;
        },
        response: function (event, ui) {
            if (!ui.content.length) {
                var noResult = { value: "", label: "-- Không tìm thấy --" };
                ui.content.push(noResult);
            }
        }
    });

    $("#saveCategory").click(function () {
        var categoryName = $("#categoryName").val();
        $.ajax({
            url: 'api/category',
            type: 'POST',
            data: {
                name: categoryName
            },
            dataType: 'json',
            success: function (data) {
                $("#category").val(data.data.name);
                $("#categoryIdHidden").val(data.data.id);
                // Close modal
                var addCategoryModal = document.getElementById("addCategoryModal");
                document.getElementsByClassName("addCategoryModalOverlay")[0].remove();
                addCategoryModal.style.display = "none";
                addCategoryModal.style.zIndex = "0";
            }
        })
    });
})