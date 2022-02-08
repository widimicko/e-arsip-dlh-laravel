@push('addon-head')
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.4/datatables.min.css"/>
@endpush

@extends('layout.main')

@section('main')

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Halaman Data Kategori</h1>
  </div>

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

  <div class="table-responsive">
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal"><i class="bi bi-plus"></i> Tambah Kategori</button>
    <table class="table table-striped table-hover" id="dataTable">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama</th>
          <th scope="col">Ditambahkan Pada</th>
          <th scope="col">Terakhir diubah</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($categories as $category)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ date('jS M Y', $category->created_at->timestamp) }}</td>
            <td>{{ $category->updated_at->diffForHumans() }}</td>
            <td>
              <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-id="{{ $category->id }}" data-bs-name="{{ $category->name }}"><i class="bi bi-pencil"></i> Ubah</button>
              <form action="/dashboard/categories/{{ $category->id }}" method="POST" class="d-inline">
                @method('delete') @csrf
                <button class="btn btn-danger border-0" onclick="return confirm('Apakah anda yakin menghapus data?')"><i class="bi bi-trash"></i> Hapus</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form action="/dashboard/categories" method="POST">
        @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="createModalLabel">Tambah Kategori</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <label>Kategori</label>
            <input type="text" id="input-edit-category" class="form-control " name="name" required>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  

  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form id="editForm" method="POST">
        @method('put') @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Ubah Kategori</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <label>Kategori</label>
            <input type="text" id="input-edit-category" class="form-control " name="name" required>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Ubah</button>
          </div>
        </div>
      </form>
    </div>
  </div>

@endsection


@push('addon-script')
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.4/datatables.min.js"></script>
  <script src="/script/dataTable.js"></script>
  <script>
    const editModal = document.getElementById('editModal')

    editModal.addEventListener('show.bs.modal', function (event) {
      const button = event.relatedTarget

      const id = button.getAttribute('data-bs-id')
      const name = button.getAttribute('data-bs-name')
      const modalBodyInput = editModal.querySelector('#input-edit-category')

      document.getElementById('editForm').setAttribute('action', `${window.location.origin}/dashboard/categories/${id}`)
      modalBodyInput.value = name
    })
  </script>
@endpush
