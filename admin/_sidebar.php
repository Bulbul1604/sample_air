  <div id="sidebar" class="active">
      <div class="sidebar-wrapper active">
          <div class="sidebar-header">
              <h3 class="mb-0 text-info" style="font-family: 'Righteous', cursive !important">Laboratorium</h3>
          </div>
          <div class="sidebar-menu">
              <ul class="menu my-0">
                  <li class="sidebar-title">Main Menu</li>

                  <li class="sidebar-item">
                      <a href="index.php" class="sidebar-link text-info">
                          <i data-feather="home" width="20"></i>
                          <span class="text-info">Dashboard</span>
                      </a>
                  </li>

                  <li class="sidebar-title">Pages</li>

                  <?php if (isset($_SESSION['login'])) :  ?>
                      <?php if ($_SESSION['role'] == 'admin') :  ?>
                          <li class="sidebar-item">
                              <a href="pengguna_index.php" class="sidebar-link text-info">
                                  <i data-feather="users" width="20"></i>
                                  <span class="text-info">Data Petugas</span>
                              </a>
                          </li>
                      <?php endif; ?>
                  <?php endif; ?>

                  <li class="sidebar-item">
                      <a href="air_index.php" class="sidebar-link text-info">
                          <i data-feather="database" width="20"></i>
                          <span class="text-info">Data Air</span>
                      </a>
                  </li>
              </ul>
          </div>
          <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
      </div>
  </div>
