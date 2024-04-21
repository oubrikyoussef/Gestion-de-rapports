clearOverlay(addRapportFormContainer);
setOverlayOnClick(addRapport,overlay);
addRapportForm.addEventListener('submit', async (event) => {
    event.preventDefault();
 
    const titre = document.getElementById('titre').value.trim();
    const description = document.getElementById('description').value.trim();
    const rapportFile = document.getElementById('rapport').files[0];

    let hasErrors = false;

    if (!titre) {
        document.querySelector('.error-indec-titre').textContent = 'Le titre est obligatoire';
        hasErrors = true;
    }

    if (!description) {
        document.querySelector('.error-indec-description').textContent = 'La description est obligatoire';
        hasErrors = true;
    }

    if (!rapportFile) {
        document.querySelector('.error-indec-rapport').textContent = 'Le fichier rapport est obligatoire';
        hasErrors = true;
    } else {
        const allowedTypes = ['application/pdf', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
        if (!allowedTypes.includes(rapportFile.type)) {
            document.querySelector('.error-indec-rapport').textContent = 'Seules les formats pdf et docx sont accpetés';
            hasErrors = true;
        }

        const maxSize = 20 * 1024 * 1024; // 20MB
        if (rapportFile.size > maxSize) {
            document.querySelector('.error-indec-rapport').textContent = 'File size must be less than 20MB';
            hasErrors = true;
        }
    }

    if (!hasErrors) {
        try {
            const formData = new FormData(addRapportForm);

            const response = await fetch('./phpActions/rapports/addRapport.php', {
                method: 'POST',
                body: formData
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
