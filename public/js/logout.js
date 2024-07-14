document.getElementById('logout-button').addEventListener('click', function (event) {
    event.preventDefault();

    // Get the token from local storage
    const token = localStorage.getItem('access_token');

    // Perform the logout request
    axios.post('/api/logout', {}, {
        headers: {
            'Authorization': `Bearer ${token}`
        }
    })
    .then(function (response) {
        console.log('Logged out successfully:', response.data);

        // Remove the token from local storage
        localStorage.removeItem('access_token');
        localStorage.removeItem('role');

        // Redirect to login page
        window.location.href = '/login';
    })
    .catch(function (error) {
        console.error('Logout failed:', error.response);

        // Check if the error response has data and error properties
        if (error.response && error.response.data && error.response.data.error) {
            alert('Logout failed: ' + error.response.data.error);
        } else {
            alert('Logout failed: An unknown error occurred.');
        }
    });
});
