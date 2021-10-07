
var modal = document.querySelector(".order");
var openModal = document.querySelector("#buyItem");
var closeModal = document.querySelector(".closeModal");
var buy = document.querySelector(".buy");

openModal.addEventListener("click", function(){
  modal.style.display = "block";
  buy.style.display = "none";
},false);

closeModal.addEventListener("click", function(){
  modal.style.display = "none";
    buy.style.display = "block";
},false);

window.addEventListener("click", function(event){
  if (event.target == modal) {
    modal.style.display = "none";
  }
})


//Bottom product buy

var sizeInput = document.querySelectorAll(".product-size [name='size']");
var orderButton = document.querySelector("#orderItem");
var orderButtonLink = document.querySelector("#orderItem").href;
var selectedsize = document.querySelector("input[type='hidden']");

sizeInput.forEach(function(input) {
    input.addEventListener("click", function() {
        selectedsize.setAttribute('value', `${input.value}`)
        if (input.getAttribute('data-stock') == 0) {
          orderButton.textContent = "Sold Out";
          orderButton.href = "javascript:void(0)";
        }else {
          orderButton.textContent = "Order now";
          orderButton.href = orderButtonLink;
        }
    },true);
});
