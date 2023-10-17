var user = document.getElementsByName('regUser') //length, no special char, no whitespace
var email = document.getElementsByName('regEmail')//no whitespace, typical email addresses
var pw = document.getElementsByName('regPassword')//length, no whitespace
var cfrmpw = document.getElementsByName('regCfrmPassword')//same as pw
const emailRegex = /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/
const pwRegex = /\s+[A-Z]+[a-z]+[0-9]+\W+/
const special = /[^\w\s]+/
const space = /\s+/


function registerValidation(){

    const userRegex = /^[^A-Za-z_0-9]|[\r\t\n\f]$/

    if(user[0].value.length <=8 || user[0].value.length >= 16){
        console.log('Fail User')
        return false
    }

    if(userRegex.test(user[0].value)){
        console.log('Fail User')
        return false
    }

    if(!emailRegex.test(email[0].value)){
        console.log('Fail Email')
        return false
    }

    if(pw[0].value.length <= 8 && pw[0].value.length >= 16){
        console.log('Fail Password')
        return false
    }

    if(pwRegex.test(pw[0].value)){
        console.log('Fail Password')
        return false
    }

    if(pw[0].value != cfrmpw[0].value){
        console.log('Fail Confirm Password')
        return false
    }

    console.log("Frontend Validated")

    return true
} 


function focusEntry(ele){
    var validationParent = ele.parentElement.parentElement.children[1]
    var children = validationParent.children

    for(var i = 0; i < children.length; i++){
        var child = children[i]
        if(child.style.display == "none"){
            child.style.display = "block"
        }
        else{
            child.style.display = "none"
        }
    }
}

function updateErrorStatusUser(){
    var crit1 = document.getElementById('charLength')
    var crit2 = document.getElementById('specialChar')
    var crit3 = document.getElementById('noSpace')
    
    

    if(user[0].value.length >= 8 && user[0].value.length <= 16){
        crit1.classList.remove("invalid")
        crit1.classList.add("valid")
    }

    else{
        crit1.classList.remove("valid")
        crit1.classList.add("invalid")
    }

    if(special.test(user[0].value)){
        crit2.classList.remove("valid")
        crit2.classList.add("invalid")
    }

    else{
        console.log(user[0].value)
        crit2.classList.remove("invalid")
        crit2.classList.add("valid")
    }

    if(space.test(user[0].value)){
        crit3.classList.remove("valid")
        crit3.classList.add("invalid")
    }

    else{
        crit3.classList.remove("invalid")
        crit3.classList.add("valid")
    }
}

function updateErrorStatusEmail(){
    var crit4 = document.getElementById('emailValid')

    if(emailRegex.test(email[0].value)){
        // console.log(emailRegex.test(email[0].value.trim))
        // console.log(email[0].value)
        crit4.classList.remove("invalid")
        crit4.classList.add("valid")
    }

    else{
        crit4.classList.remove("valid")
        crit4.classList.add("invalid")
    }
}

function updateErrorStatusPW(){
    var crit5 = document.getElementById('pwLength')
    var crit6 = document.getElementById('pwUpper')
    var crit7 = document.getElementById('pwLower')
    var crit8 = document.getElementById('pwNum')
    var crit9 = document.getElementById('pwSpecial')
    var crit10 = document.getElementById('pwSpace')

    const upper = /[A-Z]+/
    const lower = /[a-z]+/
    const num = /\d+/

    if(pw[0].value.length >= 8 && pw[0].value.length <= 16){
        crit5.classList.remove("invalid")
        crit5.classList.add("valid")
    }

    else{
        crit5.classList.remove("valid")
        crit5.classList.add("invalid")
    }


    if(upper.test(pw[0].value)){
        crit6.classList.remove("invalid")
        crit6.classList.add("valid")
    }

    else{
        crit6.classList.remove("valid")
        crit6.classList.add("invalid")
    }

    if(lower.test(pw[0].value)){
        crit7.classList.remove("invalid")
        crit7.classList.add("valid")
    }

    else{
        crit7.classList.remove("valid")
        crit7.classList.add("invalid")
    }

    if(num.test(pw[0].value)){
        crit8.classList.remove("invalid")
        crit8.classList.add("valid")
    }

    else{
        crit8.classList.remove("valid")
        crit8.classList.add("invalid")
    }

    if(special.test(pw[0].value)){
        // console.log(special.test(pw[0].value.trim))
        // console.log(pw[0].value)
        crit9.classList.remove("invalid")
        crit9.classList.add("valid")
    }

    else{
        crit9.classList.remove("valid")
        crit9.classList.add("invalid")
    }

    if(space.test(pw[0].value)){
        crit10.classList.remove("valid")
        crit10.classList.add("invalid")
    }

    else{
        crit10.classList.remove("invalid")
        crit10.classList.add("valid")
    }
}

function updateErrorStatusPWConfirm(){
    var crit11 = document.getElementById('cfrmPWCheck')

    if(pw[0].value == cfrmpw[0].value){
        crit11.classList.remove("invalid")
        crit11.classList.add("valid")
    }

    else{
        crit11.classList.remove("valid")
        crit11.classList.add("invalid")
    }
}

function feedbackValidation(){

}