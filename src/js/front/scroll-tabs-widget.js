export function initScrollTabsScrollNavigation() {
  const widgets = document.querySelectorAll('.scroll-tabs-widget');

  widgets.forEach(widget => {
    const tabItems = widget.querySelectorAll('.tab-item');
    const tabImage = widget.querySelector('.tab-image');
    const animationDuration = parseInt(widget.dataset.animationDuration) || 600;

    let activeIndex = 0;
    let isAnimating = false;
    let touchStartY = 0;
    let touchEndY = 0;
    let isScrollLocked = false; // nowa flaga blokująca szybki scroll

    const maxIndex = tabItems.length - 1;

    const isWidgetCentered = () => {
      const rect = widget.getBoundingClientRect();
      const viewportMiddle = window.innerHeight / 2;
      return rect.top < viewportMiddle + 50 && rect.bottom > viewportMiddle - 50;
    };

    const scrollToWidget = () => {
      const rect = widget.getBoundingClientRect();
      const scrollY = window.scrollY || window.pageYOffset;
      const targetScroll = scrollY + rect.top - (window.innerHeight / 2 - rect.height / 2);

      window.scrollTo({
        top: targetScroll,
        behavior: 'smooth',
      });
    };

    const changeTab = newIndex => {
      isAnimating = true;

      tabItems.forEach((item, i) => {
        item.classList.toggle('active', i === newIndex);
      });

      const newSrc = tabItems[newIndex].dataset.image;
      if (newSrc && tabImage) {
        tabImage.style.animation = 'none';
        tabImage.offsetHeight;
        tabImage.style.removeProperty('animation');
        tabImage.style.setProperty('--animation-duration', animationDuration + 'ms');
        tabImage.src = newSrc;
      }

      activeIndex = newIndex;

      setTimeout(() => {
        isAnimating = false;
        isScrollLocked = false; // po animacji odblokuj scroll
      }, animationDuration);
    };

    const scrollHandler = e => {
      if (!isWidgetCentered()) return;
      if (isAnimating || isScrollLocked) {
        e.preventDefault();
        scrollToWidget(); // wymuś scroll do widgetu, żeby się nie "rozjechało"
        return;
      }

      const direction = e.deltaY > 0 ? 'down' : 'up';

      if ((activeIndex === 0 && direction === 'up') || (activeIndex === maxIndex && direction === 'down')) {
        return;
      }

      e.preventDefault();

      const nextIndex = direction === 'down' ? activeIndex + 1 : activeIndex - 1;
      if (nextIndex >= 0 && nextIndex <= maxIndex) {
        isScrollLocked = true;  // blokada szybkiego scrolla
        changeTab(nextIndex);
        scrollToWidget();
      }
    };

    // Kliknięcia
    tabItems.forEach((item, index) => {
      item.addEventListener('click', () => {
        if (index !== activeIndex && !isAnimating) {
          changeTab(index);
          scrollToWidget();
        }
      });
    });

    // Obsługa touch (swipe)
    const touchStartHandler = e => {
      touchStartY = e.touches[0].clientY;
    };

    const touchMoveHandler = e => {
      if (!isWidgetCentered()) return;

      touchEndY = e.touches[0].clientY;
      const deltaY = touchStartY - touchEndY;

      const scrollingDown = deltaY > 0;
      const scrollingUp = deltaY < 0;

      if (
        (scrollingDown && activeIndex < maxIndex) ||
        (scrollingUp && activeIndex > 0)
      ) {
        e.preventDefault();
      }
    };

    const touchEndHandler = () => {
      if (!isWidgetCentered() || isAnimating || isScrollLocked) return;

      const deltaY = touchStartY - touchEndY;

      if (Math.abs(deltaY) > 30) {
        if (deltaY > 0 && activeIndex < maxIndex) {
          isScrollLocked = true;
          changeTab(activeIndex + 1);
          scrollToWidget();
        } else if (deltaY < 0 && activeIndex > 0) {
          isScrollLocked = true;
          changeTab(activeIndex - 1);
          scrollToWidget();
        }
      }

      touchStartY = 0;
      touchEndY = 0;
    };

    window.addEventListener('wheel', scrollHandler, { passive: false });
    window.addEventListener('touchstart', touchStartHandler, { passive: false });
    window.addEventListener('touchmove', touchMoveHandler, { passive: false });
    window.addEventListener('touchend', touchEndHandler, { passive: false });
  });
}
