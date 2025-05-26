import '../scss/front.scss'; 
import { initReadMoreWidgets } from '../js/front/read-more-widget';
import { initScrollTabsScrollNavigation } from '../js/front/scroll-tabs-widget.js';


document.addEventListener('DOMContentLoaded', () => {
  initReadMoreWidgets();
  initScrollTabsScrollNavigation();
});