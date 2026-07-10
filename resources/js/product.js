document.addEventListener("DOMContentLoaded", () => {
    const categoriesWrapper = document.querySelector("#categories-wrapper");
    const categoriesButton = categoriesWrapper.querySelector(".categories");
    const categoriesArrow = categoriesButton.querySelector(".categories-arrow");
    const categoriesOption =
        categoriesWrapper.querySelector(".categories-option");

    categoriesButton.addEventListener("click", () => {
        categoriesWrapper.classList.toggle("menu-open");

        categoriesArrow.classList.toggle("rotate-180");
        categoriesOption.classList.toggle("rounded-b-2xl");
    });


    const addedCartIndicator = document.querySelector(".added-cart-indicator");

    if (addedCartIndicator) {
        setTimeout(() => {
            addedCartIndicator.classList.add("success");
        }, 100);

        setTimeout(() => {
            addedCartIndicator.classList.remove("success");
            setTimeout(() => {
                addedCartIndicator.remove();
            }, 500);
        }, 3000);
    }
});
