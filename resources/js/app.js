import './bootstrap';
import { createApp, h } from 'vue';
import { createInertiaApp, Head, Link } from '@inertiajs/vue3';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import DefaultLayout from './Layouts/DefaultLayout.vue';
import AuthLayout from './Layouts/AuthLayout.vue';
import AdminLayout from './Layouts/AdminLayout.vue';
import NoteTakerLayout from './Layouts/NoteTakerLayout.vue';

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true });
    const page = pages[`./Pages/${name}.vue`];

    // Assign a default layout if none is specified
    page.default.layout = page.default.layout || DefaultLayout;

    // You can set specific layouts based on the page name
    // For example, use AuthLayout for pages starting with "Auth"
    if (name.startsWith('Auth')) {
      page.default.layout = AuthLayout;
    } else if (name.startsWith('Admin')) {
      page.default.layout = AdminLayout;
    } else if (name.startsWith('NoteTaker')) {
      page.default.layout = NoteTakerLayout;
    } else {
      page.default.layout = DefaultLayout;
    }

    return page;
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(ZiggyVue)
      .component('Head', Head)
      .component('Link', Link)
      .mount(el);
  },
});
