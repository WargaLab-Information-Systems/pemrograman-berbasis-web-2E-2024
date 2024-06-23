<?php
require 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM datamahasiswa WHERE id='$id'");
    $data = mysqli_fetch_assoc($query);
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $Nim = $_POST['Nim'];
    $Nama = $_POST['Nama'];
    $Umur = $_POST['Umur'];
    $Jenis_Kelamin = $_POST['Jenis_Kelamin'];
    $Prodi = $_POST['Prodi'];
    $Jurusan = $_POST['Jurusan'];
    $Asal_Kota = $_POST['Asal_Kota'];

    $query = mysqli_query($koneksi, "UPDATE datamahasiswa SET Nim='$Nim', Nama='$Nama', Umur='$Umur', Jenis_Kelamin='$Jenis_Kelamin', Prodi='$Prodi', Jurusan='$Jurusan', Asal_Kota='$Asal_Kota' WHERE id='$id'");

    if ($query) {
        header('Location: index.php');
        exit;
    } else {
        echo 'Gagal mengupdate data!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url(BG3.jpeg);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
        }
        input[type="text"], select {
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            margin-top: 10px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Update Data Mahasiswa</h1>
        <?php if ($data): ?>
            <form action="edit.php" method="post">
                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                <label for="Nim">NIM:</label>
                <input type="text" id="Nim" name="Nim" value="<?php echo $data['Nim']; ?>" required>
                <label for="Nama">Nama:</label>
                <input type="text" id="Nama" name="Nama" value="<?php echo $data['Nama']; ?>" required>
                <label for="Umur">Umur:</label>
                <input type="text" id="Umur" name="Umur" value="<?php echo $data['Umur']; ?>" required>
                <label for="Jenis_Kelamin">Jenis Kelamin:</label>
                <select id="Jenis_Kelamin" name="Jenis_Kelamin" required>
                    <option value="Laki-laki" <?php if ($data['Jenis_Kelamin'] == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
                    <option value="Perempuan" <?php if ($data['Jenis_Kelamin'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                </select>
                <label for="Prodi">Prodi:</label>
                <input type="text" id="Prodi" name="Prodi" value="<?php echo $data['Prodi']; ?>" required>
                <label for="Jurusan">Jurusan:</label>
                <input type="text" id="Jurusan" name="Jurusan" value="<?php echo $data['Jurusan']; ?>" required>
                <label for="Asal_Kota">Asal Kota:</label>
                <input type="text" id="Asal_Kota" name="Asal_Kota" value="<?php echo $data['Asal_Kota']; ?>" required>
                <input type="submit" name="update" value="Update">
            </form>
        <?php else: ?>
            <p>Data tidak ditemukan!</p>
        <?php endif; ?>
    </div>
</body>
</html>