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
    <main class="container mt-5">
      <div class="row justify-content-center align-items-center">
        <div class="col-8 mx-auto">
          <div class="d-flex justify-content-center text-center mb-4">
            <img src="{{ asset('image/logo_dlh.png') }}" height="110px" width="110px" alt="">
            <p class="fs-3 ">Sistem Informasi Manajemen Pengarsipan <br> Dinas Lingkungan Hidup Kota Madiun</p>
          </div>
          <div class="row">
            <div class="col-6">
              <p class="fs-4 text-center">Masuk Aplikasi</p>
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
            <div class="col-6">
              <img src="{{ asset('image/login.svg') }}" class="img-fluid" alt="">
            </div>
          </div>
          
        </div>
      </div>
    </main>

    <footer class="d-flex flex-wrap justify-content-between align-items-center fs-5 py-4 px-5 border-top bg-primary">
      <div class="col-md-4 d-flex align-items-center">
        <span class="text-white">Dinas Lingkungan Hidup Kota Madiun © {{ date('Y') }}</span>
      </div>
  
      <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
        <li class="ms-3"><a class="text-white" href="#"><i class="bi bi-google"></i></a></li>
        <li class="ms-3"><a class="text-white" href="#"><i class="bi bi-facebook"></i></a></li>
        <li class="ms-3"><a class="text-white" href="#"><i class="bi bi-twitter"></i></a></li>
      </ul>
    </footer>

    <script src="{{ asset('library/bootstrap-5.1.3/bootstrap.bundle.min.js') }}"></script>
  </body>
</html>

