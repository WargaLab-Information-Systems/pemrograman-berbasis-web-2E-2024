<?php

$conn = mysqli_connect ("localhost", "root", "", "mahasiswa");

function registrasi($data){
    global $conn; // Perbaikan: Tambahkan spasi antara "global" dan "$conn"

    $username = strtolower(stripslashes($data["username"]));
    $password = $data["password"];
    $password2 = $data["password2"];

    //cek username sudah ada apa belum
    $result=mysqli_query($conn,"SELECT username FROM login WHERE username='$username'");
    if(mysqli_num_rows($result)> 0){
        echo"<script>
            alert ('Username Sudah Terdaftar!')
             </script>";
        return false;
    }
    // Cek konfirmasi password
    if($password !== $password2){
        echo "<script>
                    alert ('konfirmasi password tidak sesuai!');
                </script>";
        return false;
    }

    // Enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Tambahkan ke dalam database
    mysqli_query($conn, "INSERT INTO login VALUES ('$username', '$password','')");

    return mysqli_affected_rows($conn);

    
}
?>
