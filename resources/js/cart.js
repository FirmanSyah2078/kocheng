
document.addEventListener("DOMContentLoaded", () => {

    const cartWrapper = document.querySelector("#cart-wrapper");

    if (cartWrapper) {
        cartWrapper.addEventListener("mouseenter", () => {
            cartWrapper.classList.add("menu-open");
        });

        cartWrapper.addEventListener("mouseleave", () => {
            cartWrapper.classList.remove("menu-open");
        });
    }

});