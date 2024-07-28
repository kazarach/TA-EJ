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
        "selling",
        "return",
        // "cash",
        // "purchase",
    ];

    const pathToLinkMap = {
        "/marketing/dashboard": "dashboard",
        "/marketing/partialdropdown": "partial",
        // "/user/dashboard": "dashboard",
        "/marketing/inventory": "inventory",
        "/marketing/planning": "planning",
        "/marketing/product": "inventory",
        "/marketing/workforce": "production",
        "/marketing/schedule": "planning",
        // "/marketing/cash": "cash",
        // "/marketing/report": "cash",
        "/marketing/material": "inventory",
        "/marketing/project": "planning",
        "/marketing/machine": "production",
        "/marketing/selling": "selling",
        "/marketing/selling/transaction": "selling",
        "/marketing/selling/item": "selling",
        "/marketing/purchase": "inventory",
        "/marketing/rejectedproduct": "inventory",
        "/marketing/purchase/transaction": "inventory",
        "/marketing/purchase/item": "inventory",
        "/marketing/order": "order",
        "/marketing/order/book": "order",
        "/marketing/order/archive": "order",
        "/marketing/customer": "order",
        "/marketing/catalog": "order",
        "/marketing/production": "production",
        "/marketing/production/archive": "production",
        "/marketing/returncustomer": "return",
        "/marketing/returncustomer/archive": "return",
        "/marketing/returnproduction": "return",
        "/marketing/returnproduction/archive": "return",
        "/marketing/returnmaterial": "return",
        "/marketing/returnmaterial/archive": "return",
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
