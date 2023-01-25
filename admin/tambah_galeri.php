<?php
include '../koneksi.php';

$keterangan = $_POST['keterangan'];
$gambar = $_FILES['gambar']['name'];

if ($gambar !="") {
    $extensi_diperbolehkan = array('png','jpg','jpeg');
    $x = explode('.', $gambar);
    $extensi = strtolower(end($x));
    $file_tmp = $_FILES['gambar']['tmp_name'];
    $angka_acak = rand(1,999);
    $nama_gambar_baru = $angka_acak.'-'.$gambar;
    if(in_array($extensi, $extensi_diperbolehkan) === true) {
        move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru);
        $query = "INSERT INTO galeri (keterangan, gambar) VALUES ('$keterangan','$nama_gambar_baru')";
        $result = mysqli_query($koneksi, $query);

        if (!$result) {
            die("Query gagal dijalankan : ".mysqli_errno($koneksi)."-".mysqli_error($koneksi));
        }else{
            echo "<script>alert('data berhasil ditambahkan.');window.location='galeri.php';</script>";
        }
    }else{
        echo "<script>alert('extensi gambar tidak sesuai.');window.location='galeri.php';</script>";
    }
}else{
    $query = "INSERT INTO galeri (keterangan, gambar) VALUES ('$keterangan',null)";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        die("Query gagal dijalankan : ".mysqli_errno($koneksi)."-".mysqli_error($koneksi));
    }else{
        echo "<script>alert('Data berhasil ditambah.');window.location='galeri.php';</script>";
    }
}
?>