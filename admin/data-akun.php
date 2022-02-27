<?php

$title = 'Data Akun'; // judul halaman

include 'layout/header.php'; // panggil file layout/header.php

// menampilkan seluruh data dari tbl_akun berdasarkan data terbaru
$data_akun = query("SELECT * FROM tbl_akun ORDER BY id_akun DESC");

// jika tombol tambah ditekan jalankan script berikut
if (isset($_POST['tambah'])) {
    if (tambah_akun($_POST) > 0) {
        echo "<script>
                alert('Data Akun Berhasil Ditambahkan');
                document.location.href = 'data-akun.php';
              </script>";
    } else {
        echo "<script>
                alert('Data Akun Gagal Ditambahkan');
                document.location.href = 'data-akun.php';
              </script>";
    }
}

// jika tombol ubah ditekan jalankan script berikut
if (isset($_POST['ubah'])) {
    if (ubah_akun($_POST) > 0) {
        echo "<script>
                alert('Data Akun Berhasil Diubah');
                document.location.href = 'data-akun.php';
              </script>";
    } else {
        echo "<script>
                alert('Data Akun Gagal Diubah');
                document.location.href = 'data-akun.php';
              </script>";
    }
}

?>

<!-- Body -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-users-cog"></i> Data Akun</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Data Akun</h6>
        </div>
        <div class="card-body">
            <button type="button" class="btn btn-primary btn-sm mb-2" data-toggle="modal" data-target="#modalTambah"> <i class="fas fa-plus"></i> Tambah</button>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="1%">No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Tanggal Register</th>
                            <th>Fungsi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($data_akun as $akun) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $akun['nama']; ?></td>
                                <td><?= $akun['username']; ?></td>
                                <td><?= $akun['email']; ?></td>
                                <td>Password Ter-enkripsi</td>
                                <td><?= date('d/m/Y | H:s:i', strtotime($akun['tanggal_register'])); ?></td>
                                <td width="15%" class="text-center">
                                    <button type="button" class="btn btn-success btn-sm mb-1" title="Ubah" data-toggle="modal" data-target="#modalUbah<?= $akun['id_akun']; ?>"><i class="fas fa-edit"></i> Ubah</button>

                                    <a href="hapus-akun.php?id_akun=<?= $akun['id_akun']; ?>" class="btn btn-danger btn-sm mb-1" title="Hapus" onclick="return confirm('Yakin Data Akun Akan Dihapus.?');"><i class="fas fa-trash-alt"></i> Hapus</a>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /body -->

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user-plus"></i> Tambah Akun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">

                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" required minlength="3">
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" required minlength="3">
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email" class="form-control" required minlength="3">
                    </div>

                    <div class="form-group">
                        <label for="level">Level</label>
                        <select name="level" id="level" class="form-control">
                            <option value="">-- pilih --</option>
                            <option value="1">Admin</option>
                            <option value="0">Operator</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="password">Password <small>(minimal 6 karakter)</small></label>
                        <input type="password" name="password" id="password" class="form-control" required minlength="6">
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
<?php foreach ($data_akun as $akun) : ?>
<div class="modal fade" id="modalUbah<?= $akun['id_akun']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user-edit"></i> Ubah Akun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">

                    <input type="hidden" name="id_akun" value="<?= $akun['id_akun']; ?>">
                       
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" required minlength="3" value="<?= $akun['nama']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" required minlength="3" value="<?= $akun['username']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email" class="form-control" required minlength="3" value="<?= $akun['email']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="level">Level</label>
                        <select name="level" id="level" class="form-control">
                            <?php $level = $akun['level']; ?>

                            <option value="1" <?= $level == '1' ? 'selected' : '' ?>>Admin</option>
                            <option value="0" <?= $level == '0' ? 'selected' : '' ?>>Operator</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="password">Password <small>(ketik password baru)</small></label>
                        <input type="password" name="password" id="password" class="form-control" required minlength="6">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Kembali</button>
                <button type="submit" name="ubah" class="btn btn-primary btn-sm">Ubah</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>

<?php include 'layout/footer.php'; ?>