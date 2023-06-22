<nav class="sb-topnav navbar navbar-expand navbar-dark bg-primary">
    <!-- Navbar Brand-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 text-light" id="sidebarToggle" href="#!"><i class="fas fa-bars"style="font-size:36px;"></i></button>
    <a class="navbar-brand ps-4 text-light text-left " style="font-size:24px;" href="beranda.php">MiTra Web</a>
    
    <nav class="navbar navbar-expand-sm bg-primary ">
  <ul class="navbar-nav">
    
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container">
<div class="btn-group ">
      <button type="button" class="btn btn-light text-primary dropdown-toggle" data-toggle="dropdown"><i class="fas fa-handshake"style="font-size:24px;"></i>
      Transaksi
      </button>
      <div class="dropdown-menu ">
        <a class="dropdown-item" href="/transaksi/index"><i class="fas fa-table mr-2"></i>List Transaksi</a>
        <a class="dropdown-item" href="/Transaksi"><i class="fas fa-money-bill-wave mr-2"></i>Tambah Transaksi</a>
         
        
      </div>
      <div class="btn-group">
      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><i class="fas fa-child"style="font-size:24px;"></i>
      Customer
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item"  href="/Customer"><i class="fas fa-table mr-2"></i>List Customer</a>
        <a class="dropdown-item" href="/Customer/create"><i class="fas fa-user-plus mr-2"></i>Tambah Customer</a>
      </div>     
      <div class="btn-group">
      <button type="button" class="btn btn-light text-primary dropdown-toggle" data-toggle="dropdown"><i class="fas fa-car-side"style="font-size:24px;"></i>
      Mobil
      </button>
      <div class="dropdown-menu  ">
        <a class="dropdown-item " href="/kendaraan"><i class="fas fa-table mr-2"></i>List Mobil</a>
        <a class="dropdown-item " href="/kendaraan/create"><i class="fas fa-plus-circle mr-2"></i>Tambah Mobil</a>
      </div>
  </div>
</div>

</body>
</html>



</nav>
<br>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
            <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
        </div>
    </form>
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4 ">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw text-light"></i>
                    <?= user()->username ?></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="/logout">Logout</a></li>
                    </ul>
                </li>
            </ul>
    

    
</nav>