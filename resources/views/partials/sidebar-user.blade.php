<nav class="sidebar close">
  <header>
      <div class="image-text">
          <span class="image">
              <img src="/Logo1.png" alt="logo">
          </span>
          <div class="text header-text">
              <span class="name">PRODACTION</span>
              <span class="profession" style="color: #255d83">--USER--</span>
          </div>
      </div>
      {{-- <i class='bx bx-chevron-right toggle'></i> --}}
  </header>
  
  <div class="menu-bar">
      <div class="menu">
          <ul class="menu-links">
              <li class="nav-link mt-4" id="dashboard-link">
                  <a href="/user/dashboard">
                      <i class='bx bx-home-alt icon'></i>
                      <span class="text nav-text">Dashboard</span>
                  </a>
              </li>
              {{-- <li class="nav-link dropdown" id="order-link">
                <a href="/order" onclick="toggleSubMenu(event)" class="togglesubmenu">
                    <i class='bx bx-cart icon'></i>
                    <span class="text nav-text" id="dropdowntext">Order ></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-link">
                      <a href="/order">
                        <i class='bx bx-cart icon' id="submenutext"></i>
                        <span class="text nav-text" id="submenutext">Order</span>
                      </a>
                    </li>
                    <li class="nav-link">
                      <a href="/order/book">
                        <i class='bx bx-cart icon' id="submenutext"></i>
                        <span class="text nav-text" id="submenutext">Order Book</span>
                      </a>
                    </li>
                    <li class="nav-link">
                      <a href="/order/archive">
                        <i class='bx bx-cart icon' id="submenutext"></i>
                        <span class="text nav-text" id="submenutext">Order Archive</span>
                      </a>
                    </li>
                    <li class="nav-link">
                      <a href="/customer">
                        <i class='bx bx-cart icon' id="submenutext"></i>
                        <span class="text nav-text" id="submenutext">Customer</span>
                      </a>
                    </li>
                </ul>
            </li> --}}
            {{-- <li class="nav-link dropdown" id="planning-link">
              <a href="/project" onclick="toggleSubMenu(event)" class="togglesubmenu">
                  <i class='bx bx-book-content icon'></i>
                  <span class="text nav-text" id="dropdowntext2">Planning ></span>
              </a>
              <ul class="sub-menu">
                  <li class="nav-link">
                    <a href="/project">
                      <i class='bx bx-book-content icon' id="submenutext"></i>
                      <span class="text nav-text" id="submenutext">Project</span>
                    </a>
                  </li>
                  <li class="nav-link">
                    <a href="/schedule">
                      <i class='bx bx-book-content icon' id="submenutext"></i>
                      <span class="text nav-text" id="submenutext">Schedule</span>
                    </a>
                  </li>
              </ul>
            </li> --}}
            {{-- <li class="nav-link dropdown" id="production-link">
              <a href="/project" onclick="toggleSubMenu(event)" class="togglesubmenu">
                  <i class='bx bx-sitemap icon'></i>
                  <span class="text nav-text" id="dropdowntext2">Production ></span>
              </a>
              <ul class="sub-menu">
                  <li class="nav-link">
                    <a href="/production">
                      <i class='bx bx-sitemap icon' id="submenutext"></i>
                      <span class="text nav-text" id="submenutext">Production</span>
                    </a>
                  </li>
                  <li class="nav-link">
                    <a href="/production/archive">
                      <i class='bx bx-sitemap icon' id="submenutext"></i>
                      <span class="text nav-text" id="submenutext">Production Archive</span>
                    </a>
                  </li>
                  <li class="nav-link">
                    <a href="/machine">
                      <i class='bx bx-sitemap icon' id="submenutext"></i>
                      <span class="text nav-text" id="submenutext">Machine</span>
                    </a>
                  </li>
                  <li class="nav-link">
                    <a href="/workforce">
                      <i class='bx bx-sitemap icon' id="submenutext"></i>
                      <span class="text nav-text" id="submenutext">Workforce</span>
                    </a>
                  </li>
              </ul>
            </li> --}}
              <li class="nav-link dropdown" id="inventory-link">
                  <a href="/inventory" onclick="toggleSubMenu(event)" class="togglesubmenu">
                      <i class='bx bx-cylinder icon'></i>
                      <span class="text nav-text" id="dropdowntext2">Inventory ></span>
                  </a>
                  <ul class="sub-menu">
                      <li class="nav-link">
                        <a href="/product">
                          <i class='bx bx-cylinder icon' id="submenutext"></i>
                          <span class="text nav-text" id="submenutext">Product</span>
                        </a>
                      </li>
                      {{-- <li class="nav-link">
                        <a href="/rejectedproduct">
                          <i class='bx bx-cylinder icon' id="submenutext"></i>
                          <span class="text nav-text" id="submenutext">Rejected Product</span>
                        </a>
                      </li>
                      <li class="nav-link">
                        <a href="/material">
                          <i class='bx bx-cylinder icon' id="submenutext"></i>
                          <span class="text nav-text" id="submenutext">Material</span>
                        </a>
                      </li> --}}
                      {{-- <li class="nav-link">
                        <a href="/purchase">
                          <i class='bx bx-cylinder icon' id="submenutext"></i>
                          <span class="text nav-text" id="submenutext">Purchase</span>
                        </a>
                      </li>
                      <li class="nav-link">
                        <a href="/purchase/transaction">
                          <i class='bx bx-cylinder icon' id="submenutext"></i>
                          <span class="text nav-text" id="submenutext">Purchase Transaction</span>
                        </a>
                      </li>
                      <li class="nav-link">
                        <a href="/purchase/item">
                          <i class='bx bx-cylinder icon' id="submenutext"></i>
                          <span class="text nav-text" id="submenutext">Purchase Item</span>
                        </a>
                      </li> --}}
                  </ul>
              </li>
              {{-- <li class="nav-link dropdown" id="selling-link">
                <a href="/selling" onclick="toggleSubMenu(event)" class="togglesubmenu">
                    <i class='bx bx-shopping-bag icon'></i>
                    <span class="text nav-text" id="dropdowntext">Selling ></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-link">
                      <a href="/selling">
                        <i class='bx bx-shopping-bag icon' id="submenutext"></i>
                        <span class="text nav-text" id="submenutext">Selling</span>
                      </a>
                    </li>
                    <li class="nav-link">
                      <a href="/selling/transaction">
                        <i class='bx bx-shopping-bag icon' id="submenutext"></i>
                        <span class="text nav-text" id="submenutext">Selling Transaction</span>
                      </a>
                    </li>
                    <li class="nav-link">
                      <a href="/selling/item">
                        <i class='bx bx-shopping-bag icon' id="submenutext"></i>
                        <span class="text nav-text" id="submenutext">Selling Item</span>
                      </a>
                    </li>
                </ul>
              </li> --}}
              {{-- <li class="nav-link dropdown" id="return-link">
                <a href="/returncustomer" onclick="toggleSubMenu(event)" class="togglesubmenu">
                    <i class='bx bx-left-down-arrow-circle icon'></i>
                    <span class="text nav-text" id="dropdowntext">Return ></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-link">
                      <a href="/returncustomer">
                        <i class='bx bx-book-content icon' id="submenutext"></i>
                        <span class="text nav-text" id="submenutext">Return Customer</span>
                      </a>
                    </li>
                    <li class="nav-link">
                      <a href="/returncustomer/archive">
                        <i class='bx bx-book-content icon' id="submenutext"></i>
                        <span class="text nav-text" id="submenutext">Return Customer Archive</span>
                      </a>
                    </li>
                    <li class="nav-link">
                      <a href="/returnproduction">
                        <i class='bx bx-book-content icon' id="submenutext"></i>
                        <span class="text nav-text" id="submenutext">Return Production</span>
                      </a>
                    </li>
                    <li class="nav-link">
                      <a href="/returnproduction/archive">
                        <i class='bx bx-book-content icon' id="submenutext"></i>
                        <span class="text nav-text" id="submenutext">Return Production Archive</span>
                      </a>
                    </li>
                </ul>
              </li> --}}
              {{-- <li class="nav-link dropdown" id="cash-link">
                <a href="/cash" onclick="toggleSubMenu(event)" class="togglesubmenu">
                    <i class='bx bx-book-alt icon'></i>
                    <span class="text nav-text" id="dropdowntext2">Cash Book ></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-link">
                      <a href="/cash">
                        <i class='bx bx-cylinder icon' id="submenutext"></i>
                        <span class="text nav-text" id="submenutext">Cash Book</span>
                      </a>
                    </li>
                    <li class="nav-link">
                      <a href="/report">
                        <i class='bx bx-cylinder icon' id="submenutext"></i>
                        <span class="text nav-text" id="submenutext">Report</span>
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
  <script src="/js/script.js"></script>
<script src="/js/sidebar-user.js"></script>