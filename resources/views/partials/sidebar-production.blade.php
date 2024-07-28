<nav class="sidebar close">
    <header>
        <div class="image-text">
            <span class="image">
                <img src="/Logo1.png" alt="logo">
            </span>
            <div class="text header-text">
                <span class="name">PRODACTION</span>
                <span class="profession" style="color: #255d83">--PRODUCTION--</span>
            </div>
        </div>
        {{-- <i class='bx bx-chevron-right toggle'></i> --}}
    </header>
    
    <div class="menu-bar">
        <div class="menu">
            <ul class="menu-links">
                <li class="nav-link mt-4" id="dashboard-link">
                    <a href="/production/dashboard">
                        <i class='bx bx-home-alt icon'></i>
                        <span class="text nav-text">Dashboard</span>
                    </a>
                </li>
                <li class="nav-link dropdown" id="order-link">
                  <a href="/production/order" onclick="toggleSubMenu(event)" class="togglesubmenu">
                      <i class='bx bx-cart icon'></i>
                      <span class="text nav-text" id="dropdowntext">Order ></span>
                  </a>
                  <ul class="sub-menu">
                      {{-- <li class="nav-link">
                        <a href="/production/order">
                          <i class='bx bx-cart icon' id="submenutext"></i>
                          <span class="text nav-text" id="submenutext">Order</span>
                        </a>
                      </li> --}}
                      <li class="nav-link">
                        <a href="/production/order/book">
                          <i class='bx bx-cart icon' id="submenutext"></i>
                          <span class="text nav-text" id="submenutext">Order Book</span>
                        </a>
                      </li>
                      <li class="nav-link">
                        <a href="/production/order/archive">
                          <i class='bx bx-cart icon' id="submenutext"></i>
                          <span class="text nav-text" id="submenutext">Order Archive</span>
                        </a>
                      </li>
                      {{-- <li class="nav-link">
                        <a href="/production/customer">
                          <i class='bx bx-cart icon' id="submenutext"></i>
                          <span class="text nav-text" id="submenutext">Customer</span>
                        </a>
                      </li> --}}
                  </ul>
              </li>
              <li class="nav-link dropdown" id="planning-link">
                <a href="/production/project" onclick="toggleSubMenu(event)" class="togglesubmenu">
                    <i class='bx bx-book-content icon'></i>
                    <span class="text nav-text" id="dropdowntext2">Planning ></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-link">
                      <a href="/production/project">
                        <i class='bx bx-book-content icon' id="submenutext"></i>
                        <span class="text nav-text" id="submenutext">Project</span>
                      </a>
                    </li>
                    <li class="nav-link">
                      <a href="/production/schedule">
                        <i class='bx bx-book-content icon' id="submenutext"></i>
                        <span class="text nav-text" id="submenutext">Schedule</span>
                      </a>
                    </li>
                </ul>
              </li>
              <li class="nav-link dropdown" id="production-link">
                <a href="/production/production" onclick="toggleSubMenu(event)" class="togglesubmenu">
                    <i class='bx bx-sitemap icon'></i>
                    <span class="text nav-text" id="dropdowntext2">Production ></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-link">
                      <a href="/production/production">
                        <i class='bx bx-sitemap icon' id="submenutext"></i>
                        <span class="text nav-text" id="submenutext">Production</span>
                      </a>
                    </li>
                    <li class="nav-link">
                      <a href="/production/production/archive">
                        <i class='bx bx-sitemap icon' id="submenutext"></i>
                        <span class="text nav-text" id="submenutext">Production Archive</span>
                      </a>
                    </li>
                    <li class="nav-link">
                      <a href="/production/machine">
                        <i class='bx bx-sitemap icon' id="submenutext"></i>
                        <span class="text nav-text" id="submenutext">Machine</span>
                      </a>
                    </li>
                    <li class="nav-link">
                      <a href="/production/workforce">
                        <i class='bx bx-sitemap icon' id="submenutext"></i>
                        <span class="text nav-text" id="submenutext">Workforce</span>
                      </a>
                    </li>
                </ul>
              </li>
                <li class="nav-link dropdown" id="inventory-link">
                    <a href="/production/inventory" onclick="toggleSubMenu(event)" class="togglesubmenu">
                        <i class='bx bx-cylinder icon'></i>
                        <span class="text nav-text" id="dropdowntext2">Inventory ></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-link">
                          <a href="/production/product">
                            <i class='bx bx-cylinder icon' id="submenutext"></i>
                            <span class="text nav-text" id="submenutext">Product</span>
                          </a>
                        </li>
                        {{-- <li class="nav-link">
                          <a href="/production/rejectedproduct">
                            <i class='bx bx-cylinder icon' id="submenutext"></i>
                            <span class="text nav-text" id="submenutext">Rejected Product</span>
                          </a>
                        </li> --}}
                        <li class="nav-link">
                          <a href="/production/material">
                            <i class='bx bx-cylinder icon' id="submenutext"></i>
                            <span class="text nav-text" id="submenutext">Material</span>
                          </a>
                        </li>
                        {{-- <li class="nav-link">
                          <a href="/production/purchase">
                            <i class='bx bx-cylinder icon' id="submenutext"></i>
                            <span class="text nav-text" id="submenutext">Request Material</span>
                          </a>
                        </li>
                        <li class="nav-link">
                          <a href="/production/purchase/transaction">
                            <i class='bx bx-cylinder icon' id="submenutext"></i>
                            <span class="text nav-text" id="submenutext">Request Transaction</span>
                          </a>
                        </li>
                        <li class="nav-link">
                          <a href="/production/purchase/item">
                            <i class='bx bx-cylinder icon' id="submenutext"></i>
                            <span class="text nav-text" id="submenutext">Requested Item</span>
                          </a>
                        </li> --}}
                    </ul>
                </li>
                {{-- <li class="nav-link dropdown" id="selling-link">
                  <a href="/production/selling" onclick="toggleSubMenu(event)" class="togglesubmenu">
                      <i class='bx bx-shopping-bag icon'></i>
                      <span class="text nav-text" id="dropdowntext">Selling ></span>
                  </a>
                  <ul class="sub-menu">
                      <li class="nav-link">
                        <a href="/production/selling">
                          <i class='bx bx-shopping-bag icon' id="submenutext"></i>
                          <span class="text nav-text" id="submenutext">Selling</span>
                        </a>
                      </li>
                      <li class="nav-link">
                        <a href="/production/selling/transaction">
                          <i class='bx bx-shopping-bag icon' id="submenutext"></i>
                          <span class="text nav-text" id="submenutext">Selling Transaction</span>
                        </a>
                      </li>
                      <li class="nav-link">
                        <a href="/production/selling/item">
                          <i class='bx bx-shopping-bag icon' id="submenutext"></i>
                          <span class="text nav-text" id="submenutext">Selling Item</span>
                        </a>
                      </li>
                  </ul>
                </li> --}}
                {{-- <li class="nav-link dropdown" id="return-link">
                  <a href="/production/returncustomer" onclick="toggleSubMenu(event)" class="togglesubmenu">
                      <i class='bx bx-left-down-arrow-circle icon'></i>
                      <span class="text nav-text" id="dropdowntext">Return ></span>
                  </a>
                  <ul class="sub-menu">
                      <li class="nav-link">
                        <a href="/production/returncustomer">
                          <i class='bx bx-book-content icon' id="submenutext"></i>
                          <span class="text nav-text" id="submenutext">Return Customer</span>
                        </a>
                      </li>
                      <li class="nav-link">
                        <a href="/production/returncustomer/archive">
                          <i class='bx bx-book-content icon' id="submenutext"></i>
                          <span class="text nav-text" id="submenutext">Return Customer Archive</span>
                        </a>
                      </li>
                      <li class="nav-link">
                        <a href="/production/returnproduction">
                          <i class='bx bx-book-content icon' id="submenutext"></i>
                          <span class="text nav-text" id="submenutext">Return Production</span>
                        </a>
                      </li>
                      <li class="nav-link">
                        <a href="/production/returnproduction/archive">
                          <i class='bx bx-book-content icon' id="submenutext"></i>
                          <span class="text nav-text" id="submenutext">Return Production Archive</span>
                        </a>
                      </li>
                      <li class="nav-link">
                        <a href="/production/returnmaterial">
                          <i class='bx bx-book-content icon' id="submenutext"></i>
                          <span class="text nav-text" id="submenutext">Return Material</span>
                        </a>
                      </li>
                      <li class="nav-link">
                        <a href="/production/returnmaterial/archive">
                          <i class='bx bx-book-content icon' id="submenutext"></i>
                          <span class="text nav-text" id="submenutext">Return Material Archive</span>
                        </a>
                      </li>
                  </ul>
                </li> --}}
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

  <script src="/js/logout.js"></script>
  <script src="/js/sidebar-production.js"></script>
  <script src="/js/script.js"></script>