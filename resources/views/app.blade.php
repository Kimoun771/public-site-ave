<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Basic SEO tags (will be enhanced/replaced by Vue) -->
    @php
        $seo = $page['props']['settings']['seo'] ?? [];
        $title = !empty($seo['title']) ? $seo['title'] : config('app.name', 'Default Title');
        $isDebug = config('app.debug', false);
    @endphp

    <title inertia>{{ $title }}</title>

    <!-- Make app name available to Vue components -->
    <script>
        window.appName = "{{ config('app.name', 'Default Title') }}";
    </script>

    @if (!empty($seo['description']))
        <meta name="description" content="{{ $seo['description'] }}">
    @endif
    @if (!empty($seo['keywords']))
        <meta name="keywords" content="{{ $seo['keywords'] }}">
    @endif
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
    <meta name="bingbot" content="index, follow">

    <link rel="canonical" href="{{ $seo['canonical'] ?? url()->current() }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ $seo['canonical'] ?? url()->current() }}">
    <meta property="og:title" content="{{ !empty($seo['ogTitle']) ? $seo['ogTitle'] : $title }}">
    @if (!empty($seo['ogDescription']))
        <meta property="og:description" content="{{ $seo['ogDescription'] }}">
    @elseif (!empty($seo['description']))
        <meta property="og:description" content="{{ $seo['description'] }}">
    @endif
    @if (!empty($seo['ogImage']))
        <meta property="og:image" content="{{ $seo['ogImage'] }}">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="630">
    @endif
    <meta property="og:site_name" content="{{ config('app.name') }}">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ !empty($seo['ogTitle']) ? $seo['ogTitle'] : $title }}">
    @if (!empty($seo['ogDescription']))
        <meta name="twitter:description" content="{{ $seo['ogDescription'] }}">
    @elseif (!empty($seo['description']))
        <meta name="twitter:description" content="{{ $seo['description'] }}">
    @endif
    @if (!empty($seo['ogImage']))
        <meta name="twitter:image" content="{{ $seo['ogImage'] }}">
        <meta name="twitter:image:width" content="1200">
        <meta name="twitter:image:height" content="630">
    @endif

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
    <link rel="shortcut icon" href="/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
    <link rel="manifest" href="/site.webmanifest" />

    @include('feed::links')

    <!-- Scripts -->
    <!-- Google Tag Manager -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-MWK35BWK06"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', 'G-MWK35BWK06');
    </script>
    @routes
    @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
    @inertiaHead
</head>
<body class="font-sans antialiased">
    @inertia
</body>
</html>
