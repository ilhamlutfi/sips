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