
        <!-- App container starts -->
        <div class="app-container">

          <!-- App header starts -->
          <div class="app-header d-flex align-items-center mb-2">

            <!-- Toggle buttons start -->
            <div class="d-flex">
              <button type="button" class="btn btn-sm btn-transparent rounded-3 me-2 toggle-sidebar" id="toggle-sidebar"
                title="Toggle Sidebar">
                <i class="ri-menu-unfold-line fs-5"></i>
              </button>
              <button type="button" class="btn btn-sm btn-transparent rounded-3 me-2 pin-sidebar" id="pin-sidebar"
                title="Pin Sidebar">
                <i class="ri-menu-unfold-line fs-5"></i>
              </button>
            </div>
            <!-- Toggle buttons end -->

            <!-- App brand sm start -->
            <div class="app-brand-sm d-lg-none d-sm-block">
              <a href="index.html">
                <img src="<?=APP_URL; ?>app/views/images/logo-sm.svg" class="logo" alt="Glossy Admin Template">
              </a>
            </div>
            <!-- App brand sm end -->

            <!-- Breadcrumb start -->
            <ol class="breadcrumb d-none d-lg-flex ms-3">
              <li class="breadcrumb-item">
                <i class="ri-home-7-line"></i>
                <a href="index.html" class="text-decoration-none">Home</a>
              </li>
              <li class="breadcrumb-item">Dashboard</li>
            </ol>
            <!-- Breadcrumb end -->

            <!-- Header actions ccontainer start -->
            <div class="d-flex align-items-center gap-3 ms-auto">

              <!-- Search container start -->
              <div class="search-container rounded-5 d-xl-block d-none">
                <input type="text" class="form-control rounded-5" id="search" placeholder="Search">
                <i class="ri-search-line"></i>
              </div>
              <!-- Search container end -->

              <!-- Trips start -->
              <a href="kanban.html" class="active-tasks rounded-5 d-xxl-flex d-none">
                <span>New Tasks</span>
                <span class="tasks-icon">5</span>
              </a>
              <!-- Trips end -->

              <!-- Header actions start -->
              <div class="header-actions d-md-flex d-none align-items-center gap-2">
                <div class="dropdown">
                  <a class="dropdown-toggle position-relative action-icon" href="#!" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="<?=APP_URL; ?>app/views/images/flags/1x1/gb.svg" class="flag-img" alt="Bootstrap Dashboards">
                  </a>
                  <div class="dropdown-menu dropdown-menu-end dropdown-mini">
                    <div class="country-container">
                      <a href="index.html" class="py-2">
                        <img src="<?=APP_URL; ?>app/views/images/flags/1x1/us.svg" alt="Admin Panel">
                      </a>
                      <a href="index.html" class="py-2">
                        <img src="<?=APP_URL; ?>app/views/images/flags/1x1/in.svg" alt="Admin Panels">
                      </a>
                      <a href="index.html" class="py-2">
                        <img src="<?=APP_URL; ?>app/views/images/flags/1x1/br.svg" alt="Admin Dashboards">
                      </a>
                      <a href="index.html" class="py-2">
                        <img src="<?=APP_URL; ?>app/views/images/flags/1x1/tr.svg" alt="Admin Themes">
                      </a>
                      <a href="index.html" class="py-2">
                        <img src="<?=APP_URL; ?>app/views/images/flags/1x1/id.svg" alt="Google Admin">
                      </a>
                    </div>
                  </div>
                </div>
                <div class="dropdown">
                  <a class="dropdown-toggle position-relative action-icon" href="#!" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="ri-shopping-cart-line fs-5 lh-1"></i>
                    <span
                      class="count rounded-circle bg-danger animate__animated animate__heartBeat animate__infinite">9</span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-end dropdown-300">
                    <h5 class="px-3 py-2">Orders</h5>
                    <div class="scroll300">
                      <div class="d-grid gap-2">
                        <div class="px-3 py-2">
                          <div class="d-flex align-items-start">
                            <div class="icon-box md bg-primary rounded-5 me-3">
                              AM
                            </div>
                            <div class="m-0">
                              <h6>Amina Malik</h6>
                              <p class="mb-1">Ordered an iPhone 15 Pro.</p>
                              <p class="small m-0 opacity-50">2 mins ago</p>
                            </div>
                          </div>
                        </div>

                        <div class="px-3 py-2">
                          <div class="d-flex align-items-start">
                            <div class="icon-box md bg-primary rounded-5 me-3">
                              SR
                            </div>
                            <div class="m-0">
                              <h6>Sophia Rivera</h6>
                              <p class="mb-1">Purchased a MacBook Air.</p>
                              <p class="small m-0 opacity-50">6 mins ago</p>
                            </div>
                          </div>
                        </div>

                        <div class="px-3 py-2">
                          <div class="d-flex align-items-start">
                            <div class="icon-box md bg-primary rounded-5 me-3">
                              EK
                            </div>
                            <div class="m-0">
                              <h6>Emma Keller</h6>
                              <p class="mb-1">Bought a Galaxy Tab S9.</p>
                              <p class="small m-0 opacity-50">9 mins ago</p>
                            </div>
                          </div>
                        </div>

                        <div class="px-3 py-2">
                          <div class="d-flex align-items-start">
                            <div class="icon-box md bg-primary rounded-5 me-3">
                              ML
                            </div>
                            <div class="m-0">
                              <h6>Mei Lin</h6>
                              <p class="mb-1">Ordered an iPad Air.</p>
                              <p class="small m-0 opacity-50">14 mins ago</p>
                            </div>
                          </div>
                        </div>

                        <div class="px-3 py-2">
                          <div class="d-flex align-items-start">
                            <div class="icon-box md bg-primary rounded-5 me-3">
                              OL
                            </div>
                            <div class="m-0">
                              <h6>Olivia Lopez</h6>
                              <p class="mb-1">Purchased an Apple Watch Ultra.</p>
                              <p class="small m-0 opacity-50">18 mins ago</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="d-grid p-3 border-top">
                      <a href="javascript:void(0)" class="btn btn-outline-primary">View all</a>
                    </div>
                  </div>
                </div>
                <div class="dropdown">
                  <a class="dropdown-toggle position-relative action-icon" href="#!" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="ri-shake-hands-line fs-5 lh-1"></i>
                    <span class="count rounded-circle bg-danger">5</span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-end dropdown-300">
                    <h5 class="px-3 py-2">Notifications</h5>
                    <div class="scroll300">
                      <div class="d-grid gap-2">
                        <div class="px-3 py-2">
                          <div class="d-flex align-items-start">
                            <img src="<?=APP_URL; ?>app/views/images/user4.png" class="img-3x me-3 rounded-5" alt="Admin Themes">
                            <div class="m-0">
                              <h6>Rachelle Vincent</h6>
                              <p class="mb-1">
                                You have a new meeting request for tomorrow at 10 AM. Please confirm your availability.
                              </p>
                              <p class="small m-0 opacity-50">
                                Today, 07:30pm
                              </p>
                            </div>
                          </div>
                        </div>
                        <div class="px-3 py-2">
                          <div class="d-flex align-items-start">
                            <img src="<?=APP_URL; ?>app/views/images/user2.png" class="img-3x me-3 rounded-5" alt="Admin Theme">
                            <div class="m-0">
                              <h6>Beth Chang</h6>
                              <p class="mb-1">
                                You have 3 new messages in your inbox. Please check them at your earliest convenience.
                              </p>
                              <p class="small m-0 opacity-50">
                                Today, 08:00pm
                              </p>
                            </div>
                          </div>
                        </div>
                        <div class="px-3 py-2">
                          <div class="d-flex align-items-start">
                            <img src="<?=APP_URL; ?>app/views/images/user3.png" class="img-3x me-3 rounded-5" alt="Admin Theme">
                            <div class="m-0">
                              <h6>Tyrone Rich</h6>
                              <p class="mb-1">
                                Added $5000 into account.
                              </p>
                              <p class="small m-0 opacity-50">
                                Today, 09:30pm
                              </p>
                            </div>
                          </div>
                        </div>
                        <div class="px-3 py-2">
                          <div class="d-flex align-items-start">
                            <img src="<?=APP_URL; ?>app/views/images/user5.png" class="img-3x me-3 rounded-5" alt="Admin Notification">
                            <div class="m-0">
                              <h6>Samuel Green</h6>
                              <p class="mb-1">
                                Your password was changed successfully. If this wasn't you, please contact support
                                immediately.
                              </p>
                              <p class="small m-0 opacity-50">
                                Today, 10:15pm
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="d-grid p-3 border-top">
                      <a href="javascript:void(0)" class="btn btn-outline-primary">View all</a>
                    </div>
                  </div>
                </div>
                <div class="dropdown">
                  <a class="dropdown-toggle d-flex align-items-center user-settings" href="#!" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="<?=APP_URL; ?>app/views/images/user4.png" class="img-3x rounded-5" alt="Admin Dashboard">
                  </a>
                  <div class="dropdown-menu dropdown-menu-end">
                    <div class="d-flex align-items-center p-3 border-bottom">
                      <div class="me-3">
                        <img src="<?=APP_URL; ?>app/views/images/user9.png" alt="Glossy Admin Dashboard" class="img-4x rounded-5">
                      </div>
                      <div>
                        <div class="fw-semibold">Mei Ling</div>
                        <div class="small">mei.ling@email.com</div>
                        <div class="small text-success">Credits: 760 / 1000</div>
                      </div>
                    </div>
                    <div class="d-grid gap-2 p-3">
                      <div class="header-action-links d-flex gap-2 mb-2">
                        <a class="action-link rounded-2 p-2" href="settings.html">
                          <i class="ri-settings-3-line"></i>Settings
                        </a>
                        <a class="action-link rounded-2 p-2" href="crm.html">
                          <i class="ri-pie-chart-line"></i>CRM
                        </a>
                        <a class="action-link rounded-2 p-2" href="inbox.html">
                          <i class="ri-mail-send-line"></i>Inbox
                        </a>
                      </div>
                      <div class="d-grid">
                        <a href="login.html" class="btn btn-outline-primary">Logout</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Header actions end -->

            </div>
            <!-- Header actions ccontainer end -->

          </div>
          <!-- App header ends -->
