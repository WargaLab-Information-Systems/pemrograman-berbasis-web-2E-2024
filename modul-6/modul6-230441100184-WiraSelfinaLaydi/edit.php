<?php 
// koneksi database
include 'koneksi.php';
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['Nama'];
    $nim = $_POST['NIM'];
    $umur = $_POST['Umur'];
    $jenis_kelamin = $_POST['Jenis_Kelamin'];
    $prodi = $_POST['Prodi'];
    $jurusan = $_POST['Jurusan'];
    $asal_kota = $_POST['Asal_Kota'];
    // update data ke database
    mysqli_query($koneksi, "UPDATE mahasiswa SET Nama='$nama', NIM='$nim', Umur='$umur', Jenis_Kelamin='$jenis_kelamin', Prodi='$prodi', Jurusan='$jurusan', Asal_Kota='$asal_kota' WHERE id='$id'");
    // mengalihkan halaman kembali ke index.php
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD PHP dan MySQLi</title>
    <link rel="stylesheet" href="edit.css">
</head>
<body>
<div class="container">
    <h2>EDIT DATA MAHASISWA</h2>
    <?php
    $id = $_GET['id'];
    $data = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id='$id'");
    $d = mysqli_fetch_array($data);
    if (!$d) {
        // Handle jika tidak ada data yang ditemukan berdasarkan id
        echo "Data tidak ditemukan.";
    } else {
    ?>
    <div class="container-form">
        <form method="post" action="">
            <table>
            <tr>            
                <td>Nama :</td>
                <td>
                    <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                    <input type="text" name="Nama" value="<?php echo $d['Nama']; ?>">
                </td>
            </tr>
            <tr>
                <td>NIM : </td>
                <td><input type="text" name="NIM" value="<?php echo $d['NIM']; ?>"></td>
            </tr>
            <tr>
                <td>Umur : </td>
                <td><input type="text" name="Umur" value="<?php echo $d['Umur']; ?>"></td>
            </tr>
            <tr>
                <td>Jenis Kelamin:</td>
                <td>
                    <input type="radio" name="Jenis_Kelamin" value="Laki-laki" <?php if ($d['Jenis_Kelamin'] == 'Laki-laki') echo 'checked'; ?>> Laki-laki
                    <input type="radio" name="Jenis_Kelamin" value="Perempuan" <?php if ($d['Jenis_Kelamin'] == 'Perempuan') echo 'checked'; ?>> Perempuan
                </td>
            </tr>
            <tr>
                <td>Prodi :</td>
                <td><input type="text" name="Prodi" value="<?php echo $d['Prodi']; ?>"></td>
            </tr>
            <tr>
                <td>Jurusan :</td>
                <td><input type="text" name="Jurusan" value="<?php echo $d['Jurusan']; ?>"></td>
            </tr>
            <tr>
                <td>Asal Kota :</td>
                <td><input type="text" name="Asal_Kota" value="<?php echo $d['Asal_Kota']; ?>"></td>
            </tr>
            <tr>
                <td><input type="submit" name="update" value="SIMPAN"></td>
                <td colspan="2" align="center"><a href="index.php" type="cancel" class="cancel-btn">BATAL</a></td>            
            </tr>       
            </table>
        </form>
    </div>
</div>
    <?php 
    }
    ?>
</body>
</html>
