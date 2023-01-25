<?php
include '../koneksi.php';

$id_pemesanan = $_POST['id_pemesanan'];
$status = $_POST['status'];

mysqli_query($koneksi, "update pemesanan set id_pemesanan='$id_pemesanan', status='$status' where id_pemesanan='$id_pemesanan'");

header("location:pesanan.php");
?>