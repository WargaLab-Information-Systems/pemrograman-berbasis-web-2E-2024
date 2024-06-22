<?php
session_start();

$students = isset($_SESSION['students']) ? $_SESSION['students'] : array();
$student = array();
$button_name = isset($_SESSION['edit_student_id']) ? 'edit' : 'tambah'; 

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

// Tambah Data Mahasiswa
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $umur = $_POST['umur'];
    $nim = $_POST['nim'];
    $alamat = $_POST['alamat'];
    // Temukan ID terakhir
    $lastID = empty($students) ? 0 : end($students)['id'];
    $newStudent = array("id" => $lastID + 1, "nim" => $nim, "nama" => $nama, "jurusan" => $jurusan, "umur" => $umur, "alamat" => $alamat);
    array_push($students, $newStudent);
    $_SESSION['students'] = $students; 
}

//Tombol Edit ditekan
if (isset($_POST['edit_button'])) {
    $id = $_POST['id']; 
    $_SESSION['edit_student_id'] = $id;
    header("location: mahasiswa.php");
    exit;
}

// Tombol Simpan Perubahan ditekan
if (isset($_POST['edit'])) {
    $id = $_SESSION['edit_student_id']; 
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $umur = $_POST['umur'];
    $nim = $_POST['nim'];
    $alamat = $_POST['alamat'];
    $studentKey = array_search($id, array_column($students, 'id'));
    if ($studentKey !== false) {
        // Ubah data mahasiswa
        $students[$studentKey]['nama'] = $nama;
        $students[$studentKey]['jurusan'] = $jurusan;
        $students[$studentKey]['umur'] = $umur;
        $students[$studentKey]['nim'] = $nim;
        $students[$studentKey]['alamat'] = $alamat;
        unset($_SESSION['edit_student_id']); 
        $_SESSION['students'] = $students; 
        $student = array();
    }
}
// Hapus Data Mahasiswa
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $id = $_GET['id'];
    $studentKey = array_search($id, array_column($students, 'id'));
    if ($studentKey !== false) {
        unset($students[$studentKey]);
        $_SESSION['students'] = $students; 
        $student = array(); 
    }
}



// Tentukan data mahasiswa yang akan diedit
if (isset($_SESSION['edit_student_id'])) {
    $editID = $_SESSION['edit_student_id'];
    foreach ($students as $s) {
        if ($s['id'] == $editID) {
            $student = $s;
            break;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <style>
        h1{
            text-align:center;
        }
        .navbar {
    display: flex;
    background-color: #333;
    justify-content: center;
    }

    .navbar a {
        padding: 20px 15px;
        text-decoration: none;
        color: red;
        font-size: 18px;
    }

    .navbar a:hover {
        background-color: #f4f4f4;
    }

    .content {
        padding: 20px;
    }
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        form {
            display: inline;
        }
    </style>
</head>

<body> 
<nav>
        <div class="navbar">
            <a href="home.php">Home</a>
            <a href="mahasiswa.php">Data Mahasiswa</a>
            <a href="logout.php">Logout</a>
        </div>
    </nav>
    <h1>Data Mahasiswa</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Umur</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($students as $student) : ?>
            <tr>
                <td><?php echo $student['id']; ?></td>
                <td><?php echo $student['nim']; ?></td>
                <td><?php echo $student['nama']; ?></td>
                <td><?php echo $student['jurusan']; ?></td>
                <td><?php echo $student['umur']; ?></td>
                <td><?php echo $student['alamat']; ?></td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?php echo $student['id']; ?>">
                        <button type="submit" name="edit_button">Edit</button>
                    </form>
                    <form action="?action=delete&id=<?php echo $student['id']; ?>" method="post">
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h2><?php echo isset($_SESSION['edit_student_id']) ? 'Edit Mahasiswa' : 'Tambah Mahasiswa'; ?></h2>
<form action="" method="post">
    <input type="hidden" name="id" value="<?php echo isset($student['id']) ? $student['id'] : ''; ?>">
    <label for="nama">Nama:</label><br>
    <input type="text" id="nama" name="nama" value="<?php echo isset($student['nama']) ? $student['nama'] : ''; ?>" required><br>
    <label for="jurusan">Jurusan:</label><br>
    <input type="text" id="jurusan" name="jurusan" value="<?php echo isset($student['jurusan']) ? $student['jurusan'] : ''; ?>" required><br>
    <label for="umur">Umur:</label><br>
    <input type="number" id="umur" name="umur" value="<?php echo isset($student['umur']) ? $student['umur'] : ''; ?>" required><br>
    <label for="nim">NIM:</label><br>
    <input type="text" id="nim" name="nim" value="<?php echo isset($student['nim']) ? $student['nim'] : ''; ?>" required><br>
    <label for="alamat">Alamat:</label><br>
    <input type="text" id="alamat" name="alamat" value="<?php echo isset($student['alamat']) ? $student['alamat'] : ''; ?>" required><br><br>
    <input type="submit" name="<?php echo isset($_SESSION['edit_student_id']) ? 'edit' : 'tambah'; ?>" value="<?php echo isset($_SESSION['edit_student_id']) ? 'Simpan Perubahan' : 'Tambah'; ?>">
    <?php if (isset($_SESSION['edit_student_id'])) : ?>
        <a href="mahasiswa.php">Batal Edit</a>
    <?php endif; ?>
</form>

</body>

</html>
