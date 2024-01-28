<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="{{ asset('') }}assets/" data-template="vertical-menu-template-free" >
  <head>

    @include('theme.style')

  </head>

  <body>
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        
        @include('theme.sidebar')

        <div class="layout-page">

          @include('theme.navbar')
          
          <div class="content-wrapper">

            <div class="container-xxl flex-grow-1 container-p-y">

              @yield('content')

            </div>

            @include('theme.footer')

            <div class="content-backdrop fade"></div>
          </div>
          
        </div>

      </div>

      <div class="layout-overlay layout-menu-toggle"></div>
      @include('theme.script')
      @yield('script')

      @if(Session::has('success'))
        <script>
          iziToast.success({
            title: 'success',
            message: "{{ Session::get('success') }}",
            position: 'bottomRight'
          });
        </script>
      @endif
      @if(Session::has('error'))
      <script>
        iziToast.error({
          title: 'error',
          message: "{{ Session::get('error') }}",
          position: 'bottomRight'
        });
      </script>
    @endif
    </div>
  </body>
</html>
