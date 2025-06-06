import '../scss/front.scss'; 
import { initReadMoreWidgets } from '../js/front/read-more-widget';
import { initScrollTabsScrollNavigation , initScrollTabsDescription} from '../js/front/scroll-tabs-widget.js';
import { slideMenu } from './front/slideMenu.js';


document.addEventListener('DOMContentLoaded', () => {
  initReadMoreWidgets();
  initScrollTabsScrollNavigation();
  initScrollTabsDescription()

  slideMenu();
});