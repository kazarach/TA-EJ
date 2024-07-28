$(document).ready(function () {
    const token = localStorage.getItem('access_token');
    if (!token) {
        window.location.href = '/login';
        return;
    }

    // Append token to all sidebar links
    $(".nav-link a").each(function() {
        const targetUrl = $(this).attr('href');
        $(this).attr('href', targetUrl + "?token=" + token);
    });

    // Handle the active state of sidebar links
    var path = window.location.pathname;

    const links = [
        "dashboard",
        "order",
        "planning",
        "production",
        "inventory",
        // "selling",
        // "return",
        // "cash",
        // "purchase",
    ];

    const pathToLinkMap = {
        "/production/dashboard": "dashboard",
        // "/user/dashboard": "dashboard",
        "/production/inventory": "inventory",
        "/production/planning": "planning",
        "/production/product": "inventory",
        "/production/workforce": "production",
        "/production/schedule": "planning",
        // "/production/cash": "cash",
        // "/production/report": "cash",
        "/production/material": "inventory",
        "/production/project": "planning",
        "/production/machine": "production",
        "/production/selling": "selling",
        "/production/selling/transaction": "selling",
        "/production/selling/item": "selling",
        "/production/purchase": "inventory",
        "/production/rejectedproduct": "inventory",
        "/production/purchase/transaction": "inventory",
        "/production/purchase/item": "inventory",
        "/production/order": "order",
        "/production/order/book": "order",
        "/production/order/archive": "order",
        "/production/customer": "order",
        "/production/production": "production",
        "/production/production/archive": "production",
        "/production/returncustomer": "return",
        "/production/returncustomer/archive": "return",
        "/production/returnproduction": "return",
        "/production/returnproduction/archive": "return",
        "/production/returnmaterial": "return",
        "/production/returnmaterial/archive": "return",
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
