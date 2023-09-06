                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fa-solid fa-folder"></i>
                          <p>
                              Kategori Berkas
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('kategori.rutin') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Laporan Rutin</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('kategori.non.rutin') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Laporan Non Rutin</p>
                              </a>
                          </li>
                      </ul>
                  </li>
