<?php

include 'config/core.php';

$id_pendaftaran = (int)$_GET['id_pendaftaran'];

if (hapus_pendaftaran($id_pendaftaran) > 0) {
    echo "<script>
            alert('Data Pendaftaran Berhasil Dihapus');
            document.location.href = 'data-pendaftaran.php';
          </script>";
} else {
    echo "<script>
            alert('Data Pendaftaran Gagal Dihapus');
            document.location.href = 'data-pendaftaran.php';
          </script>";
}