                  <li class="nav-item {{ Route::is('daftar*') ? 'menu-open' : '' }}">
                      <a href="#" class="nav-link {{ Route::is('daftar*') ? 'active' : '' }}">
                          <i class="nav-icon fa-solid fa-gear"></i>
                          <p>
                              Pengaturan
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item {{ Route::is('daftar.user') ? 'menu-open' : '' }}">
                              <a href="{{ route('daftar.user') }}"
                                  class="nav-link {{ Route::is('daftar*') ? 'active' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Akun Pengguna</p>
                              </a>
                          </li>
                      </ul>
                  </li>
