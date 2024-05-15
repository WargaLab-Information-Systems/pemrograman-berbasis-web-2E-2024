<!-- home.php -->
<?php
session_start();

// Cek apakah pengguna sudah login
if(!isset($_SESSION['login_user'])){
    header("location: login.php");
    exit(); // Menghentikan eksekusi script jika tidak ada session login
}

// Fungsi CRUD untuk manipulasi data mahasiswa
function tambahMahasiswa($nama, $nim, $angkatan, $alamat) {
    $mahasiswa_baru = array(
        "nama" => $nama,
        "nim" => $nim,
        "angkatan" => $angkatan,
        "alamat" => $alamat
    );
    $_SESSION['mahasiswa'][] = $mahasiswa_baru;
}

function hapusMahasiswa($index) {
    unset($_SESSION['mahasiswa'][$index]);
}

// Cek apakah pengguna sudah login
if(!isset($_SESSION['login_user'])){
    header("location: index.php");
    die();
}

// Tambahkan data mahasiswa
if(isset($_POST['tambah'])){
    tambahMahasiswa($_POST['nama'], $_POST['nim'], $_POST['angkatan'], $_POST['alamat']);
}

// Edit data mahasiswa
if(isset($_POST['edit'])){
    $_SESSION['mahasiswa'][$_POST['index']]['nama'] = $_POST['nama'];
    $_SESSION['mahasiswa'][$_POST['index']]['nim'] = $_POST['nim'];
    $_SESSION['mahasiswa'][$_POST['index']]['angkatan'] = $_POST['angkatan'];
    $_SESSION['mahasiswa'][$_POST['index']]['alamat'] = $_POST['alamat'];
}

// Hapus data mahasiswa
if(isset($_POST['hapus'])){
    hapusMahasiswa($_POST['index']);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home - Selamat Datang, <?php echo $_SESSION['login_user']; ?>!</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 20px auto;
        }
        h2 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #dddddd;
        }
        .logout-link {
            display: block;
            text-align: center;
            margin-top: 20px;
        }
        .form-container input[type="text"],
        .form-container input[type="submit"] {
            padding: 10px;
            margin: 5px;
            width: 200px;
        }
        .delete-button, .edit-button {
            background-color: #f44336;
            color: white;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 4px;
            margin-left: 10px;
        }
        .logout-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #ffffff; /* Warna teks putih */
            background-color: #f44336; /* Warna merah */
            padding: 10px 20px; /* Padding untuk tombol */
            border: none; /* Hilangkan border */
            border-radius: 4px; /* Tambahkan border radius */
            text-decoration: none; /* Hilangkan underline */
            cursor: pointer; /* Ganti kursor saat hover */
        }
        .logout-link:hover {
            background-color: #d32f2f; /* Warna merah gelap saat hover */
        }
        /* CSS untuk tombol kembali ke halaman welcome */
        .welcome-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #ffffff; /* Warna teks putih */
            background-color: #007bff; /* Warna biru */
            padding: 10px 20px; /* Padding untuk tombol */
            border: none; /* Hilangkan border */
            border-radius: 4px; /* Tambahkan border radius */
            text-decoration: none; /* Hilangkan underline */
            cursor: pointer; /* Ganti kursor saat hover */
        }
        .welcome-link:hover {
            background-color: #0056b3; /* Warna biru gelap saat hover */
        }
    </style>
    <script>
        function toggleForm(index) {
            var form = document.getElementById('edit-form-' + index);
            form.style.display === 'none' ? form.style.display = 'table-row' : form.style.display = 'none';
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Selamat Datang, <?php echo $_SESSION['login_user']; ?>!</h2>
        <h3>Tambah Mahasiswa</h3>
        <form method="post" action="">
            <input type="text" name="nama" placeholder="Nama" required>
            <input type="text" name="nim" placeholder="NIM" required>
            <input type="text" name="angkatan" placeholder="Angkatan" required>
            <input type="text" name="alamat" placeholder="Alamat" required>
            <input type="submit" name="tambah" value="Tambah">
        </form>

        <h3>Daftar Mahasiswa</h3>
        <table border="1">
            <tr>
                <th>Nama</th>
                <th>NIM</th>
                <th>Angkatan</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
            <?php if(isset($_SESSION['mahasiswa'])): ?>
                <?php foreach($_SESSION['mahasiswa'] as $index => $mahasiswa): ?>
                    <tr>
                        <td><?php echo $mahasiswa['nama']; ?></td>
                        <td><?php echo $mahasiswa['nim']; ?></td>
                        <td><?php echo $mahasiswa['angkatan']; ?></td>
                        <td><?php echo $mahasiswa['alamat']; ?></td>
                        <td>
                            <form method="post" action="">
                                <input type="hidden" name="index" value="<?php echo $index; ?>">
                                <input type="submit" name="hapus" value="Hapus" class="delete-button">
                            </form>
                            <button class="edit-button" onclick="toggleForm(<?php echo $index; ?>)">Edit</button>
                        </td>
                    </tr>
                    <tr id="edit-form-<?php echo $index; ?>" style="display: none;">
                        <td colspan="5">
                            <form method="post" action="">
                                <input type="hidden" name="index" value="<?php echo $index; ?>">
                                <input type="text" name="nama" value="<?php echo $mahasiswa['nama']; ?>" required>
                                <input type="text" name="nim" value="<?php echo $mahasiswa['nim']; ?>" required>
                                <input type="text" name="angkatan" value="<?php echo $mahasiswa['angkatan']; ?>" required>
                                <input type="text" name="alamat" value="<?php echo $mahasiswa['alamat']; ?>" required>
                                <input type="submit" name="edit" value="Simpan">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>
        <p><a href="welcome.php" class="welcome-link">Halaman Welcome</a></p> <!-- Tombol kembali ke halaman welcome -->
        <p><a href="logout.php" class="logout-link">Logout</a></p> <!-- Tombol logout -->
    </div>
</body>
</html>
