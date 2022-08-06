<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'conn.php';
require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';

$uname = $_POST["username"];
$pass = $_POST["password"];
$fname = $_POST["firstname"];
$lname = $_POST["lastname"];
$bday = $_POST["birthday"];  
$radioval=$_POST["radiogender"];
$email = $_POST["email"];
$phone = $_POST["phonenumber"]; 

//$mysqli->query($conn, "INSERT INTO usertab (UNAME, PASS, MAIL) VALUES ('$uname', '$pswd', '$mail')");

$sql ="INSERT INTO dbfp (username, pswd, firstname, lastname, birthday, gender, email, phonenumber
) VALUES ('$uname', '$pass', '$fname','$lname','$bday','$radioval','$email','$phone')";
mysqli_query($conn, $sql);

if(($sql)){
    $mailsender = 'zvocompany12@gmail.com';
    $namesender = 'Zvo Company';
    $mailreceiver = $_POST['email'];
    $subject = 'New Account of User Zvo Company';
    $msg = 'Congratulations, your account is already confirmed, Please get bact to the site and re-login.<br>';
    
    $mailphp = new PHPMailer;
    $mailphp->isSMTP();

    $mailphp->Host = 'smtp.gmail.com';
    $mailphp->Username = $mailsender;
    $mailphp->Password = 'fakzryipvbhrvlzi';
    $mailphp->Port = 465;
    $mailphp->SMTPAuth=true;
    $mailphp->SMTPSecure='ssl';
    $mailphp->SMTPDebug=2;

    $mailphp->setFrom($mailsender, $namesender);
    $mailphp->addAddress($mailreceiver);
    $mailphp->isHTML(true);
    $mailphp->Subject = $subject;
    $mailphp->Body = $msg;

    $send = $mailphp->send();

    if($send){
        echo"Email Berhasil dikirim";
    }else{
        echo"Email gagal dikirim";
    }
    echo"<script>
            alert('Data berhasil ditambahkan, email notifikasi sudah terkirim.!');
        </script>";
    header("Location: login.php");
    $sql ="UPDATE dbfp SET status = 'confirmed' WHERE username = '$uname' ";
    mysqli_query($conn, $sql); 

}

?>