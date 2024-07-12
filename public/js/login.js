const container = document.getElementById("container");
const registerBtn = document.getElementById("register");
const loginBtn = document.getElementById("login");
const loginForm = document.getElementById("login-form");

// registerBtn.addEventListener("click", () => {
//     container.classList.add("active");
// });

// toggle password
const togglePassword = document.getElementById('togglePassword');
        const password = document.getElementById('password');

        togglePassword.addEventListener('click', function (e) {
            // Toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // Toggle the eye icon
            this.classList.toggle('fa-eye-slash');
        });

loginBtn.addEventListener("click", () => {
    container.classList.remove("active");
});

loginForm.addEventListener("submit", function(event) {
    event.preventDefault();

    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    axios.post('/api/login', {
        username: username,
        password: password
    })
    .then(function (response) {
        const token = response.data.access_token;
        const role = response.data.role;
        localStorage.setItem('access_token', token);
        localStorage.setItem('role', role); // Save role in localStorage
        window.location.href = '/dashboard';
    })
    
    .catch(function (error) {
        console.error('There was an error logging in:', error);
        alert('Login failed: ' + error.response.data.error);
    });
});
