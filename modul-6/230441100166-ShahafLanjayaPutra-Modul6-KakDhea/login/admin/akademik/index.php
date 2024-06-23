<!DOCTYPE html>
<html>
<head>
    <title>DATA MAHASISWA</title>
    <style>
    body {
        font-family: Arial, sans-serif; /* Menetapkan jenis font untuk teks dalam body */
        background-image: url('img.jpg'); /* Menetapkan gambar latar belakang */
        margin: 0;
        padding: 0;
    }
    h2 {
        color: #333; /* Warna teks untuk elemen h2 */
        text-align: center; /* Posisi teks menjadi tengah */
    }
    table {
        width: 100%; /* Lebar tabel menjadi 100% dari lebar kontainer */
        border-collapse: collapse; /* Menggabungkan garis-garis batas antar sel */
        margin-top: 20px; /* Jarak dari atas */
    }
    th, td {
        padding: 10px; /* Padding di dalam sel */
        border: 1px solid #ccc; /* Garis batas sel */
        text-align: left; /* Posisi teks di dalam sel menjadi kiri */
    }
    th {
        background-color: #f2f2f2; /* Warna latar belakang untuk sel header */
    }
    tr:nth-child(even) {
        background-color: #f9f9f9; /* Warna latar belakang untuk baris genap */
    }
    a {
        text-decoration: none; /* Menghapus dekorasi link */
        padding: 5px 10px; /* Padding di dalam link */
        background-color: #007bff; /* Warna latar belakang link */
        color: #fff; /* Warna teks link */
        border-radius: 5px; /* Membuat sudut link menjadi bulat */
    }
    a:hover {
        background-color: #0056b3; /* Warna latar belakang link saat dihover */
    }
</style>

</head>
<body>
 
    <h2>DATA MAHASISWA</h2>
    <br/>
    <a href="tambah.php">+ TAMBAH MAHASISWA</a>
    <br/>
    <br/>
    <table border="1">
        <tr>
            <th>NO</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Umur</th>
            <th>Jenis Kelamin</th>
            <th>Prodi</th>
            <th>Jurusan</th>
            <th>Asal Kota</th>
            <th>Aksi</th>
        </tr>
        <?php 
        include 'koneksi.php';
        $no = 1;
        $data = mysqli_query($koneksi,"select * from mahasiswa");
        while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['nama']; ?></td>
                <td><?php echo $d['nim']; ?></td>
                <td><?php echo $d['umur']; ?></td>
                <td><?php echo $d['jeniskelamin']; ?></td>
                <td><?php echo $d['prodi']; ?></td>
                <td><?php echo $d['jurusan']; ?></td>
                <td><?php echo $d['asalkota']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $d['id']; ?>">EDIT</a>
                    <a href="hapus.php?id=<?php echo $d['id']; ?>">HAPUS</a>
                </td>
            </tr>
            <?php 
        }
        ?>
    </table>
</body>
</html>
