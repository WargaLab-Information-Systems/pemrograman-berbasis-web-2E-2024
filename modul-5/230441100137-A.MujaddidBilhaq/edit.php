<?php
require 'koneksi.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    $query = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id='$id'");
    $data = mysqli_fetch_assoc($query);
}

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $umur = $_POST['umur'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $prodi = $_POST['prodi'];
    $jurusan = $_POST['jurusan'];
    $asal_kota = $_POST['asal_kota'];
    
    $query = mysqli_query($koneksi, "UPDATE mahasiswa SET nama='$nama', nim='$nim', umur='$umur', jenis_kelamin='$jenis_kelamin', prodi='$prodi', jurusan='$jurusan', asal_kota='$asal_kota' WHERE id='$id'");
    
    if($query){
        header('Location: datamahasiswa.php');
        exit;
    } else {
        echo 'Gagal mengupdate data!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Edit Data Mahasiswa</h1>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" value="<?php echo $data['nama']; ?>"><br>
        <label for="nim">NIM:</label><br>
        <input type="text" id="nim" name="nim" value="<?php echo $data['nim']; ?>"><br>
        <label for="umur">Umur:</label><br>
        <input type="text" id="umur" name="umur" value="<?php echo $data['umur']; ?>"><br>
        <label for="jenis_kelamin">Jenis Kelamin:</label><br>
        <input type="text" id="jenis_kelamin" name="jenis_kelamin" value="<?php echo $data['jenis_kelamin']; ?>"><br>
        <label for="prodi">Prodi:</label><br>
        <input type="text" id="prodi" name="prodi" value="<?php echo $data['prodi']; ?>"><br>
        <label for="jurusan">Jurusan:</label><br>
        <input type="text" id="jurusan" name="jurusan" value="<?php echo $data['jurusan']; ?>"><br>
        <label for="asal_kota">Asal Kota:</label><br>
        <input type="text" id="asal_kota" name="asal_kota" value="<?php echo $data['asal_kota']; ?>"><br><br>
        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>