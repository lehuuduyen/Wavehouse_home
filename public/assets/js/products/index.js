jQuery(document).ready(function () {
  var modal = document.getElementById("myModal");
  var btn = document.getElementById("addProduct");
  var span = document.getElementsByClassName("close")[0];
  var closeProductModal = document.getElementById("closeProductModal");

  btn.onclick = function () {
    document.getElementsByClassName("k-overlay")[0].style.display = "block"
    modal.style.display = "block";
  }
  span.onclick = function () {
    document.getElementsByClassName("k-overlay")[0].style.display = "none"
    modal.style.display = "none";
  }
  closeProductModal.onclick = function () {
    document.getElementsByClassName("k-overlay")[0].style.display = "none"
    modal.style.display = "none";
  }

  // Thêm nhóm hàng 
  var addCategoryModal = document.getElementById("addCategoryModal");
  var addGroupBtn = document.getElementById("addGroupBtn");
  var spanGroup = document.getElementsByClassName("close-group")[0];
  var closeSupplierModal = document.getElementById("closeSupplierModal");
  addGroupBtn.onclick = function () {
    addCategoryModal.style.display = "block";
    addCategoryModal.style.zIndex = "10005";
  }
  spanGroup.onclick = function () {
    document.getElementsByClassName("addCategoryModalOverlay")[0].remove();
    addCategoryModal.style.display = "none";
    addCategoryModal.style.zIndex = "0";
  }

  closeSupplierModal.onclick = function () {
    document.getElementsByClassName("addCategoryModalOverlay")[0].remove();
    addCategoryModal.style.display = "none";
    addCategoryModal.style.zIndex = "0";
  }

  // Thêm thương hiệu
  var addBrandModal = document.getElementById("addBrandModal");
  var addBrandBtn = document.getElementById("addBrandBtn");
  var spanBrand = document.getElementsByClassName("close-brand")[0];
  var closeBrandModal = document.getElementById("closeBrandModal");
  addBrandBtn.onclick = function () {
    addBrandModal.style.display = "block";
    addBrandModal.style.zIndex = "10021";

  }
  spanBrand.onclick = function () {
    document.getElementsByClassName("addBrandModalOverlay")[0].remove();
    addBrandModal.style.display = "none";
    addBrandModal.style.zIndex = "0";
  }
  closeBrandModal.onclick = function () {
    document.getElementsByClassName("addBrandModalOverlay")[0].remove();
    addBrandModal.style.display = "none";
    addBrandModal.style.zIndex = "0";
  }

  // Thêm vị trí
  var addPositionModal = document.getElementById("addPositionModal");
  var AddPositionBtn = document.getElementById("AddPositionBtn");
  var spanPosition = document.getElementsByClassName("close-position")[0];
  var closePositionModal = document.getElementById("closePositionModal");
  AddPositionBtn.onclick = function () {
    addPositionModal.style.display = "block";
    addPositionModal.style.zIndex = "10005";

  }
  spanPosition.onclick = function () {
    document.getElementsByClassName("addPositionModalOverlay")[0].remove();
    addPositionModal.style.display = "none";
    addPositionModal.style.zIndex = "0";
  }

  closePositionModal.onclick = function () {
    document.getElementsByClassName("addPositionModalOverlay")[0].remove();
    addPositionModal.style.display = "none";
    addPositionModal.style.zIndex = "0";
  }

})