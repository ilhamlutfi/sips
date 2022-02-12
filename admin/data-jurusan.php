<?php

$title = 'Data Jurusan'; // judul halaman

include 'layout/header.php'; // panggil file layout/header.php

// menampilkan seluruh data dari tbl_jurusan
$data_jurusan = query("SELECT * FROM tbl_jurusan ORDER BY id_jurusan DESC");

// ketika tombol tambah di tekan jalankan script berikut
if (isset($_POST['tambah'])) {
    if (tambah_jurusan($_POST) > 0) {
        echo "<script>
                alert('Data Jurusan Berhasil Ditambahkan'); 
                document.location.href = 'data-jurusan.php';
             </script>";
    } else {
        echo "<script>
                alert('Data Jurusan Gagal Ditambahkan');
                document.location.href = 'data-jurusan.php';
             </script>";
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

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
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
                                    <a href="" class="btn btn-success btn-sm mb-1" title="Ubah"><i class="fas fa-edit"></i> Ubah</a>

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
                            <input type="text" name="nama_jurusan" id="nama_jurusan" class="form-control">
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

    <?php include 'layout/footer.php'; ?>