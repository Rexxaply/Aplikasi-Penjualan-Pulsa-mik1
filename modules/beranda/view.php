<div class="row my-3">
    <div class="col-md-12">
        <div class="alert alert-info py-2">
            <i class="fas fa-info-circle"></i>Selamat Datang di <strong> ELTIPonsel </strong>
        </div>
    </div>
</div>

<div class="row g-3">
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card text-center">
            <div class="mt-4">
                <i class="fas fa-user text-warning fa-10x"></i>
                <div class="card-body">
                    <h4 class="card-title"><?= $get_pelanggan ?></h4>
                    <p class="card-text">Data Pelanggan</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card text-center">
            <div class="mt-4">
                <i class="fas fa-mobile-alt text-danger fa-10x"></i>
                <div class="card-body">
                    <h4 class="card-title"><?= $get_pulsa ?></h4>
                    <p class="card-text">Data Pulsa</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card text-center">
            <div class="mt-4">
                <i class="fas fa-shopping-cart text-secondary fa-10x"></i>
                <div class="card-body">
                    <h4 class="card-title"><?= $get_penjualan ?></h4>
                    <p class="card-text">Data Penjualan</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card text-center">
            <div class="mt-4">
                <i class="fas fa-hand-holding-usd text-success fa-10x"></i>
                <div class="card-body">
                    <h4 class="card-title">Rp. <?= number_format($get_pendapatan,0,",",".") ?></h4>
                    <p class="card-text">Total Pendapatan</p>
                </div>
            </div>
        </div>
    </div>
</div>