@include('admin.layouts.header')
@include('admin.layouts.sidebar')
      <main class="app-content">
         @yield('content')
         {{-- <div class="show-notify">
            <x:notify-messages />
         </div> --}}
      </main>
@include('admin.layouts.footer')