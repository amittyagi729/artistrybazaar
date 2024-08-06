@include('admin.SEO.layouts.header')
@include('admin.SEO.layouts.sidebar')
      <main class="app-content">
         @yield('content')
         {{-- <div class="show-notify">
            <x:notify-messages />
         </div> --}}
      </main>
@include('admin.SEO.layouts.footer')