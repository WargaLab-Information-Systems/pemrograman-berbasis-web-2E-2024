<!DOCTYPE html>
<html>
<head>
    <title>CRUD PHP dan MySQLi - WWW.MALASNGODING.COM</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        h2 {
            color: #fff;
            text-align: center;
        }
        h3{
            color: #fff;
            text-align: center;
        }
        a {
            text-decoration: none;
            padding: 5px 10px;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
        }
        a:hover {
            background-color: #0056b3;
        }
        form {
            margin-top: 20px;
        }
        table {
            border-collapse: collapse;
            width: 50%;
            margin: auto;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
 
    <h2>UPDATE DATA MAHASISWA</h2>
    <br/>
    <a href="index.php">KEMBALI</a>
    <br/>
    <br/>
    <h3>EDIT DATA MAHASISWA</h3>
 
    <?php
    include 'koneksi.php';
    $id = $_GET['id'];
    $data = mysqli_query($koneksi,"select * from mahasiswa where id='$id'");
    while($d = mysqli_fetch_array($data)){
        ?>
        <form method="post" action="update.php">
            <table>
                <tr>            
                    <td>Nama</td>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                        <input type="text" name="nama" value="<?php echo $d['nama']; ?>">
                    </td>
                </tr>
                <tr>  
                    <td>NIM</td>
                    <td><input type="number" name="nim" value="<?php echo $d['nim']; ?>"></td>
                </tr>
                <tr>
                    <td>Umur</td>
                    <td><input type="text" name="umur" value="<?php echo $d['umur']; ?>"></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td><input type="text" name="jeniskelamin" value="<?php echo $d['jeniskelamin']; ?>"></td>
                </tr>
                <tr>
                    <td>Prodi</td>
                    <td><input type="text" name="prodi" value="<?php echo $d['prodi']; ?>"></td>
                </tr>
                <tr>
                    <td>Jurusan</td>
                    <td><input type="text" name="jurusan" value="<?php echo $d['jurusan']; ?>"></td>
                </tr>
                <tr>
                    <td>Asal Kota</td>
                    <td><input type="text" name="asalkota" value="<?php echo $d['asalkota']; ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="SIMPAN"></td>
                </tr>       
            </table>
        </form>
        <?php 
    }
    ?>
 
</body>
</html>
