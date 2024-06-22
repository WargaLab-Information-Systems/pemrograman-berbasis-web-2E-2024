<?php

session_start(); // Memulai sesi

// Cek apakah user sudah login, jika belum redirect ke halaman login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'];

// Inisialisasi atau ambil data mahasiswa dari sesi
if (isset($_SESSION['mahasiswa'])) {
    $mahasiswa = $_SESSION['mahasiswa'];
} else {
    // Inisialisasi data mahasiswa (contoh data statis)
    $mahasiswa = array(
        array("nim" => "230441100100", "nama" => "Ahmad Luffy", "alamat" => "Jl. mangga No. 9", "angkatan" => "2021"),
        array("nim" => "230441100101", "nama" => "Erlangga Satrya Husada", "alamat" => "Jl. elang No. 15", "angkatan" => "2023"),
        // Tambahkan data mahasiswa lainnya di sini sesuai kebutuhan
    );
}

// Fungsi untuk menambahkan data mahasiswa baru
function tambahMahasiswa($nim, $nama, $alamat, $angkatan)
{
    global $mahasiswa;
    $mahasiswa[] = array("nim" => $nim, "nama" => $nama, "alamat" => $alamat, "angkatan" => $angkatan);
    // Simpan data mahasiswa ke dalam sesi setelah ditambahkan
    $_SESSION['mahasiswa'] = $mahasiswa;
}

// Fungsi untuk mengupdate data mahasiswa
function updateMahasiswa($index, $nim, $nama, $alamat, $angkatan)
{
    global $mahasiswa;
    $mahasiswa[$index]["nim"] = $nim;
    $mahasiswa[$index]["nama"] = $nama;
    $mahasiswa[$index]["alamat"] = $alamat;
    $mahasiswa[$index]["angkatan"] = $angkatan;
    // Simpan data mahasiswa ke dalam sesi setelah diupdate
    $_SESSION['mahasiswa'] = $mahasiswa;
}

// Fungsi untuk menghapus data mahasiswa
function hapusMahasiswa($index)
{
    global $mahasiswa;
    array_splice($mahasiswa, $index, 1);
    // Simpan data mahasiswa ke dalam sesi setelah dihapus
    $_SESSION['mahasiswa'] = $mahasiswa;
}

// Proses form tambah data mahasiswa
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['tambah'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $angkatan = $_POST['angkatan'];
    tambahMahasiswa($nim, $nama, $alamat, $angkatan);
    // Redirect ke halaman home setelah berhasil menambahkan data
    header("Location: home.php");
    exit;
}

// Proses form update data mahasiswa
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $index = $_POST['index'];
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $angkatan = $_POST['angkatan'];
    updateMahasiswa($index, $nim, $nama, $alamat, $angkatan);
    // Redirect ke halaman home setelah berhasil mengupdate data
    header("Location: home.php");
    exit;
}

// Proses hapus data mahasiswa
if (isset($_GET['hapus'])) {
    $index = $_GET['hapus'];
    hapusMahasiswa($index);
    // Redirect ke halaman home setelah berhasil menghapus data
    header("Location: home.php");
    exit;
}

// Proses logout
if (isset($_POST['logout'])) {
    // Hapus semua data sesi
    session_unset();
    // Hancurkan sesi
    session_destroy();
    // Redirect ke halaman login
    header("Location: login.php");
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="home.css">
</head>

<body>
    <h2>Selamat datang, <?php echo $username; ?></h2>
    <p>Ini adalah halaman home.</p>

    <!-- Form logout -->
    <form  method="post">
        <button type="submit"  name="logout">Logout</button>
    </form>

    <!-- Form tambah data mahasiswa -->
    <h3>Tambah Mahasiswa</h3>
    <form method="post">

        <table class="tb-input">
            <tr>
                <td><label for="nim">NIM:</label></td>
                <td><input type="text" id="nim" name="nim" required></td>
            </tr>
            <tr>
                <td><label for="nama">Nama:</label></td>
                <td><input type="text" id="nama" name="nama" required></td>
            </tr>
            <tr>
                <td><label for="alamat">Alamat:</label></td>
                <td><input type="text" id="alamat" name="alamat" required></td>
            </tr>
            <tr>
                <td><label for="angkatan">Angkatan:</label></td>
                <td><input type="text" id="angkatan" name="angkatan" required></td>
            </tr>
        </table>
        <br><br>
        <button type="submit" name="tambah">Tambah</button>
    </form>

    <!-- Tabel data mahasiswa -->
    <h3>Data Mahasiswa</h3>
    <table class="hehe" border="1">
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Angkatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mahasiswa as $index => $mhs) : ?>
                <tr>
                    <td><?php echo $mhs['nim']; ?></td>
                    <td><?php echo $mhs['nama']; ?></td>
                    <td><?php echo $mhs['alamat']; ?></td>
                    <td><?php echo $mhs['angkatan']; ?></td>
                    <td>
                        <!-- Tombol Edit -->
                        <form method="post">
                            <input type="hidden" name="index" value="<?php echo $index; ?>">
                            <button type="submit" name="edit">Edit</button>
                        </form>
                        <!-- Tombol Hapus -->
                        <a href="?hapus=<?php echo $index; ?>">Hapus</a>
                    </td>
                </tr>
                <?php
                // Proses edit data
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit']) && $_POST['index'] == $index) :
                ?>
                    <tr>
                        <td colspan="5">
                            <!-- Form Edit -->
                            <form method="post">
                                <input type="hidden" name="index" value="<?php echo $index; ?>">
                                <label for="edit_nim">NIM:</label>
                                <input type="text" id="edit_nim" name="nim" value="<?php echo $mhs['nim']; ?>" required><br>
                                <label for="edit_nama">Nama:</label>
                                <input type="text" id="edit_nama" name="nama" value="<?php echo $mhs['nama']; ?>" required><br>
                                <label for="edit_alamat">Alamat:</label>
                                <input type="text" id="edit_alamat" name="alamat" value="<?php echo $mhs['alamat']; ?>" required><br>
                                <label for="edit_angkatan">Angkatan:</label>
                                <input type="text" id="edit_angkatan" name="angkatan" value="<?php echo $mhs['angkatan']; ?>" required><br>
                                <button type="submit" name="update">Simpan</button>
                            </form>
                        </td>
                    </tr>
            <?php
                endif;
            endforeach;
            ?>
        </tbody>
    </table>
</body>

</html>
