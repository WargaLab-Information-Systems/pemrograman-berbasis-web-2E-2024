<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <style>
        body {
            background: url(BG2.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            font-family: Arial, sans-serif;
        }
        h2 {
            color: white;
            text-align: center;
            margin-top: 20px;
        }
        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 8px;
            text-align: left;
            border: 1px solid black;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        a {
            text-decoration: none;
            color: blue;
            padding: 0 5px;
            transition: 0.3s;
        }
        a:hover {
            background-color: #f2f2f2;
            color: black;
        }
        .edit-form {
            display: inline;
        }
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
            transition: 0.3s;
        }
        button:hover {
            background-color: #45a049;
        }
        .button-container {
            text-align: center;
            margin-top: 20px;
        }
        .button-container a {
            margin: 0 10px;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            transition: 0.3s;
        }
        .button-container a:hover {
            background-color: #45a049;
        }
    </style>
    <script>
        function hapusData(id) {
            if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                const xhr = new XMLHttpRequest();
                xhr.open('GET', `hapus.php?id=${id}`, true);
                xhr.onload = function () {
                    if (this.status === 200) {
                        document.getElementById(`row-${id}`).remove();
                    } else {
                        alert('Gagal menghapus data.');
                    }
                };
                xhr.send();
            }
        }
    </script>
</head>
<body>
    <h2>Data Mahasiswa</h2>
    <br>
    <br>
    <table>
        <tr>
            <th width="100">NIM</th>
            <th width="100">Nama</th>
            <th width="100">Umur</th>
            <th width="100">Jenis Kelamin</th>
            <th width="100">Prodi</th>
            <th width="100">Jurusan</th>
            <th width="100">Asal Kota</th>
            <th width="100">Aksi</th>
        </tr>
        <?php 
            include 'koneksi.php';
            
            $data = mysqli_query($koneksi, "SELECT * FROM datamahasiswa");
            while ($d = mysqli_fetch_array($data)) {
                ?>
                    <tr id="row-<?php echo $d['id']; ?>">
                        <td><?php echo $d['Nim']; ?></td>
                        <td><?php echo $d['Nama']; ?></td>
                        <td><?php echo $d['Umur']; ?></td>
                        <td><?php echo $d['Jenis_Kelamin']; ?></td>
                        <td><?php echo $d['Prodi']; ?></td>
                        <td><?php echo $d['Jurusan']; ?></td>
                        <td><?php echo $d['Asal_Kota']; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $d['id']; ?>">Update</a>
                            <a href="javascript:void(0);" onclick="hapusData('<?php echo $d['id']; ?>')">Hapus</a>
                        </td>
                    </tr>
                <?php
            }
        ?>
    </table>
    <div class="button-container">
        <a href="tambah.php">Tambah Data</a>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>