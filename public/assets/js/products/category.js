jQuery(document).ready(function () {
    // Category Modal
    $("#category").autocomplete({
        minChars: 1,
        cache: false,
        source: function (request, response) {
            $.ajax({
                url: "api/category",
                type: 'GET',
                dataType: "json",
                success: function (data) {
                    response($.map(data.data, function (item) {
                        return {
                            label: item.name,
                            value: item.id
                        };
                    }));
                },
            });
        },
        select: function (event, ui) {
            $("#category").val(ui.item.label);
            $("#categoryIdHidden").val(ui.item.value);
            return false;
        },
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
                document.getElementsByClassName("addCategoryModalOverlay")[0].remove();
                addCategoryModal.style.display = "none";
                addCategoryModal.style.zIndex = "0";
            }
        })
    });
})