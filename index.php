<?php

include 'config/core.php';

// ambil data jurusan sebagai pilihan input jurusan
$data_jurusan = query("SELECT * FROM tbl_jurusan ORDER BY id_jurusan DESC");

// ketika tombol tambah ditekan jalankan script dibawah ini
if (isset($_POST['tambah'])) {
    if (tambah_pendaftaran($_POST) > 0) {
        echo "<script>
                    alert('Anda Telah Berhasil Mendaftar, Terima Kasih');
                    document.location.href = 'index.php';
              </script>";
    } else {
        echo "<script>
                    alert('Anda Gagal Mendaftar, Coba Lagi');
                    document.location.href = 'index.php';
              </script>";
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Formulir PPDB - SMA SEMANGAT OK</title>
</head>

<body>
    <!-- Navbar -->
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <img src="admin/assets/img/logo.jpg" alt="logo" width="5%"> 
                    SMA SEMANGAT OK</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="panduan.php">Panduan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Pengumuman</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- jubmotron -->
        <div class="jumbotron">
            <div class="container">
                <h1 class="display-4">Formulir PPDB</h1>
                <p class="lead">Website Pendaftaran Peserta Didik Baru SMA SEMANGAT OK Tahun Pelajaran 2022 - 2023</p>
                <hr class="my-4">
                <p>Jika mengalami kendala atau ada pertanyaan, Silahkan klik tombol hubungi dibawah ini, Untuk berkonsultasi dengan admin kami.</p>
                <a class="btn btn-primary" href="#" role="button">Hubungi</a>
            </div>
        </div>

        <!-- card -->
        <div class="container">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        Formulir Pendaftaran
                    </div>

                    <div class="card-body">

                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label for="nisn"><b>NISN</b></label>
                                    <input type="number" name="nisn" id="nisn" class="form-control" required minlength="10" maxlength="10">
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="nama"><b>Nama</b></label>
                                    <input type="text" name="nama" id="nama" class="form-control" required minlength="3">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label for="jurusan_id"><b>Jurusan</b></label>
                                    <select name="jurusan_id" id="jurusan_id" class="form-control" required>
                                        <option value="">-- pilih --</option>
                                        <?php foreach ($data_jurusan as $jurusan) : ?>
                                            <option value="<?= $jurusan['id_jurusan']; ?>"><?= $jurusan['nama_jurusan']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="alamat"><b>Alamat</b></label>
                                    <input type="text" name="alamat" id="alamat" class="form-control" required minlength="3">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label for="tempat"><b>Tempat Lahir</b></label>
                                    <input type="text" name="tempat" id="tempat" class="form-control" required minlength="3">
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="tanggal_lahir"><b>Tanggal Lahir</b></label>
                                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label for="asal_sekolah"><b>Asal Sekolah</b></label>
                                    <input type="text" name="asal_sekolah" id="asal_sekolah" class="form-control" required minlength="3">
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="nama_ortu"><b>Nama Orang Tua <small>(Laki-laki)</small></b></label>
                                    <input type="text" name="nama_ortu" id="nama_ortu" class="form-control" required minlength="3">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label for="pekerjaan_ortu"><b>Pekerjaan Orang Tua</b></label>
                                    <input type="text" name="pekerjaan_ortu" id="pekerjaan_ortu" class="form-control" required minlength="3">
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="no_telepon"><b>Nomor Telepon</b></label>
                                    <input type="number" name="no_telepon" id="no_telepon" class="form-control" required minlength="10">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="file"><b>Upload Berkas</b> <small>(SKL/Ijazah)</small></label><br>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="file" name="file" onchange="previewImg()" required>
                                    <label class="custom-file-label" for="file">Pilih berkas...</label>
                                </div>
                            </div>

                            <button type="submit" name="tambah" class="btn btn-primary float-right ml-1">Daftar</button>

                        </form>

                    </div>

                    <div class="card-footer">
                        <b>Catatan :</b> <br>
                        <ul>
                            <li>Isi data dengan baik dan benar</li>
                            <li>Berkas berformat PDF, Max 2 MB</li>
                            <li>Jika sudah mendaftar, harap tunggu, pengumuman ada di <a href="https://rsudsekayu.mubakab.go.id" target="_blank">website ini</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <br><br>


    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

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

</body>

</html>