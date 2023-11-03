// registration.js

document.addEventListener('DOMContentLoaded', function() {
    var form = document.getElementById('registration-form');
    var errorContainer = document.getElementById('flashMessage');

    form.addEventListener('submit', function(event) {
        errorContainer.textContent = '';
        errorContainer.style.display = 'none';

        var name = form.elements['data[User][name]'].value;
        var email = form.elements['data[User][email]'].value;
        var password = form.elements['data[User][password]'].value;
        var confirmPassword = form.elements['data[User][confirm_password]'].value;

        if (name.trim() === '') {
            errorContainer.textContent = 'Please enter your name.';
            errorContainer.style.display = 'block';
            event.preventDefault();
            return;
        }

        if (!isValidEmail(email)) {
            errorContainer.textContent = 'Please enter a valid email address.';
            errorContainer.style.display = 'block';
            event.preventDefault();
            return;
        }

        if (name.length < 5 || name.length > 20) {
            errorContainer.textContent = 'Name is required and should be 5-20 characters.';
            errorContainer.style.display = 'block';
            event.preventDefault();
            return;
        }

        if (password !== confirmPassword) {
            errorContainer.textContent = 'Passwords do not match.';
            errorContainer.style.display = 'block';
            event.preventDefault();
            return;
        }
    });

    function isValidEmail(email) {
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
});
