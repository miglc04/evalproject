<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> @yield('title') | Eval Project</title>

    @include('layout.styles')
  </head>
  <body>
    @include('layout.header')

    <div class="container">
      <main>
        @yield('main')
      </main>
    </div>

    @include('layout.footer')

    @include('layout.scripts')
  </body>
</html>
