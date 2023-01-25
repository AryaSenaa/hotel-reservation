<?php
include 'koneksi.php';

$cek_in = $_POST['cek_in'];
$cek_out = $_POST['cek_out'];
$jml_kamar = $_POST['jml_kamar'];
$nama_pemesan = $_POST['nama_pemesan'];
$email = $_POST['email'];
$no_hp = $_POST['no_hp'];
$nama_tamu = $_POST['nama_tamu'];
$id_kamar = $_POST['id_kamar'];

mysqli_query($koneksi, "insert into pemesanan values('','$cek_in','$cek_out','$jml_kamar','$nama_pemesan','$email','$no_hp','$nama_tamu','$id_kamar','1')");

header("location:index.php");
?>