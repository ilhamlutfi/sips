<?php

require 'config/core.php';

$id_jurusan = (int)$_GET['id_jurusan'];

if (hapus_jurusan($id_jurusan) > 0) {
    echo "<script>
                alert('Data Jurusan Berhasil Dihapus'); 
                document.location.href = 'data-jurusan.php';
             </script>";
} else {
    echo "<script>
                alert('Data Jurusan Gagal Dihapus');
                document.location.href = 'data-jurusan.php';
             </script>";
}

