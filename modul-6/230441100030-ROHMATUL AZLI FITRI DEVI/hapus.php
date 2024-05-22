<?php
include 'koneksi.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];      
    $hapus = $sql($koneksi, "DELETE FROM mahasiswa WHERE id='$id'");
    if($hapus){
        header("Location: crud/index1.php");
    }else{
        echo 'Gagal menghapus data!';
    }
}
?>


















<!-- 
Mengambil nilai 'id' dari URL dan menyimpannya dalam variabel $id
Get :mengambil nilai 
Post : mengirim data k database -->












<!-- GET=untuk mengumpulkan data dari parameter URL.  -->