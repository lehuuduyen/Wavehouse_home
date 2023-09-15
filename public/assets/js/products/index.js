jQuery(document).ready(function () {
  jQuery(".importBtn").click(function (event) {
    event.stopPropagation();
    var clickedInsideDiv = false;
    if (!clickedInsideDiv) {
      jQuery('input[type="file"]').click();
      clickedInsideDiv = true;
    }
  });

  // Add a click handler for the file input to reset the clickedInsideDiv flag
  jQuery('input[type="file"]').change(function () {
    var formData = new FormData();
    formData.append('file', this.files[0]);
    let _this = this
    $.ajax({
      url: "/api/product/import",
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
        window.location.reload();
      },
      error: function (jqXHR, textStatus, errorThrown) {
        BtnReset(_this)
        if (jqXHR.responseJSON.errors && jqXHR.responseJSON.errors.length > 0) {
          var customMessages = jqXHR.responseJSON.errors.map(function (messageArray) {
            var errorMessage = messageArray[0];
            var matches = errorMessage.match(/(\d+)/);
            var rowNumber = matches ? matches[0] : null;

            if (rowNumber) {
              return "Dòng " + rowNumber + errorMessage.substring(errorMessage.indexOf('.'));
            } else {
              return errorMessage;
            }
          });
        } else {
          customMessages = jqXHR.responseJSON.message;
        }

        toastr.error(customMessages)

      }
    });
  });

  function BtnReset(elem) {
    $(elem).prop("disabled", false);
    $(elem).html($(elem).attr("data-original-text"));
  }
  var modal = document.getElementById("myModal");
  var btn = document.getElementById("addProduct");
  var span = document.getElementsByClassName("close")[0];

  btn.onclick = function () {
    document.getElementsByClassName("k-overlay")[0].style.display = "block"
    modal.style.display = "block";
  }
  $(document).on('click', '#updateProduct', function () {
    document.getElementsByClassName("k-overlay")[0].style.display = "block"
    let json = $(this).data('json');
    Object.keys(json).map(function (key) {
      if (key == "price_sell" || key == "price_capital") {

        $(`input[name='${key}']`).val(formatCurrency(json[key]))

      } else if (key == "file") {
        $("#output").attr('src', json[key])
      } else {
        $(`input[name='${key}']`).val(json[key])

      }
    })
    modal.style.display = "block";
  })

  span.onclick = function () {
    document.getElementsByClassName("k-overlay")[0].style.display = "none"
    modal.style.display = "none";
  }
})