<?php

$title = 'Data Jurusan'; // judul halaman

include 'layout/header.php'; // panggil file layout/header.php

?>

<!-- Body -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Jurusan</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Jurusan</th>
                            <th>Tanggal Ditambahkan</th>
                            <th>Fungsi</th>
                        </tr>
                    </thead>
                   
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Teknik Informatika</td>
                            <td>06/02/2022</td>
                            <td width="15%" class="text-center">
                                <a href="" class="btn btn-success btn-sm mb-1" title="Ubah"><i class="fas fa-edit"></i> Ubah</a>

                                <a href="" class="btn btn-danger btn-sm mb-1" title="Hapus"><i class="fas fa-trash-alt"></i> Hapus</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <!-- /body -->

    <?php include 'layout/footer.php'; ?>