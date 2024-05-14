<?php

session_start();
if(!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

$host = "localhost";
$user = "root";
$pass = "";
$db = "db_mahasiswa";

$nama = "";
$nim = "";
$umur = "";
$gender = "";
$prodi = "";
$jurusan = "";
$kota = "";

$succes = "";
$error = "";

$connect = mysqli_connect($host, $user, $pass, $db);

if(!$connect){
    die("tidak bisa terkoneksi database");
}
// else {
//     echo "koneksi berhasil";
// }

if(isset($_GET['op'])){
    $op = $_GET['op'];
}else {
    $op = "";
}

if($op == 'edit'){
    if(isset($_GET['nim'])) {
        $nim = $_GET['nim'];
        $sql1 = "select * from mahasiswa where nim = '$nim'";
        $q1 = mysqli_query($connect,$sql1);
        $r1 = mysqli_fetch_array($q1);
        $nama = $r1['nama'];
        
        $umur = $r1['umur'];
        $gender = $r1['gender'];
        $prodi = $r1['prodi'];
        $jurusan = $r1['jurusan'];
        $kota = $r1['kota'];

        if($nim == ''){
            $error = 'data tidak ditemukan';
        }
        }
}

if($op == 'delete'){
    if(isset($_GET['nim'])) {
        $nim = $_GET['nim'];
        $sql1 = "delete from mahasiswa where nim = '$nim'";
        $q1 = mysqli_query($connect,$sql1);

        if($q1){
            $succes ="berhasil menghapus data";
        }else{
            $error = "gagal mengahpus data";
        }
        }
}

if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $umur = $_POST['umur'];
    $gender = $_POST['gender'];
    $prodi = $_POST['prodi'];
    $jurusan = $_POST['jurusan'];
    $kota = $_POST['kota'];

    if ($nama && $nim && $umur && $gender && $prodi && $jurusan && $kota){
        if($op == 'edit'){
            try {
                $sql1 = "update mahasiswa set nim='$nim', nama= '$nama', umur='$umur', gender='$gender', prodi='$prodi', jurusan = '$jurusan', kota='$kota' where nim='$nim'";
                $qi = mysqli_query($connect,$sql1);
                if ($q1){
                    $error = "";
                    $succes ='berhasil mengupdate data';
                }else {
                    $succes = "";
                    $error = 'gagal mengupdate data';
                }
            }catch (Exception) {
                // Tangkap kesalahan dan simpan pesan kesalahan ke dalam variabel error
                $succes = "";
                $error = "NIM telah digunakan2";
            }
        } else{
            try {
                // Eksekusi query dengan menggunakan try-catch
                $sql1 = "INSERT INTO mahasiswa(nama, nim, umur, gender, prodi, jurusan, kota) VALUES ('$nama', '$nim', '$umur', '$gender', '$prodi', '$jurusan', '$kota')";
                $q1 = mysqli_query($connect, $sql1);
                if($q1){
                    $succes = "Berhasil menambahkan data";
                    $error  = "";
                } 
            } catch (Exception) {
                // Tangkap kesalahan dan simpan pesan kesalahan ke dalam variabel error
                $succes = "";
                $error = "NIM telah digunakan1";
            }
           
        }


        
    } else {
        $succes = "";
        $error = "Harap isi dengan benar!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>datamahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
</head>

<body style="height: 200%; width: 100%">
    <section class="bg-info " style="height:200vh;">
        <!-- input data -->

        <div class="card mx-auto" style="width:70%;">
            <?php if ($succes){
            ?>
            <div class="alert alert-success" role="alert">
                <?php echo "$succes"?>
            </div> <?php
        } ?>

            <?php if ($error){
            ?>
            <div class="alert alert-danger" role="alert">
                <?php echo "$error"?>
            </div> <?php
        } ?>
            <div class="card-header">
                create data
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <!-- nama -->
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama?>">
                        </div>
                    </div>

                    <!-- nim -->
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">nim</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="nim" name="nim" value="<?php echo $nim?>">
                        </div>
                    </div>

                    <!-- umur -->
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">umur</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="umur" name="umur" value="<?php echo $umur?>">
                        </div>
                    </div>

                    <!-- jenis kelamin -->
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">gender</label>
                        <div class="col-sm-10">
                            <select name="gender" id="gender">
                                <option value="">- Pilih Gender</option>
                                <option value="laki-laki" <?php if($gender == 'laki-laki') echo 'selected'?>>laki-laki
                                </option>
                                <option value="perempuan" <?php if($gender == 'perempuan') echo 'selected'?>>perempuan
                                </option>
                            </select>
                        </div>
                    </div>

                    <!-- prodi -->
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">prodi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="prodi" name="prodi" value="<?php echo $prodi?>">
                        </div>
                    </div>

                    <!-- jurusan -->
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">jurusan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="jurusan" name="jurusan"
                                value="<?php echo $jurusan?>">
                        </div>
                    </div>

                    <!-- kota -->
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">kota</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="kota" name="kota" value="<?php echo $kota?>">
                        </div>
                    </div>

                    <!-- submit -->
                    <div class="mb-3 row">

                        <div class="col-sm-10">
                            <input type="submit" class="form-control" id="submit" name="submit" value="simpan">
                        </div>
                    </div>

                </form>
            </div>

            <!-- tampilan data -->
            <div class="card mt-5">
                <div class="card-header">
                    Daftar Mahasiswa
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>

                                <th scope="col">nama</th>
                                <th scope="col">nim</th>
                                <th scope="col">umur</th>
                                <th scope="col">gender</th>
                                <th scope="col">prodi</th>
                                <th scope="col">jurusan</th>
                                <th scope="col">kota</th>
                                <th scope="col">Perintah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $sql2 = "select * from mahasiswa order by nim desc";
                            $q2 = mysqli_query($connect,$sql2);

                            while($r2 = mysqli_fetch_array($q2)){
                                $nama   = $r2['nama'];
                                $nim    = $r2['nim'];
                                $umur   = $r2['umur'];
                                $gender = $r2['gender'];
                                $prodi  = $r2['prodi'];
                                $jurusan = $r2['jurusan'];
                                $kota   = $r2['kota'];
                                ?>
                            <tr>
                                <td scope="row"><?php echo $nama ?></td>
                                <td scope="row"><?php echo $nim ?></td>
                                <td scope="row"><?php echo $umur ?></td>
                                <td scope="row"><?php echo $gender ?></td>
                                <td scope="row"><?php echo $prodi ?></td>
                                <td scope="row"><?php echo $jurusan ?></td>
                                <td scope="row"><?php echo $kota ?></td>
                                <td scope="row">
                                    <a href="index.php?op=edit&nim=<?php echo $nim?>"><button type="button"
                                            class="btn btn-warning">Edit</button></a>
                                    <a href="index.php?op=delete&nim=<?php echo $nim?>"
                                        onclick="return confirm('Yakin untuk menghapus data?')"><button type="button"
                                            class="btn btn-danger">Delete</button></a>

                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <a href="logout.php" onclick="return confirm('Yakin Logout?')" class="mx-auto mt-5"><button
                        type="button" class="btn btn-danger">Logout</button></a>
            </div>
        </div>
    </section>
</body>

</html>