<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>data mhs</title>
    <link rel="stylesheet" href="data.css">
    <style>
        body{
            justify-content: center;
            background: url(https://static.vecteezy.com/system/resources/previews/011/171/111/non_2x/white-background-with-orange-geometric-free-vector.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }
        div {
            width: 80%;
            margin: 10vh auto;
            padding: 20px;
            background-color: #f8f5f5be;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div>
        <h1>Data Mahasiswa</h1>
        <br>
        <br>
        <table border="1">
            <tr>
                <th>nomor</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Umur</th>
                <th>Jenis Kelamin</th>
                <th>Prodi</th>
                <th>Jurusan</th>
                <th>Asal Kota</th>
                <th>opsi</th>
            </tr>
            <?php 
                include 'koneksi.php';
                $no = 1;
                // u/ mngmbl data dari tabel dtbs
                $data = mysqli_query($koneksi, "SELECT * FROM datamahasiswa");
                // u/ mngmbl stp brs dt
                while ($d = mysqli_fetch_array($data)){
                    ?>

                    <!-- d mnplkn nl -->
                        <tr>
                            <td><?php echo $no++;?></td>
                            <td><?php echo $d['Nama'];?></td>
                            <td><?php echo $d['Nim'];?></td>
                            <td><?php echo $d['Umur'];?></td>
                            <td><?php echo $d['Jenis_Kelamin'];?></td>
                            <td><?php echo $d['Prodi'];?></td>
                            <td><?php echo $d['Jurusan'];?></td>
                            <td><?php echo $d['Asal_Kota'];?></td>
                            <td>
                                <a href = "edit.php? id = <?php echo $d['id'];?>">edit</a>
                                <a href = "hapus.php? id = <?php echo $d['id'];?>">hapus</a>
                            </td>
                        </tr>
                    <?php
                }
                ?>
        </table>
        <button><a href="tmbh.php">Tambah</a></button>
        <button><a href="logout.php">Logout</a></button>
    </div>
</body>
</html>