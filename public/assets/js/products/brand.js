jQuery(document).ready(function () {
    // Brand Modal
    $("#brand").autocomplete({
        minChars: 1,
        cache: false,
        source: function (request, response) {
            var params = {};
            params['search'] = request.term;
            $.ajax({
                url: "api/brand" + "?" + jQuery.param(params),
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
            $("#brand").val(ui.item.label);
            $("#brandIdHidden").val(ui.item.value);
            return false;
        },
        response: function (event, ui) {
            if (!ui.content.length) {
                var noResult = { value: "", label: "-- Không tìm thấy --" };
                ui.content.push(noResult);
            }
        }
    });

    $("#saveBrand").click(function () {
        var brandName = $("#brandName").val();
        $.ajax({
            url: 'api/brand',
            type: 'POST',
            data: {
                name: brandName
            },
            dataType: 'json',
            success: function (data) {
                $("#brand").val(data.data.name);
                $("#brandIdHidden").val(data.data.id);
                // Close modal
                var addBrandModal = document.getElementById("addBrandModal");
                document.getElementsByClassName("addBrandModalOverlay")[0].remove();
                addBrandModal.style.display = "none";
                addBrandModal.style.zIndex = "0";
            }
        })
    });
})