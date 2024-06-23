<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

    <h3>Edit data</h3>
 
    <?php 
    include "koneksi.php";
    $id = $_GET['id'];
    $sql = "SELECT * FROM mahasiswa WHERE id='$id'";
    $query_mysql = mysqli_query($link, $sql) or die(mysqli_error($link));
    $data = mysqli_fetch_array($query_mysql);
    ?>
    <form action="update.php" method="post">        
        <table>
            <tr>
                <td>NIM</td>
                <td>
                    <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                    <input type="number" name="NIM" value="<?php echo $data['NIM'] ?>" required>
                </td>                   
            </tr>   
            <tr>
                <td>Nama</td>
                <td><input type="text" name="NAMA" value="<?php echo $data['NAMA'] ?>" required></td>                   
            </tr>   
            <tr>
                <td>UMUR</td>
                <td><input type="number" name="UMUR" value="<?php echo $data['umur'] ?>" required></td>                   
            </tr>  
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="ALAMAT" value="<?php echo $data['ALAMAT'] ?>" required></td>                   
            </tr>   
            <tr>
                <td>Angkatan</td>
                <td><input type="number" name="ANGKATAN" value="<?php echo $data['ANGKATAN'] ?>" required></td>                   
            </tr>   
            <tr>
                <td>Jenis Kelamin</td>
                <td>
                    <input type="radio" name="JENIS_KELAMIN" value="Laki-laki" <?php if($data['JENIS_KELAMIN'] == 'Laki-laki') echo 'checked'; ?> required> Laki-laki
                    <input type="radio" name="JENIS_KELAMIN" value="Perempuan" <?php if($data['JENIS_KELAMIN'] == 'Perempuan') echo 'checked'; ?> required> Perempuan
                </td>                   
            </tr>   
            <tr>
                <td>Asal Kota</td>
                <td><input type="text" name="ASAL_KOTA" value="<?php echo $data['ASAL_KOTA'] ?>" required></td>                     
            </tr>
            <tr>
                <td>Prodi</td>
                <td><input type="text" name="prodi" value="<?php echo $data['prodi'] ?>" required></td>                     
            </tr> 
            <tr>
                <td>Jurusan</td>
                <td><input type="text" name="jurusan" value="<?php echo $data['jurusan'] ?>" required></td>                     
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan"></td>                    
            </tr>
        </table>
    </form>
</body>
</html>
