<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="upd.css">
</head>
<body>
    <h2>Update Data Mahasiswa</h2>
    <br>
    <form action="aksiedit.php" method = "post">
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name = "Nama" placeholder="masukkan nama"></td>
            </tr>
            <tr>
                <td>Nim</td>
                <td><input type="number" name = "Nim" placeholder="masukkan nim"></td>
            </tr>
            <tr>
                <td>Umur</td>
                <td><input type="number" name = "Umur"></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>
                    <select name="Jenis_Kelamin">
                        <option value="Laki-laki">Laki-laki</option>
                        
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Prodi</td>
                <td><input type="text" name = "Prodi" placeholder="masukkan prodi"></td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td><input type="text" name = "Jurusan" placeholder="masukkan jurusan"></td>
            </tr>
            <tr>
                <td>Asal Kota</td>
                <td><input type="text" name = "Asal Kota" placeholder="masukkan asal kota"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="simpan"></td>
            </tr>
        </table>     
    </form>
</body>
</html>