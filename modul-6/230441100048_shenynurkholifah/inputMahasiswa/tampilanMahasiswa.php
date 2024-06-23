<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        *{
            font-family: 'poppins', sans-serif;
        }
    </style>
</head>
<body>
<!-- <nav class="navbar navbar-dark bg-dark">
    <span class="navbar-brand mb-0 h1"></span>
</nav> -->

<div class="container">
    <br>
    <h4 class="text-center">DAFTAR MAHASISWA</h4>
</div>

<?php
// Baris ini mengambil file "connect2.php" yang berisi skrip 
    include "connect2.php";

    if(isset($_GET['id_peserta'])){
        // Ini adalah kondisi PHP yang memeriksa apakah ada parameter "id_peserta" yang dikirim melalui URL
        $id_peserta=htmlspecialchars($_GET['id_peserta']);
        // Baris ini mengambil nilai "id_peserta"

        $sql="delete from peserta where id_peserta= '$id_peserta' ";
        // Ini adalah query SQL untuk menghapus baris dari tabel
        $hasil=mysqli_query($kon, $sql);
        // Baris ini mengeksekusi query SQL yang telah dibuat sebelumnya

        if ($hasil){
            header("location: tampilanMahasiswa.php");
        }else{
            echo "<div class='alert alert-danger'>Data Gagal Dihapus.</div>";
            // memeriksa apakah query untuk menghapus data berhasil dieksekusi atau tidak
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
            $sql = "select * from peserta order by id_peserta desc";
            // Ini adalah query SQL untuk mengambil semua data dari tabel "peserta"
            $hasil = mysqli_query($kon, $sql);
            // ini mengeksekusi query SQL yang telah dibuat sebelumnya
            $no = 1;

            while ($data = mysqli_fetch_array($hasil)) {
                // loop while yang digunakan untuk mengambil setiap baris data dari hasil query dan menampilkannya
                $no++;
                ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <!-- Ini adalah sel dalam tabel yang menampilkan nomor urut. -->
                    <td><?php echo $data["nama"]; ?></td>
                    <td><?php echo $data["nim"]; ?></td>
                    <td><?php echo $data["umur"]; ?></td>
                    <td><?php echo $data["jenis_kelamin"]; ?></td>
                    <td><?php echo $data["prodi"]; ?></td>
                    <td><?php echo $data["jurusan"]; ?></td>
                    <td><?php echo $data["asal_kota"]; ?></td>
                    <td>
                        <a href="update.php?id_peserta=<?php echo htmlspecialchars($data['id_peserta']); ?>" class="btn btn-warning" role="button">Update</a>
                        <!-- Ini adalah link untuk mengarahkan pengguna ke halaman "update -->
                        <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_peserta=<?php echo $data['id_peserta']; ?>" class="btn btn-danger" role="button">Delete</a>
                        <!-- link untuk menghapus data mahasiswa -->
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <a href="inputMahasiswa.php" class="btn btn-primary" role="button">Tambah Data</a>
    <!-- untuk mengarahkan pengguna ke halaman "inputMahasiswa -->
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
