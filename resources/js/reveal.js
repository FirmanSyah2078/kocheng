document.addEventListener("DOMContentLoaded", () => {
    const revealEls = document.querySelectorAll(".reveal");

    if (!revealEls.length) return;

    // Kalau browser gak support IntersectionObserver, langsung tampilkan semua.
    if (!("IntersectionObserver" in window)) {
        revealEls.forEach((el) => el.classList.add("is-visible"));
        return;
    }

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("is-visible");
                    observer.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.15, rootMargin: "0px 0px -60px 0px" }
    );

    revealEls.forEach((el) => observer.observe(el));
});
