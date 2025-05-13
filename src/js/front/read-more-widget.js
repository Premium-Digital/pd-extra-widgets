export function initReadMoreWidgets() {
    const widgets = document.querySelectorAll('.read-more-widget'); // Wyszukaj wszystkie widgety
    
    widgets.forEach(function(widget) {
        const button = widget.querySelector('.read-more-button'); // Wyszukaj przycisk w danym widgetcie
        const longText = widget.querySelector('.long-text'); // Wyszukaj długi tekst w danym widgetcie
        const icon = button.querySelector('i'); // Wyszukaj ikonę w przycisku

        if (button) {
            button.addEventListener('click', function() {
                if (longText.classList.contains('expanded')) {
                    // Zwiń tekst
                    longText.style.maxHeight = '0';
                    button.querySelector('.button-text').innerHTML = button.getAttribute('data-text-collapsed');
                } else {
                    // Rozwiń tekst
                    longText.style.maxHeight = longText.scrollHeight + 'px';
                    button.querySelector('.button-text').innerHTML = button.getAttribute('data-text-expanded');
                }
                longText.classList.toggle('expanded');
            });
        }
    });
}