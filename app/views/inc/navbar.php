
          <!-- Sidebar menu starts -->
          <div class="sidebarMenuScroll">
            <ul class="sidebar-menu">

            <?php
            if(isset($_SESSION['menu']) && !empty($_SESSION['menu'])){
				$menuData = $_SESSION['menu'];
				
				if(is_string($menuData)){
					$menuArray = json_decode($menuData, true);
				} else {
					$menuArray = $menuData;
				}
				
				foreach($menuArray as $item){
					$listaBlanca[] = $item['ruta'];
          if(isset($item['ruta']) && isset($item['icono']) && isset($item['nombre'])){
          echo '<li>
                <a href="'.APP_URL.$item['ruta'].'/">
                  <i class="'.$item['icono'].'"></i>
                  <span class="menu-text">'.$item['nombre'].'</span>
                </a>
              </li>';
				}
			}
      }
      ?>
            
            </ul>
          </div>
          <!-- Sidebar menu ends -->

        </nav>
        <!-- Sidebar wrapper end -->

                <!-- App container starts -->
        <div class="app-container">

          <!-- App header starts -->
          <div class="app-header d-flex align-items-center">

            <!-- Toggle buttons start -->
            <div class="d-flex">
              <button type="button" class="btn btn-dark me-2 toggle-sidebar" id="toggle-sidebar">
                <i class="bi bi-chevron-left"></i>
              </button>
              <button type="button" class="btn btn-outline-dark me-2 pin-sidebar" id="pin-sidebar">
                <i class="bi bi-chevron-left"></i>
              </button>
            </div>
            <!-- Toggle buttons end -->

            <!-- App brand sm start -->
            <div class="app-brand-sm d-lg-none d-sm-block">
              <a href="index.html">
                <img src="<?php echo APP_URL; ?>app/views/img/logo.png" class="logo"
                  alt="Admin Dashboard with real-time analytics and user management">
              </a>
            </div>
            <!-- App brand sm end -->

            <!-- App header actions start -->
            <div class="header-actions">
              <div class="d-lg-block d-none">

               

              </div>
              <!-- Header actions starts -->
              <div class="d-lg-flex d-none">
                <div class="dropdown ms-3">
                  <a class="dropdown-toggle action-icon" href="starter-page.html#!" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="bi bi-grid lh-1"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-end shadow">
                    <h6 class="fw-semibold px-3 mt-3">Quick Links</h6>
                    <!-- Row start -->
                    <div class="d-flex gap-2 m-3">
                      <a href="javascript:void(0)" class="g-col-4 p-2 border rounded-2">
                        <img src="assets/images/brand-behance.svg" class="img-2x" alt="Admin Themes" />
                      </a>
                      <a href="javascript:void(0)" class="g-col-4 p-2 border rounded-2">
                        <img src="assets/images/brand-slack.svg" class="img-2x" alt="Admin Templates" />
                      </a>
                      <a href="javascript:void(0)" class="g-col-4 p-2 border rounded-2">
                        <img src="assets/images/brand-google.svg" class="img-2x" alt="Admin Panels" />
                      </a>
                      <a href="javascript:void(0)" class="g-col-4 p-2 border rounded-2">
                        <img src="assets/images/brand-pinterest.svg" class="img-2x" alt="Admin Templates" />
                      </a>
                      <a href="javascript:void(0)" class="g-col-4 p-2 border rounded-2">
                        <img src="assets/images/brand-dribbble.svg" class="img-2x" alt="Admin Dashboard" />
                      </a>
                    </div>
                    <!-- Row end -->
                  </div>
                </div>
                <div class="dropdown ms-3">
                  <a class="dropdown-toggle action-icon" href="starter-page.html#!" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="bi bi-bell lh-1"></i>
                    <span class="count-label bg-danger animated infinite swing">7</span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-end dropdown-menu-md shadow-sm">
                    <h5 class="fw-semibold px-3 py-2 m-0">Notifications</h5>
                    <a href="javascript:void(0)" class="d-flex align-items-start gap-3 p-3 dropdown-data">
                      <img src="assets/images/user.png" class="img-3x rounded-3" alt="Admin Themes">
                      <div class="m-0">
                        <h6 class="mb-1 fw-semibold">Zaaida el-Abdul</h6>
                        <p class="mb-1">
                          Membership has been ended.
                        </p>
                        <p class="small m-0 opacity-50">
                          Today, 07:30pm
                        </p>
                      </div>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-start gap-3 p-3 dropdown-data">
                      <img src="assets/images/user2.png" class="img-3x rounded-3" alt="Admin Theme">
                      <div class="m-0">
                        <h6 class="mb-1 fw-semibold">Saara al-Faris</h6>
                        <p class="mb-1">
                          Congratulate, James for new job.
                        </p>
                        <p class="small m-0 opacity-50">
                          Today, 08:00pm
                        </p>
                      </div>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-start gap-3 p-3 dropdown-data">
                      <img src="assets/images/user1.png" class="img-3x rounded-3" alt="Admin Theme">
                      <div class="m-0">
                        <h6 class="mb-1 fw-semibold">Razeena al-Sahli</h6>
                        <p class="mb-1">
                          Zaahira added new schedule release.
                        </p>
                        <p class="small m-0 opacity-50">
                          Today, 09:30pm
                        </p>
                      </div>
                    </a>
                    <div class="d-grid p-3 border-top">
                      <a href="javascript:void(0)" class="btn btn-outline-primary">View all</a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Header actions ends -->
              <div class="dropdown ms-3">
                <a id="userSettings" class="dropdown-toggle d-flex py-2 align-items-center text-decoration-none"
                  href="starter-page.html#!" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <span class="d-none d-md-block me-2">admin@info.com</span>
                  <img src="assets/images/user2.png" class="rounded-5 img-3x  border border-primary p-1"
                    alt="Admin Dashboard with real-time analytics and user management" />
                </a>
                <div class="dropdown-menu dropdown-menu-end shadow">
                  <div class="p-2 mb-2 text-center border-bottom border-light">
                    <h6 class="mb-1"><?= $_SESSION['nombre']; ?>
                    </h6>
                    <p class="m-0 text-muted small">Executive Director</p>
                  </div>
                  <a class="dropdown-item d-flex align-items-center" href="profile.html">
                    <div class="icon-box sm rounded-5 bg-primary-subtle me-2">
                      <i class="bi bi-person"></i>
                    </div> Profile
                  </a>
                  <a class="dropdown-item d-flex align-items-center" href="settings.html">
                    <div class="icon-box sm rounded-5 bg-danger-subtle me-2">
                      <i class="bi bi-gear"></i>
                    </div>
                    Account Settings
                  </a>
                  <a class="dropdown-item d-flex align-items-center" href="<?php echo APP_URL."logOut/"; ?>" id="btn_exit">
                    <div class="icon-box sm rounded-5 bg-success-subtle me-2">
                      <i class="bi bi-escape"></i>
                    </div>Logout
                  </a>
                </div>
              </div>
            </div>
            <!-- App header actions end -->

          </div>
          <!-- App header ends -->

          <!-- App hero header starts -->
          <div class="app-hero-header">

           


            <!-- Page Title start -->
            <div class="d-flex gap-3">
              <img src="<?= APP_URL; ?>app/views/img/iconos/usuarios.png" class="img-4x" alt="Logistics Dashboard" />
              <div class="m-0">
              <h5 class="fw-light">Hola <?= $_SESSION['nombre']; ?></h5>
                <h3 class="fw-light">
                  <span><?=$url[0] ?></span>
                </h3>
              </div>
            </div>
            <!-- Page Title end -->


           <!-- Header graphs start -->
            <div class="ms-auto">
              <div class="d-lg-flex d-none gap-4">
                <div class="d-flex align-items-center">
                  <div id="yearSales" class="me-3"></div>
                  <div class="m-0">
                    <div class="d-flex align-items-center">
                      <div class="fs-4 fw-bold lh-1">$860k</div>
                      <div class="ms-1 text-primary d-flex align-items-center lh-1">
                        <i class="bi bi-arrow-up-right fs-5"></i>
                      </div>
                    </div>
                    <small>Yearly Sales</small>
                  </div>
                </div>
                <div class="d-flex align-items-center">
                  <div id="yearRevenue" class="me-3"></div>
                  <div class="m-0">
                    <div class="d-flex align-items-center">
                      <div class="fs-4 fw-bold lh-1">$990k</div>
                      <div class="ms-1 text-primary d-flex align-items-center lh-1">
                        <i class="bi bi-arrow-up-right fs-5"></i>
                      </div>
                    </div>
                    <small>Overall Revenue</small>
                  </div>
                </div>
              </div>
            </div>
            <!-- Header graphs end -->

          </div>
          <!-- App Hero header ends -->