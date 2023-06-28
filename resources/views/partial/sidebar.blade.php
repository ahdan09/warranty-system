<div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="font-weight: 800; font-size: 17px;">
      <div class="info">
        @auth
        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        @endauth
        @guest
         <a href="#" class="d-block">Guest</a>
        @endguest
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            @auth
               <li class="nav-item">
              <a href="/products" class="nav-link">
                <i class="fa-solid fa-box-open"></i>
                <p style="margin-left: 10px;">
                  Products
                </p>
              </a>
            </li> 

            
            @endauth
                    
          </ul>
      </nav>
    <!-- /.sidebar-menu -->
  </div>