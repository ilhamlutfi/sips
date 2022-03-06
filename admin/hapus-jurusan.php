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

require 'config/core.php';

$id_jurusan = (int)$_GET['id_jurusan'];

if (hapus_jurusan($id_jurusan) > 0) {
    $_SESSION['hapus'] = true;
    $_SESSION['timeout'] = time();

    header('Location:data-jurusan.php');
} else {
    $_SESSION['gagal-hapus'] = true;
    $_SESSION['timeout'] = time();

    header('Location:data-jurusan.php');
}
