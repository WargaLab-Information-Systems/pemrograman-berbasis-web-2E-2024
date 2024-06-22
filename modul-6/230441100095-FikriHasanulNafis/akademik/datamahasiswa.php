<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <style>
    h1 {
            text-align: center;
            color: red; 
        }
        .container {
            margin: 0 auto;
            width: 80%; 
        }
        table {
            margin: 0 auto; 
            text-align: center;
            border-collapse: collapse; 
            width: 100%; 
        }
        th, td {
            padding: 8px;
            border: 1px solid black; 
        }
        th {
            background-color: lightgray; 
        }
        tr:nth-child(even) {
            background-color: #f2f2f2; 
        }
        a {
            text-decoration: none; 
            color: blue; 
        }
        .button {
            display: inline-block;
            padding: 8px 16px;
            background-color: #007bff; 
            color: #fff; 
            border: none;
            border-radius: 4px;
            text-decoration: none; 
            cursor: pointer; 
        }
        .edit {
            background-color: #28a745; 
        }
        .hapus {
            background-color: #dc3545; 
        }
        .tambah {
            background-color: #ffc107; 
        }
        .navbar {
        display: flex;
        background-color: #333;
        justify-content: center;
        }

        .navbar a {
        padding: 20px 15px;
        text-decoration: none;
        color: red;
        font-size: 18px;
        }

        .navbar a:hover {
        background-color: #f4f4f4;
        }

        </style>
</head>
<body>
    <nav>
        <div class="navbar">
            <a href="home.php">Home</a>
            <a href="datamahasiswa.php">Data Mahasiswa</a>
            <a href="logout.php">Logout</a>
        </div>
    </nav>
    <h1>Data Mahasiswa</h1>
    <br>
    <div class="container">
    <table border="1">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>NIM</th>
        <th>Umur</th>
        <th>JenisKelamin</th>
        <th>Prodi</th>
        <th>Jurusan</th>
        <th>AsalKota</th>
        <th>Opsi</th>
    </tr>
    <?php
    include 'koneksi.php';
    $no = 1;
    $data = mysqli_query($koneksi,"SELECT * FROM akademik");
    while($d = mysqli_fetch_array($data)){
    ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $d['nama']; ?></td>
        <td><?php echo $d['nim']; ?></td>
        <td><?php echo $d['umur']; ?></td>
        <td><?php echo $d['jeniskelamin']; ?></td>
        <td><?php echo $d['prodi']; ?></td>
        <td><?php echo $d['jurusan']; ?></td>
        <td><?php echo $d['asalkota']; ?></td>
        <td>
            <a class="button edit"href="edit.php?id=<?php echo $d['id'];?>">Edit</a>
            <a class="button hapus"href="hapus.php?id=<?php echo $d['id'];?>">Hapus</a>
            <a class="button tambah"href="tambah.php?id =<?php echo $d['id'];?>">Tambah</a>
        </td>
    </tr>
    <?php
    }
    ?>
    </table>
    </div>
</body>
</html>