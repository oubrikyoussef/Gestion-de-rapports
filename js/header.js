// Get the current page URL
var currentPagePath = window.location.pathname;
// Get all the links in the navigation menu
var navLinks = document.querySelectorAll('.main-ul li a');

// Loop through each link and check if its href matches the current page URL
navLinks.forEach(function(link) {
    var linkPath = link.getAttribute('href').replace(/^(\.\.\/|\.\.\/)/, '/');
    if (linkPath === currentPagePath) {
        // Add the "active" class to the link if its href matches the current page URL
        link.classList.add('active');
    }
});
