@php
  setlocale(LC_ALL, 'id_ID');
@endphp

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Informasi Manajemen Pengarsipan Dinas Lingkungan Hidup Kota Madiun</title>
    {{-- Bootstrap --}}
    <link href="{{ asset('library/bootstrap-5.1.3/bootstrap.min.css') }}" rel="stylesheet">    
    {{-- Bootstrap Icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">
    @stack('addon-head')
  </head>
  <body>
    
    @include('layout.header')

    <div class="container-fluid">
      <div class="row">

        @include('layout.sidebar')

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          @yield('main')
        </main>
        
      </div>
    </div>
  
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="logoutModalLabel">Keluar Aplikasi</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Jika anda yakin untuk keluar aplikasi silahkan tekan tombol keluar dibawah ini.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <form action="/logout" method="POST">
              @csrf
              <button type="submit" class="btn btn-primary">Keluar</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    {{-- JQuery Slim --}}
    <script src="{{ asset('library/jquery-3.6.0/jquery.slim.min.js') }}"></script>
    {{-- Bootstrap --}}
    <script src="{{ asset('library/bootstrap-5.1.3/bootstrap.bundle.min.js') }}"></script>
    @stack('addon-script')
  </body>
</html>
