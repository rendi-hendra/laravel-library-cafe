 <div id="wrapper">
     <!-- Sidebar -->
     <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar"
         style="position: sticky; top: 0; height: 100vh; z-index: 1020;">
         <!-- Sidebar - Brand -->
         <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/dashboard') }}">
             <div class="sidebar-brand-icon rotate-n-15">
                 <i class="fas fa-laugh-wink"></i>
             </div>
             <div class="sidebar-brand-text mx-3">Admin</div>
         </a>

         <!-- Divider -->
         <hr class="sidebar-divider">

         <!-- Heading -->
         <div class="sidebar-heading">
             Interface
         </div>

         <!-- Nav Item - Dashboard -->
         <li class="nav-item my-0 active fw-bold">
             <a class="nav-link" href="{{ url('/dashboard') }}">
                 <i class="fa-solid fa-box"></i>
                 <span>Barang</span>
             </a>
         </li>

         <!-- Nav Item - Pages Collapse Menu -->
         <li class="nav-item">
             <a class="nav-link" href="laporan.php">
                 <i class="fa-solid fa-file-lines"></i>
                 <span>Laporan</span>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="keranjang.php">
                 <i class="fa-solid fa-cart-shopping"></i>
                 <span>Keranjang</span>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="transaksi.php">
                 <i class="fa-solid fa-money-bill"></i>
                 <span>Transaksi</span>
             </a>
         </li>
         <!-- Nav Item - Utilities Collapse Menu -->
         <li class="nav-item">
             <a class="nav-link" href="user.php">
                 <i class="fa-solid fa-users"></i>
                 <span>User</span>
             </a>
         </li>

         <!-- Divider -->
         <hr class="sidebar-divider d-none d-md-block">

         <!-- Sidebar Toggler (Sidebar) -->
         <div class="text-center d-none d-md-inline">
             <button class="rounded-circle border-0" id="sidebarToggle"></button>
         </div>
     </ul>
     <!-- End of Sidebar -->

     <!-- Content Wrapper -->
     <div id="content-wrapper" class="d-flex flex-column">
         <!-- Main Content -->
         <div id="content">
             <!-- Topbar -->
             <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                 <!-- Sidebar Toggle (Topbar) -->
                 <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                     <i class="fa fa-bars"></i>
                 </button>
                 <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                     <div class="input-group">
                         <a class="navbar-brand font-weight-bold" href="{{ url('/dashboard') }}">Library Cafe</a>
                     </div>
                 </form>
                 <!-- Topbar Navbar -->
                 <ul class="navbar-nav ml-auto">
                     <div class="topbar-divider d-none d-sm-block"></div>
                     <!-- Nav Item - User Information -->
                     <li class="nav-item dropdown no-arrow">
                         <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                             data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                             <img class="img-profile rounded-circle" src="{{ asset('images/undraw_profile.svg') }}">
                         </a>
                         <!-- Dropdown - User Information -->
                         <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                             <a class="dropdown-item" href="#" data-target="#logoutModal">
                                 <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                 <button class=" btn btn-logout">Logout</button>
                             </a>
                             <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                 style="display: none;">
                                 @csrf
                             </form>
                         </div>
                     </li>
                 </ul>
             </nav>
             {{ $slot }}
         </div>
         <!-- End of Main Content -->
         <!-- Footer -->
         <footer class="sticky-footer bg-white">
             <div class="container my-auto">
                 <div class="copyright text-center my-auto">
                     <span>Copyright &copy; Library Cafe 2025</span>
                 </div>
             </div>
         </footer>
         <!-- End of Footer -->

     </div>
     <!-- End of Content Wrapper -->

 </div>
 <!-- End of Page Wrapper -->

 <!-- Scroll to Top Button-->
 <a class="scroll-to-top rounded" href="#page-top">
     <i class="fas fa-angle-up"></i>
 </a>

 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <script>
     document.querySelectorAll('.btn-logout').forEach(button => {
         button.addEventListener('click', function(e) {
             e.preventDefault();
             Swal.fire({
                 title: 'Yakin mau logout?',
                 icon: 'warning',
                 showCancelButton: true,
                 confirmButtonColor: '#d33',
                 cancelButtonColor: '#3085d6',
                 confirmButtonText: 'Ya!',
                 cancelButtonText: 'Batal'
             }).then(result => {
                 if (result.isConfirmed) {
                     document.getElementById('logout-form').submit();
                 }
             });
         });
     });
 </script>
