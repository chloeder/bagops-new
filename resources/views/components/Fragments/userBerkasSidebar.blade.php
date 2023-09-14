                  <li class="nav-item">
                      <a href="{{ route('masukkan.laporan') }}"
                          class="nav-link {{ Route::is('masukkan.laporan') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-file-circle-plus"></i>
                          <p>
                              Tambah Berkas
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('daftar.laporan') }}"
                          class="nav-link {{ Route::is('daftar.laporan') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-folder-open"></i>
                          <p>
                              Lihat Daftar Berkas
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('kinerja.satuan') }}"
                          class="nav-link {{ Route::is('kinerja.satuan') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-chart-line"></i>
                          <p>
                              Lihat Kinerja Satuan
                          </p>
                      </a>
                  </li>
