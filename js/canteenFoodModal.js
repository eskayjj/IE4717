// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("openModal");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];


var hiddenFoodId = document.getElementById("hiddenFoodId");
var hiddenPrice = document.getElementById("hiddenPrice");
var qty = document.getElementsByClassName('qty')
// When the user clicks the button, open the modal 
// btn.onclick = function() {
//     modal.style.display = "block";
// }
function openCart(ele, foodId){
    const parentEle = ele.parentElement.parentElement
    const desc = parentEle.children[1]
    const foodName = desc.children[0].innerHTML
    const description = desc.children[1].innerHTML
    var price = parentEle.children[2].children[0].innerHTML
    
    var modalDescription = document.getElementById("modalDescription");
    var modalPrice = document.getElementById("modalPrice");

    price = price.split('$')[1] 

    hiddenFoodId.value = foodId
    hiddenPrice.value = price

    modalDescription.innerHTML = 
        `<label>${foodName}</label>
        <p>${description}</p>`
    
    modalPrice.innerHTML = `<p>$${price}</p>`

    modal.style.display = "block";
}

function addToCart(){
    var addToCartForm = document.getElementById("addToCartForm");
    var hiddenQty = document.getElementById("hiddenQty");
    hiddenQty.value = qty[0].value


    addToCartForm.onsubmit()

    return false
}

var qty = document.getElementsByClassName('qty')
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    qty[0].value = 1
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        qty[0].value = 1
        modal.style.display = "none";
    }
}