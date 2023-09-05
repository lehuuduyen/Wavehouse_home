jQuery(document).ready(function () {
  var modal = document.getElementById("myModal");

  // Get the button that opens the modal
  var btn = document.getElementById("addProduct");

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];

  // When the user clicks on the button, open the modal
  btn.onclick = function () {
    document.getElementsByClassName("k-overlay")[0].style.display = "block"
    modal.style.display = "block";
  }

  // When the user clicks on <span> (x), close the modal
  span.onclick = function () {
    document.getElementsByClassName("k-overlay")[0].style.display = "none"
    modal.style.display = "none";
  }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function (event) {
    if (event.target == modal) {
      document.getElementsByClassName("k-overlay")[0].style.display = "none" 
      modal.style.display = "none";
    }
  }
})