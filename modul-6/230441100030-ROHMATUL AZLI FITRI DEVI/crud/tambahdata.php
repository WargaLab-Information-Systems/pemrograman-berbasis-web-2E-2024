<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Peserta</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <?php
    
    include "koneksi.php";

    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Mengecek apakah request method adalah POST, yang menunjukkan bahwa formulir telah disubmit.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nama=input($_POST["nama"]);
        $nim=input($_POST["nim"]);
        $umur=input($_POST["umur"]);
        $jenis_kelamin=input($_POST["jenis_kelamin"]);
        $prodi=input($_POST["prodi"]);
        $jurusan=input($_POST["jurusan"]);
        $asal_kota=input($_POST["asal_kota"]);

        //menginput data kedalam tabel anggota
        $sql="insert into mahasiswa (nama,nim,umur,jenis_kelamin,prodi,jurusan,asal_kota) values
		('$nama','$nim','$umur','$jenis_kelamin','$prodi','$jurusan','$asal_kota')";

        //menjalankan query diatas
        $hasil=mysqli_query($conn,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location: index1.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>
    <h2>Input Data</h2>

    <!-- membantu melindungi aplikasi dari serangan XSS -->
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required />
        </div>
        <div class="form-group">
            <label>Nim:</label>
            <input type="text" name="nim" class="form-control" placeholder="Masukan nim anda" required/>
        </div>
       <div class="form-group">
            <label>Umur :</label>
            <input type="text" name="umur" class="form-control" placeholder="Masukan umur anda" required/>
        </div>
                </p>
        <div class="form-group">
            <label>Jenis_kelamin:</label>
            <input type="text" name="jenis_kelamin" class="form-control" placeholder="Masukan jenis kelamin anda" required/>
        </div>
        <div class="form-group">
            <label>Prodi:</label>
            <input type="text" name="prodi" class="form-control" placeholder="Masukan prodi anda" required/>
        </div>
        <div class="form-group">
            <label>Jurusan:</label>
            <input type="text" name="jurusan" class="form-control" placeholder="Masukan jurusan anda" required/>
        </div>
        <div class="form-group">
            <label>Asal_kota:</label>
            <textarea name="asal_kota" class="form-control" rows="5"placeholder="Masukan asal kota anda" required></textarea>
        </div>       

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>