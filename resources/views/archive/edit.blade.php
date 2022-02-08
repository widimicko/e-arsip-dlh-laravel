@extends('layout.main')


@section('main')

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Ubah Dokumen {{ $archive->title }}</h1>
  </div>

  <div class="col-lg-6 mb-5">
    <form action="/dashboard/archives/{{ $archive->id }}" method="POST" enctype="multipart/form-data">
      @method('put') @csrf
      <div class="mb-3">
        <label class="form-label">Nama Dokumen</label>
        <input required type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $archive->title) }}" autofocus>
        @error('title')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Kategori</label>
        <select name="category_id" class="form-select @error('category_id') is-invalid @enderror">
          @foreach ($categories as $category)
            @if (old('category_id') == $category->id)
              <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
            @else
              <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endif
          @endforeach
        </select>
        @error('category')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      @if (Auth::user()->role !== 'admin')
        <input type="hidden" name="field_id" value="{{ Auth::user()->role }}">
      @else
      <div class="mb-3">
        <label class="form-label">Bidang</label>
        <select name="field_id" class="form-select @error('field_id') is-invalid @enderror">
          @foreach ($fields as $field)
            @if (old('field_id') == $field->id)
              <option value="{{ $field->id }}" selected>{{ $field->name }}</option>
            @else
              <option value="{{ $field->id }}">{{ $field->name }}</option>
            @endif
          @endforeach
        </select>
        @error('field')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      @endif
      <div class="mb-3">
        <label for="document" class="form-label">Dokumen</label>
        <input type="file" name="document" class="form-control @error('document') is-invalid @enderror">
        @error('document')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>     

      <div class="d-flex gap-3">
        <a href="/" class="btn btn-info text-white"><i class="bi bi-arrow-left"></i> Kembali</a>
        <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan</button>
      </div>
    </form>
  </div>

@endsection

