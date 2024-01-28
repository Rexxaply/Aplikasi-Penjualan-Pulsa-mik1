<div class="col-md-12">
        <?php
        if (isset($_SESSION['alert'])) {
        ?>
            <div class="alert alert-success alert-dismissible fade-show" role="alert">
                <i class="fas fa-info-circle me-2"></i> <strong>Success!</strong> <?= $_SESSION['alert']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
            </div>
        <?php
        }
        unset($_SESSION['alert']);
        ?>
        <?php
        if (isset($_SESSION['alert1'])) {
        ?>
            <div class="alert alert-danger alert-dismissible fade-show" role="alert">
                <i class="fas fa-info-circle me-2"></i> <strong>Gagal!</strong> <?= $_SESSION['alert1']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
            </div>
        <?php
        }
        unset($_SESSION['alert1']);
        ?>