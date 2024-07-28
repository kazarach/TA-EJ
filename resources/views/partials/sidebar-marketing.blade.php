<nav class="sidebar close">
    <header>
        <div class="image-text">
            <span class="image">
                <img src="/Logo1.png" alt="logo">
            </span>
            <div class="text header-text">
                <span class="name">PRODACTION</span>
                <span class="profession" style="color: #255d83">--MARKETING--</span>
            </div>
        </div>
        {{-- <i class='bx bx-chevron-right toggle'></i> --}}
    </header>
    
    <div class="menu-bar">
        <div class="menu">
            <ul class="menu-links">
                <li class="nav-link mt-4" id="dashboard-link">
                    <a href="/marketing/dashboard">
                        <i class='bx bx-home-alt icon'></i>
                        <span class="text nav-text">Dashboard</span>
                    </a>
                </li>
                {{-- <li class="nav-link" id="partial-link">
                  <a href="/marketing/partialdropdown">
                    <i class='bx bx-shape-circle icon'></i>
                      <span class="text nav-text" id="dropdowntext">Partial</span>
                  </a>
                </li> --}}
                <li class="nav-link dropdown" id="order-link">
                  <a href="/marketing/order" onclick="toggleSubMenu(event)" class="togglesubmenu">
                      <i class='bx bx-cart icon'></i>
                      <span class="text nav-text" id="dropdowntext">Order ></span>
                  </a>
                  <ul class="sub-menu">
                      <li class="nav-link">
                        <a href="/marketing/order">
                          <i class='bx bx-cart icon' id="submenutext"></i>
                          <span class="text nav-text" id="submenutext">Order</span>
                        </a>
                      </li>
                      <li class="nav-link">
                        <a href="/marketing/order/book">
                          <i class='bx bx-cart icon' id="submenutext"></i>
                          <span class="text nav-text" id="submenutext">Order Book</span>
                        </a>
                      </li>
                      <li class="nav-link">
                        <a href="/marketing/order/archive">
                          <i class='bx bx-cart icon' id="submenutext"></i>
                          <span class="text nav-text" id="submenutext">Order Archive</span>
                        </a>
                      </li>
                      <li class="nav-link">
                        <a href="/marketing/customer">
                          <i class='bx bx-cart icon' id="submenutext"></i>
                          <span class="text nav-text" id="submenutext">Customer</span>
                        </a>
                      </li>
                      <li class="nav-link">
                        <a href="/marketing/catalog">
                          <i class='bx bx-cart icon' id="submenutext"></i>
                          <span class="text nav-text" id="submenutext">Catalog</span>
                        </a>
                      </li>
                  </ul>
              </li>
              {{-- <li class="nav-link dropdown" id="planning-link">
                <a href="/marketing/project" onclick="toggleSubMenu(event)" class="togglesubmenu">
                    <i class='bx bx-book-content icon'></i>
                    <span class="text nav-text" id="dropdowntext2">Planning ></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-link">
                      <a href="/marketing/project">
                        <i class='bx bx-book-content icon' id="submenutext"></i>
                        <span class="text nav-text" id="submenutext">Project</span>
                      </a>
                    </li>
                    <li class="nav-link">
                      <a href="/marketing/schedule">
                        <i class='bx bx-book-content icon' id="submenutext"></i>
                        <span class="text nav-text" id="submenutext">Schedule</span>
                      </a>
                    </li>
                </ul>
              </li> --}}
              {{-- <li class="nav-link dropdown" id="production-link">
                <a href="/marketing/production" onclick="toggleSubMenu(event)" class="togglesubmenu">
                    <i class='bx bx-sitemap icon'></i>
                    <span class="text nav-text" id="dropdowntext2">Production ></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-link">
                      <a href="/marketing/production">
                        <i class='bx bx-sitemap icon' id="submenutext"></i>
                        <span class="text nav-text" id="submenutext">Production</span>
                      </a>
                    </li>
                    <li class="nav-link">
                      <a href="/marketing/production/archive">
                        <i class='bx bx-sitemap icon' id="submenutext"></i>
                        <span class="text nav-text" id="submenutext">Production Archive</span>
                      </a>
                    </li>
                    <li class="nav-link">
                      <a href="/marketing/machine">
                        <i class='bx bx-sitemap icon' id="submenutext"></i>
                        <span class="text nav-text" id="submenutext">Machine</span>
                      </a>
                    </li>
                    <li class="nav-link">
                      <a href="/marketing/workforce">
                        <i class='bx bx-sitemap icon' id="submenutext"></i>
                        <span class="text nav-text" id="submenutext">Workforce</span>
                      </a>
                    </li>
                </ul>
              </li> --}}
                {{-- <li class="nav-link dropdown" id="inventory-link">
                    <a href="/marketing/inventory" onclick="toggleSubMenu(event)" class="togglesubmenu">
                        <i class='bx bx-cylinder icon'></i>
                        <span class="text nav-text" id="dropdowntext2">Inventory ></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-link">
                          <a href="/marketing/product">
                            <i class='bx bx-cylinder icon' id="submenutext"></i>
                            <span class="text nav-text" id="submenutext">Product</span>
                          </a>
                        </li>
                        <li class="nav-link">
                          <a href="/marketing/rejectedproduct">
                            <i class='bx bx-cylinder icon' id="submenutext"></i>
                            <span class="text nav-text" id="submenutext">Rejected Product</span>
                          </a>
                        </li>
                        <li class="nav-link">
                          <a href="/marketing/material">
                            <i class='bx bx-cylinder icon' id="submenutext"></i>
                            <span class="text nav-text" id="submenutext">Material</span>
                          </a>
                        </li>
                        <li class="nav-link">
                          <a href="/marketing/purchase">
                            <i class='bx bx-cylinder icon' id="submenutext"></i>
                            <span class="text nav-text" id="submenutext">Request Material</span>
                          </a>
                        </li>
                        <li class="nav-link">
                          <a href="/marketing/purchase/transaction">
                            <i class='bx bx-cylinder icon' id="submenutext"></i>
                            <span class="text nav-text" id="submenutext">Request Transaction</span>
                          </a>
                        </li>
                        <li class="nav-link">
                          <a href="/marketing/purchase/item">
                            <i class='bx bx-cylinder icon' id="submenutext"></i>
                            <span class="text nav-text" id="submenutext">Requested Item</span>
                          </a>
                        </li>
                    </ul>
                </li> --}}
                <li class="nav-link dropdown" id="selling-link">
                  <a href="/marketing/selling" onclick="toggleSubMenu(event)" class="togglesubmenu">
                      <i class='bx bx-shopping-bag icon'></i>
                      <span class="text nav-text" id="dropdowntext">Selling ></span>
                  </a>
                  <ul class="sub-menu">
                      <li class="nav-link">
                        <a href="/marketing/selling">
                          <i class='bx bx-shopping-bag icon' id="submenutext"></i>
                          <span class="text nav-text" id="submenutext">Selling</span>
                        </a>
                      </li>
                      <li class="nav-link">
                        <a href="/marketing/selling/transaction">
                          <i class='bx bx-shopping-bag icon' id="submenutext"></i>
                          <span class="text nav-text" id="submenutext">Selling Transaction</span>
                        </a>
                      </li>
                      <li class="nav-link">
                        <a href="/marketing/selling/item">
                          <i class='bx bx-shopping-bag icon' id="submenutext"></i>
                          <span class="text nav-text" id="submenutext">Selling Item</span>
                        </a>
                      </li>
                  </ul>
                </li>
                <li class="nav-link dropdown" id="return-link">
                  <a href="/marketing/returncustomer" onclick="toggleSubMenu(event)" class="togglesubmenu">
                      <i class='bx bx-left-down-arrow-circle icon'></i>
                      <span class="text nav-text" id="dropdowntext">Return ></span>
                  </a>
                  <ul class="sub-menu">
                      <li class="nav-link">
                        <a href="/marketing/returncustomer">
                          <i class='bx bx-book-content icon' id="submenutext"></i>
                          <span class="text nav-text" id="submenutext">Return Customer</span>
                        </a>
                      </li>
                      <li class="nav-link">
                        <a href="/marketing/returncustomer/archive">
                          <i class='bx bx-book-content icon' id="submenutext"></i>
                          <span class="text nav-text" id="submenutext">Return Customer Archive</span>
                        </a>
                      </li>
                      <li class="nav-link">
                        <a href="/marketing/returnproduction">
                          <i class='bx bx-book-content icon' id="submenutext"></i>
                          <span class="text nav-text" id="submenutext">Return Production</span>
                        </a>
                      </li>
                      <li class="nav-link">
                        <a href="/marketing/returnproduction/archive">
                          <i class='bx bx-book-content icon' id="submenutext"></i>
                          <span class="text nav-text" id="submenutext">Return Production Archive</span>
                        </a>
                      </li>
                      <li class="nav-link">
                        <a href="/marketing/returnmaterial">
                          <i class='bx bx-book-content icon' id="submenutext"></i>
                          <span class="text nav-text" id="submenutext">Return Material</span>
                        </a>
                      </li>
                      <li class="nav-link">
                        <a href="/marketing/returnmaterial/archive">
                          <i class='bx bx-book-content icon' id="submenutext"></i>
                          <span class="text nav-text" id="submenutext">Return Material Archive</span>
                        </a>
                      </li>
                  </ul>
                </li>
                
                <!-- <li class="nav-link dropdown" id="cash-link">
                  <a href="/marketing/cash" onclick="toggleSubMenu(event)" class="togglesubmenu">
                      <i class='bx bx-book-alt icon'></i>
                      <span class="text nav-text" id="dropdowntext2">Cash Book ></span>
                  </a>
                  <ul class="sub-menu">
                      <li class="nav-link">
                        <a href="/marketing/cash">
                          <i class='bx bx-cylinder icon' id="submenutext"></i>
                          <span class="text nav-text" id="submenutext">Cash Book</span>
                        </a>
                      </li>
                      <li class="nav-link">
                        <a href="/marketing/report">
                          <i class='bx bx-cylinder icon' id="submenutext"></i>
                          <span class="text nav-text" id="submenutext">Report</span>
                        </a>
                      </li>
                  </ul>
              </li> -->
            </ul>
        </div>
        <div class="bottom-content">
              <li class="">
                  <a href="#" id="logout-button">
                      <i class='bx bx-log-out icon'></i>
                      <span class="text nav-text">Logout</span>
                  </a>
              </li>
            {{-- <li class="mode">
                <div class="moon-sun">
                    <i class='bx bx-moon icon moon'></i>
                    <i class='bx bx-sun icon sun'></i>
                </div>
                <span class="mode-text text">Dark Mode</span>
                <div class="toggle-switch">
                    <span class="switch"></span>
                </div>
            </li> --}}
        </div>
    </div>
  </nav>
  
  <script src="/js/sidebar-marketing.js"></script>
  <script src="/js/script.js"></script>
  <script src="/js/logout.js"></script>