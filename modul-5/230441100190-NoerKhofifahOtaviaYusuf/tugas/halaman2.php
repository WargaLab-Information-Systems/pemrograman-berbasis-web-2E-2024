<?php
session_start();

if (!isset($_SESSION['nama'])) {
    header("Location: index.php");
    exit();
}

$students = isset($_SESSION['students']) ? $_SESSION['students'] : array();


if (isset($_POST['submit'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];
    $angkatan = $_POST['angkatan'];

    $new_student = array(
        'nim' => $nim,
        'nama' => $nama,
        'jurusan' => $jurusan,
        'alamat' => $alamat,
        'angkatan' => $angkatan
    );

    $students[] = $new_student;

    $_SESSION['students'] = $students;

    header("Location: halaman2.php");
    exit();
}

if (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($students[$id])) {
        $edit_student = $students[$id];
        if (isset($_POST['edit_submit'])) {
            $students[$id]['nim'] = $_POST['nim'];
            $students[$id]['nama'] = $_POST['nama'];
            $students[$id]['jurusan'] = $_POST['jurusan'];
            $students[$id]['alamat'] = $_POST['alamat'];
            $students[$id]['angkatan'] = $_POST['angkatan'];

            $_SESSION['students'] = $students;

            header("Location: halaman2.php");
            exit();
        }
    } else {
        echo "Data mahasiswa tidak ditemukan.";
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($students[$id])) {
        unset($students[$id]);
        $_SESSION['students'] = array_values($students); 
        header("Location: halaman2.php");
        exit();
    } else {
        echo "Data mahasiswa tidak ditemukan.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="style2.css"></head>
<body > 
    <center>
    <h1>Data Mahasiswa</h1>
    <h2>Tambah Mahasiswa</h2>
    <form action="halaman2.php" method="post" class="container">
        <label for="nim">NIM:</label>
        <input type="text" id="nim" name="nim" required><br><br>
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required><br><br>
        <label for="jurusan">Jurusan:</label>
        <input type="text" id="jurusan" name="jurusan" required><br><br>
        <label for="alamat">Alamat:</label>
        <input type="text" id="alamat" name="alamat" required><br><br>
        <label for="angkatan">Angkatan:</label>
        <input type="option" id="angkatan" name="angkatan" required><br><br>
        <input type="submit" name="submit" value="Tambah Mahasiswa">
    </form>

    <h2>Daftar Mahasiswa</h2>
    <table border="1">
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Alamat</th>
            <th>Angkatan</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($students as $id => $student) : ?>
            <tr>
                <td><?php echo $student['nim']; ?></td>
                <td><?php echo $student['nama']; ?></td>
                <td><?php echo $student['jurusan']; ?></td>
                <td><?php echo $student['alamat']; ?></td>
                <td><?php echo $student['angkatan']; ?></td>
                <td>
                    <a href="halaman2.php?action=edit&id=<?php echo $id; ?>">Edit</a> |
                    <a href="halaman2.php?action=delete&id=<?php echo $id; ?>">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <?php if (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) : ?>
    <?php $edit_id = $_GET['id']; ?>
    <h2>Edit Data Mahasiswa</h2>
    <form action="halaman2.php?action=edit&id=<?php echo $edit_id; ?>" method="post">
        <input type="text" name="nim" value="<?php echo $students[$edit_id]['nim']; ?>" placeholder="NIM" required><br>
        <input type="text" name="nama" value="<?php echo $students[$edit_id]['nama']; ?>" placeholder="Nama" required><br>
        <input type="text" name="jurusan" value="<?php echo $students[$edit_id]['jurusan']; ?>" placeholder="Jurusan" required><br>
        <input type="text" name="alamat" value="<?php echo $students[$edit_id]['alamat']; ?>" placeholder="Alamat" required><br>
        <input type="text" name="angkatan" value="<?php echo $students[$edit_id]['angkatan']; ?>" placeholder="Angkatan" required><br>
        <input type="submit" name="edit_submit" value="Simpan Perubahan">
    </form>
    <?php endif; ?>

<center>
</body>
<button>
            <a align="center" href="dashboard.php">halaman sebelumnya</a>
                    <div align="decrease"></div>
            <a  href="logout.php">logout</a>
        </button>
</html>
