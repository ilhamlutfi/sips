<?php

// check login jika gagal lempar kembali ke login.php
if (!isset($_SESSION["login"])) {
    echo "<script>
            alert('Anda harus login terlebih dahulu');
            document.location.href = 'login.php';
          </script>";
    exit;
}

$title = 'Dashboard';

include 'layout/header.php'; // panggil file layout/header.php

$total_pendaftaran = query("SELECT * FROM tbl_pendaftaran");
$total_jurusan = query("SELECT * FROM tbl_jurusan");
$total_akun = query("SELECT * FROM tbl_akun");

?>

<!-- Body -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Pendaftaran</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($total_pendaftaran); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Jurusan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($total_jurusan); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Total Akun</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($total_akun); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-cog fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Content Row -->

</div>
<!-- /body -->

<?php include 'layout/footer.php'; // panggil file layout/footer.php 
?>