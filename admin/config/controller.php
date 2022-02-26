<?php

function alert($text, $type)
{
    echo "
         <div class=\"alert alert-" . $type . " alert-dismissible fade show hide_alert\" role=\"alert\">
                <button type=\"button\" class=\"close close_once\" data-dismiss=\"alert\" aria-label=\"Close\">
                    <span aria-hidden=\"true\">&times;</span>
                </button>
                $text
            </div>
    ";
}

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

// tambah data jurusan ke database
function tambah_jurusan($post)
{
    global $db; // panggil koneksi database

    $nama_jurusan = strip_tags($post['nama_jurusan']); // ambil input user

    // query tambah data
    $query = "INSERT INTO tbl_jurusan VALUES (null, '$nama_jurusan', CURRENT_TIMESTAMP)";

    // simpan query ke database
    mysqli_query($db, $query);

    // check data yang
    return mysqli_affected_rows($db);
}

// hapus data jurusan dari database
function hapus_jurusan($id_jurusan)
{
    global $db;

    $query = "DELETE FROM tbl_jurusan WHERE id_jurusan = $id_jurusan";

    // simpan query ke database
    mysqli_query($db, $query);

    // check data yang dihapus
    return mysqli_affected_rows($db);
}

// ubah data jurusan di database
function ubah_jurusan($post)
{
    global $db;

    $id_jurusan      = $post['id_jurusan'];
    $nama_jurusan    = strip_tags($post['nama_jurusan']);

    $query = "UPDATE tbl_jurusan SET nama_jurusan = '$nama_jurusan' WHERE id_jurusan = $id_jurusan";

    // simpan query ke database
    mysqli_query($db, $query);

    // check data yang diubah
    return mysqli_affected_rows($db);
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
    $asal_sekolah   = strip_tags($post['asal_sekolah']   );
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
    move_uploaded_file($tmpName, 'assets/file/' . $namaFilebaru);
    return $namaFilebaru;
}

// hapus pendaftaran
function hapus_pendaftaran($id_pendaftaran)
{
    global $db;

    $query = "DELETE FROM tbl_pendaftaran WHERE id_pendaftaran = $id_pendaftaran";

    // simpan query ke database
    mysqli_query($db, $query);

    // check data yang dihapus
    return mysqli_affected_rows($db);
}