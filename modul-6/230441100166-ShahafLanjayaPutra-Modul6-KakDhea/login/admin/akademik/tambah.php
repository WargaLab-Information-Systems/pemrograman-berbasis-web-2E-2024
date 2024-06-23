<!DOCTYPE html>
<html>
<head>
    <title>Input Data Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('img.jpg');
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
        h2 {
            color: #333;
            text-align: center;
        }
        h3 {
            text-align: center;
        }
        a {
        text-decoration: none;
        padding: 8px 12px;
        background-color: #007bff;
        color: #fff;
        border-radius: 4px;
        transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #0056b3;
        }

        a:hover {
            text-decoration: underline;
        }
        form {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
        }
        table td {
            padding: 8px;
        }
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
 
    <h2>INPUT DATA MAHASISWA</h2>
    <br/>
    <a href="index.php">KEMBALI</a>
    <br/>
    <br/>
    <h3>TAMBAH DATA MAHASISWA</h3>
    <form method="post" action="tambah_aksi.php">
        <table>
            <tr>            
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>NIM</td>
                <td><input type="number" name="nim"></td>
            </tr>
            <tr>
                <td>Umur</td>
                <td><input type="number" name="umur"></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td><input type="text" name="jeniskelamin"></td>
            </tr>
            <tr>
                <td>Prodi</td>
                <td><input type="text" name="prodi"></td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td><input type="text" name="jurusan"></td>
            </tr>
            <tr>
                <td>Asal Kota</td>
                <td><input type="text" name="asalkota"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="SIMPAN"></td>
            </tr>       
        </table>
    </form>
</body>
</html>
