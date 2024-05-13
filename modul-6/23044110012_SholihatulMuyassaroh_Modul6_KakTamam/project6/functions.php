<?php
// koneksi ke databse (host,usename,pass,folder))
$conn = mysqli_connect("localhost","root","","project6");



function query( $query ) {
    global $conn;
    $result = mysqli_query( $conn, $query );
    $rows = [];
    while ( $row = mysqli_fetch_assoc( $result ) ){
        $rows[] = $row;
    }
    return $rows;
}

function tambah ($data){
    global $conn;

    // ambil data dari tiap elemen dalam form
    $nama = htmlspecialchars($data["nama"]);
    $nim = htmlspecialchars($data["nim"]);
    $umur = htmlspecialchars($data["umur"]);
    $jenis_kelamin = $data["jenis_kelamin"]; 
    $prodi = htmlspecialchars($data["prodi"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $asal_kota = htmlspecialchars($data["asal_kota"]);

    // query insert data
    $query = "INSERT INTO mahasiswa VALUES ('', '$nama', '$nim', '$umur', '$jenis_kelamin', '$prodi', '$jurusan', '$asal_kota')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id){
    global $conn;
    mysqli_query( $conn,"DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function ubah ($data){
    global $conn;
    
    // ambil data dari tiap elemen dalam form
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $nim = htmlspecialchars($data["nim"]);
    $umur = htmlspecialchars($data["umur"]);
    $jenis_kelamin = $data["jenis_kelamin"]; 
    $prodi = htmlspecialchars($data["prodi"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $asal_kota = htmlspecialchars($data["asal_kota"]);

    // query insert data
    $query = "UPDATE mahasiswa SET 
                nama = '$nama',
                nim = '$nim',
                umur = '$umur',
                jenis_kelamin = '$jenis_kelamin',
                prodi = '$prodi',
                jurusan = '$jurusan',
                asal_kota = '$asal_kota'
               where id = $id
            ";
            mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function registrasi ($data) {
    global $conn;

    // agar huruf kecil semua dan agar membersihkan halaman seperti "/" 
    $username = strtolower(stripslashes($data["username"]));
    // agar jika user memasukkak password karakter khusus, akan diubah kaerakternya (teracak)
    $password = mysqli_real_escape_string($conn, $data['password']);
    $password2 = mysqli_real_escape_string($conn, $data['password2']);

    // untuk menghapus spasi jikalau username/pass hanya diisi spasi dengan pakai or
    if (empty(trim($username)) || empty(trim($password))){
        echo "<script>
                alert('Username dan password tidak boleh kosong');
              </script>";
        return false;
    }
    


    // username sudah ada/belum
    $result = mysqli_query($conn,"SELECT username FROM user WHERE username = '$username' ");

    if(mysqli_fetch_assoc($result)){
        echo"<script>
                alert('username sudah terdaftar');
            </script>";
        return false;
    }

    
    // cek konfirm password
    if ($password !== $password2) {
        echo"<script>
                alert('konfirmasi password tidak sesuai');
            </script>";
        return false;
    }

    // enkripsi/pengamanan password (Pass.h: algoritma yang akan mengacak string>hash, Pa.D berubah jika ada perbaruan)
    $password = password_hash($password, PASSWORD_DEFAULT);
    
    // tambahkan user baru ke database
    mysqli_query($conn,"INSERT INTO user VALUES('', '$username', '$password')");

    return mysqli_affected_rows($conn);

}

?>