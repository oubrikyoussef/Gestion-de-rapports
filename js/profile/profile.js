const changerPass = document.querySelector("a.changer-pass");
const passwordForm = document.getElementById("passwordForm");
const passInput = document.getElementById("pass");
const passConfirmInput = document.getElementById("pass-confirm");
const errorIndec = document.querySelector('.error_indec');
const exit = document.querySelector(".exit");
const passChangeContainer = document.querySelector(".changePass");

setOverlayOnClick(changerPass,overlay);
clearOverlay(passChangeContainer);
clearOverlayOnClick(exit,overlay);

let notifier = new AWN({
    position: "bottom-right", // Set the position of the notifications
    duration: 1000, // Set the duration for which the notifications should be displayed
    labels: {
        tip: "Tip",
        info: "Info",
        success: "Success",
        warning: "Warning",
        alert: "Alert"
    }
});

passwordForm.addEventListener("submit", function (event) {
    event.preventDefault();

    const passValue = passInput.value.trim();
    const passConfirmValue = passConfirmInput.value.trim();


    if (passValue !== passConfirmValue ) {
        errorIndec.textContent = "Les mots de passe ne correspondent pas";
    } else if(passValue === "") {
        errorIndec.textContent = "Le mot de passe ne doit pas être vide";
    } else if(passValue.length < 8){
        errorIndec.textContent = "Le mot de passe doit contenir au moins 8 caractères";
    } else {
        errorIndec.textContent = "";
        // Submit form using AJAX
        const formData = new FormData(this);
        fetch('./phpActions/profile/changePass.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            if(data === 'yes') {
                notifier.success('Mot de passe mis à jour avec succès.')
                setTimeout(() => {
                    window.location.reload(); // Reload the page after 2000 milliseconds (2 seconds)
                }, 2000);
            } else {
                notifier.alert('Erreur lors de la mise à jour du mot de passe.');
            }
        })
        .catch(error => {
            errorIndec.textContent = 'Une erreur s\'est produite : ' + error.message;
        });
    }
});
