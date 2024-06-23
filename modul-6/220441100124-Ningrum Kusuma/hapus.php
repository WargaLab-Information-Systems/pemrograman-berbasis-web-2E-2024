<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_query($koneksi, "DELETE FROM datamahasiswa WHERE id='$id'");
    echo "Data berhasil dihapus";
} else {
    echo "ID tidak ditemukan";
}
?>
