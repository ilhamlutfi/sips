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

$title = 'Data Jurusan'; // judul halaman

include 'layout/header.php'; // panggil file layout/header.php

// menampilkan seluruh data dari tbl_jurusan berdasarkan data terbaru
$data_jurusan = query("SELECT * FROM tbl_jurusan ORDER BY id_jurusan DESC");

// ketika tombol tambah di tekan jalankan script berikut
if (isset($_POST['tambah'])) {
    if (tambah_jurusan($_POST) > 0) {
        $_SESSION['tambah'] = true;
        $_SESSION['timeout'] = time();

        header('Location:data-jurusan.php');
    } else {
        $_SESSION['gagal-tambah'] = true;
        $_SESSION['timeout'] = time();

        header('Location:data-jurusan.php');
    }
}

// ketika tombol ubah di tekan jalankan script berikut
if (isset($_POST['ubah'])) {
    if (ubah_jurusan($_POST) > 0) {
        $_SESSION['ubah'] = true;
        $_SESSION['timeout'] = time();

        header('Location:data-jurusan.php');
    } else {
        $_SESSION['gagal-ubah'] = true;
        $_SESSION['timeout'] = time();

        header('Location:data-jurusan.php');
    }
}


// hapus alert session alert setelah 1 detik
if (isset($_SESSION['timeout'])) {
    if (time() - $_SESSION['timeout'] > 1) {
        // deklerasikan session yg ingin dihapus
        unset($_SESSION['tambah']);
        unset($_SESSION['gagal-tambah']);
        unset($_SESSION['ubah']);
        unset($_SESSION['gagal-ubah']);
        unset($_SESSION['hapus']);
        unset($_SESSION['gagal-hapus']);
    }
}


?>

<!-- Body -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-list"></i> Data Jurusan</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Data Jurusan</h6>
        </div>
        <div class="card-body">
            <button type="button" class="btn btn-primary btn-sm mb-2" data-toggle="modal" data-target="#modalTambah"> <i class="fas fa-plus"></i> Tambah</button>

            <?php if (isset($_SESSION['tambah'])) : ?>
                <?= alert('Data Jurusan Berhasil Ditambahkan', 'success'); ?>

            <?php elseif (isset($_SESSION['gagal-tambah'])) : ?>
                <?= alert('Data Jurusan Gagal Ditambahkan', 'danger'); ?>

            <?php elseif (isset($_SESSION['ubah'])) : ?>
                <?= alert('Data Jurusan Berhasil Diubah', 'success'); ?>

            <?php elseif (isset($_SESSION['gagal-ubah'])) : ?>
                <?= alert('Data Jurusan Gagal Diubah', 'danger'); ?>

            <?php elseif (isset($_SESSION['hapus'])) : ?>
                <?= alert('Data Jurusan Berhasil Dihapus', 'success'); ?>

            <?php elseif (isset($_SESSION['gagal-hapus'])) : ?>
                <?= alert('Data Jurusan Gagal Dihapus', 'danger'); ?>
            <?php endif; ?>


            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="1%">No</th>
                            <th>Nama Jurusan</th>
                            <th>Tanggal Ditambahkan</th>
                            <th>Fungsi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($data_jurusan as $jurusan) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $jurusan['nama_jurusan']; ?></td>
                                <td><?= date('d/m/Y | H:s:i', strtotime($jurusan['tanggal_input'])); ?></td>
                                <td width="15%" class="text-center">
                                    <button type="button" class="btn btn-success btn-sm mb-1" title="Ubah" data-toggle="modal" data-target="#modalUbah<?= $jurusan['id_jurusan']; ?>"><i class="fas fa-edit"></i> Ubah</button>

                                    <a href="hapus-jurusan.php?id_jurusan=<?= $jurusan['id_jurusan']; ?>" class="btn btn-danger btn-sm mb-1" title="Hapus" onclick="return confirm('Yakin Data Jurusan Akan Dihapus');"><i class="fas fa-trash-alt"></i> Hapus</a>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <!-- /body -->

    <!-- Modal Tambah -->
    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus"></i> Tambah Jurusan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="nama_jurusan">Nama Jurusan</label>
                            <input type="text" name="nama_jurusan" id="nama_jurusan" class="form-control" required minlength="5">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Kembali</button>
                    <button type="submit" name="tambah" class="btn btn-primary btn-sm">Tambah</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Ubah -->
    <?php foreach ($data_jurusan as $jurusan) : ?>
        <div class="modal fade" id="modalUbah<?= $jurusan['id_jurusan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-success text-white">
                        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit"></i> Ubah Jurusan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                            <input type="hidden" name="id_jurusan" value="<?= $jurusan['id_jurusan']; ?>">

                            <div class="form-group">
                                <label for="nama_jurusan">Nama Jurusan</label>
                                <input type="text" name="nama_jurusan" id="nama_jurusan" class="form-control" required minlength="5" value="<?= $jurusan['nama_jurusan']; ?>">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Kembali</button>
                        <button type="submit" name="ubah" class="btn btn-success btn-sm">Ubah</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <?php include 'layout/footer.php'; ?>