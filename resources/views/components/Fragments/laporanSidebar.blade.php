                  <li class="nav-item {{ Route::is('laporan*') ? 'menu-open' : '' }}">
                      <a href="#" class="nav-link {{ Route::is('laporan*') ? 'active' : '' }}">
                          <i class="nav-icon fa-solid fa-magnifying-glass-chart"></i>
                          <p>
                              Laporan
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item {{ Route::is('laporan.kinerja') ? 'menu-open' : '' }}">
                              <a href="{{ route('laporan.kinerja') }}"
                                  class="nav-link {{ Route::is('laporan.kinerja') ? 'active' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Laporan Kinerja</p>
                              </a>
                          </li>
                          <li class="nav-item {{ Route::is('laporan.berkas') ? 'menu-open' : '' }}">
                              <a href="{{ route('laporan.berkas') }}"
                                  class="nav-link {{ Route::is('laporan.berkas') ? 'active' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Laporan Berkas</p>
                              </a>
                          </li>
                      </ul>
                  </li>
