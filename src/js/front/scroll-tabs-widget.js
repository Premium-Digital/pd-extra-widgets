export function initScrollTabsScrollNavigation() {
  const widgets = document.querySelectorAll('.scroll-tabs-widget');

  widgets.forEach(widget => {
    const tabItems = widget.querySelectorAll('.tab-item');
    const tabImage = widget.querySelector('.tab-image');

    const animationDuration = parseInt(widget.dataset.animationDuration) || 600;

    let activeIndex = 0;
    let isAnimating = false;

    const isWidgetCentered = () => {
      const rect = widget.getBoundingClientRect();
      const viewportMiddle = window.innerHeight / 2;
      return rect.top < viewportMiddle + 50 && rect.bottom > viewportMiddle - 50;
    };

    const scrollHandler = e => {
      if (!isWidgetCentered()) return;

      if (isAnimating) {
        e.preventDefault();
        return;
      }

      const direction = e.deltaY > 0 ? 'down' : 'up';
      const maxIndex = tabItems.length - 1;

      // Jeśli jesteśmy na pierwszym tabie i scrollujemy w górę - pozwól scrollować stronę
      if (activeIndex === 0 && direction === 'up') return;

      // Jeśli jesteśmy na ostatnim tabie i scrollujemy w dół - pozwól scrollować stronę
      if (activeIndex === maxIndex && direction === 'down') return;

      e.preventDefault();

      const nextIndex = direction === 'down' ? activeIndex + 1 : activeIndex - 1;
      if (nextIndex >= 0 && nextIndex <= maxIndex) {
        changeTab(nextIndex);
      }
    };

    const changeTab = newIndex => {
      isAnimating = true;

      // Update active class
      tabItems.forEach((item, i) => {
        item.classList.toggle('active', i === newIndex);
      });

      const newSrc = tabItems[newIndex].dataset.image;
      if (newSrc && tabImage) {
        // Reset animacji, żeby mogła odpalić od nowa
        tabImage.style.animation = 'none';
        tabImage.offsetHeight; // wymusz repaint
        tabImage.style.removeProperty('animation');

        tabImage.style.setProperty('--animation-duration', animationDuration + 'ms');

        // Zmień obraz
        tabImage.src = newSrc;
      }

      activeIndex = newIndex;

      setTimeout(() => {
        // Po zakończeniu animacji resetujemy flagę
        isAnimating = false;
      }, animationDuration);
    };

    window.addEventListener('wheel', scrollHandler, { passive: false });
  });
}
