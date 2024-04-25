document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent default form submission

    // Get form data
    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value.trim();


    //Get error indecator
    const error_indec = document.querySelector('.error_indec');

    // Check if email and password are filled
    if (email === '' || password === '') {
        // Display error message if any field is empty
        error_indec.textContent = 'Veuillez remplir tous les champs.';
        return; // Stop further execution
    }

    // Check if email is of the correct format
    if (!email.endsWith('@edu.uiz.ac.ma')) {
        // Display error message for incorrect email format
        error_indec.textContent = 'Veuillez saisir le mail éducatif.';
        return; // Stop further execution
    }

    // All fields are filled and email format is correct, proceed with form submission

    // Create FormData object and append form data
    const formData = new FormData(this);

    // Send form data to server using Fetch
    fetch('../../phpActions/login/validateLogin.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // If login is successful, redirect to index.php
            window.location.href = '../../index.php';
        } else {
            // If login fails, display error message
            error_indec.textContent = data.message;
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
});
