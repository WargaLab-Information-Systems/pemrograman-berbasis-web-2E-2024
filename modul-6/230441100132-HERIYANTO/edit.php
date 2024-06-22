<?php 
// koneksi database
include 'config/koneksi.php';
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
    mysqli_query($koneksi, "UPDATE data_mahasiswa SET Nama='$nama', NIM='$nim', Umur='$umur', Jenis_Kelamin='$jenis_kelamin', Prodi='$prodi', Jurusan='$jurusan', Asal_Kota='$asal_kota' WHERE id='$id'");

    // mengalihkan halaman kembali ke index.php
    header("location:dashboard.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>UPDATE DATA </title>
    <link rel="stylesheet" href="edit.css">
</head>
<body>
<div class="container">
    <h2>EDIT DATA MAHASISWA</h2>
    <?php
    $id = $_GET['id'];
    $data = mysqli_query($koneksi, "SELECT * FROM data_mahasiswa WHERE id='$id'");
    while($d = mysqli_fetch_array($data)){
    ?>
    <div class="container-form">
        <form method="post" action="edit.php">
            <table>
            <tr>            
                <td>Nama :</td>
                <td>
                    <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                    <input type="text" name="Nama" value="<?php echo $d['nama']; ?>">
                </td>
            </tr>
            <tr>
                <td>NIM : </td>
                <td><input type="text" name="NIM" value="<?php echo $d['nim']; ?>"></td>
            </tr>
            <tr>
                <td>Umur : </td>
                <td><input type="text" name="Umur" value="<?php echo $d['umur']; ?>"></td>
            </tr>
            <tr>
                <td>Jenis Kelamin:</td>
                <td>
                    <input type="radio" name="Jenis_Kelamin" value="Laki-laki" <?php if ($d['jenis_kelamin'] == 'Laki-laki') echo 'checked'; ?>> Laki-laki
                    <input type="radio" name="Jenis_Kelamin" value="Perempuan" <?php if ($d['jenis_kelamin'] == 'Perempuan') echo 'checked'; ?>> Perempuan
                </td>
            </tr>
            <tr>
                <td>Prodi :</td>
                <td><input type="text" name="Prodi" value="<?php echo $d['prodi']; ?>"></td>
            </tr>
            <tr>
                <td>Jurusan :</td>
                <td><input type="text" name="Jurusan" value="<?php echo $d['jurusan']; ?>"></td>
            </tr>
            <tr>
                <td>Asal Kota :</td>
                <td><input type="text" name="Asal_Kota" value="<?php echo $d['asal_kota']; ?>"></td>
            </tr>
            <tr>
                <td><input type="submit" name="update" value="SIMPAN"></td>
                <td colspan="2" align="center"><a href="dashboard.php" type="cancel" class="cancel-btn">BATAL</a></td>            
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
