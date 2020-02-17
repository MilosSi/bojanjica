<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">BOJANJICA</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">

      </div>
      <div class="info">
        <a href="#" class="d-block"><?= $_SESSION['korisnik']->ime?> <?= $_SESSION['korisnik']->prezime?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="index.php?adminpage=home" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Početna
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="index.php?adminpage=narudzbe" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Narudžbe
              <span class="right badge badge-danger">New</span>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="index.php?adminpage=proizvodi" class="nav-link">
            <i class="nav-icon fas fa-tree"></i>
            <p>
              Proizvodi

            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="index.php?adminpage=komentari" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
            <p>
              Komentari

            </p>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
