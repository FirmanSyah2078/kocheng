const categoriesWrapper = document.getElementById("categories-wrapper");
const categoriesButton = categoriesWrapper.querySelector(".categories");
const categoriesArrow = categoriesButton.querySelector(".categories-arrow");
const categoriesOption = categoriesWrapper.querySelector(".categories-option");

categoriesButton.addEventListener("click", () => {
    categoriesWrapper.classList.toggle("menu-open");

    categoriesArrow.classList.toggle("rotate-180");
    categoriesOption.classList.toggle("rounded-b-2xl");
});

const allCartButtons = document.querySelectorAll(".cart-button");

allCartButtons.forEach((cartButton) => {
    const basketIcon = cartButton.querySelector(".basket-icon");
    const pawIcon = cartButton.querySelector(".paw-icon");

    cartButton.addEventListener("click", () => {
        basketIcon.classList.add("scale-0", "opacity-0");

        pawIcon.classList.remove("scale-0", "opacity-0");
        pawIcon.classList.add("scale-200", "opacity-100", "-rotate-12");

        setTimeout(() => {
            pawIcon.classList.remove("scale-200", "opacity-100", "-rotate-12");
            pawIcon.classList.add("scale-0", "opacity-0");

            basketIcon.classList.remove("scale-0", "opacity-0");
        }, 350);
    });
});
