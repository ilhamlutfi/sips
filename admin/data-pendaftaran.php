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

$title = 'Data Pendaftaran';

include 'layout/header.php';

$data_pendaftaran = query('SELECT * FROM tbl_pendaftaran ORDER BY id_pendaftaran DESC');

?>

<!-- Body -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-users"></i> Data Pendaftaran</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Data Pendaftaran</h6>
        </div>
        <div class="card-body">

            <a href="tambah-pendaftaran.php" class="btn btn-primary btn-sm mb-2"><i class="fas fa-plus"></i> Tambah</a>

            <a href="download-laporan.php" class="btn btn-warning btn-sm mb-2 float-right"><i class="fas fa-download"></i> Download Laporan</a>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="1%">No</th>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th>Tempat/Tanggal lahir</th>
                            <th>Asal sekolah</th>
                            <th>Telepon</th>
                            <th>Fungsi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($data_pendaftaran as $pendaftaran) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $pendaftaran['nisn']; ?></td>
                                <td><?= $pendaftaran['nama']; ?></td>
                                <td>
                                    <?= $pendaftaran['tempat']; ?>/<?= date('d-m-Y', strtotime($pendaftaran['tanggal_lahir'])); ?>
                                </td>
                                <td><?= $pendaftaran['asal_sekolah']; ?></td>
                                <td><?= $pendaftaran['no_telepon']; ?></td>

                                <td width="15%" class="text-center">
                                    <a href="detail-pendaftaran.php?id_pendaftaran=<?= $pendaftaran['id_pendaftaran']; ?>" class="btn btn-secondary btn-sm mb-1" title="Detail"><i class="fas fa-eye"></i></a>

                                    <a href="ubah-pendaftaran.php?id_pendaftaran=<?= $pendaftaran['id_pendaftaran']; ?>" class="btn btn-success btn-sm mb-1" title="Ubah"><i class="fas fa-edit"></i></a>

                                    <button type="button" class="btn btn-danger btn-sm mb-1" title="Hapus" data-toggle="modal" data-target="#modalHapus<?= $pendaftaran['id_pendaftaran']; ?>"><i class="fas fa-trash-alt"></i></button>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <!-- /body -->
</div>

<!-- Modal Hapus -->
<?php foreach ($data_pendaftaran as $pendaftaran) : ?>
    <div class="modal fade" id="modalHapus<?= $pendaftaran['id_pendaftaran']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-trash-alt"></i> Hapus Data Pendaftaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <p>Yakin Data Pendaftar Dengan Nama : <b><?= $pendaftaran['nama']; ?></b>, Akan Dihapus.?</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                    <a href="hapus-pendaftaran.php?id_pendaftaran=<?= $pendaftaran['id_pendaftaran']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?php include 'layout/footer.php'; ?>