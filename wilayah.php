<?php
include_once 'sistem/koneksi.php';

$term = $_GET['term'];
$val = $_GET['val'];
$target = $_GET['target'];

echo '<option disbled selected>-- Pilih --</option>';
if ($target == 'metode') {
    $query = mysqli_query($koneksi, "SELECT id_ongkir, harga, metode FROM ongkir WHERE nama_kec LIKE '%$val%'");
    while ($row = mysqli_fetch_assoc($query)) {
        echo '<option value="' . $row['id_ongkir'] . '" data-harga="' . $row['harga'] . '">' . $row[$target] . '</option>';
    }
} else {
    $query = mysqli_query($koneksi, "SELECT $target FROM ongkir WHERE $term LIKE '%$val%' GROUP BY $target");
    while ($row = mysqli_fetch_assoc($query)) {
        echo '<option value="' . $row[$target] . '">' . $row[$target] . '</option>';
    }
}

?>