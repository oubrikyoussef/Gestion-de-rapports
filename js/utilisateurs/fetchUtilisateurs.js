function displaySearchResults(results) {
    container.innerHTML = "";
    results.forEach(result => {
        const utilisateurDiv = document.createElement("div");
        utilisateurDiv.classList.add("utilisateur", "br-5", "bg-w", "pd-8");

        const headDiv = document.createElement("div");
        headDiv.classList.add("head", "tc", "pd-bt-8", "tc");

        const nameHeading = document.createElement("h3");
        nameHeading.classList.add("box-heading-1");
        nameHeading.textContent = result.Nom + " " + result.Prenom;

        const roleParagraph = document.createElement("p");
        roleParagraph.classList.add("box-paragraph-1");
        roleParagraph.textContent = result.Role;

        headDiv.appendChild(nameHeading);
        headDiv.appendChild(roleParagraph);

        const bodyDiv = document.createElement("div");
        bodyDiv.classList.add("body", "pd-block-8", "border-block-eee");

        const emailDiv = document.createElement("div");
        emailDiv.classList.add("fz-14", "fb");
        emailDiv.textContent = "Email : ";
        const emailSpan = document.createElement("span");
        emailSpan.classList.add("email", "fw-normal");
        emailSpan.textContent = result.Email;
        emailDiv.appendChild(emailSpan);
        
        const filiereDiv = document.createElement("div");
        filiereDiv.classList.add("fz-14", "mb-5", "fb");
        filiereDiv.textContent = "Filiere : ";
        const filiereSpan = document.createElement("span");
        filiereSpan.classList.add("filiere", "fw-normal");
        filiereSpan.textContent = result.Filiere;
        filiereDiv.appendChild(filiereSpan);
        
        
        bodyDiv.appendChild(emailDiv);
        bodyDiv.appendChild(filiereDiv);

        if(result.Niveau){
        const niveauDiv = document.createElement("div");
        niveauDiv.classList.add("fz-14", "mb-5", "fb");
        niveauDiv.textContent = "Niveau : ";
        const niveauSpan = document.createElement("span");
        niveauSpan.classList.add("niveau", "fw-normal");
        niveauSpan.textContent = result.Niveau;
        niveauDiv.appendChild(niveauSpan);
        bodyDiv.appendChild(niveauDiv);
        }

        const footerDiv = document.createElement("div");
        footerDiv.classList.add("footer", "pd-t-8");

        const buttonsDiv = document.createElement("div");
        buttonsDiv.classList.add("buttons");

        const editLink = document.createElement("a");
        editLink.classList.add("info-box", "bg-b", "c-w", "modefier");
        editLink.href = "#";
        editLink.textContent = "Modifier";

        const deleteLink = document.createElement("a");
        deleteLink.classList.add("info-box", "bg-r", "c-w", "supprimer","ml-5");
        deleteLink.href = "#";
        deleteLink.textContent = "Supprimer";

        buttonsDiv.appendChild(editLink);
        buttonsDiv.appendChild(deleteLink);

        footerDiv.appendChild(buttonsDiv);

        utilisateurDiv.appendChild(headDiv);
        utilisateurDiv.appendChild(bodyDiv);
        utilisateurDiv.appendChild(footerDiv);

        container.appendChild(utilisateurDiv);
    });
}
function fetchUtilisateurs() {
    const formData = new FormData(searchForm);
    fetch("./phpActions/utilisateurs/searchutilisateurs.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            displaySearchResults(data);
        })
        .catch(error => console.error("Error:", error));
}
function searchUtilisateurs(event) {
    event.preventDefault();
    fetchUtilisateurs();
}
fetchUtilisateurs();
searchForm.addEventListener("submit",searchUtilisateurs);