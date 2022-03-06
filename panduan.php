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
                        Panduan
                    </div>

                    <div class="card-body">

                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.753464762475!2d103.85846031475666!3d-2.8872909978969465!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e3a8ed605d2bf2f%3A0xec81e144f98a06f9!2sPoliteknik%20Sekayu!5e0!3m2!1sid!2sid!4v1646557418878!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

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