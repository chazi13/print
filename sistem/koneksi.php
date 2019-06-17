<?php

session_start();
$koneksi = mysqli_connect('localhost', 'root', 'mysql', 'print');
if (!$koneksi) {
    echo 'Koneksi ke database gagal!';
}

function is_login($level = '')
{
    if (!$_SESSION['login']) {
        header('location: login.php');
    } 
    
    if ($level !== '') {
        if ($_SESSION['level'] !== $level) {
            header('location: login.php');
        }
    }
}
