<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin/isikonten" class="brand-link">
      <img src="/img/lambang.png" alt="Logo Fofoto.Snap" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin FOFOTO</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
          <li class="nav-item">
            <a href="/admin/isikonten" class="nav-link {{ Request::is('admin/isikonten') ? 'active' : '' }}">
              <i class="nav-icon fas fa-camera"></i>
              <p>
                Isi Konten 
              </p>
            </a>
          </li>
        
          <li class="nav-item">
            <a href="/admin/adminuser" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Akun Admin
              </p>
            </a>
    
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>