$(document).ready(function () {
    const token = localStorage.getItem('access_token');
    if (!token) {
        window.location.href = '/login';
        return;
    }

    // Set up global AJAX settings to include the token in the headers
    $.ajaxSetup({
        headers: {
            'Authorization': `Bearer ${token}`
        }
    });
    $(".nav-link a").each(function() {
        const targetUrl = $(this).attr('href');
        $(this).attr('href', targetUrl + "?token=" + token);
    });

    // Handle the active state of sidebar links
    var path = window.location.pathname;

    const links = [
        "dashboard",
        "partial",
        "order",
        "planning",
        "production",
        "inventory",
        "selling",
        "return",
        // "cash",
        // "purchase",
    ];

    const pathToLinkMap = {
        "/admin/dashboard": "dashboard",
        "/admin/partialdropdown": "partial",
        // "/user/dashboard": "dashboard",
        "/admin/inventory": "inventory",
        "/admin/planning": "planning",
        "/admin/product": "inventory",
        "/admin/workforce": "production",
        "/admin/schedule": "planning",
        // "/admin/cash": "cash",
        // "/admin/report": "cash",
        "/admin/material": "inventory",
        "/admin/project": "planning",
        "/admin/machine": "production",
        "/admin/selling": "selling",
        "/admin/selling/transaction": "selling",
        "/admin/selling/item": "selling",
        "/admin/purchase": "inventory",
        "/admin/rejectedproduct": "inventory",
        "/admin/purchase/transaction": "inventory",
        "/admin/purchase/item": "inventory",
        "/admin/order": "order",
        "/admin/order/book": "order",
        "/admin/order/archive": "order",
        "/admin/customer": "order",
        "/admin/catalog": "order",
        "/admin/production": "production",
        "/admin/production/archive": "production",
        "/admin/returncustomer": "return",
        "/admin/returncustomer/archive": "return",
        "/admin/returnproduction": "return",
        "/admin/returnproduction/archive": "return",
        "/admin/returnmaterial": "return",
        "/admin/returnmaterial/archive": "return",
    };

    links.forEach((link) => {
        const element = document.getElementById(`${link}-link`);
        if (pathToLinkMap[path] === link) {
            element.classList.add("active");
        } else {
            element.classList.remove("active");
        }
    });
});
