<?php
include 'koneksi2.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $hapus = mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id='$id'");
    if($hapus){
        header("location:datamahasiswa.php");
    }else{
        echo 'Gagal menghapus data!';
    }
}else{
    echo 'ID tidak dikirim!';
}
?>
