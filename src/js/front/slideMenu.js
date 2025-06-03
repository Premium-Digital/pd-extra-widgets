export const slideMenu = () => {
    document.addEventListener("click", (e) => {
        const btnOpen = e.target.closest(".submenu-toggle");
        const btnClose = e.target.closest(".submenu-back");

        if (btnOpen) {
            e.preventDefault();
            const wrapper = btnOpen.closest("li").querySelector(".submenu-wrapper");
            if (!wrapper) {
                return;
            }

            wrapper.classList.toggle("open");
            console.log('abc');
        }

        if (btnClose) {
            e.preventDefault();
            console.log('close');
            const wrapper = btnClose.closest(".submenu-wrapper");
            wrapper.classList.remove("open");
        }

    });
}