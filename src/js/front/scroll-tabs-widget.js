export function initScrollTabsWidget() {
  const widgets = document.querySelectorAll('.scroll-tabs-widget.layout-two-columns');

  widgets.forEach(widget => {
    const tabItems = widget.querySelectorAll('.tab-item');
    const tabImage = widget.querySelector('.tab-image');

    tabItems.forEach(tab => {
      tab.addEventListener('click', () => {
        // Usuń active ze wszystkich tabów
        tabItems.forEach(t => t.classList.remove('active'));

        // Ustaw active na klikniętym tabie
        tab.classList.add('active');

        // Pobierz URL obrazka z data-image
        const imageSrc = tab.dataset.image;

        // Podmień src obrazka jeśli jest
        if (imageSrc && tabImage) {
          tabImage.src = imageSrc;
        }
      });
    });
  });
}
