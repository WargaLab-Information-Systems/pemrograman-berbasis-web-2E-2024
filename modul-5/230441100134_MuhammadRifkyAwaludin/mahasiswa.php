<?php
session_start();

// Periksa apakah pengguna sudah login, jika belum, arahkan ke halaman login
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

// Inisialisasi array data jika belum ada
if (!isset($_SESSION['data'])) {
    $_SESSION['data'] = array();
}

// Fungsi untuk menambahkan data ke dalam array
function tambahData($nama, $nim, $alamat, $angkatan) {
    $data = array(
        'nama' => $nama,
        'nim' => $nim,
        'alamat' => $alamat,
        'angkatan' => $angkatan
    );
    $_SESSION['data'][] = $data;
}

// Fungsi untuk memperbarui data dalam array berdasarkan indeks
function updateData($index, $nama, $nim, $alamat, $angkatan) {
    $_SESSION['data'][$index] = array(
        'nama' => $nama,
        'nim' => $nim,
        'alamat' => $alamat,
        'angkatan' => $angkatan
    );
    // Kosongkan nilai input setelah proses update selesai
    $_SESSION['dataToUpdate'] = array('nama' => '', 'nim' => '', 'alamat' => '', 'angkatan' => '');
    // Redirect kembali ke halaman utama
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}

// Fungsi untuk menghapus data dalam array berdasarkan indeks
function hapusData($index) {
    if(isset($_SESSION['data'][$index])) {
        unset($_SESSION['data'][$index]);
    }
}

// Tambahkan data jika tombol Submit ditekan
if (isset($_POST['submit'])) {
    tambahData($_POST['nama'], $_POST['nim'], $_POST['alamat'], $_POST['angkatan']);
}

// Perbarui data jika tombol Update ditekan
if (isset($_POST['update'])) {
    updateData($_POST['index'], $_POST['nama'], $_POST['nim'], $_POST['alamat'], $_POST['angkatan']);
}

// Hapus data jika tombol Delete ditekan
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['index'])) {
    hapusData($_GET['index']);
}

// Ambil data dari session
$data = isset($_SESSION['data']) ? $_SESSION['data'] : array();

// Jika aksi adalah update, dan indeks valid disediakan
if (isset($_GET['action']) && $_GET['action'] == 'update' && isset($_GET['index']) && isset($data[$_GET['index']])) {
    $index = $_GET['index'];
    // Ambil data yang akan diupdate
    $dataToUpdate = $data[$index];
} else {
    // Jika tidak ada aksi update, atur dataToUpdate menjadi kosong
    $dataToUpdate = isset($_SESSION['dataToUpdate']) ? $_SESSION['dataToUpdate'] : array('nama' => '', 'nim' => '', 'alamat' => '', 'angkatan' => '');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple CRUD PHP with Array</title>
    <link rel="stylesheet" href="gege.css">
</head>
<body>
    <h2>Data Mahasiswa</h2>
    <table border="1">
            <tr>
                <th>Nama</th>
                <th>Nim</th>
                <th>Alamat</th>
                <th>Angkatan</th>
                <th>Keterangan</th>
            </tr>
            <?php
            // Tampilkan data dari array
            foreach ($data as $index => $row) {
                echo "<tr>";
                echo "<td>".$row['nama']."</td>";
                echo "<td>".$row['nim']."</td>";
                echo "<td>".$row['alamat']."</td>";
                echo "<td>".$row['angkatan']."</td>";
                echo "<td><a href='?action=update&index=$index'>Update</a> | <a href='?action=delete&index=$index'>Delete</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
        </table>
    <form action="" method="POST">
        <input type="hidden" name="index" value="<?php echo isset($index) ? $index : ''; ?>">
        Nama: <input type="text" name="nama" value="<?php echo isset($dataToUpdate['nama']) ? $dataToUpdate['nama'] : ''; ?>" required><br>
        Nim: <input type="text" name="nim" value="<?php echo isset($dataToUpdate['nim']) ? $dataToUpdate['nim'] : ''; ?>" required><br>
        Alamat: <input type="text" name="alamat" value="<?php echo isset($dataToUpdate['alamat']) ? $dataToUpdate['alamat'] : ''; ?>" required><br>
        Angkatan: <input type="text" name="angkatan" value="<?php echo isset($dataToUpdate['angkatan']) ? $dataToUpdate['angkatan'] : ''; ?>" required><br>
        <!-- Tombol Logout dipindahkan ke sebelah kanan -->
        <a href="login.php" style="float: right; margin-left: 10px;" class="logout-btn">Logout</a>
        <!-- Tombol Logout dipindahkan ke sebelah kanan -->
        <?php if (isset($_GET['action']) && $_GET['action'] == 'update'): ?>
            <button type="submit" name="update">Update</button>
        <?php else: ?>
            <button type="submit" name="submit">Submit</button>
        <?php endif; ?>
    </form>
</body>
</html>
