<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once "../vendor/autoload.php";

session_start();
// $captcha = $_POST["captcha"];
// $captchaUser = filter_var($_POST["captcha"], FILTER_SANITIZE_STRING);
// if($_SESSION['CAPTCHA_CODE'] == $captchaUser){
if($_POST['captcha_valid'] !=""){
$mail = new PHPMailer(true);
//Enable SMTP debugging.
$mail->SMTPDebug = 3;                               
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
$mail->Host = "mail.oceansoftwares.in";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                          
//Provide username and password     
$mail->Username = "ramkumar@oceansoftwares.in";                 
$mail->Password = "Oce@nsoft@2014";                           
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";                           
//Set TCP port to connect to
$mail->Port = 587;                                   
$mail->From = $_POST["email"];
$mail->FromName = $_POST["name"];
$mail->addAddress("chellapandian@oceansoftwares.in", "ocean softwares");
$mail->isHTML(true);
$mail->Subject = "Zero Gravity ".$_POST["type"];
// NAME
    $name = $_POST["name"];
// EMAIL
    $email = $_POST["email"];
// EMAIL
    $mobile = $_POST["mobile"];
// SERVICES
    $profession = $_POST["profession"];


// prepare email body text
$Body = "";
$Body .= "<table>";
$Body .= "<tr>";
$Body .= "<th>";
$Body .= "Name";
$Body .= "</th>";
$Body .= "<td>";
$Body .= " : ";
$Body .= "</td>";
$Body .= "<td>";
$Body .= $name;
$Body .= "</td>";
$Body .= "</tr>";
$Body .= "<tr>";
$Body .= "<th>";
$Body .= "Email";
$Body .= "</th>";
$Body .= "<td>";
$Body .= " : ";
$Body .= "</td>";
$Body .= "<td>";
$Body .= $email;
$Body .= "</td>";
$Body .= "</tr>";

$Body .= "<tr>";
$Body .= "<th>";
$Body .= "Phone";
$Body .= "</th>";
$Body .= "<td>";
$Body .= " : ";
$Body .= "</td>";
$Body .= "<td>";
$Body .= $mobile;
$Body .= "</td>";
$Body .= "</tr>";
$Body .= "<tr>";
$Body .= "<th>";
if($_POST['type'] == "Franchise Form"){
$Body .= "Profession";
}else{
  $Body .= "Business";  
}
$Body .= "</th>";
$Body .= "<td>";
$Body .= " : ";
$Body .= "</td>";
$Body .= "<td>";
$Body .= $profession;
$Body .= "</td>";
$Body .= "</tr>";




$mail->Body = $Body;
try {
    $mail->send();
    echo "success";
} catch (Exception $e) {
}
}else{
    echo 'captcha_valid';
}