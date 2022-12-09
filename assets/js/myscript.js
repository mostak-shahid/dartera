// Cookie popup


const agreeBtn = document.getElementById("agree-btn");

setTimeout(() => {
    $(".cookie-popup").removeClass("hide");
}, 3000);


$('#agreeBtn').click(function () {
    cookieContainer.addClass("hide");
});






// Filterable portfolio 

const filterNav = document.querySelector(".filter-nav"),
    filterableItems = document.querySelectorAll(".filterable-item");



$(".filter-nav").click(function (event) {
    if (event.target.find("filter-nav-item")) {

        // deactivate existing active 'filter-item'
        filterNav.querySelector(".active").removeClass("active");

        // activate new 'filter-item'
        event.target.addClass("active");

        const filterValue = event.target.getAttribute("data-filter");

        filterableItems.forEach((item) => {
            if (item.find(filterValue) || filterValue === "all") {
                item.removeClass("hide");
                item.addClass("show");
            } else {
                item.removeClass("show");
                item.addClass("hide");
            }
        });
    }
});