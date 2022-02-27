<?php

include 'config/core.php';

$id_akun = (int)$_GET['id_akun'];

if (hapus_akun($id_akun) > 0) {
    echo "<script>
            alert('Data Akun Berhasil Dihapus');
            document.location.href = 'data-akun.php';
          </script>";
} else {
    echo "<script>
            alert('Data Akun Gagal Dihapus');
            document.location.href = 'data-akun.php';
          </script>";
}