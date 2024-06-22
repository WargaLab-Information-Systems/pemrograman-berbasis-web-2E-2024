

<?php



$host = "127.0.0.1:3308";
$user = "root";
$pass = "";
$db = "db_crud";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    die("koneksi berhasil");
}
// 

$nama           = "";
$nim            = "";
$umur           = "";
$jenis_kelamin  = "";
$prodi          = "";
$jurusan        = "";
$asal_kota      = "";
$sukses         = "";
$error          = "";

if(isset($_GET['op'])){
    $op = $_GET['op'];
} else {
    $op = "";
}

if($op == 'delete'){
    $id             = $_GET['id'];
    $sql1           = "delete from mahasiswa where id = $id";
    $q1             = mysqli_query($koneksi,$sql1);
    
    if($q1){
        $sukses = "Berhasil hapus data";
    }else {
        $error = "Gagal melakukan delete data";
    }
}

if($op == 'edit'){
    $id             = $_GET['id'];
    $sql1           = "select * from mahasiswa where id = '$id'";
    $q1             = mysqli_query($koneksi,$sql1);
    $r1             = mysqli_fetch_array($q1);
    $nama           = $r1['nama'];
    $nim            = $r1['nim'];
    $umur           = $r1['umur'];
    $jenis_kelamin  = $r1['jenis_kelamin'];
    $prodi          = $r1['prodi'];
    $jurusan        = $r1['jurusan'];
    $asal_kota      = $r1['asal_kota'];

    if($nim == '') {
        $error = "Data tidak ditemukan";
    }

}

if (isset($_POST['simpan'])) {  //untuk create
    $nama           = $_POST['nama'];
    $nim            = $_POST['nim'];
    $umur           = $_POST['umur'];
    $jenis_kelamin  = $_POST['jenis_kelamin'];
    $prodi          = $_POST['prodi'];
    $jurusan        = $_POST['jurusan'];
    $asal_kota      = $_POST['asal_kota'];

    if ($nama && $nim && $umur && $jenis_kelamin && $prodi && $jurusan && $asal_kota) {
        if($op == 'edit'){ //untuk update
            $sql1   = "update mahasiswa set nama = '$nama', nim = '$nim' ,umur = '$umur',jenis_kelamin = '$jenis_kelamin',prodi = '$prodi',jurusan= '$jurusan',asal_kota = '$asal_kota' where id='$id' ";
            $q1     = mysqli_query($koneksi,$sql1);
            if($q1) {
                $sukses = "Data Berhasil di update";
            } else {
                $error = "Data gagal di update";
            }

        }else{ //untuk insert/tambah
            $sql1 = "insert into mahasiswa(nama,nim,umur,jenis_kelamin,prodi,jurusan,asal_kota) values ('$nama','$nim','$umur','$jenis_kelamin','$prodi','$jurusan','$asal_kota') ";
            $q1    = mysqli_query($koneksi, $sql1);
            // 
            if ($q1) {
                $sukses     = "Berhasil memasukkan data baru";
            } else {
                $error      = "GAGAL MEMASUKKAN DATA";
            }
        }

    } else {
        $error  = "Silahkan masukkan semua data";
    }
}
// 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .mx-auto {
            width: 800px;
        }

        .card {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <!-- <h1>ddd</h1> -->
    <div class="mx-auto">
        <!-- UNTUKJ MASUKAN DATA -->
        <div class="card">
            <div class="card-header">
                Create / Edit Data
            </div>
            <div class="card-body">
                <!-- pesan gagal -->
                <?php
                if ($error) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                <?php
                    header("refresh: 5;url=index.php");  //5 detik
                }
                ?>
                <!-- pesan sukses -->
                <?php
                if ($sukses) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                <?php
                    header("refresh: 5;url=index.php");  //5 detik
                }
                ?>
                <form action="" method="POST">

                    <!-- nama -->
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value=" <?php echo $nama ?> ">
                        </div>
                    </div>
                    <!-- nim -->
                    <div class="mb-3 row">
                        <label for="nim" class="col-sm-2 col-form-label">Nim</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nim" name="nim" value=" <?php echo $nim ?> ">
                        </div>
                    </div>
                    <!-- umur -->
                    <div class="mb-3 row">
                        <label for="umur" class="col-sm-2 col-form-label">Umur</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="umur" name="umur" value=" <?php echo $umur ?> ">
                        </div>
                    </div>
                    <!-- Jenis_Kelamin -->
                    <div class="mb-3 row">
                        <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" value=" <?php echo $jenis_kelamin ?> ">
                        </div>
                    </div>
                    <!-- prodi -->
                    <div class="mb-3 row">
                        <label for="prodi" class="col-sm-2 col-form-label">Prodi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="prodi" name="prodi" value=" <?php echo $prodi ?> ">
                        </div>
                    </div>
                    <!-- jurusan -->
                    <div class="mb-3 row">
                        <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="jurusan" name="jurusan" value=" <?php echo $jurusan ?> ">
                        </div>
                    </div>
                    <!-- asal kota -->
                    <div class="mb-3 row">
                        <label for="asal_kota" class="col-sm-2 col-form-label">Asal Kota</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="asal_kota" name="asal_kota" value=" <?php echo $asal_kota ?> ">
                        </div>
                    </div>
                    <!-- habis -->
                    <div class="col-12">
                        <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary">
                    </div>

                </form>
            </div>
        </div>

        <!-- UNTUK MENGELUARKAN DATA -->
        <div class="card">
            <div class="card-header text-white bg-secondary">
                Data Mahasiswa
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Nim</th>
                            <th scope="col">Umur</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Prodi</th>
                            <th scope="col">Jurusan</th>
                            <th scope="col">Asal Kota</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    <tbody>
                        <?php
                        // data ditampilkan urut id
                        $sql2   = "select * from mahasiswa order by id desc";
                        $q2 = mysqli_query($koneksi, $sql2);
                        $urut = 1;
                        while ($r2 = mysqli_fetch_array($q2)) {
                            $id            = $r2['id'];
                            $nama          = $r2['nama'];
                            $nim           = $r2['nim'];
                            $umur          = $r2['umur'];
                            $jenis_kelamin = $r2['jenis_kelamin'];
                            $prodi         = $r2['prodi'];
                            $jurusan       = $r2['jurusan'];
                            $asal_kota     = $r2['asal_kota'];

                        ?>
                            <tr>
                                <th scope="row"> <?php echo $urut++         ?> </th>
                                <td scope="row"> <?php echo $nama           ?> </td>
                                <td scope="row"> <?php echo $nim            ?> </td>
                                <td scope="row"> <?php echo $umur           ?> </td>
                                <td scope="row"> <?php echo $jenis_kelamin  ?> </td>
                                <td scope="row"> <?php echo $prodi          ?> </td>
                                <td scope="row"> <?php echo $jurusan        ?> </td>
                                <td scope="row"> <?php echo $asal_kota      ?> </td>
                                <td scope="row">
                                    <a href="index.php?op=edit&id=<?php echo $id  ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                    <a href="index.php?op=delete&id= <?php echo $id ?>" onclick="return confirm('Yakin Mau delete data?')"><button type="button" class="btn btn-danger">Delete</button></a>
                                    
                                </td>

                            </tr>
                        <?php

                        }
                        ?>
                    </tbody>
                    </thead>
                </table>
            </div>
        </div>

    </div>
</body>

</html>