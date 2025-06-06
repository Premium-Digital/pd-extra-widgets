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
    let isScrollLocked = false;

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
        isScrollLocked = false;
      }, animationDuration);
    };

    const scrollHandler = e => {
      if (!isWidgetCentered()) return;
      if (isAnimating || isScrollLocked) {
        e.preventDefault();
        scrollToWidget();
        return;
      }

      const direction = e.deltaY > 0 ? 'down' : 'up';

      if ((activeIndex === 0 && direction === 'up') || (activeIndex === maxIndex && direction === 'down')) {
        return;
      }

      e.preventDefault();

      const nextIndex = direction === 'down' ? activeIndex + 1 : activeIndex - 1;
      if (nextIndex >= 0 && nextIndex <= maxIndex) {
        isScrollLocked = true;
        changeTab(nextIndex);
        scrollToWidget();
      }
    };

    tabItems.forEach((item, index) => {
      item.addEventListener('click', () => {
        if (index !== activeIndex && !isAnimating) {
          changeTab(index);
          scrollToWidget();
        }
      });
    });

    const touchStartHandler = e => {
      touchStartY = e.touches[0].clientY;
    };

    const touchMoveHandler = e => {
      if (!isWidgetCentered()) return;

      touchEndY = e.touches[0].clientY;
      const deltaY = touchStartY - touchEndY;

      const scrollingDown = deltaY > 0;
      const scrollingUp = deltaY < 0;

      const canScrollTabs =
        (scrollingDown && activeIndex < maxIndex) ||
        (scrollingUp && activeIndex > 0);

      if (canScrollTabs) {
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
    widget.addEventListener('touchstart', touchStartHandler, { passive: true });
    widget.addEventListener('touchmove', touchMoveHandler, { passive: false });
    widget.addEventListener('touchend', touchEndHandler, { passive: true });
  });

  let globalTouchStartY = 0;
let globalTouchEndY = 0;
let globalTouchedWidget = null;

window.addEventListener('touchstart', e => {
  globalTouchStartY = e.touches[0].clientY;

  const target = e.target;
  globalTouchedWidget = target.closest('.scroll-tabs-widget');
}, { passive: true });

window.addEventListener('touchmove', e => {
  if (!globalTouchedWidget) return;

  const rect = globalTouchedWidget.getBoundingClientRect();
  const viewportMiddle = window.innerHeight / 2;
  const isCentered = rect.top < viewportMiddle + 50 && rect.bottom > viewportMiddle - 50;
  if (!isCentered) return;

  globalTouchEndY = e.touches[0].clientY;
  const deltaY = globalTouchStartY - globalTouchEndY;

  const tabItems = globalTouchedWidget.querySelectorAll('.tab-item');
  const activeIndex = Array.from(tabItems).findIndex(item => item.classList.contains('active'));
  const maxIndex = tabItems.length - 1;

  const scrollingDown = deltaY > 0;
  const scrollingUp = deltaY < 0;

  const canScrollTabs =
    (scrollingDown && activeIndex < maxIndex) ||
    (scrollingUp && activeIndex > 0);

  if (canScrollTabs) {
    e.preventDefault();
  }
}, { passive: false });

window.addEventListener('touchend', () => {
  globalTouchedWidget = null;
});

}

export function initScrollTabsDescription(widgetElement = document) {
  const widgets = widgetElement.querySelectorAll('.scroll-tabs-widget');

  widgets.forEach(widget => {
    const descriptionModeClass = Array.from(widget.classList).find(cls =>
      cls.startsWith('description-')
    );

    const items = widget.querySelectorAll('.tab-item');

    items.forEach(item => {
      const paragraph = item.querySelector('p');

      const expand = () => {
        paragraph.classList.add('expanded');
        paragraph.style.maxHeight = paragraph.scrollHeight + 'px';
      };

      const collapse = () => {
        paragraph.classList.remove('expanded');
        paragraph.style.maxHeight = '0';
      };

      // Always visible
      if (descriptionModeClass === 'description-normal') {
        expand();
      }

      // On hover
      if (descriptionModeClass === 'description-hover') {
        item.addEventListener('mouseenter', expand);
        item.addEventListener('mouseleave', collapse);
      }

      // On hover and active
      if (descriptionModeClass === 'description-hover_active') {
        if (item.classList.contains('active')) {
          expand();
        }

        item.addEventListener('mouseenter', expand);
        item.addEventListener('mouseleave', () => {
          if (!item.classList.contains('active')) {
            collapse();
          }
        });
      }
    });
  });
}
