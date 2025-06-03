export const slideMenu = () => {
    document.addEventListener("click", (e) => {
        const btnOpen = e.target.closest(".--open-submenu");
        const btnClose = e.target.closest(".submenu-back");

        if (btnOpen) {
            e.preventDefault();
            const wrapper = btnOpen.closest("li").querySelector(".submenu-wrapper");
            if (!wrapper) {
                return;
            }

            wrapper.classList.toggle("open");
        }

        if (btnClose) {
            e.preventDefault();
            const wrapper = btnClose.closest(".submenu-wrapper");
            wrapper.classList.remove("open");
        }

    });
}