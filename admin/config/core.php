<?php
ob_start();
if (!session_id()) session_start();

require_once 'controller.php'; // memanggil file controller.php
require_once 'database.php'; // memanggil file database.php

