var totalP = document.getElementById('totalP');
var inputBtns = document.getElementById('inputBtns');
// var selectedFood = document.getElementById('selectedFood');

function onCartItemCheck(food_id){
    var inputs = document.querySelectorAll('.cartItem');   
    var noOfChecked = 0
    var grand_total = 0;
    for (var i = 0; i < inputs.length; i++) {   
        if(inputs[i].checked){
            grand_total += parseFloat(inputs[i].value.split(",")[1])
            noOfChecked += 1
        }
    }   
    totalP.innerHTML = `Total: $${grand_total.toFixed(2)}`

    if(noOfChecked == 0){
        inputBtns.style.display = 'none'
    } else {
        inputBtns.style.display = 'flex'
    }
}