<?php
session_start();

if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
}else {
    header('location: index.php');
}

function hapusMahasiswa($nim) {
    if (isset($_SESSION['mahasiswa'])) {
        foreach ($_SESSION['mahasiswa'] as $key => $mahasiswa) {
            if ($mahasiswa['nim'] == $nim) {
                unset($_SESSION['mahasiswa'][$key]);
                break;
            }
        }
    }
}

if (isset($_GET['hapus_mahasiswa'])) {
    hapusMahasiswa($_GET['hapus_mahasiswa']);
}

function tambahMahasiswa($mahasiswa) {
    $_SESSION['mahasiswa'][] = $mahasiswa;
}

if (isset($_POST['tambah_mahasiswa'])) {
    tambahMahasiswa(array(
        "nim" => $_POST['nim'],
        "nama" => $_POST['nama'],
        "prodi" => $_POST['prodi'],
        "asal" => $_POST['asal'],
        "angkatan" => $_POST['angkatan']
    ));
}

function ubahMahasiswa($nim, $mahasiswaBaru) {
    if (isset($_SESSION['mahasiswa'])) {
        foreach ($_SESSION['mahasiswa'] as $key => $mahasiswa) {
            if ($mahasiswa['nim'] == $nim) {
                $_SESSION['mahasiswa'][$key] = $mahasiswaBaru;
                break;
            }
        }
    }
}

if (isset($_POST['ubah_mahasiswa'])) {
    ubahMahasiswa($_POST['nim'], array(
        "nim" => $_POST['nim'],
        "nama" => $_POST['nama'],
        "prodi" => $_POST['prodi'],
        "asal" => $_POST['asal'],
        "angkatan" => $_POST['angkatan']
    ));
}

function getMahasiswaData() {
    return isset($_SESSION['mahasiswa']) ? $_SESSION['mahasiswa'] : array();
}

$mahasiswaData = getMahasiswaData();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="data.css">
</head>
<body>
    <div class="data">
        <table border='2'>
            <tr>
                <th>NIM</th>
                <th>NAMA</th>
                <th>PRODI</th>
                <th>ASAL KOTA</th>
                <th>ANGKATAN</th>
                <th>DELETE</th>
                <th>UPDATE</th>
            </tr>
            <?php foreach ($mahasiswaData as $mahasiswa): ?>
            <tr>
                <td><?php echo $mahasiswa['nim']; ?></td>
                <td><?php echo $mahasiswa['nama']; ?></td>
                <td><?php echo $mahasiswa['prodi']; ?></td>
                <td><?php echo $mahasiswa['asal']; ?></td>
                <td><?php echo $mahasiswa['angkatan']; ?></td>
                <td>
                    <a href="?hapus_mahasiswa=<?php echo $mahasiswa['nim']; ?>">DELETE</a>
                </td>
                <td>
                    <a href="#" onclick="document.getElementById('form_ubah_<?php echo $mahasiswa['nim']; ?>').style.display = 'block';">UPDATE</a>
                    <form id="form_ubah_<?php echo $mahasiswa['nim']; ?>" method="post" style="display: none;">
                        <input type="hidden" name="nim" value="<?php echo $mahasiswa['nim']; ?>">
                        <input type="text" name="nama" value="<?php echo $mahasiswa['nama']; ?>">
                        <input type="text" name="prodi" value="<?php echo $mahasiswa['prodi']; ?>">
                        <input type="text" name="asal" value="<?php echo $mahasiswa['asal']; ?>">
                        <input type="text" name="angkatan" value="<?php echo $mahasiswa['angkatan']; ?>">
                        <input type="submit" name="ubah_mahasiswa" value="Simpan">
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <h2>Tambah Data Mahasiswa</h2>
        <form method="post">
            <label for="nim">NIM:</label><br>
            <input type="text" id="nim" name="nim"><br>
            <label for="nama">Nama:</label><br>
            <input type="text" id="nama" name="nama"><br>
            <label for="prodi">Prodi:</label><br>
            <input type="text" id="prodi" name="prodi"><br>
            <label for="asal">Asal Kota:</label><br>
            <input type="text" id="asal" name="asal"><br>
            <label for="angkatan">Angkatan:</label><br>
            <input type="text" id="angkatan" name="angkatan"><br><br>
            <input type="submit" name="tambah_mahasiswa" value="Tambah Data">
        </form>
        <br><br><br>
        <a href='logout.php'>LOGOUT</a>
    </div>
</body>
</html>
