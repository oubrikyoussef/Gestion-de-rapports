const changerPass = document.querySelector("a.changer-pass");
const passwordForm = document.getElementById("passwordForm");
const passInput = document.getElementById("pass");
const passConfirmInput = document.getElementById("pass-confirm");
const errorIndec = document.querySelector('.error_indec');
const exit = document.querySelector(".exit");
setOverlayOnClick(changerPass,overlay);
clearOverlay(overlay);
clearOverlayOnClick(exit,overlay);

passwordForm.addEventListener("submit", function (event) {
    event.preventDefault();

    const passValue = passInput.value.trim();
    const passConfirmValue = passConfirmInput.value.trim();

    if (passValue !== passConfirmValue ) {
        displayError("Les mots de passe ne correspondent pas",errorIndec);
    } else if(passValue === "") {
        displayError("Le mot de passe ne doit pas être vide",errorIndec);
    } else if(passValue.length < 8){
        displayError("Le mot de passe doit contenir au moins 8 caractères",errorIndec);
    } else {
        clearError();
        this.submit();
    }
    
});
