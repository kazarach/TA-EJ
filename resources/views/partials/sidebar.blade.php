<nav class="sidebar close">
  <header>
      <div class="image-text">
          <span class="image">
              <img src="/Logo1.png" alt="logo">
          </span>
          <div class="text header-text">
              <span class="name">Mitra Produksi</span>
              <span class="profession">Konveksi</span>
          </div>
      </div>
      {{-- <i class='bx bx-chevron-right toggle'></i> --}}
  </header>

  <div class="menu-bar">
      <div class="menu">
          <ul class="menu-links">
              <li class="nav-link" id="dashboard-link">
                  <a href="/dashboard">
                      <i class='bx bx-home-alt icon'></i>
                      <span class="text nav-text">Dashboard</span>
                  </a>
              </li>
              <li class="nav-link" id="order-link">
                  <a href="/order">
                      <i class='bx bx-cart icon'></i>
                      <span class="text nav-text">Order</span>
                  </a>
              </li>
              <li class="nav-link dropdown" id="submenu-link">
                  <a href="/material" onclick="toggleSubMenu(event)" class="togglesubmenu">
                      <i class='bx bx-cylinder icon'></i>
                      <span class="text nav-text" id="dropdowntext">Inventory ></span>
                  </a>
                  <ul class="nav-link sub-menu">
                      <li class="nav-link">
                        <a href="/material">
                          <i class='bx bx-cylinder icon' id="submenutext"></i>
                          <span class="text nav-text" id="submenutext">Material</span>
                        </a>
                      </li>
                      <li class="nav-link">
                        <a href="/production">
                          <i class='bx bx-cylinder icon' id="submenutext"></i>
                          <span class="text nav-text" id="submenutext">Product</span>
                        </a>
                      </li>
                  </ul>
              </li>
              <li class="nav-link" id="planning-link">
                  <a href="/schedule">
                      <i class='bx bx-book-content icon'></i>
                      <span class="text nav-text">Planning</span>
                  </a>
              </li>
              <li class="nav-link" id="production-link">
                  <a href="/machine">
                      <i class='bx bx-sitemap icon'></i>
                      <span class="text nav-text">Production</span>
                  </a>
              </li>
              <li class="nav-link" id="selling-link">
                  <a href="/selling">
                      <i class='bx bx-shopping-bag icon'></i>
                      <span class="text nav-text">Selling</span>
                  </a>
              </li>
              <li class="nav-link" id="purchase-link">
                  <a href="/purchase">
                      <i class='bx bx-purchase-tag-alt icon'></i>
                      <span class="text nav-text">Purchase</span>
                  </a>
              </li>
              <li class="nav-link" id="cash-link">
                  <a href="/cash">
                      <i class='bx bx-book icon'></i>
                      <span class="text nav-text">Cash Book</span>
                  </a>
              </li>
          </ul>
      </div>
      <div class="bottom-content">
          <!-- Logout Form -->
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
          <li class="">
              <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <i class='bx bx-log-out icon'></i>
                  <span class="text nav-text">Logout</span>
              </a>
          </li>
          <li class="mode">
              <div class="moon-sun">
                  <i class='bx bx-moon icon moon'></i>
                  <i class='bx bx-sun icon sun'></i>
              </div>
              <span class="mode-text text">Dark Mode</span>
              <div class="toggle-switch">
                  <span class="switch"></span>
              </div>
          </li>
      </div>
  </div>
</nav>