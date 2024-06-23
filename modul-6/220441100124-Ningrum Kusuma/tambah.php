<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url(BG1.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            margin: 0;
            padding: 0;
        }
        h2 {
            text-align: center;
            margin-top: 30px;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }
        table {
            width: 100%;
            margin-bottom: 20px;
        }
        table td {
            padding: 10px 0;
        }
        input[type="text"],
        input[type="number"],
        select {
            width: calc(100% - 10px);
            padding: 8px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body style="margin-top: 50px;">
    <form action="aksi_tambah.php" method="post">
        <table>
            <h1>Tambah Data Mahasiswa</h1>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="Nama"></td>
            </tr>
            <tr>
                <td>NIM</td>
                <td><input type="number" name="Nim"></td>
            </tr>
            <tr>
                <td>Umur</td>
                <td><input type="number" name="Umur"></td>
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
                <td><input type="text" name="Prodi" placeholder="Masukkan Prodi" value=""></td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td><input type="text" name="Jurusan" placeholder="Masukkan Jurusan"></td>
            </tr>
            <tr>
                <td>Asal Kota</td>
                <td><input type="text" name="Asal_Kota" placeholder="Masukkan Asal Kota"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan"></td>
            </tr>
        </table>
    </form>
</body>
</html>
