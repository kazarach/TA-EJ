<nav class="sidebar close">
    <header>
        <div class="image-text">
            <span class="image">
                <img src="/Logo1.png" alt="logo">
            </span>
            <div class="text header-text">
                <span class="name">PRODACTION</span>
                <span class="profession" style="color: #255d83">--INVENTORY--</span>
            </div>
        </div>
        {{-- <i class='bx bx-chevron-right toggle'></i> --}}
    </header>
    
    <div class="menu-bar">
        <div class="menu">
            <ul class="menu-links">
                <li class="nav-link mt-4" id="dashboard-link">
                    <a href="/inventory/dashboard">
                        <i class='bx bx-home-alt icon'></i>
                        <span class="text nav-text">Dashboard</span>
                    </a>
                </li>
                {{-- <li class="nav-link dropdown" id="order-link">
                  <a href="/inventory/order" onclick="toggleSubMenu(event)" class="togglesubmenu">
                      <i class='bx bx-cart icon'></i>
                      <span class="text nav-text" id="dropdowntext">Order ></span>
                  </a>
                  <ul class="sub-menu">
                      <li class="nav-link">
                        <a href="/inventory/order">
                          <i class='bx bx-cart icon' id="submenutext"></i>
                          <span class="text nav-text" id="submenutext">Order</span>
                        </a>
                      </li>
                      <li class="nav-link">
                        <a href="/inventory/order/book">
                          <i class='bx bx-cart icon' id="submenutext"></i>
                          <span class="text nav-text" id="submenutext">Order Book</span>
                        </a>
                      </li>
                      <li class="nav-link">
                        <a href="/inventory/order/archive">
                          <i class='bx bx-cart icon' id="submenutext"></i>
                          <span class="text nav-text" id="submenutext">Order Archive</span>
                        </a>
                      </li>
                      <li class="nav-link">
                        <a href="/inventory/customer">
                          <i class='bx bx-cart icon' id="submenutext"></i>
                          <span class="text nav-text" id="submenutext">Customer</span>
                        </a>
                      </li>
                  </ul>
              </li> --}}
              {{-- <li class="nav-link dropdown" id="planning-link">
                <a href="/inventory/project" onclick="toggleSubMenu(event)" class="togglesubmenu">
                    <i class='bx bx-book-content icon'></i>
                    <span class="text nav-text" id="dropdowntext2">Planning ></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-link">
                      <a href="/inventory/project">
                        <i class='bx bx-book-content icon' id="submenutext"></i>
                        <span class="text nav-text" id="submenutext">Project</span>
                      </a>
                    </li>
                    <li class="nav-link">
                      <a href="/inventory/schedule">
                        <i class='bx bx-book-content icon' id="submenutext"></i>
                        <span class="text nav-text" id="submenutext">Schedule</span>
                      </a>
                    </li>
                </ul>
              </li> --}}
              {{-- <li class="nav-link dropdown" id="production-link">
                <a href="/inventory/production" onclick="toggleSubMenu(event)" class="togglesubmenu">
                    <i class='bx bx-sitemap icon'></i>
                    <span class="text nav-text" id="dropdowntext2">Production ></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-link">
                      <a href="/inventory/production">
                        <i class='bx bx-sitemap icon' id="submenutext"></i>
                        <span class="text nav-text" id="submenutext">Production</span>
                      </a>
                    </li>
                    <li class="nav-link">
                      <a href="/inventory/production/archive">
                        <i class='bx bx-sitemap icon' id="submenutext"></i>
                        <span class="text nav-text" id="submenutext">Production Archive</span>
                      </a>
                    </li>
                    <li class="nav-link">
                      <a href="/inventory/machine">
                        <i class='bx bx-sitemap icon' id="submenutext"></i>
                        <span class="text nav-text" id="submenutext">Machine</span>
                      </a>
                    </li>
                    <li class="nav-link">
                      <a href="/inventory/workforce">
                        <i class='bx bx-sitemap icon' id="submenutext"></i>
                        <span class="text nav-text" id="submenutext">Workforce</span>
                      </a>
                    </li>
                </ul>
              </li> --}}
                <li class="nav-link dropdown" id="inventory-link">
                    <a href="/inventory/inventory" onclick="toggleSubMenu(event)" class="togglesubmenu">
                        <i class='bx bx-cylinder icon'></i>
                        <span class="text nav-text" id="dropdowntext2">Inventory ></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-link">
                          <a href="/inventory/product">
                            <i class='bx bx-cylinder icon' id="submenutext"></i>
                            <span class="text nav-text" id="submenutext">Product</span>
                          </a>
                        </li>
                        <li class="nav-link">
                          <a href="/inventory/rejectedproduct">
                            <i class='bx bx-cylinder icon' id="submenutext"></i>
                            <span class="text nav-text" id="submenutext">Rejected Product</span>
                          </a>
                        </li>
                        <li class="nav-link">
                          <a href="/inventory/material">
                            <i class='bx bx-cylinder icon' id="submenutext"></i>
                            <span class="text nav-text" id="submenutext">Material</span>
                          </a>
                        </li>
                        <li class="nav-link">
                          <a href="/inventory/purchase">
                            <i class='bx bx-cylinder icon' id="submenutext"></i>
                            <span class="text nav-text" id="submenutext">Request Material</span>
                          </a>
                        </li>
                        <li class="nav-link">
                          <a href="/inventory/purchase/transaction">
                            <i class='bx bx-cylinder icon' id="submenutext"></i>
                            <span class="text nav-text" id="submenutext">Request Transaction</span>
                          </a>
                        </li>
                        <li class="nav-link">
                          <a href="/inventory/purchase/item">
                            <i class='bx bx-cylinder icon' id="submenutext"></i>
                            <span class="text nav-text" id="submenutext">Requested Item</span>
                          </a>
                        </li>
                    </ul>
                </li>
                {{-- <li class="nav-link dropdown" id="selling-link">
                  <a href="/inventory/selling" onclick="toggleSubMenu(event)" class="togglesubmenu">
                      <i class='bx bx-shopping-bag icon'></i>
                      <span class="text nav-text" id="dropdowntext">Selling ></span>
                  </a>
                  <ul class="sub-menu">
                      <li class="nav-link">
                        <a href="/inventory/selling">
                          <i class='bx bx-shopping-bag icon' id="submenutext"></i>
                          <span class="text nav-text" id="submenutext">Selling</span>
                        </a>
                      </li>
                      <li class="nav-link">
                        <a href="/inventory/selling/transaction">
                          <i class='bx bx-shopping-bag icon' id="submenutext"></i>
                          <span class="text nav-text" id="submenutext">Selling Transaction</span>
                        </a>
                      </li>
                      <li class="nav-link">
                        <a href="/inventory/selling/item">
                          <i class='bx bx-shopping-bag icon' id="submenutext"></i>
                          <span class="text nav-text" id="submenutext">Selling Item</span>
                        </a>
                      </li>
                  </ul>
                </li> --}}
                <li class="nav-link dropdown" id="return-link">
                  <a href="/inventory/returncustomer" onclick="toggleSubMenu(event)" class="togglesubmenu">
                      <i class='bx bx-left-down-arrow-circle icon'></i>
                      <span class="text nav-text" id="dropdowntext">Return ></span>
                  </a>
                  <ul class="sub-menu">
                      <li class="nav-link">
                        <a href="/inventory/returncustomer">
                          <i class='bx bx-book-content icon' id="submenutext"></i>
                          <span class="text nav-text" id="submenutext">Return Customer</span>
                        </a>
                      </li>
                      <li class="nav-link">
                        <a href="/inventory/returncustomer/archive">
                          <i class='bx bx-book-content icon' id="submenutext"></i>
                          <span class="text nav-text" id="submenutext">Return Customer Archive</span>
                        </a>
                      </li>
                      {{-- <li class="nav-link">
                        <a href="/inventory/returnproduction">
                          <i class='bx bx-book-content icon' id="submenutext"></i>
                          <span class="text nav-text" id="submenutext">Return Production</span>
                        </a>
                      </li>
                      <li class="nav-link">
                        <a href="/inventory/returnproduction/archive">
                          <i class='bx bx-book-content icon' id="submenutext"></i>
                          <span class="text nav-text" id="submenutext">Return Production Archive</span>
                        </a>
                      </li>
                      <li class="nav-link">
                        <a href="/inventory/returnmaterial">
                          <i class='bx bx-book-content icon' id="submenutext"></i>
                          <span class="text nav-text" id="submenutext">Return Material</span>
                        </a>
                      </li>
                      <li class="nav-link">
                        <a href="/inventory/returnmaterial/archive">
                          <i class='bx bx-book-content icon' id="submenutext"></i>
                          <span class="text nav-text" id="submenutext">Return Material Archive</span>
                        </a>
                      </li> --}}
                  </ul>
                </li>
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
  <script src="/js/sidebar-inventory.js"></script>
  <script src="/js/script.js"></script>