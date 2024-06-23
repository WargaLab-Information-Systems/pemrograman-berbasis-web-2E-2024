<?php
// Inisialisasi session
session_start();

if(!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

if (!isset($_SESSION['students'])) {
    $_SESSION['students'] = [];
}


function addStudent($nim, $nama, $alamat, $angkatan) {
    // Sebelum menambahkan, program memeriksa apakah NIM sudah ada dalam data mahasiswa. Jika sudah ada
    // pesan kesalahan akan ditampilkan.
    if (isset($_SESSION['students'][$nim])) {
        echo "NIM sudah ada!";
        return;
    }
    $_SESSION['students'][$nim] = [
        'nama' => $nama,
        'alamat' => $alamat,
        'angkatan' => $angkatan
    ];
}


function deleteStudent($nim) {
    unset($_SESSION['students'][$nim]);
}


function editStudent($original_nim, $nim, $nama, $alamat, $angkatan) {
    // untuk memeriksa  dengan NIM yang sudah ada, jika ya muncul  pesan kesalahan
    if ($nim != $original_nim && isset($_SESSION['students'][$nim])) {
        echo "NIM sudah ada!";
        return;
    }
    // Hapus data lama jika NIM diubah
    if ($original_nim != $nim) {
        unset($_SESSION['students'][$original_nim]);
    }
    // Tambahkan data baru
    $_SESSION['students'][$nim] = [
        'nama' => $nama,
        'alamat' => $alamat,
        'angkatan' => $angkatan
    ];
}

// Program menerima aksi yang dikirim melalui metode POST. Aksi tersebut bisa berupa "Tambah", "Edit", "Simpan", atau "Hapus". Bergantung pada aksi yang diterima, program akan memanggil fungsi yang sesuai
if (isset($_POST['action'])) {
    if ($_POST['action'] == 'Tambah') {
        addStudent($_POST['nim'], $_POST['nama'], $_POST['alamat'], $_POST['angkatan']);
    } elseif ($_POST['action'] == 'Edit') {
        // Mengatur edit
        $_SESSION['edit_nim'] = $_POST['nim'];
    } elseif ($_POST['action'] == 'Simpan') {

        // untuk Menyimpan perubahan dari edit
        editStudent($_POST['original_nim'], $_POST['nim'], $_POST['nama'], $_POST['alamat'], $_POST['angkatan']);
        // Mengatur default
        unset($_SESSION['edit_nim']);
    } elseif ($_POST['action'] == 'Hapus') {
        deleteStudent($_POST['nim']);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Data Mahasiswa</h2>
        <table>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Angkatan</th>
                <th>Action</th>
            </tr>
            <?php foreach ($_SESSION['students'] as $nim => $student): ?>
            <tr>
                <td><?= $nim ?></td>
                <td><?= $student['nama'] ?></td>
                <td><?= $student['alamat'] ?></td>
                <td><?= $student['angkatan'] ?></td>
                <td>
                    <form method="post">
                        <input type="hidden" name="nim" value="<?= $nim ?>">
                        <input type="submit" name="action" value="Edit">
                        <input type="submit" name="action" value="Hapus">
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <form method="post">
            <!-- Menambahkan input tersembunyi untuk mode edit -->
            <input type="hidden" name="edit_nim" value="<?= isset($_SESSION['edit_nim']) ? $_SESSION['edit_nim'] : '' ?>">
            <!-- Input tersembunyi untuk menyimpan NIM asli -->
            <input type="hidden" name="original_nim" value="<?= isset($_SESSION['edit_nim']) ? $_SESSION['edit_nim'] : '' ?>">
            NIM: <input type="text" name="nim" value="<?= isset($_SESSION['edit_nim']) ? $_SESSION['edit_nim'] : '' ?>" required><br>
            Nama: <input type="text" name="nama" value="<?= isset($_SESSION['edit_nim']) ? $_SESSION['students'][$_SESSION['edit_nim']]['nama'] : '' ?>" required><br>
            Alamat: <input type="text" name="alamat" value="<?= isset($_SESSION['edit_nim']) ? $_SESSION['students'][$_SESSION['edit_nim']]['alamat'] : '' ?>" required><br>
            Angkatan: <input type="text" name="angkatan" value="<?= isset($_SESSION['edit_nim']) ? $_SESSION['students'][$_SESSION['edit_nim']]['angkatan'] : '' ?>" required><br>
            <!-- Mengubah nilai tombol sesuai mode -->
            <?php if(isset($_SESSION['edit_nim'])): ?>
            <input type="submit" name="action" value="Simpan">
            <input type="submit" name="action" value="Batal">
            <?php else: ?>
            <input type="submit" name="action" value="Tambah">
            <?php endif; ?>
        </form>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>