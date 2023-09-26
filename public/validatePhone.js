var allowedKeys = [
    8,
    37, 38, 39, 40,
    48, 49, 50, 51, 52, 53, 54, 55, 56, 57,
    96, 97, 98, 99, 100, 101, 102, 103, 104, 105
];

phone.addEventListener('keydown', (event) => {
    var keyCode = event.keyCode || event.which;

    if (!allowedKeys.includes(keyCode) || keyCode === 222 || keyCode === 219) {
        event.preventDefault();
    }
})

phone.addEventListener('keyup', (event) => {
    let inputLength = phone.value.length
    if (event.keyCode != 8) {
        if (inputLength == 2) {
            phone.value = '(' + phone.value + ') ';
        } else if (inputLength == 6) {
            phone.value += ' ';
        } else if (inputLength == 11) {
            phone.value += '-';
        } else if (inputLength == 16) {
            validTel.style.display = "none";
        } else if (inputLength == 16) {
            validTel.style.display = "none";
        }
    } else if (inputLength == 16) {
        validTel.style.display = "none";

    } else {
        validTel.style.display = "block";

    }

})