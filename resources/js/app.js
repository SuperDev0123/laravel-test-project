import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
import 'flowbite';
// import '../../node_modules/quill/dist/quill';
window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();
