<?php
require 'conn.php';
$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subjectt"]; 
$msg = $_POST["message"]; 

//$mysqli->query($conn, "INSERT INTO usertab (UNAME, PASS, MAIL) VALUES ('$uname', '$pswd', '$mail')");

$sql ="INSERT INTO dbmodal (nama, email, sub, msg) VALUES ('$name','$email','$subject','$msg')";
mysqli_query($conn, $sql);
if(($sql)){
    echo "<script>alert('data berhasil terkirim'); </script>";
    header("Refresh: 0.5; URL=index.php");

}else{
    echo "<script>alert('data gagal terkirim'); </script>";
}
?>