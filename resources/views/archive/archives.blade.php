@push('addon-head')
  <link rel="stylesheet" type="text/css" href="{{ asset('library/dataTable/datatables.min.css') }}"/>
@endpush

@extends('layout.main')

@section('main')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Selamat Datang, {{ Auth::user()->name }} ,  {{ Auth::user()->role }}</h1>
  </div>

  @if ($notification = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ $notification }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  <div class="table-responsive">
    <a href="/dashboard/archives/create" class="btn btn-primary mb-3"><i class="bi bi-plus"></i> Tambah Dokumen</a>
    <table class="table table-striped table-hover" id="dataTable">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Judul</th>
          <th scope="col">Kategori</th>
          <th scope="col">Bidang</th>
          <th scope="col">Ditambahkan Pada</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($archives as $archive)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $archive->title }}</td>
            <td>{{ $archive->category->name }}</td>
            <td>{{ $archive->field->name }}</td>
            <td> {{ date($archive->created_at) }} ({{  \Carbon\Carbon::parse($archive->updated_at)->diffForHumans() }})</td>
            <td>
              <a href="/dashboard/archives/{{ $archive->id }}" class="btn btn-info text-white"><i class="bi bi-eye"></i> Lihat</a>
              <a href="/dashboard/archives/{{ $archive->id }}/edit" class="btn btn-warning text-white"><i class="bi bi-pencil"></i> Ubah</a>
              <form action="/dashboard/archives/{{ $archive->id }}" method="POST" class="d-inline">
                @method('delete') @csrf
                <button class="btn btn-danger border-0" onclick="return confirm('Apakah anda yakin menghapus data?')"><i class="bi bi-trash"></i> Hapus</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection

@push('addon-script')
  <script type="text/javascript" src="{{ asset('library/dataTable/datatables.min.js') }}"></script>
  <script src="/script/dataTable.js"></script>
@endpush
