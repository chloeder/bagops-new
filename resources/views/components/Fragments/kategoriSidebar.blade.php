                  <li class="nav-item {{ Route::is('kategori*') ? 'menu-open' : '' }}">
                      <a href="#" class="nav-link {{ Route::is('kategori*') ? 'active' : '' }}">
                          <i class="nav-icon fa-solid fa-folder"></i>
                          <p>
                              Kategori Berkas
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item {{ Route::is('kategori.rutin') ? 'menu-open' : '' }}">
                              <a href="{{ route('kategori.rutin') }}"
                                  class="nav-link {{ Route::is('kategori.rutin') ? 'active' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Pelaporan Rutin</p>
                              </a>
                          </li>
                          <li class="nav-item {{ Route::is('kategori.non.rutin') ? 'menu-open' : '' }}">
                              <a href="{{ route('kategori.non.rutin') }}"
                                  class="nav-link {{ Route::is('kategori.non.rutin') ? 'active' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Pelaporan Non Rutin</p>
                              </a>
                          </li>
                      </ul>
                  </li>
