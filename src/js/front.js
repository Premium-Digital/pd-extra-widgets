import '../scss/front.scss'; 
import { initReadMoreWidgets } from '../js/front/read-more-widget';
import { initScrollTabsWidget } from '../js/front/scroll-tabs-widget.js';


document.addEventListener('DOMContentLoaded', () => {
  initReadMoreWidgets();
  initScrollTabsWidget();
});