
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  
  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-book"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Perpus Digital</div>
  </a>
  
  <!-- Divider -->
  <hr class="sidebar-divider my-0">
  
  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('dashboard') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>
  
  <!-- Custom - Buku and Siswa -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCustom"
       aria-expanded="true" aria-controls="collapseCustom">
        <i class="fas fa-fw fa-home"></i>
        <span>Menu Utama</span>
    </a>
    <div id="collapseCustom" class="collapse" aria-labelledby="headingCustom" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Content:</h6>
          <a class="collapse-item" href="{{ route('buku.index') }}">
              <i class="fas fa-fw fa-book"></i> <!-- Ganti ikon buku di sini -->
              Buku
          </a>
          <a class="collapse-item" href="{{ route('siswa.index') }}">
              <i class="fas fa-fw fa-user"></i> <!-- Ganti ikon siswa di sini -->
              Siswa
          </a>
          <!-- Tambahkan submenu lainnya jika diperlukan -->
      </div>
  </div>
  
 <!-- Custom - Peminjaman and Pengembalian -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTransactions"
     aria-expanded="true" aria-controls="collapseTransactions">
      <i class="fas fa-fw fa-exchange-alt"></i> <!-- Replace with the icon you want for the main Transaksi menu -->
      <span>Transaksi</span>
  </a>
  <div id="collapseTransactions" class="collapse" aria-labelledby="headingTransactions" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Transaksi:</h6>
          <a class="collapse-item" href="{{ route('peminjaman.index') }}">
              <i class="fas fa-fw fa-arrow-circle-up"></i> <!-- Replace with the icon you want for Peminjaman -->
              Peminjaman
          </a>
          <a class="collapse-item" href="{{ route('pengembalian.index') }}">
              <i class="fas fa-fw fa-arrow-circle-down"></i> <!-- Replace with the icon you want for Pengembalian -->
              Pengembalian
          </a>
          <!-- Add more sub-menu items for Transactions here if needed -->
      </div>
  </div>
</li>

  <!-- New collapsible section for Detail Peminjaman and Detail Pengembalian -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDetails"
      aria-expanded="true" aria-controls="collapseDetails">
      <!-- Ganti kelas ikon berikut dengan ikon yang diinginkan dari Font Awesome -->
      <i class="fas fa-fw fa-list"></i>
      <span>Detail Transaksi</span>
  </a>
  <div id="collapseDetails" class="collapse" aria-labelledby="headingDetails" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Detail Transaksi:</h6>
          <a class="collapse-item" href="{{ route('peminjaman.show') }}">Detail Peminjaman</a>
          <a class="collapse-item" href="{{ route('pengembalian.show') }}">Detail Pengembalian</a>
          <!-- Add more sub-menu items for Detail Transactions here if needed -->
      </div>
  </div>
</li>

<!-- Laporan sidebar -->
<li class="nav-item">
  <a class="nav-link" href="{{ route('reports.index') }}">
      <i class="fas fa-fw fa-file-pdf"></i>
      <span>Laporan</span>
  </a>
</li>


{{-- profil link css --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha384-oS3vJ0Cq0r5t9z3LqkN5/9N6W5qF1aC5l1dKWZ5K4t6LJVbKKnHHDmq4W2jZ6Hfa" crossorigin="anonymous">

  
  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">
  
  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
  
  
</ul>