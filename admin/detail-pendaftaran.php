<?php

session_start();

// check login jika gagal lempar kembali ke login.php
if (!isset($_SESSION["login"])) {
    echo "<script>
            alert('Anda harus login terlebih dahulu');
            document.location.href = 'login.php';
          </script>";
    exit;
}

$title = 'Detail Data Pendaftaran';

include 'layout/header.php';

$id_pendaftaran = (int)$_GET['id_pendaftaran'];

// pilih semua dari tabel pendaftaran join dengan jurusan
$data_pendaftaran = query("SELECT * FROM tbl_pendaftaran JOIN tbl_jurusan ON tbl_pendaftaran.jurusan_id = tbl_jurusan.id_jurusan WHERE id_pendaftaran = '$id_pendaftaran'")[0];

?>

<!-- Body -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-user"></i> Detail Pendaftaran</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Data Pendaftaran</h6>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>NISN</th>
                        <td>: <?= $data_pendaftaran['nisn']; ?></td>
                        <th>Nama</th>
                        <td>: <?= $data_pendaftaran['nama']; ?></td>
                    </tr>

                    <tr>
                        <th>Jurusan</th>
                        <td>: <?= $data_pendaftaran['nama_jurusan']; ?></td>
                        <th>Alamat</th>
                        <td>: <?= $data_pendaftaran['alamat']; ?></td>
                    </tr>

                    <tr>
                        <th>Tempat/Tanggal lahir</th>
                        <td>: <?= $data_pendaftaran['tempat']; ?>/<?= date('d-m-Y', strtotime($data_pendaftaran['tanggal_lahir'])); ?></td>
                        <th>Asal sekolah</th>
                        <td>: <?= $data_pendaftaran['asal_sekolah']; ?></td>
                    </tr>

                    <tr>
                        <th>Nama Ortu/Wali</th>
                        <td>: <?= $data_pendaftaran['nama_ortu']; ?></td>
                        <th>Pekerjaan Ortu/Wali</th>
                        <td>: <?= $data_pendaftaran['pekerjaan_ortu']; ?></td>
                    </tr>

                    <tr>
                        <th>Nomor Telepon</th>
                        <td>: <?= $data_pendaftaran['no_telepon']; ?></td>
                        <th>Tanggal Daftar</th>
                        <td>: <?= date('d-m-Y | H:i:s', strtotime($data_pendaftaran['tanggal_daftar'])); ?></td>
                    </tr>

                    <tr>
                        <th>File Ijazah/SKL</th>
                        <td colspan="3">
                            <embed src="assets/file/<?= $data_pendaftaran['file']; ?>#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf" width="91%" height="500px" />
                        </td>
                    </tr>

                </table>

                <a href="data-pendaftaran.php" class="btn btn-secondary float-right">Kembali</a>
            </div>

        </div>
    </div>
    <!-- /body -->
</div>

<?php include 'layout/footer.php'; ?>