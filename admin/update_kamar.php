<?php
include '../koneksi.php';
$id_kamar = $_POST['id_kamar'];
$tipe = $_POST['tipe'];
$gambar = $_FILES['gambar']['name'];
if($gambar != "") {
    $ekstensi_diperbolehkan = array('png','jpg','jpeg');
    $x = explode('.', $gambar);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['gambar']['tmp_name'];
    $angka_acak = rand(1,999);
    $nama_gambar_baru = $angka_acak.'-'.$gambar;
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru);
        $query = "UPDATE kamar SET tipe = '$tipe', gambar = '$nama_gambar_baru'";
        $query .= "WHERE id_kamar = '$id_kamar'";
        $result = mysqli_query($koneksi, $query);
        if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($koneksi)."-".mysqli_error($koneksi));
        }else{
            echo "<script>alert('Data berhasil diubah.');window.location='kamar.php'</script>";
        }
    }else{
        echo "<script>alert('Ekstensi gambar tidak sesuai');window.location='edit_kamar.php'</script>";
    }
}else{
    $query = "UPDATE kamar SET tipe = '$tipe'";
    $query .= "WHERE id_kamar = '$id_kamar'";
    $result = mysqli_query($koneksi, $query);
    if(!$result){
        die ("Query gagal dijalankan: ".mysqli_errno($koneksi)."-".mysqli_error($koneksi));
    }else{
        echo "<script>alert('Data berhasil diubah');window.location='kamar.php'</script>";
    }
}
?>