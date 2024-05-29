<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            max-width: 800px;
            margin: 20px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #007bff;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        tr:hover {
            background-color: rgba(0, 123, 255, 0.1);
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
        }
  
    </style>
    <script>
        function confirmDeletion(url) {
            if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
                window.location.href = url;
            }
        }
    </script>
</head>
<body>
<?php 
    if(isset($_GET['pesan'])){
        $pesan = $_GET['pesan'];
        if($pesan == "input"){
            echo "Data berhasil di input.";
        } else if($pesan == "update"){
            echo "Data berhasil di update.";
        } else if($pesan == "hapus"){
            echo "Data berhasil di hapus.";
        }
    }
?>
<br/>
<div class="container">
    <h2>Data Mahasiswa</h2>
    <table id="tableMahasiswa">
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Umur</th>
                <th>Alamat</th>
                <th>Angkatan</th>
                <th>Jenis Kelamin</th>
                <th>Asal Kota</th>
                <th>Prodi</th>
                <th>Jurusan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'koneksi.php';
            $sql = "SELECT * FROM mahasiswa";
            $result = mysqli_query($link, $sql);

            while($data = mysqli_fetch_assoc($result)) {
                echo "<tr>
                    <td>{$data['NIM']}</td>
                    <td>{$data['NAMA']}</td>
                    <td>{$data['umur']}</td>
                    <td>{$data['ALAMAT']}</td>
                    <td>{$data['ANGKATAN']}</td>
                    <td>{$data['JENIS_KELAMIN']}</td>
                    <td>{$data['ASAL_KOTA']}</td>
                    <td>{$data['prodi']}</td>
                    <td>{$data['jurusan']}</td>
                    <td><a href='edit.php?id={$data['id']}'>Edit</a> | <a href='#' onclick=\"confirmDeletion('delete.php?id={$data['id']}')\">Hapus</a></td>
                </tr>";
            }

            mysqli_close($link);
            ?>
        </tbody>
    </table>
    <h2>Form Tambah/Edit Mahasiswa</h2>
    <form action="input.php" method="post">		
        <table>
            <tr>
                <td>NIM</td>
                <td><input type="number" name="NIM" required></td>					
            </tr>	
            <tr>
                <td>Nama</td>
                <td><input type="text" name="NAMA" required></td>					
            </tr>	
            <tr>
                <td>Umur</td>
                <td><input type="number" name="UMUR" required></td>					
            </tr>	
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="ALAMAT" required></td>					
            </tr>	
            <tr>
                <td>Angkatan</td>
                <td><input type="number" name="ANGKATAN" required></td>					
            </tr>	
            <tr>
                <td>Jenis Kelamin</td>
                <td>
                    <input type="radio" name="JENIS_KELAMIN" value="Laki-laki" required> Laki-laki
                    <input type="radio" name="JENIS_KELAMIN" value="Perempuan" required> Perempuan
                </td>					
            </tr>	
            <tr>
                <td>Asal Kota</td>
                <td><input type="text" name="ASAL_KOTA" required></td>						
            </tr>	
            <tr>
                <td>Prodi</td>
                <td><input type="text" name="PRODI" required></td>						
            </tr>	
            <tr>
                <td>Jurusan</td>
                <td><input type="text" name="JURUSAN" required></td>						
            </tr>	
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan"></td>		
                <a href="logout.php" class="link">log out</a>			
            </tr>				
        </table>
    </form>
</div>
</body>
</html>
