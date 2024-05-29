<?php
ob_start(); 
include 'koneksi.php';


error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    
    $sql = "DELETE FROM mahasiswa WHERE id = ?";
    
   
    if ($stmt = mysqli_prepare($link, $sql)) {
        
        mysqli_stmt_bind_param($stmt, "i", $id);
        
        
        if (mysqli_stmt_execute($stmt)) {
           
            ob_end_flush();
            header("Location: result.php?pesan=Data berhasil dihapus");
            exit();
        } else {
            $error = "Kesalahan dalam menjalankan query: " . mysqli_stmt_error($stmt);
            header("Location: result.php?pesan=" . urlencode($error));
            exit();
        }
        
       
        mysqli_stmt_close($stmt);
    } else {
        $error = "Kesalahan dalam menyiapkan query: " . mysqli_error($link);
        header("Location: result.php?pesan=" . urlencode($error));
        exit();
    }
} else {
    header("Location: result.php?pesan=ID tidak valid.");
    exit();
}

mysqli_close($link);
?>
