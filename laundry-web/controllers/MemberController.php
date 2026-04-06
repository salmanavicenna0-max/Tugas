<?php
function getAllMember($conn) {
    return mysqli_query($conn, "SELECT * FROM tb_member ORDER BY id DESC");
}

// Tambah Member
if (isset($_POST['btn_simpan_member'])) {
    $nama   = mysqli_real_escape_string($conn, $_POST['nama']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    $jk     = $_POST['jenis_kelamin']; // L atau P
    $tlp    = mysqli_real_escape_string($conn, $_POST['tlp']);

    $query = "INSERT INTO tb_member (nama, alamat, jenis_kelamin, tlp) VALUES ('$nama', '$alamat', '$jk', '$tlp')";
    if (mysqli_query($conn, $query)) {
        header("Location: index.php?page=member&status=sukses");
    }
}

// Hapus Member
if (isset($_GET['hapus_member'])) {
    $id = $_GET['hapus_member'];
    mysqli_query($conn, "DELETE FROM tb_member WHERE id = '$id'");
    header("Location: index.php?page=member&status=hapus_berhasil");
}
?>