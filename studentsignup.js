document.addEventListener('DOMContentLoaded', function () {
    const loginForm = document.getElementById('loginForm');
    const signupForm = document.getElementById('signupForm');
    const showSignupForm = document.getElementById('showSignupForm');
    const showLoginForm = document.getElementById('showLoginForm');
    const loginContainer = document.getElementById('loginFormContainer');
    const signupContainer = document.getElementById('signupFormContainer');

    if (loginForm) {
        loginForm.addEventListener('submit', function (event) {
            event.preventDefault();
            const studentId = document.getElementById('loginStudentId').value;
            const password = document.getElementById('loginPassword').value;

            fetch('student.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: new URLSearchParams({
                    'loginStudentId': studentId,
                    'loginPassword': password
                })
            })
            .then(response => response.text())
            .then(data => {
                if (data.includes('Invalid Student ID or Password!')) {
                    document.getElementById('login-error-message').textContent = 'Invalid Student ID or Password!';
                } else {
                    window.location.href = 'student.html';
                }
            });
        });
    }

    if (signupForm) {
        signupForm.addEventListener('submit', function (event) {
            event.preventDefault();
            const studentName = document.getElementById('studentName').value;
            const studentId = document.getElementById('studentId').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;

            if (password !== confirmPassword) {
                document.getElementById('signup-error-message').textContent = 'Passwords do not match!';
                return;
            }

            fetch('studentportal.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: new URLSearchParams({
                    'studentName': studentName,
                    'studentId': studentId,
                    'email': email,
                    'password': password,
                    'confirmPassword': confirmPassword
                })
            })
            .then(response => response.text())
            .then(data => {
                if (data.includes('Passwords do not match!')) {
                    document.getElementById('signup-error-message').textContent = 'Passwords do not match!';
                } else if (data.includes('Sign Up successful!')) {
                    document.getElementById('signup-success-message').innerHTML = 'Sign Up successful! You can now <a href="#" id="showLoginForm">Login</a>.';
                } else {
                    document.getElementById('signup-error-message').textContent = 'Error: ' + data;
                }
            });
        });
    }

    if (showSignupForm) {
        showSignupForm.addEventListener('click', function () {
            loginContainer.style.display = 'none';
            signupContainer.style.display = 'block';
        });
    }

    if (showLoginForm) {
        showLoginForm.addEventListener('click', function () {
            loginContainer.style.display = 'block';
            signupContainer.style.display = 'none';
        });
    }
});
