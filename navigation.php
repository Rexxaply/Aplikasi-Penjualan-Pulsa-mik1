<nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom shadow-sm p-3 mb-3">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="asset/img/logo.png" alt="logo" width="30px" class="d-inline-block align-text-top">
                <span class="title">ELTIPONSEL</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item me-1">
                        <a class="nav-link <?= $_GET['module'] == 'beranda' ? 'active' : '' ?>" aria-current="page" href="index.php?module=beranda"><i class="fas fa-home"></i> Beranda</a>
                    </li>
                    <li class="nav-item me-1">
                        <a class="nav-link <?= $_GET['module'] == 'pelanggan' ? 'active' : '' ?>" aria-current="page" href="index.php?module=pelanggan"><i class="fas fa-user-friends"></i> Pelanggan</a>
                    </li>
                    <li class="nav-item me-1">
                        <a class="nav-link <?= $_GET['module'] == 'pulsa' ? 'active' : '' ?>" aria-current="page" href="index.php?module=pulsa"><i class="fas fa-mobile-alt"></i> Pulsa</a>
                    </li>
                    <li class="nav-item me-1">
                        <a class="nav-link <?= $_GET['module'] == 'penjualan' ? 'active' : '' ?>" aria-current="page" href="index.php?module=penjualan"><i class="fas fa-shopping-cart"></i> Penjualan</a>
                    </li>
                    <li class="nav-item me-1">
                        <a class="nav-link <?= $_GET['module'] == 'laporan' ? 'active' : '' ?>" aria-current="page" href="index.php?module=laporan"><i class="fas fa-book"></i> Laporan</a>
                    </li>
                    <li class="nav-item me-1">
                        <a class="nav-link <?= $_GET['module'] == 'pengguna' ? 'active' : '' ?>" aria-current="page" href="index.php?module=pengguna"><i class="fas fa-user-lock"></i> Pengguna</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" aria-current="page" href="logput.php"><i class="fas fa-sign-out-alt"></i> Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>