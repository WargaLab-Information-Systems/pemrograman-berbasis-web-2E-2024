<?php
session_start();

if (!isset($_SESSION["berhasil"]) || $_SESSION["berhasil"] !== true) {
    header("location: login.php");
    exit;
}


if (!isset($_SESSION['students'])) {
    $_SESSION['students'] = [];
}


function addStudent($nim, $nama, $alamat, $jurusan, $angkatan) {
    $_SESSION['students'][$nim] = [
        'nama' => $nama,
        'alamat' => $alamat,
        'jurusan' => $jurusan,
        'angkatan' => $angkatan,
    ];
}


function deleteStudent($nim) {
    unset($_SESSION['students'][$nim]);
}


function editStudent($old_nim, $nim, $nama, $alamat, $jurusan, $angkatan) {
    if($old_nim !== $nim) {
        $_SESSION['students'][$nim] = $_SESSION['students'][$old_nim];
        unset($_SESSION['students'][$old_nim]);
    }
    $_SESSION['students'][$nim]['nama'] = $nama;
    $_SESSION['students'][$nim]['alamat'] = $alamat;
    $_SESSION['students'][$nim]['jurusan'] = $jurusan;
    $_SESSION['students'][$nim]['angkatan'] = $angkatan;
}


if (isset($_POST['action'])) {
    if ($_POST['action'] == 'Tambah') {
        addStudent($_POST['nim'], $_POST['nama'], $_POST['alamat'],  $_POST['jurusan'],$_POST['angkatan']);
    } elseif ($_POST['action'] == 'Edit') {
    
        $_SESSION['edit_nim'] = $_POST['nim'];
    } elseif ($_POST['action'] == 'Simpan') {
        
        editStudent($_SESSION['edit_nim'], $_POST['nim'], $_POST['nama'], $_POST['alamat'], $_POST['jurusan'], $_POST['angkatan']);
        
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
    <link rel="stylesheet" href="style2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
    
</head>
<body>
    <section class="navbar">
        <ul>
            <li><a href="admin.php">Home</a></li>
            <li><a href="index.php">Data Mahasiswa</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </section>
    <center>
    <form method="post">
    
    <?php 
    $edit_nim = isset($_SESSION['edit_nim']) ? $_SESSION['edit_nim'] : ''; 
    ?>
    <input type="hidden" name="edit_nim" value="<?= $edit_nim ?>">
    NIM: <input type="text" name="nim" value="<?= $edit_nim !== '' ? $edit_nim : '' ?>" <?= $edit_nim !== '' ? '' : 'required' ?>><br>
    Nama: <input type="text" name="nama" value="<?= $edit_nim !== '' ? $_SESSION['students'][$edit_nim]['nama'] : '' ?>" required><br>
    Alamat: <input type="text" name="alamat" value="<?= $edit_nim !== '' ? $_SESSION['students'][$edit_nim]['alamat'] : '' ?>" required><br>
    jurusan: <input type="text" name="jurusan" value="<?= $edit_nim !== '' ? $_SESSION['students'][$edit_nim]['jurusan'] : '' ?>" required><br>
    Angkatan: <input type="text" name="angkatan" value="<?= $edit_nim !== '' ? $_SESSION['students'][$edit_nim]['angkatan'] : '' ?>" required><br>
    
    <?php if($edit_nim !== ''): ?>
    <input type="submit" name="action" value="Simpan">
    <input type="submit" name="action" value="Batal">
    <?php else: ?>
    <input type="submit" name="action" value="Tambah">
    <?php endif; ?>
</form>
<center>
    <table>
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>jurusan</th>
            <th>Angkatan</th>
            <th>pengaturan</th> 
        </tr>
        <?php foreach ($_SESSION['students'] as $nim => $student): ?>
        <tr>
            <td><?= $nim ?></td>
            <td><?= $student['nama'] ?></td>
            <td><?= $student['alamat'] ?></td>
            <td><?= $student['jurusan'] ?></td>
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
</body>
</html>
