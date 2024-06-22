<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Mahasiswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <?php

    //Include file koneksi, untuk koneksikan ke database
    include "koneksi.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama id
    if (isset($_GET['id'])) {
        $id=input($_GET["id"]);

        $sql="select * from mahasiswa1 where id=$id";
        $hasil=mysqli_query($conn,$sql);
        $data = mysqli_fetch_assoc($hasil);
        $nama = $data['nama'];
        $nim = $data['nim'];
        $umur = $data['umur'];
        $jenis_kelamin = $data['jenis_kelamin'];
        $prodi = $data['prodi'];
        $jurusan = $data['jurusan'];
        $asal_kota = $data['asal_kota'];


    }

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id=htmlspecialchars($_POST["id"]);
        $nama=input($_POST["nama"]);
        $nim=input($_POST["nim"]);
        $umur=input($_POST["umur"]);
        $jenis_kelamin=input($_POST["jenis_kelamin"]);
        $prodi=input($_POST["prodi"]);
        $jurusan=input($_POST["jurusan"]);
        $asal_kota=input($_POST["asal_kota"]);

        //Query update data pada tabel anggota
        $sql="update mahasiswa1 SET
			nama='$nama',
			nim='$nim',
			umur='$umur',
			jenis_kelamin='$jenis_kelamin',
			prodi='$prodi',
            jurusan='$jurusan',
            asal_kota='$asal_kota'
			where id=$id";

        //Mengeksekusi atau menjalankan query diatas
        $hasil=mysqli_query($conn,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }

    ?>
    <h2>Update Data</h2>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required value="<?php echo $nama?>" />
        </div>
        <div class="form-group">
            <label>Nim:</label>
            <input type="text" name="nim" class="form-control" placeholder="Masukan Nim Anda" required value="<?php echo $nim?>"/>
        </div>
        <div class="form-group">
            <label>Umur :</label>
            <input type="text" name="umur" class="form-control" placeholder="Masukan Umur Anda" required value="<?php echo $umur?>"/>
        </div>
        <div class="form-group">
            <label>Jenis_kelamin:</label>
            <input type="text" name="jenis_kelamin" class="form-control" placeholder="Masukan Jenis Kelamin Anda" required value="<?php echo $jenis_kelamin?>"/>
        </div>
        <div class="form-group">
            <label>Prodi:</label>
            <input type="text" name="prodi" class="form-control" placeholder="Masukan Prodi Anda" required value="<?php echo $prodi?>"/>
        </div>
        <div class="form-group">
            <label>Jurusan:</label>
            <input type="text" name="jurusan" class="form-control" placeholder="Masukan Jurusan Anda" required value="<?php echo $jurusan?>"/>
        </div>
        <div class="form-group">
            <label>Asal_kota:</label>
            <textarea name="asal_kota" class="form-control" rows="5"placeholder="Masukan Asal Kota Anda" required value="<?php echo $asal_kota?>"><?php echo $asal_kota?></textarea>
        </div>

        <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>