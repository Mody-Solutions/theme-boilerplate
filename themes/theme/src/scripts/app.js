import AOS from 'aos';
import 'aos/dist/aos.css';
import '../scss/app.scss';
import './base/menu';
import AppMenu from './base/menu';
import Tabs from "./blocks/tabs";

window.addEventListener( 'load', () => {
	AOS.init();
	AppMenu.init();
	Tabs.init();
} );
