const overlay = document.querySelector(".overlay");

function verifyDate(date,errorIndec){
    let regex = /^\d{4}-\d{1,2}-\d{1,2}$/;
    if (!regex.test(date)) {
        displayError("Date format should be YYYY-MM-DD",errorIndec);
        return false;
    }
    let parts = date.split('-');
    let year = parseInt(parts[0]);
    let month = parseInt(parts[1]);
    let day = parseInt(parts[2]);
    if (isNaN(year) || isNaN(month) || isNaN(day) || month < 1 || month > 12 || day < 1 || day > 31) {
        displayError("Invalid date values",errorIndec);
        return false;
    }
    return true;
}

function displayError(message,where) {
    where.textContent = message;
    where.style.opacity = 1;
    search.classList.add('error');
}

function clearError(from) {
    from.textContent = '';
    from.style.opacity = 0;
    search.classList.remove('error');
}

function setOverlayOnClick(button,overlay){
    button.addEventListener('click', function (event) {
        event.preventDefault();
        document.body.style.overflow = "hidden";
        overlay.style.display = "block";
    });
}


function clearOverlayOnClick(button,overlay){
    button.addEventListener('click', function(event) {
        event.preventDefault();
        overlay.style.display = "none";
        document.body.style.overflow = "auto";
      });      
}

function clearOverlay(formContainer){
    overlay.addEventListener("click", (event) => {
        if (!formContainer.contains(event.target)) {
            overlay.style.display = 'none';
            document.body.style.overflow = "auto";
        }
    });
}