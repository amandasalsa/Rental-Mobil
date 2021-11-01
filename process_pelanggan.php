<?php
include "connection.php";
if (isset($_POST["simpan_pelanggan"])) {
    $id_pelanggan = $_POST["id_pelanggan"];
    $nama_pelanggan = $_POST["nama_pelanggan"];
    $alamat_pelanggan = $_POST["alamat_pelanggan"];
    $kontak = $_POST["kontak"];

    $sql = "insert into pelanggan values ('$id_pelanggan','$nama_pelanggan','$alamat_pelanggan','$kontak')";

    mysqli_query($connect, $sql);

    header("location:list_pelanggan.php");
}

# Edit
if (isset($_POST["edit_pelanggan"])) {
    $id_pelanggan = $_POST["pelanggan"];
    $nama_pelanggan = $_POST["nama_pelanggan"];
    $alamat_pelanggan = $_POST["alamat_pelanggan"];
    $kontak = $_POST["kontak"];

    $sql = "update pelanggan set nama_pelanggan = '$nama_pelanggan', alamat = '$alamat_pelanggan',kontak = '$kontak' where id_peanggan='$id_pelanggan'";

    mysqli_query($connect, $sql);

    header("location.list_pelanggan.php");
}
?>