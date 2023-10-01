<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Icons -->
  @include('components.logos')
  <!-- END Icons -->

  <!-- Styles -->
  @include('components.styles')
  <!-- Styles -->

  <!-- Vite Builder -->
  @vite([])
</head>
<body>

  <div id="page-container" class="sidebar-dark side-scroll page-header-fixed page-header-dark main-content-boxed">
    <!-- Sidebar -->
    @include('users.partials.sidebar')
    <!-- END Sidebar -->

    <!-- Header -->
    <header id="page-header">
      @include('users.partials.header')
    </header>
    <!-- END Header -->

    <!-- Main Container -->
    <main id="main-container">
      <div class="content content-full">
        {{-- Hero --}}
        <div class="block block-rounded">
          <div class="block-content">
            <div class="py-3 text-center">
              <h1 class="h2 fw-bold mb-2">@yield('hero-title')</h1>
              <h2 class="h5 fw-medium text-muted">@yield('hero-subtitle')</h2>
            </div>
          </div>
        </div>
        {{-- Hero --}}
        @yield('content')
      </div>
    </main>

    <!-- Footer -->
    <footer id="page-footer">
      @include('users.partials.footer')
    </footer>
    <!-- END Footer -->

  </div>

  @include('components.javascript')
</body>
</html>
