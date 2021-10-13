<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="../../index3.html" class="brand-link">
    <img src="{{asset('backend/dist/img/images.jpg')}}" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Ainy Shoes</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
      </div>
      <div class="info">

      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        <li class="nav-item">
          <a href={{ route('admin_home') }} class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Home
              <span class="right badge badge-danger">New</span>
            </p>
          </a>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              DATA MASTER
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>


          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href={{ route('sepatu_view') }} class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Sepatu</p>
              </a>
            </li>
          </ul>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href={{ route('kat_view') }} class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Kategori</p>
              </a>
            </li>
          </ul>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Pemasok</p>
              </a>
            </li>
          </ul>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href={{ route('bank_view') }} class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Rekening</p>
              </a>
            </li>
          </ul>






        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              DATA TRANSAKSI
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href={{ route('transaksi_view') }} class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Transaksi</p>
              </a>
            </li>
          </ul>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href={{ route('pembayaran_view') }} class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Pembayaran</p>
              </a>
            </li>
          </ul>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href={{ route('transaksitmp_view') }} class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Transaksi Tmp</p>
              </a>
            </li>
          </ul>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href={{ route('kurir_view') }} class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Kurir</p>
              </a>
            </li>
          </ul>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href={{ route('report_view') }} class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Report Penjualan</p>
              </a>
            </li>
          </ul>
        </li>

        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button class="btn btn-danger btn-block mt-4">Logout</button>
        </form>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>