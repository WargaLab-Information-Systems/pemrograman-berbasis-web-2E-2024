<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Anggota</title>
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
    include "connect2.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama id_peserta
    if (isset($_GET['id_peserta'])) {
        $id_peserta=input($_GET["id_peserta"]);

        $sql="select * from peserta where id_peserta=$id_peserta";
        $hasil=mysqli_query($kon,$sql);
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

        $id_peserta=htmlspecialchars($_POST["id_peserta"]);
        $nama=input($_POST["nama"]);
        $nim=input($_POST["nim"]);
        $umur=input($_POST["umur"]);
        $jenis_kelamin=input($_POST["jenis_kelamin"]);
        $prodi=input($_POST["prodi"]);
        $jurusan=input($_POST["jurusan"]);
        $asal_kota=input($_POST["asal_kota"]);

        $query = mysqli_query($koneksi, "UPDATE mahasiswa SET nama='$nama', nim='$nim', umur='$umur', jenis_kelamin='$jenis_kelamin', prodi='$prodi', jurusan='$jurusan', asal_kota='$asal_kota' WHERE id='$id'");
        //Query update data pada tabel anggota
        $sql="update peserta set
			nama='$nama',
			nim='$nim',
			umur='$umur',
			jenis_kelamin='$jenis_kelamin',
			prodi='$prodi',
			jurusan='$jurusan',
			asal_kota='$asal_kota'
			where id_peserta=$id_peserta";


        //Mengeksekusi atau menjalankan query diatas
        $hasil=mysqli_query($kon, $sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:tampilanMahasiswa.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>
    <h2>Update Data</h2>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <div class="form-group">
    <label>Nama :</label>
    <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" value="<?php echo $nama ?>"
</div>
<div class="form-group">
    <label>NIM :</label>
    <input type="text" name="nim" class="form-control" placeholder="Masukan NIM" value="<?php echo $nim ?>"
<div class="form-group">
    <label>Umur :</label>
    <input type="text" name="umur" class="form-control" placeholder="Masukan Umur" value="<?php echo $umur ?>"
</div>
<div class="form-group">
    <label>Jenis Kelamin :</label>
    <input type="text" name="jenis_kelamin" class="form-control" placeholder="Masukan Jenis Kelamin" value="<?php echo $jenis_kelamin ?>"
</div>
<div class="form-group">
    <label>Prodi :</label>
    <input type="text" name="prodi" class="form-control" placeholder="Masukan Prodi" value="<?php echo $prodi ?>"
</div>
<div class="form-group">
    <label>Jurusan :</label>
    <input type="text" name="jurusan" class="form-control" placeholder="Masukan Jurusan" value="<?php echo $jurusan ?>"
<div class="form-group">
    <label>Asal Kota :</label>
    <textarea name="asal_kota" class="form-control" rows="7" placeholder="Masukan Asal Kota" value="<?php echo $asal_kota ?>"
</div>

<input type="hidden" name="id_peserta" value="<?php echo $data['id_peserta']; ?>" />

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>