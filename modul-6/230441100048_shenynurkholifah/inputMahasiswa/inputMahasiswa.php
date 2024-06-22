<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <style>
        *{
            font-family: 'poppins', sans-serif;
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
    <h2>Input Data</h2>


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required />

        </div>
        <div class="form-group">
            <label>NIM :</label>
            <input type="text" name="nim" class="form-control" placeholder="Masukan NIM" required/>
        </div>
       <div class="form-group">
            <label>Umur :</label>
            <input type="text" name="umur" class="form-control" placeholder="Masukan Umur" required/>
        </div>
                </p>
        <div class="form-group">
            <label>Jenis_kelamin:</label>
            <input type="text" name="jenis_kelamin" class="form-control" placeholder="Masukan Jenis Kelamin" required/>
        </div>
        <div class="form-group">
            <label>Prodi:</label>
            <textarea name="prodi" class="form-control" placeholder="Masukkan Prodi" required></textarea>
        </div>       
        <div class="form-group">
            <label>Jurusan :</label>
            <textarea name="jurusan" class="form-control" placeholder="Masukkan Jurusan" required></textarea>
        </div>       
        <div class="form-group">
            <label>Asal Kota:</label>
            <textarea name="asal_kota" class="form-control" rows="7"placeholder="Masukkan Asal Kota" required></textarea>
        </div>       

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>