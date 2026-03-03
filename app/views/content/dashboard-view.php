 <!-- Container starts -->
            <div class="container-fluid p-0">

              <!-- Row start -->
              <div class="row g-3">
                <!-- Total Sales -->
                <div class="col-xxl-3 col-sm-6 col-12">
                  <div class="card mb-3">
                    <div class="card-body">
                      <div class="d-flex align-items-center">
                        <div class="icon-box lg bg-primary bg-gradient rounded-5 me-3">
                          <i class="ri-shopping-cart-2-line fs-4"></i>
                        </div>
                        <div>
                          <h3>12.8k</h3>
                          <h6 class="text-muted fw-normal">Total Orders</h6>
                          <span class="badge bg-success text-white rounded-pill">
                            <i class="bi bi-arrow-up me-1"></i>+14.2%
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Customers -->
                <div class="col-xxl-3 col-sm-6 col-12">
                  <div class="card mb-3">
                    <div class="card-body">
                      <div class="d-flex align-items-center">
                        <div class="icon-box lg bg-primary bg-gradient rounded-5 me-3">
                          <i class="ri-group-line fs-4"></i>
                        </div>
                        <div>
                          <h3>45.6k</h3>
                          <h6 class="text-muted fw-normal">Active Customers</h6>
                          <span class="badge bg-success text-white rounded-pill">
                            <i class="bi bi-arrow-up me-1"></i>+8.7%
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Products -->
                <div class="col-xxl-3 col-sm-6 col-12">
                  <div class="card mb-3">
                    <div class="card-body">
                      <div class="d-flex align-items-center">
                        <div class="icon-box lg bg-primary bg-gradient rounded-5 me-3">
                          <i class="ri-box-3-line fs-4"></i>
                        </div>
                        <div>
                          <h3>1,245</h3>
                          <h6 class="text-muted fw-normal">Available Products</h6>
                          <span class="badge bg-success text-white rounded-pill">
                            <i class="bi bi-arrow-up me-1"></i>+5.4%
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Revenue -->
                <div class="col-xxl-3 col-sm-6 col-12">
                  <div class="card mb-3">
                    <div class="card-body">
                      <div class="d-flex align-items-center">
                        <div class="icon-box lg bg-danger bg-gradient rounded-5 me-3">
                          <i class="ri-bar-chart-box-line fs-4"></i>
                        </div>
                        <div>
                          <h3>$1.2M</h3>
                          <h6 class="text-muted fw-normal">Monthly Revenue</h6>
                          <span class="badge bg-danger text-white rounded-pill">
                            <i class="bi bi-arrow-down me-1"></i>-3.6%
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Row end -->

              <!-- Row start -->
              <div class="row gx-3">
                <div class="col-sm-12 col-12">
                  <div class="card mb-3">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="card-title">Sales</h5>
                      <div class="btn-group ms-auto" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" class="btn-check" name="btnradio" id="btnradio1">
                        <label class="btn btn-sm btn-outline-primary" for="btnradio1">Today</label>

                        <input type="radio" class="btn-check" name="btnradio" id="btnradio2">
                        <label class="btn btn-sm btn-outline-primary" for="btnradio2">Week</label>

                        <input type="radio" class="btn-check" name="btnradio" id="btnradio3">
                        <label class="btn btn-sm btn-outline-primary" for="btnradio3">Month</label>

                        <input type="radio" class="btn-check" name="btnradio" id="btnradio4" checked="">
                        <label class="btn btn-sm btn-outline-primary" for="btnradio4">Year</label>
                      </div>
                    </div>
                    <div class="card-body">

                      <!-- Graph starts -->
                      <div class="overflow-hidden">
                        <div id="sales"></div>
                      </div>
                      <!-- Graph ends -->

                    </div>
                  </div>
                </div>
              </div>
              <!-- Row end -->

              <!-- Row start -->
              <div class="row gx-3">
                <div class="col-xxl-4 col-sm-12 col-12">
                  <div class="card mb-3">
                    <div class="card-header">
                      <h5 class="card-title">Tasks</h5>
                    </div>
                    <div class="card-body card-height-lg">

                      <!-- Graph start -->
                      <div class="overflow-hidden">
                        <div id="tasks"></div>
                      </div>
                      <!-- Graph end -->

                      <!-- Details start -->
                      <div class="d-grid gap-3">
                        <!-- Labels start -->
                        <div class="d-flex justify-content-center gap-2 mt-n3">
                          <div class="badge bg-success-subtle">New</div>
                          <div class="badge bg-success-subtle">Active</div>
                          <div class="badge bg-danger-subtle">Pending</div>
                          <div class="badge bg-primary-subtle">Completed</div>
                          <div class="badge bg-secondary-subtle text-secondary">Archived</div>
                        </div>
                        <!-- Labels end -->

                        <!-- Stacked images start -->
                        <div class="stacked-images sm justify-content-center">
                          <img src="<?=APP_URL; ?>app/views/images/user.png" alt="Admin Dashboards">
                          <img src="<?=APP_URL; ?>app/views/images/user2.png" alt="Admin Dashboards">
                          <img src="<?=APP_URL; ?>app/views/images/user3.png" alt="Admin Dashboards">
                          <img src="<?=APP_URL; ?>app/views/images/user4.png" alt="Admin Dashboards">
                          <span class="plus bg-success-subtle">+5</span>
                        </div>
                        <!-- Stacked images end -->

                        <!-- Progress start -->
                        <div class="progress w-30 m-auto rounded-5" role="progressbar" aria-label="Task completion"
                          aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                          <div class="progress-bar bg-primary w-50">50%</div>
                        </div>
                        <!-- Progress end -->
                      </div>
                      <!-- Details end -->

                    </div>
                  </div>
                </div>
                <div class="col-xxl-8 col-sm-12 col-12">
                  <div class="card mb-3">
                    <div class="card-header">
                      <h5 class="card-title">Orders</h5>
                    </div>
                    <div class="card-body card-height-lg">

                      <!-- Table start -->
                      <div class="table-outer">
                        <table class="table align-middle mb-0">
                          <thead>
                            <tr>
                              <th scope="col">Order #</th>
                              <th scope="col">Customer</th>
                              <th scope="col">Product</th>
                              <th scope="col">Price</th>
                              <th scope="col">Status</th>
                              <th scope="col">Date</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>#1001</td>
                              <td>
                                <div class="d-flex align-items-center">
                                  <img src="<?=APP_URL; ?>app/views/images/user.png" alt="Transparent Admin Dashboard"
                                    class="img-2x rounded-5 me-2">
                                  <span>John Doe</span>
                                </div>
                              </td>
                              <td>iPhone 14</td>
                              <td>$999</td>
                              <td><span class="badge bg-success-subtle">Completed</span></td>
                              <td>2025-07-01</td>
                            </tr>
                            <tr>
                              <td>#1002</td>
                              <td>
                                <div class="d-flex align-items-center">
                                  <img src="<?=APP_URL; ?>app/views/images/user2.png" alt="Transparent Admin Dashboard"
                                    class="img-2x rounded-5 me-2">
                                  <span>Jane Smith</span>
                                </div>
                              </td>
                              <td>MacBook Pro</td>
                              <td>$2,399</td>
                              <td><span class=" badge bg-warning-subtle">Pending</span>
                              </td>
                              <td>2025-07-02</td>
                            </tr>
                            <tr>
                              <td>#1003</td>
                              <td>
                                <div class="d-flex align-items-center">
                                  <img src="<?=APP_URL; ?>app/views/images/user3.png" alt="Transparent Admin Dashboard"
                                    class="img-2x rounded-5 me-2">
                                  <span>Mike Lee</span>
                                </div>
                              </td>
                              <td>AirPods Max</td>
                              <td>$549</td>
                              <td><span class=" badge bg-success-subtle">Processing</span>
                              </td>
                              <td>2025-07-03</td>
                            </tr>
                            <tr>
                              <td>#1004</td>
                              <td>
                                <div class="d-flex align-items-center">
                                  <img src="<?=APP_URL; ?>app/views/images/user4.png" alt="Transparent Admin Dashboard"
                                    class="img-2x rounded-5 me-2">
                                  <span>Lisa Wong</span>
                                </div>
                              </td>
                              <td>iPad Air</td>
                              <td>$699</td>
                              <td><span class=" badge bg-danger-subtle">Cancelled</span>
                              </td>
                              <td>2025-07-04</td>
                            </tr>
                            <tr>
                              <td>#1005</td>
                              <td>
                                <div class="d-flex align-items-center">
                                  <img src="<?=APP_URL; ?>app/views/images/user.png" alt="Transparent Admin Dashboard"
                                    class="img-2x rounded-5 me-2">
                                  <span>Tom Ford</span>
                                </div>
                              </td>
                              <td>Apple Watch</td>
                              <td>$399</td>
                              <td><span class=" badge bg-primary-subtle">Shipped</span>
                              </td>
                              <td>2025-07-05</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <!-- Table end -->

                    </div>
                  </div>
                </div>
              </div>
              <!-- Row end -->

              <!-- Row start -->
              <div class="row gx-3">
                <div class="col-xxl-4 col-sm-6 col-12">
                  <div class="card mb-3">
                    <div class="card-header">
                      <h5 class="card-title">Browser Activity</h5>
                    </div>
                    <div class="card-body">

                      <div class="scroll300">
                        <ul class="list-unstyled mb-0">
                          <li class="d-flex align-items-center justify-content-between py-3 border-bottom">
                            <div class="d-flex align-items-center">
                              <div class="icon-box md rounded-5 bg-primary-subtle p-2">
                                <img src="<?=APP_URL; ?>app/views/images/browser/chrome.svg" alt="Chrome" class="img-2x">
                              </div>
                              <span class="ms-3 fw-semibold">Chrome</span>
                            </div>
                            <div class="d-flex align-items-center">
                              <span class="me-3 text-muted">68,200</span>
                              <span class="badge bg-success rounded-pill">62.3%</span>
                            </div>
                          </li>

                          <li class="d-flex align-items-center justify-content-between py-3 border-bottom">
                            <div class="d-flex align-items-center">
                              <div class="icon-box md rounded-5 bg-primary-subtle p-2">
                                <img src="<?=APP_URL; ?>app/views/images/browser/firefox.svg" alt="Firefox" class="img-2x">
                              </div>
                              <span class="ms-3 fw-semibold">Firefox</span>
                            </div>
                            <div class="d-flex align-items-center">
                              <span class="me-3 text-muted">22,450</span>
                              <span class="badge bg-info rounded-pill">19.6%</span>
                            </div>
                          </li>

                          <li class="d-flex align-items-center justify-content-between py-3 border-bottom">
                            <div class="d-flex align-items-center">
                              <div class="icon-box md rounded-5 bg-primary-subtle p-2">
                                <img src="<?=APP_URL; ?>app/views/images/browser/safari.svg" alt="Safari" class="img-2x">
                              </div>
                              <span class="ms-3 fw-semibold">Safari</span>
                            </div>
                            <div class="d-flex align-items-center">
                              <span class="me-3 text-muted">13,780</span>
                              <span class="badge bg-warning rounded-pill">12.6%</span>
                            </div>
                          </li>

                          <li class="d-flex align-items-center justify-content-between py-3 border-bottom">
                            <div class="d-flex align-items-center">
                              <div class="icon-box md rounded-5 bg-primary-subtle p-2">
                                <img src="<?=APP_URL; ?>app/views/images/browser/ie.svg" alt="Edge" class="img-2x">
                              </div>
                              <span class="ms-3 fw-semibold">Edge</span>
                            </div>
                            <div class="d-flex align-items-center">
                              <span class="me-3 text-muted">4,950</span>
                              <span class="badge bg-danger rounded-pill">4.5%</span>
                            </div>
                          </li>

                          <li class="d-flex align-items-center justify-content-between py-3">
                            <div class="d-flex align-items-center">
                              <div class="icon-box md rounded-5 bg-primary-subtle p-2">
                                <img src="<?=APP_URL; ?>app/views/images/browser/opera.svg" alt="Opera" class="img-2x">
                              </div>
                              <span class="ms-3 fw-semibold">Opera</span>
                            </div>
                            <div class="d-flex align-items-center">
                              <span class="me-3 text-muted">2,320</span>
                              <span class="badge bg-secondary rounded-pill">1.7%</span>
                            </div>
                          </li>
                        </ul>
                      </div>

                    </div>
                  </div>
                </div>
                <div class="col-xxl-4 col-sm-6 col-12">
                  <div class="card mb-3">
                    <div class="card-header">
                      <h5 class="card-title">Transactions</h5>
                    </div>
                    <div class="card-body">

                      <div class="scroll300">
                        <ul class="list-unstyled">
                          <li class="d-flex align-items-center gap-3 py-3 border-bottom">
                            <div class="icon-box md bg-primary-subtle p-2 rounded-2">
                              <i class="ri-exchange-dollar-line fs-4 text-primary"></i>
                            </div>
                            <div class="d-flex justify-content-between w-100 flex-wrap gap-2">
                              <div>
                                <h6 class="m-0">Cash on Delivery</h6>
                                <small class="text-secondary">Online Payment</small>
                              </div>
                              <div class="text-end">
                                <p class="m-0 fw-semibold">$52.63</p>
                                <div class="badge bg-danger-subtle rounded-1">+4pts</div>
                              </div>
                            </div>
                          </li>
                          <li class="d-flex align-items-center gap-3 py-3 border-bottom">
                            <div class="icon-box md bg-primary-subtle p-2 rounded-2">
                              <i class="ri-bank-card-line fs-4 text-primary"></i>
                            </div>
                            <div class="d-flex justify-content-between w-100 flex-wrap gap-2">
                              <div>
                                <h6 class="m-0">Card Payment</h6>
                                <small class="text-secondary">Direct Payment</small>
                              </div>
                              <div class="text-end">
                                <p class="m-0 fw-semibold">$83.96</p>
                                <div class="badge bg-warning-subtle rounded-1">+8pts</div>
                              </div>
                            </div>
                          </li>
                          <li class="d-flex align-items-center gap-3 py-3 border-bottom">
                            <div class="icon-box md bg-primary-subtle p-2 rounded-2">
                              <i class="ri-paypal-line fs-4 text-primary"></i>
                            </div>
                            <div class="d-flex justify-content-between w-100 flex-wrap gap-2">
                              <div>
                                <h6 class="m-0">Paypal</h6>
                                <small class="text-secondary">Online Payment</small>
                              </div>
                              <div class="text-end">
                                <p class="m-0 fw-semibold">$64.85</p>
                                <div class="badge bg-success-subtle rounded-1">+3pts</div>
                              </div>
                            </div>
                          </li>
                          <li class="d-flex align-items-center gap-3 py-3 border-bottom">
                            <div class="icon-box md bg-primary-subtle p-2 rounded-2">
                              <i class="ri-visa-line fs-4 text-primary"></i>
                            </div>
                            <div class="d-flex justify-content-between w-100 flex-wrap gap-2">
                              <div>
                                <h6 class="m-0">UPI Payment</h6>
                                <small class="text-secondary">Online Transaction</small>
                              </div>
                              <div class="text-end">
                                <p class="m-0 fw-semibold">$629.33</p>
                                <div class="badge bg-success-subtle rounded-1">+6pts</div>
                              </div>
                            </div>
                          </li>
                          <li class="d-flex align-items-center gap-3 py-3 border-bottom">
                            <div class="icon-box md bg-primary-subtle p-2 rounded-2">
                              <i class="ri-mastercard-line fs-4 text-primary"></i>
                            </div>
                            <div class="d-flex justify-content-between w-100 flex-wrap gap-2">
                              <div>
                                <h6 class="m-0">Master Card **** 98</h6>
                                <small class="text-secondary">Card Payment</small>
                              </div>
                              <div class="text-end">
                                <p class="m-0 fw-semibold">$234.09</p>
                                <div class="badge bg-secondary-subtle text-secondary rounded-1">+2pts</div>
                              </div>
                            </div>
                          </li>
                          <li class="d-flex align-items-center gap-3 py-3 border-bottom">
                            <div class="icon-box md bg-primary-subtle p-2 rounded-2">
                              <i class="ri-wallet-3-line fs-4 text-primary"></i>
                            </div>
                            <div class="d-flex justify-content-between w-100 flex-wrap gap-2">
                              <div>
                                <h6 class="m-0">Gift Card</h6>
                                <small class="text-secondary">Wallet Payment</small>
                              </div>
                              <div class="text-end">
                                <p class="m-0 fw-semibold">$369.00</p>
                                <div class="badge bg-success-subtle rounded-1">+3pts</div>
                              </div>
                            </div>
                          </li>
                          <li class="d-flex align-items-center gap-3 py-3 border-bottom">
                            <div class="icon-box md bg-primary-subtle p-2 rounded-2">
                              <i class="ri-paypal-line fs-4 text-primary"></i>
                            </div>
                            <div class="d-flex justify-content-between w-100 flex-wrap gap-2">
                              <div>
                                <h6 class="m-0">Paypal</h6>
                                <small class="text-secondary">Online Transaction</small>
                              </div>
                              <div class="text-end">
                                <p class="m-0 fw-semibold">$290.00</p>
                                <div class="badge bg-danger-subtle rounded-1">+2pts</div>
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>

                    </div>
                  </div>
                </div>
                <div class="col-xxl-4 col-sm-12 col-12">
                  <div class="card mb-3">
                    <div class="card-header">
                      <h5 class="card-title">Revenue Channels</h5>
                    </div>
                    <div class="card-body">

                      <div class="scroll300">
                        <div class="d-flex flex-column align-items-center justify-content-center">
                          <h2 class="fw-bold mb-2">$342,000</h2>
                          <div class="mb-3">
                            <span class="badge bg-primary-subtle px-3 py-2 fs-6 rounded-3">
                              Total Revenue in 2025
                            </span>
                          </div>
                          <div class="d-grid gap-3 w-100 mb-3">
                            <div class="d-flex align-items-center">
                              <div class="icon-box sm bg-success-subtle rounded-3 me-3">
                                <i class="ri-global-line"></i>
                              </div>
                              <div class="flex-grow-1">
                                <div class="fw-semibold">Website</div>
                                <div class="small text-secondary">Direct Sales</div>
                              </div>
                              <div class="fw-bold">$180k</div>
                            </div>
                            <div class="d-flex align-items-center">
                              <div class="icon-box sm bg-success-subtle rounded-3 me-3">
                                <i class="ri-store-2-line"></i>
                              </div>
                              <div class="flex-grow-1">
                                <div class="fw-semibold">Retail</div>
                                <div class="small text-secondary">In-store</div>
                              </div>
                              <div class="fw-bold">$110k</div>
                            </div>
                            <div class="d-flex align-items-center">
                              <div class="icon-box sm bg-danger-subtle rounded-3 me-3">
                                <i class="ri-smartphone-line"></i>
                              </div>
                              <div class="flex-grow-1">
                                <div class="fw-semibold">Mobile App</div>
                                <div class="small text-secondary">App Orders</div>
                              </div>
                              <div class="fw-bold">$52k</div>
                            </div>
                          </div>
                          <div class="w-100">
                            <div class="progress rounded-pill small" role="progressbar" aria-label="Revenue Channels"
                              aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                              <div class=" progress-bar bg-primary w-50"></div>
                              <div class="progress-bar bg-danger w-30"></div>
                              <div class="progress-bar bg-success w-20"></div>
                            </div>
                            <div class="d-flex justify-content-between mt-2 small text-secondary">
                              <span>Website</span>
                              <span>Retail</span>
                              <span>App</span>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
                <div class="col-xxl-6 col-sm-12 col-12">
                  <div class="card mb-3">
                    <div class="card-header">
                      <h5 class="card-title">Latest Updates</h5>
                    </div>
                    <div class="card-body">

                      <!-- Latest updates start -->
                      <ul class="list-unstyled mb-0">
                        <li class="d-flex align-items-start gap-3 py-3 border-bottom">
                          <div class="icon-box md bg-primary-subtle rounded-5">
                            <i class="ri-user-line fs-4"></i>
                          </div>
                          <div class="d-flex align-items-start flex-column gap-3 w-100">
                            <div class="d-flex align-items-center gap-2">
                              <h6 class="mb-0">Tom Ford</h6>
                              <span class="text-secondary">/</span>
                              <span class="text-primary">User Profile</span>
                              <span class="text-secondary">/</span>
                              <small class="text-secondary">2 mins ago</small>
                            </div>
                            <p class="mb-1 text-light">Updated profile information, including contact details
                              and profile
                              picture. Changes will help keep your account secure and up to date.</p>
                            <span class="badge bg-primary-subtle border border-primary">Profile</span>
                          </div>
                        </li>
                        <li class="d-flex align-items-start gap-3 py-3 border-bottom">
                          <div class="icon-box md bg-success-subtle rounded-5">
                            <i class="ri-car-line fs-4"></i>
                          </div>
                          <div class="d-flex align-items-start flex-column gap-3 w-100">
                            <div class="d-flex align-items-center gap-2">
                              <h6 class="mb-0">Jane Smith</h6>
                              <span class="text-secondary">/</span>
                              <span class="text-success">Trip Completed</span>
                              <span class="text-secondary">/</span>
                              <small class="text-secondary">5 mins ago</small>
                            </div>
                            <p class="mb-1 text-light">
                              Successfully completed a trip from Downtown to Airport. Customer rated 5 stars. Payment
                              was processed without issues, and the receipt was sent to the customer’s email.
                            </p>
                            <div>
                              <span class="text-success fs-5">
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                              </span>
                              <span class="badge bg-success-subtle border border-success">Trip</span>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex align-items-start gap-3 py-3 border-bottom">
                          <div class="icon-box md bg-success-subtle rounded-5">
                            <i class="ri-shopping-bag-3-line fs-4"></i>
                          </div>
                          <div class="d-flex align-items-start flex-column gap-3 w-100">
                            <div class="d-flex align-items-center gap-2">
                              <h6 class="mb-0">Mike Lee</h6>
                              <span class="text-secondary">/</span>
                              <span class="text-info">Product Purchase</span>
                              <span class="text-secondary">/</span>
                              <small class="text-secondary">10 mins ago</small>
                            </div>
                            <p class="mb-1 text-light">
                              Purchased a new MacBook Pro with extended warranty and accessories. The order was
                              processed successfully, and the customer opted for express shipping. Confirmation email
                              and invoice have been sent.
                            </p>
                            <span class="badge bg-success-subtle border border-info">Purchase</span>
                          </div>
                        </li>
                        <li class="d-flex align-items-start gap-3 py-3 border-bottom">
                          <div class="icon-box md bg-danger-subtle rounded-5">
                            <i class="ri-star-line fs-4"></i>
                          </div>
                          <div class="d-flex align-items-start flex-column gap-3 w-100">
                            <div class="d-flex align-items-center gap-2">
                              <h6 class="mb-0">Lisa Wong</h6>
                              <span class="text-secondary">/</span>
                              <span class="text-danger">Gave a Rating</span>
                              <span class="text-secondary">/</span>
                              <small class="text-secondary">Just now</small>
                            </div>
                            <p class="mb-1 text-light">
                              Rated her recent trip experience 4 out of 5 stars. Feedback: "Driver was punctual and
                              car was clean. Would recommend!"
                            </p>
                            <div>
                              <span class="text-danger fs-5">
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-line"></i>
                              </span>
                              <span class="badge bg-danger-subtle border border-danger ms-2">Rating</span>
                            </div>
                          </div>
                        </li>
                      </ul>
                      <!-- Latest update end -->

                    </div>
                  </div>
                </div>
                <div class="col-xxl-6 col-sm-12 col-12">
                  <div class="card mb-3">
                    <div class="card-header">
                      <h5 class="card-title">Discussions</h5>
                    </div>
                    <div class="card-body">

                      <!-- Discussions start -->
                      <ul class="list-unstyled mb-0">
                        <li class="d-flex align-items-start gap-3 py-3 border-bottom">
                          <img src="<?=APP_URL; ?>app/views/images/user.png" alt="Glossy UI" class="img-3x rounded-5">
                          <div class="flex-grow-1">
                            <div class="d-flex align-items-center gap-2 mb-1">
                              <h6 class="mb-0">John Doe</h6>
                              <span class="text-secondary small">2 mins ago</span>
                            </div>
                            <p class="mb-1 text-light">How can I update my trip details after booking?</p>
                            <div>
                              <span class="badge bg-primary-subtle border border-primary">Question</span>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex align-items-start gap-3 py-3 border-bottom">
                          <img src="<?=APP_URL; ?>app/views/images/user2.png" alt="Glossy UI" class="img-3x rounded-5">
                          <div class="flex-grow-1">
                            <div class="d-flex align-items-center gap-2 mb-1">
                              <h6 class="mb-0">Jane Smith</h6>
                              <span class="text-secondary small">5 mins ago</span>
                            </div>
                            <p class="mb-1 text-light">You can edit your trip details from the 'Upcoming Trips'
                              section before the trip starts.</p>
                            <div>
                              <span class="badge bg-success-subtle border border-success">Answer</span>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex align-items-start gap-3 py-3 border-bottom">
                          <img src="<?=APP_URL; ?>app/views/images/user3.png" alt="Glossy UI" class="img-3x rounded-5">
                          <div class="flex-grow-1">
                            <div class="d-flex align-items-center gap-2 mb-1">
                              <h6 class="mb-0">Mike Lee</h6>
                              <span class="text-secondary small">10 mins ago</span>
                            </div>
                            <p class="mb-1 text-light">Is there a way to download my trip invoices?</p>
                            <div>
                              <span class="badge bg-primary-subtle border border-primary">Question</span>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex align-items-start gap-3 py-3">
                          <img src="<?=APP_URL; ?>app/views/images/user4.png" alt="Glossy UI" class="img-3x rounded-5">
                          <div class="flex-grow-1">
                            <div class="d-flex align-items-center gap-2 mb-1">
                              <h6 class="mb-0">Lisa Wong</h6>
                              <span class="text-secondary small">Just now</span>
                            </div>
                            <p class="mb-1 text-light">Yes, go to 'Trip History' and click the download icon next
                              to each trip.</p>
                            <div>
                              <span class="badge bg-success-subtle border border-success">Answer</span>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex align-items-start gap-3 py-3 border-bottom">
                          <img src="<?=APP_URL; ?>app/views/images/user.png" alt="Glossy UI" class="img-3x rounded-5">
                          <div class="flex-grow-1">
                            <div class="d-flex align-items-center gap-2 mb-1">
                              <h6 class="mb-0">Tom Ford</h6>
                              <span class="text-secondary small">15 mins ago</span>
                            </div>
                            <p class="mb-1 text-light">Can I reschedule a trip after it has been confirmed?</p>
                            <div>
                              <span class="badge bg-primary-subtle border border-primary">Question</span>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex align-items-start gap-3 py-3">
                          <img src="<?=APP_URL; ?>app/views/images/user2.png" alt="Glossy UI" class="img-3x rounded-5">
                          <div class="flex-grow-1">
                            <div class="d-flex align-items-center gap-2 mb-1">
                              <h6 class="mb-0">Jane Smith</h6>
                              <span class="text-secondary small">12 mins ago</span>
                            </div>
                            <p class="mb-1 text-light">Yes, you can reschedule from the 'Upcoming Trips' page
                              before the trip starts.</p>
                            <div>
                              <span class="badge bg-success-subtle border border-success">Answer</span>
                            </div>
                          </div>
                        </li>
                      </ul>
                      <!-- Discussions end -->

                    </div>
                  </div>
                </div>
              </div>
              <!-- Row end -->

            </div>
            <!-- Container ends -->
