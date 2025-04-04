import '../css/app.css';
import './bootstrap';

import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createApp, h } from 'vue';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import i18n, { setLocale } from '@/i18n';
import { install as VueCompanyLib } from 'vue-company-lib';
import PrimeVue from 'primevue/config';
import ToastService from 'primevue/toastservice';
import Noir from './presets/Noir'


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
            .use(PrimeVue,{
                theme: {
                    preset: Noir,
                    options: {
                        prefix: 'p',
                        darkModeSelector: 'system',
                        cssLayer: false
                    }
                }
            })
            .use(VueCompanyLib)
            .use(ToastService)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
