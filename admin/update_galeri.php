<?php
include '../koneksi.php';
$id_galeri = $_POST['id_galeri'];
$keterangan = $_POST['keterangan'];
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
        $query = "UPDATE galeri SET keterangan = '$keterangan', gambar = '$nama_gambar_baru'";
        $query .= "WHERE id_galeri = '$id_galeri'";
        $result = mysqli_query($koneksi, $query);
        if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($koneksi)."-".mysqli_error($koneksi));
        }else{
            echo "<script>alert('Data berhasil diubah.');window.location='galeri.php'</script>";
        }
    }else{
        echo "<script>alert('Ekstensi gambar tidak sesuai');window.location='edit_galeri.php'</script>";
    }
}else{
    $query = "UPDATE galeri SET keterangan = '$keterangan'";
    $query .= "WHERE id_galeri = '$id_galeri'";
    $result = mysqli_query($koneksi, $query);
    if(!$result){
        die ("Query gagal dijalankan: ".mysqli_errno($koneksi)."-".mysqli_error($koneksi));
    }else{
        echo "<script>alert('Data berhasil diubah');window.location='galeri.php'</script>";
    }
}
?>