<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky pt-3">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">
          <i class="bi bi-archive"></i> Data Arsip
        </a>
      </li>
    </ul>

    @can('admin')
      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Administrator</span>
      </h6>
      <ul class="nav flex-column gap-2">
        <li class="nav-item">
          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  <i class="bi bi-bookmarks"></i> Arsip Bidang
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <ul class="list-group">
                    @foreach ($fields as $field)
                      <li class="list-group-item">
                        <a class="nav-link {{ Request::is('dashboard/archives/fields/'.$field->id) ? 'active' : '' }}" href="/dashboard/archives/fields/{{ $field->id }}">
                          Bidang {{ $field->name }}
                        </a>
                      </li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="/dashboard/categories">
            <i class="bi bi-tags"></i> Kategori
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/fields*') ? 'active' : '' }}" href="/dashboard/fields">
            <i class="bi bi-card-list"></i> Bidang
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/users*') ? 'active' : '' }}" href="/dashboard/users">
            <i class="bi bi-people"></i> Pengguna
          </a>
        </li>
      </ul>
    @endcan

    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span>Sistem</span>
    </h6>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/change-password') ? 'active' : '' }}" href="/dashboard/change-password">
          <i class="bi bi-key"></i> Ganti Password
        </a>
      </li>
    </ul>
  </div>
</nav>