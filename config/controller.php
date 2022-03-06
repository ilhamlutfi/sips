<?php

// fungsi mengambil data dari database
function query($query)
{
    global $db; // memanggil koneksi database

    $result = mysqli_query($db, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// tambah pendaftaran
function tambah_pendaftaran($post)
{
    global $db;

    $jurusan_id     = strip_tags($post['jurusan_id']);
    $nisn           = strip_tags($post['nisn']);
    $nama           = strip_tags($post['nama']);
    $alamat         = strip_tags($post['alamat']);
    $tempat         = strip_tags($post['tempat']);
    $tanggal_lahir  = strip_tags($post['tanggal_lahir']);
    $asal_sekolah   = strip_tags($post['asal_sekolah']);
    $nama_ortu      = strip_tags($post['nama_ortu']);
    $pekerjaan_ortu = strip_tags($post['pekerjaan_ortu']);
    $no_telepon     = strip_tags($post['no_telepon']);

    $file = upload_file(); // fungsi upload file

    // check upload
    if (!$file) {
        return false;
    }

    // query tambah ke database
    $query = "INSERT INTO tbl_pendaftaran VALUES(null, '$jurusan_id', '$nisn', '$nama', '$alamat', '$tempat', '$tanggal_lahir', '$asal_sekolah', '$nama_ortu', '$pekerjaan_ortu', '$no_telepon', '$file', CURRENT_TIMESTAMP)";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}


// fungsi upload
function upload_file()
{
    $namaFile       = $_FILES['file']['name']; // nama file
    $ukuranFile     = $_FILES['file']['size']; // ukuran data
    $error          = $_FILES['file']['error']; // jika file error
    $tmpName        = $_FILES['file']['tmp_name']; //tempat penyimpanan sementara

    // Check file yg diupload
    $extensifileValid = ['pdf', 'PDF']; // menentukan extensi atau format file
    $extensifile      = explode('.', $namaFile);
    $extensifile      = strtolower(end($extensifile));
    if (!in_array($extensifile, $extensifileValid)) {
        // pesan gagal
        echo "<script>
                alert('Format File Harus PDF');
                document.location.href = 'tambah-pendaftaran.php';
            </script>";
        die();
    }

    // jika ukuran melampaui batas maksimal
    if ($ukuranFile > 2048000) { // batas 2 mb
        echo "<script>
                alert('Ukuran File Terlalu Besar');
                document.location.href = 'tambah-pendaftaran.php';
            </script>";
        die();
    }

    // ubah nama file yang di upload
    $namaFilebaru = uniqid();
    $namaFilebaru .= '.';
    $namaFilebaru .= $extensifile;

    // memindahkan data yg di upload ke folder file
    move_uploaded_file($tmpName, 'admin/assets/file/' . $namaFilebaru);
    return $namaFilebaru;
}