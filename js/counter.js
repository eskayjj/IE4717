var minus = document.getElementsByClassName('minus')
var plus = document.getElementsByClassName('plus')
var qty = document.getElementsByClassName('qty')
var hiddenPrice = document.getElementById("hiddenPrice");

const maxQty = 9
const minQty = 1

var currentQty = 1
function increment(){
    currentQty = qty[0].value
    switch(true){
        case (currentQty < maxQty):
            qty[0].value = parseInt(currentQty) + 1
            break
        case (currentQty == maxQty):
            qty[0].value = maxQty
            break
    }
    
    modalPrice.innerHTML = `<p>$${(parseFloat(hiddenPrice.value) * parseFloat(qty[0].value)).toFixed(2)}</p>`
}

function decrement(){
    currentQty = qty[0].value
    
    switch(true){
        case (currentQty > minQty):
            qty[0].value = parseInt(currentQty) - 1
            break
        case (currentQty == minQty):
            qty[0].value = minQty
            break
    }
    modalPrice.innerHTML = `<p>$${(parseFloat(hiddenPrice.value) * parseFloat(qty[0].value)).toFixed(2)}</p>`
}