<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Universitas Trunojoyo Madura 👋🏻</h1>
    <center><h2>Data Mahasiswa</h2></center>
    <br>
    <br>
    <form action="reaksi_tambah.php" method ></form>
    <center>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Umur</th>
            <th>Jenis Kelamin</th>
            <th>Prodi</th>
            <th>Jurusan</th>
            <th>Asal Kota</th>
            <th>Reaksi</th>
        </tr>
        <?php
     include 'koneksi2.php';
     $no = 0;
     $data = mysqli_query($koneksi, "SELECT * FROM mahasiswa ORDER BY id DESC");
     while($d = mysqli_fetch_array($data)){
    $no++;
    ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $d['nama'];?></td>
            <td><?php echo $d['nim'];?></td>
            <td><?php echo $d['umur'];?></td>
            <td><?php echo $d['jenis_kelamin'];?></td>
            <td><?php echo $d['prodi'];?></td>
            <td><?php echo $d['jurusan'];?></td>
            <td><?php echo $d['asal_kota'];?></td>
            <td>
                <a href="edit.php?id=<?php echo $d['id'];?>">Edit</a>
                
                <a href="hapus.php?id=<?php echo $d['id'];?>" onclick="myFunction()">Hapus</a>
            </td>
        </tr>
        <?php
         }
         ?>
    </table><a href="tambah.php">Tambah Data</a>
    <a href="logout.php">Log out</a></center>

    <script>
        function myFunction() {
        confirm("Apakah yakin data mau di hapus");
        }
    </script>

</body>
</html>