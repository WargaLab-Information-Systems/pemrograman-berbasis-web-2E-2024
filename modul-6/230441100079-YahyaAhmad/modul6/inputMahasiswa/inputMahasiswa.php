<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Input Mahasiswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <style>
    * {
        font-family: 'poppins', sans-serif;
    }

    body {
        background: linear-gradient(to right, #e2e2e2, #ffad33);
    }
    </style>
</head>

<body>
    <div class="container">
        <?php
    //Include file koneksi, untuk koneksikan ke database
    include "connect2.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nama=input($_POST["nama"]);
        $nim=input($_POST["nim"]);
        $umur=input($_POST["umur"]);
        $jenis_kelamin=input($_POST["jenis_kelamin"]);
        $prodi=input($_POST["prodi"]);
        $jurusan=input($_POST["jurusan"]);
        $asal_kota=input($_POST["asal_kota"]);
        

        //Query input menginput data kedalam tabel anggota
        $sql="insert into peserta (nama,nim,umur,jenis_kelamin,prodi,jurusan,asal_kota) values
		('$nama','$nim','$umur','$jenis_kelamin','$prodi', '$jurusan', '$asal_kota')";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:tampilanMahasiswa.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>
        <h2 style="text-align: center; margin-bottom: 10px;">Input Data</h2>


        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
            <div class="mb-3 row form-group">
                <label class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required>
                </div>
            </div>
            <div class="mb-3 row form-group">
                <label class="col-sm-2 col-form-label">NIM</label>
                <div class="col-sm-10">
                    <input type="text" name="nim" class="form-control" placeholder="Masukan NIM" required>
                </div>
            </div>
            <div class="mb-3 row form-group">
                <label class="col-sm-2 col-form-label">Umur</label>
                <div class="col-sm-10">
                    <input type="text" name="umur" class="form-control" placeholder="Masukan Umur" required>
                </div>
            </div>
            <div class="mb-3 row form-group">
                <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                    <input type="text" name="jenis_kelamin" class="form-control" placeholder="Masukan Jenis Kelamin"
                        required>
                </div>
            </div>
            <div class="mb-3 row form-group">
                <label class="col-sm-2 col-form-label">Prodi</label>
                <div class="col-sm-10">
                    <input type="text" name="prodi" class="form-control" placeholder="Masukan Prodi" required>
                </div>
            </div>
            <div class="mb-3 row form-group">
                <label class="col-sm-2 col-form-label">Jurusan</label>
                <div class="col-sm-10">
                    <input type="text" name="jurusan" class="form-control" placeholder="Masukan Jurusan" required>
                </div>
            </div>
            <div class="mb-3 row form-group">
                <label class="col-sm-2 col-form-label">Asal Kota</label>
                <div class="col-sm-10">
                    <input type="text" name="asal_kota" class="form-control" placeholder="Masukan Asal Kota" required>
                </div>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>