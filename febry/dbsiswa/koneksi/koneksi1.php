<?php
$server		= "localhost";
$username	= "root";
$pass		= "";
$db			= "db_sekolah";
$koneksi	= new \mysqli($server, $username, null, $db);

function registrasi($data){
    global $koneksi;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($koneksi, $data["password"]);
    $password2 = mysqli_real_escape_string($koneksi, $data["password2"]);
    $peran = $data['peran'];


    // cek username sudah ada atau blm
    $result = mysqli_query($koneksi, "SELECT username FROM tb_user WHERE username = '$username'");

    if(mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('Username yang dipilih sudah terdaftar!')
        </script>";
        return false;
    }

    // cek konfirmasi pass
    if($password !== $password2){
        echo "<script>
        alert('Konfirmasi password tidak sesuai!')
        </script>";
        return false;
    }

    //enkripsi pw
    $password = password_hash($password, PASSWORD_DEFAULT);

    //tambgah new user ke d
    mysqli_query($koneksi, "INSERT INTO tb_user VALUES('', '$username', '$password','$peran')");

    return mysqli_affected_rows($koneksi);

}

?>

