<?php
error_reporting(1); // mematikan pesan error

session_start();

// jika berhasil login
if (isset($_SESSION['login']) == true) {
    $id_akun   = $_SESSION["id_akun"];
    $nama      = $_SESSION["nama"];
    $username  = $_SESSION["username"];
    $level     = $_SESSION["level"];
}

require_once 'controller.php'; // memanggil file controller.php
require_once 'database.php'; // memanggil file database.php

