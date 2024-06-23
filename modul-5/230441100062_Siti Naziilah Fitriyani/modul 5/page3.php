<?php
session_start(); 

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

if (!isset($_SESSION['mahasiswa'])) {
  $_SESSION['mahasiswa'] = [];
}


function addMahasiswa($nim, $nama, $alamat, $jurusan, $angkatan) {
  $_SESSION['mahasiswa'][$nim] = [
      'nama' => $nama,
      'alamat' => $alamat,
      'jurusan' => $jurusan,
      'angkatan' => $angkatan
  ];
}


function deleteMahasiswa($nim) {
  unset($_SESSION['mahasiswa'][$nim]);
}


function editMahasiswa($nim, $nama, $alamat, $jurusan, $angkatan) {
  $_SESSION['mahasiswa'][$nim] = [
      'nama' => $nama,
      'alamat' => $alamat,
      'jurusan' => $jurusan,
      'angkatan' => $angkatan
  ];
}


if (isset($_POST['action'])) {
  if ($_POST['action'] == 'Tambah') {
      addMahasiswa($_POST['nim'], $_POST['nama'], $_POST['alamat'], $_POST['jurusan'], $_POST['angkatan']);
  } elseif ($_POST['action'] == 'Edit') {
     
      $_SESSION['edit_nim'] = $_POST['nim'];
      $_POST['nim'] = $_SESSION['edit_nim']; 
      $_POST['nama'] = $_SESSION['mahasiswa'][$_SESSION['edit_nim']]['nama'];
      $_POST['alamat'] = $_SESSION['mahasiswa'][$_SESSION['edit_nim']]['alamat'];
      $_POST['jurusan'] = $_SESSION['mahasiswa'][$_SESSION['edit_nim']]['jurusan'];
      $_POST['angkatan'] = $_SESSION['mahasiswa'][$_SESSION['edit_nim']]['angkatan'];
  } elseif ($_POST['action'] == 'Simpan') {
     
      editMahasiswa($_POST['nim'], $_POST['nama'], $_POST['alamat'], $_POST['jurusan'], $_POST['angkatan']);
      
      unset($_SESSION['edit_nim']);
  } elseif ($_POST['action'] == 'Hapus') {
      deleteMahasiswa($_POST['nim']);
  }
  header("Location: page3.php");
  exit;
}

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: login.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Form</title>
<style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            background: url(https://i.pinimg.com/736x/2d/21/3d/2d213d36f66c318754bd4b78ab9361f1.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            margin: 30px;
        }
        div {
            position: relative;
            width: auto;
            height: auto;
            background: rgba(184, 182, 182, 0.781);
            border-radius: 10px;
            padding: 50px;
        }
        
        table {
            border-collapse: collapse;
            align-items: center;
            margin: 5px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
            margin: 25px;
        }
        h1 {
            text-align: center;
            font-size: 3em;
            margin-top: 0;
        }
        .data {
            margin: 25px;
            width: 50px;
        }
        input {
            margin: 10px;
        }
</style>
</head>
<body>
<section class="page2" id="form">
    <h1 style="width:100%; display:flex; justify-content:center;">DATA MAHASISWA</h1>
    <div>
        <form method="post">
            <input type="hidden" name="edit_nim" value="<?= isset($_SESSION['edit_nim']) ? $_SESSION['edit_nim'] : '' ?>" />
                NIM: <input type="text" name="nim" value="<?= isset($_SESSION['edit_nim']) ? $_SESSION['edit_nim'] : '' ?>" required /><br />
                Nama: <input type="text" name="nama" value="<?= isset($_SESSION['edit_nim']) ? $_SESSION['mahasiswa'][$_SESSION['edit_nim']]['nama'] : '' ?>" required /><br />
                Alamat: <input type="text" name="alamat" value="<?= isset($_SESSION['edit_nim']) ? $_SESSION['mahasiswa'][$_SESSION['edit_nim']]['alamat'] : '' ?>" required /><br />
                Jurusan: <input type="text" name="jurusan" value="<?= isset($_SESSION['edit_nim']) ? $_SESSION['mahasiswa'][$_SESSION['edit_nim']]['jurusan'] : '' ?>" required /><br />
                Angkatan: <input type="text" name="angkatan" value="<?= isset($_SESSION['edit_nim']) ? $_SESSION['mahasiswa'][$_SESSION['edit_nim']]['angkatan'] : '' ?>" required /><br />
        
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
            <th>jurusan</th>
            <th>Angkatan</th>
            <th>Aksi</th>
            
            </tr>
            <?php foreach ($_SESSION['mahasiswa'] as $nim => $mahasiswa): ?>
            <tr>
            <td><?= $nim ?></td>
            <td><?= $mahasiswa['nama'] ?></td>
            <td><?= $mahasiswa['alamat'] ?></td>
            <td><?= $mahasiswa['jurusan'] ?></td>
            <td><?= $mahasiswa['angkatan'] ?></td>
            
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
    </form>
    </form>
        <?php endforeach; ?>
    </table>
    <button><a href="login.php">Logout</a></button>
    </div>
    </section>
</body>
</html>