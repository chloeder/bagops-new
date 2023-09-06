  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{ route('dashboard') }}" class="brand-link">
          <img src="{{ asset('/img/bagops.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
              style="opacity: .8">
          <span class="brand-text font-weight-bold">LAPOR OPS</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="{{ asset('template') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                      alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block">{{ Auth::user()->nama }}</a>
              </div>
          </div>



          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                  <li class="nav-item menu-open">
                      <a href="{{ route('dashboard') }}" class="nav-link active">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Dashboard
                          </p>
                      </a>
                  </li>

                  @if (Auth::user()->role_id == 1)
                      {{-- Berkas  --}}
                      @include('components.Fragments.berkasSidebar')
                      {{-- Kategori --}}
                      @include('components.Fragments.kategoriSidebar')
                      {{-- Laporan --}}
                      @include(' components.Fragments.laporanSidebar')
                      {{-- Pengaturan --}}
                      @include('components.Fragments.pengaturanSidebar')
                  @endif

                  @if (Auth::user()->role_id == 2)
                      @include('components.Fragments.userBerkasSidebar')
                  @endif

                  <li class="nav-item">
                      <a href="{{ route('logout') }}" class="nav-link">
                          <i class="nav-icon fas fa-right-from-bracket"></i>
                          <p>
                              Logout
                          </p>
                      </a>
                  </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
