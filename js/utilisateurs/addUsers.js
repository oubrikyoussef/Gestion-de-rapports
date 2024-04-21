setOverlayOnClick(addUser,overlay);

addUserForm.addEventListener("submit",async (event) => {
    event.preventDefault();
    
    let hasErrors = false;

    fields.forEach((field) => {
        const input = document.getElementById(field.id);
        const errorParagraph = document.querySelector(`.error-indec-${field.id}`);
        if (field.id === "nom" || field.id === "prenom" || field.id === "filiere") {
            if (!regEx.test(input.value)) {
                errorParagraph.textContent = field.errorMessage;
                hasErrors = true;
            } else {
                errorParagraph.textContent = "";
            }
        }
        else if (field.id === "email") {
            if (!emailRegEx.test(input.value)) {
                errorParagraph.textContent = field.errorMessage;
                hasErrors = true;
            } else {
                errorParagraph.textContent = "";
            }
        } else if (field.id === "password") {
            if (input.value.length < 8) {
                errorParagraph.textContent = field.errorMessage;
                hasErrors = true;
            } else {
                errorParagraph.textContent = "";
            }
        }
    });


    if (!hasErrors) {
        try {
            const response = await fetch(addUserForm.action, {
                method: 'POST',
                body: new FormData(addUserForm)
            });
            const responseData = await response.json();
            if (responseData.error) {
                alert(responseData.error);
            } else {
                alert(responseData.message);
                window.location.reload();
            }
        } catch (error) {
            console.error('Error:', error);
            alert('An error occurred while processing your request.');
        }
    }
});


const statusSelect = document.getElementById("status-options");
const niveauDiv = document.querySelector(".niveau");

statusSelect.addEventListener("change", (event) => {
    if (event.target.value === "etudiant") {
        niveauDiv.style.display = "block";
    } else {
        niveauDiv.style.display = "none";
    }
});
