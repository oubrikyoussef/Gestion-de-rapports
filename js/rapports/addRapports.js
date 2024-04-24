clearOverlay(addRapportFormContainer);
setOverlayOnClick(addRapport,overlay);
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
    } else if (description.length > 200) {
        document.querySelector('.error-indec-description').textContent = 'La description ne doit pas dépasser 200 caractères';
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
    errorIndecs.forEach((errorIndec)=>{
        errorIndec.textContent = "";
    })
    if (!hasErrors) {
        try {
            const formData = new FormData(addRapportForm);

            const response = await fetch('../../phpActions/rapports/addRapport.php', {
                method: 'POST',
                body: formData
            });
            const responseData = await response.json();

            // Use the notifier to display messages
            if (responseData.error) {
                notifier.alert(responseData.error);
            } else {
                notifier.success(responseData.message);
                setTimeout(() => {
                    window.location.reload(); // Reload the page after 2000 milliseconds (2 seconds)
                }, 2000);
            }
        } catch (error) {
            console.error('Error:', error);
        }
    }
});
