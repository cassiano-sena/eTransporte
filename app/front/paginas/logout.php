<?php
session_start();
session_destroy();
$_SESSION = [];
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
require_once '../security/path.php';
header("Location: http://localhost/eTransporte/app/front/paginas/login.php");