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

$title = 'Formulir Ubah Pendaftaran';

include 'layout/header.php';

// ambil data jurusan sebagai pilihan input jurusan
$data_jurusan = query("SELECT * FROM tbl_jurusan ORDER BY id_jurusan DESC");

// ambil id data yang akan diubah
$id_pendaftaran = (int)$_GET['id_pendaftaran'];

// query ambil data dari tbl_pendaftaran sesuai dengan id yang dipilih
$data = query("SELECT * FROM tbl_pendaftaran WHERE id_pendaftaran = '$id_pendaftaran'")[0];

// ketika tombol ubah ditekan jalankan script dibawah ini
if (isset($_POST['ubah'])) {
    if (ubah_pendaftaran($_POST) > 0) {
        echo "<script>
                    alert('Data Pendaftaran Berhasil Diubah');
                    document.location.href = 'data-pendaftaran.php';
              </script>";
    } else {
        echo "<script>
                    alert('Data Pendaftaran Gagal Diubah');
                    document.location.href = 'ubah-pendaftaran.php?id_pendaftaran=$id_pendaftaran';
              </script>";
    }
}

?>

<!-- Body -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-user-edit"></i> Ubah Pendaftaran</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Formulir Pendaftaran</h6>
        </div>
        <div class="card-body">

            <form action="" method="post" enctype="multipart/form-data">

                <input type="hidden" name="id_pendaftaran" value="<?= $data['id_pendaftaran']; ?>">

                <input type="hidden" name="fileLama" value="<?= $data['file']; ?>">

                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="nisn"><b>NISN</b></label>
                        <input type="number" name="nisn" id="nisn" class="form-control" required minlength="10" maxlength="10" value="<?= $data['nisn']; ?>">
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="nama"><b>Nama</b></label>
                        <input type="text" name="nama" id="nama" class="form-control" required minlength="3" value="<?= $data['nama']; ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="jurusan_id"><b>Jurusan</b></label>
                        <select name="jurusan_id" id="jurusan_id" class="form-control" required>
                            <?php foreach ($data_jurusan as $jurusan) : ?>

                                <?php if ($jurusan['id_jurusan'] == $data['jurusan_id']) : ?>
                                    <option value="<?= $jurusan['id_jurusan']; ?>" selected><?= $jurusan['nama_jurusan']; ?></option>
                                <?php else : ?>
                                    <option value="<?= $jurusan['id_jurusan']; ?>"><?= $jurusan['nama_jurusan']; ?></option>
                                <?php endif; ?>

                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="alamat"><b>Alamat</b></label>
                        <input type="text" name="alamat" id="alamat" class="form-control" required minlength="3" value="<?= $data['alamat']; ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="tempat"><b>Tempat Lahir</b></label>
                        <input type="text" name="tempat" id="tempat" class="form-control" required minlength="3" value="<?= $data['tempat']; ?>">
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="tanggal_lahir"><b>Tanggal Lahir</b></label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required value="<?= $data['tanggal_lahir']; ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="asal_sekolah"><b>Asal Sekolah</b></label>
                        <input type="text" name="asal_sekolah" id="asal_sekolah" class="form-control" required minlength="3" value="<?= $data['asal_sekolah']; ?>">
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="nama_ortu"><b>Nama Orang Tua <small>(Laki-laki)</small></b></label>
                        <input type="text" name="nama_ortu" id="nama_ortu" class="form-control" required minlength="3" value="<?= $data['nama_ortu']; ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="pekerjaan_ortu"><b>Pekerjaan Orang Tua</b></label>
                        <input type="text" name="pekerjaan_ortu" id="pekerjaan_ortu" class="form-control" required minlength="3" value="<?= $data['pekerjaan_ortu']; ?>">
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="no_telepon"><b>Nomor Telepon</b></label>
                        <input type="number" name="no_telepon" id="no_telepon" class="form-control" required minlength="10" value="<?= $data['no_telepon']; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="file"><b>Upload Berkas</b> <small>(SKL/Ijazah)</small></label><br>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="file" name="file" onchange="previewImg()">
                        <label class="custom-file-label" for="file"><?= $data['file']; ?></label>
                        <small>Berkas harus PDF Max 2 MB</small>
                    </div>
                </div>

                <button type="submit" name="ubah" class="btn btn-primary btn-sm float-right ml-1">Ubah</button>
                <a href="data-pendaftaran.php" class="btn btn-secondary btn-sm float-right">Kembali</a>

            </form>

        </div>

    </div>
</div>

<script type="text/javascript">
    function previewImg() {
        const gambar = document.querySelector('#file');
        const gambarLabel = document.querySelector('.custom-file-label');
        const imgPreview = document.querySelector('.img-preview');

        gambarLabel.textContent = gambar.files[0].name;

        const fileGambar = new FileReader();
        fileGambar.readAsDataURL(gambar.files[0]);

        fileGambar.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }
</script>

<?php include 'layout/footer.php'; ?>