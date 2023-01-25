<?php
include '../koneksi.php';

$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

mysqli_query($koneksi, "insert into users values('','$nama','$username','$password','$level')");

header("location:users.php");
?>