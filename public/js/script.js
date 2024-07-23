
// dark mode
const body = document.querySelector("body"),
    sidebar = body.querySelector(".sidebar"),
    modeSwitch = body.querySelector(".toggle-switch"),
    modeText = body.querySelector(".mode-text");

// modeSwitch.addEventListener("click", () => {
//     body.classList.toggle("dark");

//     if (body.classList.contains("dark")) {
//         modeText.innerText = "Light Mode";
//     } else {
//         modeText.innerText = "Dark Mode";
//     }
// });

// sidebar mouse pointer
document.querySelector(".sidebar").addEventListener("mouseenter", function () {
    this.classList.remove("close");
});

document.querySelector(".sidebar").addEventListener("mouseleave", function () {
    this.classList.add("close");
});

// Sub-menu toggle
function toggleSubMenu(event) {
    event.preventDefault();
    const dropdown = event.currentTarget.closest(".dropdown");
    dropdown.classList.toggle("active");
}

document.querySelectorAll(".dropdown > a").forEach((link) => {
    link.addEventListener("click", toggleSubMenu);
});

// modal function
function myFunction() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}

// filterselection
filterSelection("all");
function filterSelection(c) {
    var x, i;
    x = document.getElementsByClassName("filterDiv");
    if (c == "all") c = "";
    // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
    for (i = 0; i < x.length; i++) {
        w3RemoveClass(x[i], "show");
        if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
    }
}

// Show filtered elements
function w3AddClass(element, name) {
    var i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
        if (arr1.indexOf(arr2[i]) == -1) {
            element.className += " " + arr2[i];
        }
    }
}

// Hide elements that are not selected
function w3RemoveClass(element, name) {
    var i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
        while (arr1.indexOf(arr2[i]) > -1) {
            arr1.splice(arr1.indexOf(arr2[i]), 1);
        }
    }
    element.className = arr1.join(" ");
}

function changeTextColor() {
    // Select all input fields
    var inputControl = document.querySelectorAll(".form-control");
    var inputSelect = document.querySelectorAll(".select2-selection__rendered");
    var inputID = document.querySelectorAll("#ID");

    // Loop through each input field and change text color
    inputControl.forEach(function (field) {
        field.style.color = "black"; // Change to whatever color you want
    });
    inputSelect.forEach(function (field) {
        field.style.color = "black"; // Change to whatever color you want
    });
    inputID.forEach(function (field) {
        field.style.color = "white"; // Change to whatever color you want
    });
    inputSelect.forEach(function (field) {
        field.style.cssText = "color: black !important;";
    });
}
