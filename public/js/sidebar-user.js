// active window
var path = window.location.pathname;

const links = [
    "dashboard",
    // "order",
    // "planning",
    // "production",
    "inventory",
    // "selling",
    // "return",
    // "cash",
    // "purchase",
];
const pathToLinkMap = {
    "/admin/dashboard": "dashboard",
    "/user/dashboard": "dashboard",
    "/inventory": "inventory",
    // "/planning": "planning",
    "/product": "inventory",
    // "/workforce": "production",
    // "/schedule": "planning",
    // "/cash": "cash",
    // "/report": "cash",
    "/material": "inventory",
    // "/project": "planning",
    // "/machine": "production",
    // "/selling": "selling",
    // "/selling/transaction": "selling",
    // "/selling/item": "selling",
    "/purchase": "inventory",
    "/rejectedproduct": "inventory",
    "/purchase/transaction": "inventory",
    "/purchase/item": "inventory",
    // "/order": "order",
    // "/order/book": "order",
    // "/order/archive": "order",
    // "/customer": "order",
    // "/production": "production",
    // "/production/archive": "production",
    // "/returncustomer": "return",
    // "/returncustomer/archive": "return",
    // "/returnproduction": "return",
    // "/returnproduction/archive": "return",
    // "/returnmaterial": "return",
    // "/returnmaterial/archive": "return",

};

links.forEach((link) => {
    const element = document.getElementById(`${link}-link`);
    if (pathToLinkMap[path] === link) {
        element.classList.add("active");
    } else {
        element.classList.remove("active");
    }
});