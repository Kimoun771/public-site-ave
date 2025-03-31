import '../css/app.css';
import './bootstrap';

import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createApp, h } from 'vue';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import i18n, { setLocale } from '@/i18n';
import { install as VueCompanyLib } from 'vue-company-lib';
import PrimeVue from 'primevue/config';
import Aura from '@primeuix/themes/aura';




createInertiaApp({
    title: (title) => `${title}`,
    resolve: (name) => {
        const page = resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue'));
        return page;
    },
    setup({ el, App, props, plugin }) {
        const currentLocale = props.initialPage.props.currentLocale || 'fr';
        setLocale(currentLocale);

        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(i18n)
            .use(ZiggyVue)
            .use(PrimeVue)
            .use(VueCompanyLib)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
    theme:{
        preset: Aura
    }
});
