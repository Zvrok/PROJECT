<?php
//buat koneksi
$conn = mysqli_connect("localhost", "root", "", "datafinalproject");
//cek koneksi
if ($conn->connect_error){
    die("Koneksi Gagal:" . $conn->connect_error);
}
?>