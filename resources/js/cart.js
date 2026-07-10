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

    window.selectPayment = function (method, element) {
        document.getElementById("selected-payment").value = method;

        const label = element.querySelector("span").innerText;
        document.getElementById("display-payment-method").innerText = label;

        document.querySelectorAll(".payment-option").forEach((btn) => {
            btn.classList.remove("ring-primary", "bg-primary/5");
            btn.classList.add("ring-secondary/30");
        });

        element.classList.remove("ring-secondary/30");
        element.classList.add("ring-primary", "bg-primary/5");
    };
});
