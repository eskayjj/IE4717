function showAccountForm(){
    var edits = document.querySelectorAll('.detailEdit')
    var blocks = document.querySelectorAll('.detailFix')

    

    blocks.forEach(block => {
        block.classList.toggle('invisible')
    })
    
    edits.forEach(edit => {
        edit.classList.toggle('invisible')
    })

    return false
}

function accountFormSubmit(){
    var accountForm = document.getElementById("accountForm")

    return accountForm.onsubmit()
}