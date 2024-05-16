<?php 

include 'koneksi.php';

if (isset($_POST['update'])) {
  
    $id = $_POST['id'];
    $nama = $_POST['Nama'];
    $nim = $_POST['NIM'];
    $umur = $_POST['Umur'];
    $Jenis_kelamin = $_POST['Jenis_kelamin'];
    $prodi = $_POST['Prodi'];
    $jurusan = $_POST['Jurusan'];
    $asal_kota = $_POST['Asal_kota'];

   
    mysqli_query($koneksi, "UPDATE mhs SET Nama='$nama', NIM='$nim', Umur='$umur', Jenis_kelamin='$Jenis_kelamin', Prodi='$prodi', Jurusan='$jurusan', Asal_kota='$asal_kota' WHERE id='$id'");
 
   
    header("location:Data.php");
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD PHP dan MySQLi</title>
    <link rel="stylesheet" href="edit.css">
</head>
<body>
 
    <h2>CRUD DATA MAHASISWA</h2>
    <br/>
    <a href="Data.php">KEMBALI</a>
    <br/>
    <br/>
    <h3>EDIT DATA MAHASISWA</h3>
 
    <?php
    $id = $_GET['id'];
    $data = mysqli_query($koneksi, "SELECT * FROM mhs WHERE id='$id'");
    $d = mysqli_fetch_array($data);

    if (!$d) {
       
        echo "Data tidak ditemukan.";
    } else {
    ?>
    <form method="post" action="">
        <table>
            <tr>            
                <td>Nama</td>
                <td>
                    <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                    <input type="text" name="Nama" value="<?php echo $d['Nama']; ?>">
                </td>
            </tr>
            <tr>
                <td>NIM</td>
                <td><input type="number" name="NIM" value="<?php echo $d['NIM']; ?>"></td>
            </tr>
            <tr>
                <td>Umur</td>
                <td><input type="number" name="Umur" value="<?php echo $d['Umur']; ?>"></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>
                    <input type="radio" name="Jenis_kelamin" value="laki-laki" <?php if ($d['Jenis_kelamin'] == 'laki-laki') echo 'checked'; ?>> laki-laki
                    <input type="radio" name="Jenis_kelamin" value="perempuan" <?php if ($d['Jenis_kelamin'] == 'perempuan') echo 'checked'; ?>> perempuan
                </td>
            </tr>
            <tr>
                <td>Prodi</td>
                <td><input type="text" name="Prodi" value="<?php echo $d['Prodi']; ?>"></td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td><input type="text" name="Jurusan" value="<?php echo $d['Jurusan']; ?>"></td>
            </tr>
            <tr>
                <td>Asal Kota</td>
                <td><input type="text" name="Asal_kota" value="<?php echo $d['Asal_kota']; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="update" value="SIMPAN"></td>
            </tr>       
        </table>
    </form>
    <?php 
    }
    ?>
</body>
</html>