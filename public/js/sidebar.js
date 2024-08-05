        document.addEventListener("DOMContentLoaded", function() {
        const token = localStorage.getItem('access_token'); // Or wherever you store the JWT token

        if (token) {
            axios.get('/api/user', {
                headers: {
                    'Authorization': `Bearer ${token}`
                }
            })
            .then(response => {
                const user = response.data;
                console.log(user);

                const userRoles = user.roles.map(role => role.name); // Extract role names

                if (userRoles.includes('admin')) {
                    $('#sidebar').load('/partials/sidebar-admin');
                } else if (userRoles.includes('user')) {
                    $('#sidebar').load('/partials/sidebar-user');
                } else if (userRoles.includes('production')) {
                    $('#sidebar').load('/partials/sidebar-production');
                } else if (userRoles.includes('inventory')) {
                    $('#sidebar').load('/partials/sidebar-inventory');
                } else if (userRoles.includes('marketing')) {
                    $('#sidebar').load('/partials/sidebar-marketing');
                }
            })
            .catch(error => {
                console.error('Error fetching user data:', error);
                // Handle error (e.g., redirect to login)
            });
        } else {
            console.error('No JWT token found');
            // Handle missing token (e.g., redirect to login)
        }
    });