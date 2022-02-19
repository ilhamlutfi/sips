<?php

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
