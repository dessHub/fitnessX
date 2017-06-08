<!doctype html>
<html lang="en">
  @include('partials.index')
<body>

<div class="wrapper">
   @include('partials.sidebar')

    <div class="main-panel">
      @include('partials.nav')

      @yield('content')

      @include('partials.footer')

      </div>


</div>


</body>
    @include('partials.indexjs')
</html>
