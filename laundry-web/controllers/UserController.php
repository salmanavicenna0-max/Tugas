<?php
function getAllUser($conn) {
    // Join dengan outlet agar tahu user bertugas di mana
    return mysqli_query($conn, "SELECT tb_user.*, tb_outlet.nama as nama_outlet 
                                FROM tb_user 
                                JOIN tb_outlet ON tb_user.id_outlet = tb_outlet.id");
}

// Tambah User
if (isset($_POST['btn_simpan_user'])) {
    $nama      = mysqli_real_escape_string($conn, $_POST['nama']);
    $username  = mysqli_real_escape_string($conn, $_POST['username']);
    $password  = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $id_outlet = $_POST['id_outlet'];
    $role      = $_POST['role'];

    $query = "INSERT INTO tb_user (nama, username, password, id_outlet, role) 
              VALUES ('$nama', '$username', '$password', '$id_outlet', '$role')";
    if (mysqli_query($conn, $query)) {
        header("Location: index.php?page=user&status=sukses");
    }
}

// Hapus User
if (isset($_GET['hapus_user'])) {
    $id = $_GET['hapus_user'];
    mysqli_query($conn, "DELETE FROM tb_user WHERE id = '$id'");
    header("Location: index.php?page=user&status=hapus_berhasil");
}
?>