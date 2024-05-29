<?php
session_start(); 

if (!isset($_SESSION['students'])) {
  $_SESSION['students'] = [];
}


function addStudent($nim, $nama, $alamat, $angkatan) {
  $_SESSION['students'][$nim] = [
      'nama' => $nama,
      'alamat' => $alamat,
      'angkatan' => $angkatan
  ];
}


function deleteStudent($nim) {
  unset($_SESSION['students'][$nim]);
}


function editStudent($nim, $nama, $alamat, $angkatan) {
  $_SESSION['students'][$nim] = [
      'nama' => $nama,
      'alamat' => $alamat,
      'angkatan' => $angkatan
  ];
}


if (isset($_POST['action'])) {
  if ($_POST['action'] == 'Tambah') {
      addStudent($_POST['nim'], $_POST['nama'], $_POST['alamat'], $_POST['angkatan']);
  } elseif ($_POST['action'] == 'Edit') {
     
      $_SESSION['edit_nim'] = $_POST['nim'];
      $_POST['nim'] = $_SESSION['edit_nim']; 
      $_POST['nama'] = $_SESSION['students'][$_SESSION['edit_nim']]['nama'];
      $_POST['alamat'] = $_SESSION['students'][$_SESSION['edit_nim']]['alamat'];
      $_POST['angkatan'] = $_SESSION['students'][$_SESSION['edit_nim']]['angkatan'];
  } elseif ($_POST['action'] == 'Simpan') {
     
      editStudent($_POST['nim'], $_POST['nama'], $_POST['alamat'], $_POST['angkatan']);
      
      unset($_SESSION['edit_nim']);
  } elseif ($_POST['action'] == 'Hapus') {
      deleteStudent($_POST['nim']);
  }
  header("Location: #form");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CRUD Mahasiswa</title>
<style>
body {
  font-family: Arial, sans-serif;
  background-color: #f0f0f0;
}

.container {
  max-width: 800px;
  margin: 20px auto;
  background-color: #fff;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
}

h1 {
  text-align: center;
  color: #333;
}

form {
  margin-bottom: 20px;
}

form label {
  display: block;
  margin-bottom: 10px;
  font-weight: bold;
}

form input[type="text"] {
  width: 100%;
  padding: 10px;
  margin-bottom: 20px;
  border: none;
  border-radius: 5px;
  background-color: #f5f5f5;
  color: #333;
}

form input[type="submit"] {
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  background-color: #007bff;
  color: #fff;
  cursor: pointer;
}

table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 20px;
}

table th,
table td {
  padding: 10px 15px;
  border-bottom: 1px solid #ddd;
}

table th {
  background-color: #007bff;
  color: #fff;
}

table tr:nth-child(even) {
  background-color: #f2f2f2;
}
</style>
</head>
<body>
<section class="page2" id="form">
      <h1 style="width:100%; display:flex; justify-content:center;">DATA MAHASISWA</h1>
      <form method="post">
       
        <input type="hidden" name="edit_nim" value="<?= isset($_SESSION['edit_nim']) ? $_SESSION['edit_nim'] : '' ?>" />
        NIM: <input type="text" name="nim" value="<?= isset($_SESSION['edit_nim']) ? $_SESSION['edit_nim'] : '' ?>" required /><br />
        Nama: <input type="text" name="nama" value="<?= isset($_SESSION['edit_nim']) ? $_SESSION['students'][$_SESSION['edit_nim']]['nama'] : '' ?>" required /><br />
        Alamat: <input type="text" name="alamat" value="<?= isset($_SESSION['edit_nim']) ? $_SESSION['students'][$_SESSION['edit_nim']]['alamat'] : '' ?>" required /><br />
        Angkatan: <input type="text" name="angkatan" value="<?= isset($_SESSION['edit_nim']) ? $_SESSION['students'][$_SESSION['edit_nim']]['angkatan'] : '' ?>" required /><br />
     
        <?php if(isset($_SESSION['edit_nim'])): ?>
        <input type="submit" name="action" value="Simpan" />
        <input type="submit" name="action" value="Batal" />
        <?php else: ?>
        <input type="submit" name="action" value="Tambah" />
        <?php endif; ?>
      </form>

      <table style="border: 1px solid black">
        <tr>
          <th>NIM</th>
          <th>Nama</th>
          <th>Alamat</th>
          <th>Angkatan</th>
          <th>Aksi</th>
          
        </tr>
        <?php foreach ($_SESSION['students'] as $nim => $student): ?>
        <tr>
          <td><?= $nim ?></td>
          <td><?= $student['nama'] ?></td>
          <td><?= $student['alamat'] ?></td>
          <td><?= $student['angkatan'] ?></td>
         
          <td>
            <form method="post">
              <input type="hidden" name="nim" value="<?= $nim ?>" />
              <input type="submit" name="action" value="Edit" />
            </form>
            <form method="post">
              <input type="hidden" name="nim" value="<?= $nim ?>" />
              <input type="submit" name="action" value="Hapus" />
            </form>
          </td>
        </tr>
        <form method="post" action="logout.php">
    <input type="submit" name="action" value="Logout">
</form>
</form>
        <?php endforeach; ?>
      </table>
    </section>
</body>
</html>
