@push('addon-head')
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.4/datatables.min.css"/>
@endpush

@extends('layout.main')

@section('main')

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Halaman Data Pengguna</h1>
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
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif

  <div class="table-responsive">
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal"><i class="bi bi-plus"></i> Tambah Pengguna</button>
    <table class="table table-striped table-hover" id="dataTable">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama</th>
          <th scope="col">Email</th>
          <th scope="col">Role</th>
          <th scope="col">Ditambahkan Pada</th>
          <th scope="col">Terakhir diubah</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users->skip(1) as $user)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>
            <td>{{ date('jS M Y', $user->created_at->timestamp) }}</td>
            <td>{{ $user->updated_at->diffForHumans() }}</td>
            <td>
              <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-id="{{ $user->id }}" data-bs-name="{{ $user->name }}" data-bs-email="{{ $user->email }}" data-bs-role="{{ $user->role }}"><i class="bi bi-pencil"></i> Ubah</button>
              <form action="/dashboard/users/{{ $user->id }}" method="POST" class="d-inline">
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
      <form action="/dashboard/users" method="POST">
        @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="createModalLabel">Tambah Pengguna</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label>Nama</label>
              <input type="text" id="input-edit-name" class="form-control " name="name" required>
            </div>
            <div class="mb-3">
              <label>Email</label>
              <input type="text" id="input-edit-name" class="form-control " name="email" required>
            </div>
            <div class="mb-3">
              <label>Bidang</label>
              <select name="role" class="form-select">
                @foreach ($fields as $field)
                  @if (old('role') == $field->name)
                    <option value="{{ $field->name }}" selected>{{ $field->name }}</option>
                  @else
                    <option value="{{ $field->name }}">{{ $field->name }}</option>
                  @endif
                @endforeach
              </select>
            </div>
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
            <h5 class="modal-title" id="editModalLabel">Ubah Pengguna</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="form-floating mb-3">
              <input type="text" name="name" id="input-edit-name" class="form-control" value="{{ old('name') }}" required autofocus>
              <label>Nama</label>
            </div>
            <div class="form-floating mb-3">
              <input type="email" name="email" id="input-edit-email" class="form-control" value="{{ old('email') }}" required>
              <label>Email</label>
            </div>
            <div class="mb-3">
              <label id="role-label">Bidang</label>
              <select name="role" class="form-select">
                @foreach ($fields as $field)
                  @if (old('role') == $field->name)
                    <option value="{{ $field->name }}" selected>{{ $field->name }}</option>
                  @else
                    <option value="{{ $field->name }}">{{ $field->name }}</option>
                  @endif
                @endforeach
              </select>
            </div>
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
      const email = button.getAttribute('data-bs-email')
      const role = button.getAttribute('data-bs-role')

      const nameInput = editModal.querySelector('#input-edit-name')
      const emailInput = editModal.querySelector('#input-edit-email')
      const roleLabel = editModal.querySelector('#role-label')

      document.getElementById('editForm').setAttribute('action', `${window.location.origin}/dashboard/users/${id}`)
      nameInput.value = name
      emailInput.value = email
      roleLabel.innerHTML = `Bidang (Sebelumnya: <strong>${role}</strong>)`
    })
  </script>
@endpush
