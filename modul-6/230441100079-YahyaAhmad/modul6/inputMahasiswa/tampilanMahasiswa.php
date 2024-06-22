<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("location: index.php");
    exit();
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Tampilan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
    * {
        font-family: 'poppins', sans-serif;
    }

    body {
        background: linear-gradient(to right, #e2e2e2, #ffad33);
    }

    .navbar {
        display: flex;
        justify-content: center;
        background-color: #e2e2e2;
        border-radius: 10px;
    }

    .navbar ul {
        list-style: none;
        padding: 0;
    }

    .navbar ul li {
        display: inline-block;
        margin-right: 20px;
    }

    .navbar ul li a {
        text-decoration: none;
    }
    </style>
</head>

<body>
    <section class="navbar text-center">
        <ul class="text-center">
            <li><a href="../halamanUtama.php">Home</a></li>
            <li><a href="../inputMahasiswa/inputMahasiswa.php">Data Mahasiswa</a></li>
            <li><a href="../logout.php">Logout</a></li>
        </ul>
    </section>
    <div class="container">
        <br>
        <h4 class="text-center">DAFTAR MAHASISWA</h4>
    </div>

    <?php
    include "connect2.php";

    if(isset($_GET['id_peserta'])){
        $id_peserta=htmlspecialchars($_GET['id_peserta']);

        $sql="delete from peserta where id_peserta= '$id_peserta' ";
        $hasil=mysqli_query($kon, $sql);

        if ($hasil){
            header("location: tampilanMahasiswa.php");
        }else{
            echo "<div class='alert alert-danger'>Data Gagal Dihapus.</div>";
        }
    }
?>

    <div class="container pad">
        <table class="my-3 table table-bordered">
            <thead>
                <tr class="table-primary">
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Umur</th>
                    <th>Jenis Kelamin</th>
                    <th>Prodi</th>
                    <th>Jurusan</th>
                    <th>Asal Kota</th>
                    <th colspan='2'>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
            include "connect2.php";
            $sql = "select * from peserta order by id_peserta asc";
            $hasil = mysqli_query($kon, $sql);
            $no = 0;
            while ($data = mysqli_fetch_array($hasil)) {
                $no++;
                ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $data["nama"]; ?></td>
                    <td><?php echo $data["nim"]; ?></td>
                    <td><?php echo $data["umur"]; ?></td>
                    <td><?php echo $data["jenis_kelamin"]; ?></td>
                    <td><?php echo $data["prodi"]; ?></td>
                    <td><?php echo $data["jurusan"]; ?></td>
                    <td><?php echo $data["asal_kota"]; ?></td>
                    <td>
                        <a href="update.php?id_peserta=<?php echo htmlspecialchars($data['id_peserta']); ?>"
                            class="btn btn-warning" role="button">Update</a>
                        <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_peserta=<?php echo $data['id_peserta']; ?>"
                            class="btn btn-danger" role="button">Delete</a>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <a href="inputMahasiswa.php" class="btn btn-primary" role="button">Tambah Data</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>