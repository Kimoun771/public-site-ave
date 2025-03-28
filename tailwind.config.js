import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    darkMode: 'class',
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                tajawal: ['Tajawal', 'serif'],
            },
        fontSize: {
            // Desktop (d-) variants
            'd-p-s': ['0.8125rem', { lineHeight: '1.4' }], // 13px
            'd-p': ['0.875rem', { lineHeight: '1.5' }],    // 14px
            'd-h4': ['1rem', { lineHeight: '1.3' }],       // 16px
            'd-h3': ['1.25rem', { lineHeight: '1.3' }],    // 20px
            'd-h2': ['1.5rem', { lineHeight: '1.3' }],     // 24px
            'd-h1': ['2rem', { lineHeight: '1.2' }],       // 32px

            // Mobile (m-) variants
            'm-p-s': ['0.6875rem', { lineHeight: '1.5' }], // 11px
            'm-p': ['0.75rem', { lineHeight: '1.5' }],     // 12px
            'm-h4': ['0.875rem', { lineHeight: '1.4' }],   // 14px
            'm-h3': ['1rem', { lineHeight: '1.3' }],       // 16px
            'm-h2': ['1.25rem', { lineHeight: '1.3' }],    // 20px
            'm-h1': ['1.5rem', { lineHeight: '1.2' }],     // 24px
        },
            borderRadius: {
                'ss-xl': '1.5rem',
                'ee-xl': '1.5rem',
              },
            colors: {
                primary: {
                    '100': '#ffefc6',
                    '200': '#ffdf88',
                    '300': '#fec84b',
                    '400': '#feb326',
                    '500': '#f88f08',
                    '600': '#dc6803',
                    '700': '#b64707',
                    '800': '#94370c',
                    '900': '#792e0e',
                },
            },
        },
    },
    plugins: [forms],
    //
};
