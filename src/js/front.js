import '../scss/front.scss'; 
import { initReadMoreWidgets } from '../js/front/read-more-widget';
import { initScrollTabsScrollNavigation } from '../js/front/scroll-tabs-widget.js';
import { slideMenu } from './front/slideMenu.js';


document.addEventListener('DOMContentLoaded', () => {
  initReadMoreWidgets();
  initScrollTabsScrollNavigation();

  slideMenu();
});