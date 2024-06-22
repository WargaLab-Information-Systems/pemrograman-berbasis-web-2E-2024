<?php
    include "config/app.php";
    session_start();

    $data_mahasiswa = select("SELECT * FROM data_mahasiswa");

    if (isset($_POST['logout'])) {
        session_unset();
        session_destroy();
        header('location: index.php');
    }
    $koneksi->close();
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Data Nahasiswa</title>
</head>

<body>

    <h3>Selamat Datang <?= $_SESSION["username"] ?></h3>

    <div class="container mt-5">
        <h1>Data Mahaiswa</h1>
        <hr>

        <a href="tambah.php" class="btn btn-primary mb-1">Tambah</a>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Nim</th>
                    <th>Umur</th>
                    <th>Jenis_kelamin</th>
                    <th>Prodi</th>
                    <th>Jurusan</th>
                    <th>Asal_Kota</th>
                    <th width="15%" class="text_center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($data_mahasiswa as $data) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $data['nama']; ?></td>
                        <td><?= $data['nim']; ?></td>
                        <td><?= $data['umur']; ?></td>
                        <td><?= $data['jenis_kelamin']; ?></td>
                        <td><?= $data['prodi']; ?></td>
                        <td><?= $data['jurusan']; ?></td>
                        <td><?= $data['asal_kota']; ?></td>
                        <td class="text-center">
                            <a href="edit.php?id=<?= $data['id']; ?>" class="btn btn-success">Ubah</a>
                            <a href="hapus.php?id=<?= $data['id']; ?>" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <form action="dashboard.php" method="POST">
        <button type="submit" name="logout" class="btn btn-primary mb-1">Logout</button>
    </form>

    <?php include "layout/footer.html" ?>

</body>

</html>