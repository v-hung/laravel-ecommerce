<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!--------------------------- DEFAULT --------------------------->

  <title>{{ $pageMeta['title'] ?? setting('site.title') }}</title>
  <meta name="description" content="{{ $pageMeta['meta_description'] ?? setting('site.description') }}" />
  <meta name="content" content="{{ $pageMeta['meta_content'] ?? setting('site.content') }}" />

  <link rel="shortcut icon" href="{{ \TCG\Voyager\Facades\Voyager::image(setting('site.logo')) }}" type="image/png">

  <meta property="og:image" content="{{ \TCG\Voyager\Facades\Voyager::image($pageMeta['image'] ?? setting('site.logo')) }}" />
  <meta property="og:url" content="{{ \Request::fullUrl() }}" />
  <meta property="og:type" content="Website" />
  <meta property="og:title" content="{{ $pageMeta['title'] ?? setting('site.title') }}" />
  <meta property="og:description" content="{{ $pageMeta['meta_description'] ?? setting('site.description') }}" />
  <meta property="og:content" content="{{ $pageMeta['meta_content'] ?? setting('site.content') }}" />

  <!--------------------------- END DEFAULT --------------------------->

  @include('layouts.partials.css')
  @stack('css')

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <script src="//unpkg.com/alpinejs" defer></script>
  @stack('head')
</head>

<body>
  @section('header')
    @include('layouts.partials.header')
  @show

  @hasSection ('content')
    <main class="main-wrapper">
      @include('layouts.partials.breadcrumb')
      @yield('content')
    </main>
  @else
    @yield('content2')
  @endif

  @section('footer')
    @include('layouts.partials.footer')
  @show

  @section('alert')
    @include('layouts.partials.alert')
  @show

  @include('layouts.partials.js')
  @stack('js')
</body>
</html>
