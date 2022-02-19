<?php

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

                                    <button type="button" class="btn btn-success btn-sm mb-1" title="Ubah" data-toggle="modal" data-target="#modalUbah<?= $pendaftaran['id_pendaftaran']; ?>"><i class="fas fa-edit"></i></button>

                                    <a href="hapus-pendaftaran.php?id_pendaftaran=<?= $pendaftaran['id_pendaftaran']; ?>" class="btn btn-danger btn-sm mb-1" title="Hapus" onclick="return confirm('Yakin Data pendaftaran Akan Dihapus');"><i class="fas fa-trash-alt"></i></a>

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

<?php include 'layout/footer.php'; ?>