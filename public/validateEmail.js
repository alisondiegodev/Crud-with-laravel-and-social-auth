function validarEmail(el) {
    if (isValidEmail(el.value)) {
        valid.style.display = "none";
    } else {
        valid.style.display = "block";
        lookEmail(el);
    }

}
function lookEmail(el) {
    el.addEventListener("keyup", () => {

        if (isValidEmail(el.value)) {
            valid.style.display = "none";
           
        } else {
            valid.style.display = "block";
        }
    })
}

function isValidEmail(email) {
    var regex = /^[\w+.]+@\w+\.\w{2,}(?:\.\w{2})?$/;
    return regex.test(email);
}