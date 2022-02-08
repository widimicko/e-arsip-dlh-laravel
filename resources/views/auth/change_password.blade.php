@extends('layout.main')


@section('main')

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Halaman Ganti Password</h1>
  </div>

  @if ($notification = Session::get('failed'))
    <div class="col-lg-6 alert alert-danger alert-dismissible fade show" role="alert">
      {{ $notification }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  <div class="col-lg-6 mb-5">
    <form action="/dashboard/change-password" method="POST">
      @csrf
      <div class="mb-3">
        <label class="form-label">Password saat ini</label>
        <input required type="password" name="current_password" id="current_password" class="form-control @error('current_password') is-invalid @enderror" value="{{ old('current_password') }}">
        @error('current_password')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Password baru</label>
        <input required type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}">
        @error('password')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Konfirmasi Password</label>
        <input required type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" value="{{ old('password_confirmation') }}">
        @error('password_confirmation')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      <div class="d-flex gap-3">
        <a href="/" class="btn btn-info text-white"><i class="bi bi-arrow-left"></i> Kembali</a>
        <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan Perubahan</button>
      </div>
    </form>
  </div>

@endsection

