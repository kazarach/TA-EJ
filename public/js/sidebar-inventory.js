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
        // "order",
        // "planning",
        // "production",
        "inventory",
        // "selling",
        "return",
        // "cash",
        // "purchase",
    ];

    const pathToLinkMap = {
        "/inventory/dashboard": "dashboard",
        // "/user/dashboard": "dashboard",
        "/inventory/inventory": "inventory",
        "/inventory/planning": "planning",
        "/inventory/product": "inventory",
        "/inventory/workforce": "production",
        "/inventory/schedule": "planning",
        // "/inventory/cash": "cash",
        // "/inventory/report": "cash",
        "/inventory/material": "inventory",
        "/inventory/project": "planning",
        "/inventory/machine": "production",
        "/inventory/selling": "selling",
        "/inventory/selling/transaction": "selling",
        "/inventory/selling/item": "selling",
        "/inventory/purchase": "inventory",
        "/inventory/rejectedproduct": "inventory",
        "/inventory/purchase/transaction": "inventory",
        "/inventory/purchase/item": "inventory",
        "/inventory/order": "order",
        "/inventory/order/book": "order",
        "/inventory/order/archive": "order",
        "/inventory/customer": "order",
        "/inventory/production": "production",
        "/inventory/production/archive": "production",
        "/inventory/returncustomer": "return",
        "/inventory/returncustomer/archive": "return",
        "/inventory/returnproduction": "return",
        "/inventory/returnproduction/archive": "return",
        "/inventory/returnmaterial": "return",
        "/inventory/returnmaterial/archive": "return",
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
