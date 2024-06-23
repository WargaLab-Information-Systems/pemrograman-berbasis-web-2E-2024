<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
</head>
<title>Azli</title>
<body>
    <div class="container">
        <br>
        <h4><center>DAFTAR MAHASISWA BARU</center></h4>
<?php

    include "koneksi.php";

    //Cek apakah ada kiriman form dari method post
    // htmlspecialchar,menggantikan karakter-karakter khusus
    // htmlspecialchar,memastikan bahwa ID yang diambil dari URL aman dan tidak mengandung karakter berbahay
    
    // Memeriksa apakah parameter id ada di URL menggunakan isset($_GET['id']).
    if (isset($_GET['id'])) {
        $id=htmlspecialchars($_GET["id"]);

        $sql="delete from mahasiswa where id='$id' ";
        $hasil=mysqli_query($conn,$sql);

        //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location: index1.php");

            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

            }
        }
?>


     <tr class="table-danger">
            <br>
        <thead>
        <tr>
       <table class="my-3 table table-bordered">
            <tr class="table-danger">           
            <th>No</th>
            <th>Nama</th>
            <th>Nim</th>
            <th>Umur</th>
            <th>Jenis kelamin</th>
            <th>Prodi</th>
            <th>Jurusan</th>
            <th>Asal kota</th>
            <th colspan='2'>Aksi</th>

        </tr>
        </thead>

        <?php
        include "koneksi.php";
        $sql="select * from mahasiswa order by id desc";

        $hasil=mysqli_query($conn,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["nama"]; ?></td>
                <td><?php echo $data["nim"];   ?></td>
                <td><?php echo $data["umur"];   ?></td>
                <td><?php echo $data["jenis_kelamin"];   ?></td>
                <td><?php echo $data["prodi"];   ?></td>
                <td><?php echo $data["jurusan"];   ?></td>
                <td><?php echo $data["asal_kota"];   ?></td>
                <td>
                    <a href="update.php?id=<?php echo htmlspecialchars($data['id']); ?>"  role="button">Update</a>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id=<?php echo $data['id']; ?>"  role="button" onclick="return confirmDelete();">Delete</a>
                </td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
    <a href="tambahdata.php" class="btn btn-danger" role="button">Tambah Data</a>
    <a href="../halamanUtama.php" class="btn btn-primary" role="button">Halaman Utama</a>
    <script>
    function confirmDelete() {
        return confirm("Apakah Anda yakin ingin menghapus data ini?");
    }
</script>

</div>
</body>
</html>
