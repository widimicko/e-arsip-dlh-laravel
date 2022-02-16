<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('library/bootstrap-5.1.3/bootstrap.min.css') }}" rel="stylesheet">
    {{-- Bootstrap Icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <title>Sistem Informasi Manajemen Pengarsipan Dinas Lingkungan Hidup Kota Madiun</title>
    <style>
      .bg-primary {
        color: white !important;
        background-color: #719430 !important;
      }
    </style>
  </head>
  <body>
    <main class="container mt-5 mb-5">
      <div class="row">
        <div class="col-lg-6 col-sm-12 my-auto mx-auto">
          <div class="d-flex justify-content-center">
            <div class="fs-3 text-center">
              <p>Sistem Informasi Manajemen Pengarsipan</p>
              <img src="{{ asset('/image/logo_dlh.png') }}" alt="Logo" class="img-fluid" style="height: 400px; width: 400px;">
              <p>Dinas Lingkungan Hidup Kota Madiun</p>
            </div>
          </div>         
        </div>
        <div class="col-lg-6 col-sm-12">
          <p class="fs-3 text-center">Halaman Login</p>
          @if ($notification = Session::get('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ $notification }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            @if ($notification = Session::get('failed'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $notification }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            <form action="/login" method="POST">
              @csrf
              <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="name@example.com" value="{{ old('email') }}" required autofocus>
                <label>Email</label>
                @error('email')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-floating mb-3">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>
                <label>Password</label>
                @error('password')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="mb-3 form-check">
                <input name="remember" type="checkbox" class="form-check-input" value="1">
                <label class="form-check-label">Ingat Saya</label>
              </div>
              <button class="mb-2 w-100 btn btn-lg bg-primary" type="submit"><i class="bi bi-box-arrow-in-right"></i> Masuk</button>
            </form>
        </div>
      </div>
    </main>

    <div class="" style="margin-top: 100px">
      <footer class="d-flex flex-wrap justify-content-between align-items-center fs-5 py-5 px-5 my-4 border-top bg-primary">
        <div class="col-md-4 d-flex align-items-center">
          <span class="text-white">Dinas Lingkungan Hidup Kota Madiun © {{ date('Y') }}</span>
        </div>
    
        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
          <li class="ms-3"><a class="text-white" href="#"><i class="bi bi-google"></i></a></li>
          <li class="ms-3"><a class="text-white" href="#"><i class="bi bi-facebook"></i></a></li>
          <li class="ms-3"><a class="text-white" href="#"><i class="bi bi-twitter"></i></a></li>
        </ul>
      </footer>
    </div>

    <script src="{{ asset('library/bootstrap-5.1.3/bootstrap.bundle.min.js') }}"></script>
  </body>
</html>

