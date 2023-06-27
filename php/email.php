<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once "../vendor/autoload.php";
$name = $_POST["name"];
$email = $_POST["email"];
$qualification = $_POST["qualification"];
$number = $_POST["number"];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "maildata";
if($_FILES['file']['name'] != ''){
    echo 'if';
    $test = explode('.', $_FILES['file']['name']);
    $extension = end($test);    
    $name = rand(100,999).'.'.$extension;

    $location = 'uploads/'.$name;
    move_uploaded_file($_FILES['file']['tmp_name'], $location);

    echo '<img src="'.$location.'" height="100" width="100" />';
}
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  echo "Connected successfully ...";

$sql = "INSERT INTO `formdatas`(`id`, `name`, `email`, `qualification`, `number`)
 VALUES ('NULL','$name','$email','$qualification','$number')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();



session_start();
// $captcha = $_POST["captcha"];
// $captchaUser = filter_var($_POST["captcha"], FILTER_SANITIZE_STRING);
// if($_SESSION['CAPTCHA_CODE'] == $captchaUser){
if($_POST['captcha_valid'] !=""){
$mail = new PHPMailer(true);
//Enable SMTP debugging.
$mail->SMTPDebug = 2;                               
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
$mail->Host = "mail.oceansoftwares.in";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                          
//Provide username and password     
$mail->Username = "gowthaman@oceansoftwares.in";                 
$mail->Password = "Ocean@tech@123";                           
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "ssl";                           
//Set TCP port to connect to
$mail->Port = 465;                                   
$mail->From = $_POST["email"];
$mail->FromName = $_POST["name"];
$mail->addAddress("gowtham.vnrk@gmail.com", "ocean softwares");
$mail->isHTML(true);
$mail->Subject = "Zero Gravity Contact Form";

// NAME
    // $name = $_POST["name"];
// EMAIL
    // $email = $_POST["email"];
// EMAIL
    // $qualification = $_POST["qualification"];
// SERVICES
    // $number = $_POST["number"];
// MESSAGE
  //  $message = $_POST["captcha_valid"];

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
$Body .= "QUALIFICATION";
$Body .= "</th>";
$Body .= "<td>";
$Body .= " : ";
$Body .= "</td>";
$Body .= "<td>";
$Body .= $qualification;
$Body .= "</td>";
$Body .= "</tr>";
$Body .= "<tr>";
$Body .= "<th>";
$Body .= "NUMBER";
$Body .= "</th>";
$Body .= "<td>";
$Body .= " : ";
$Body .= "</td>";
$Body .= "<td>";
$Body .= $number;
$Body .= "</td>";
$Body .= "</tr>";
$Body .= "<tr>";
$Body .= "<th>";
$Body .= "File";
$Body .= "</th>";
$Body .= "<td>";
$Body .= " : ";
$Body .= "</td>";
$Body .= "<td>";
$Body .= $fileToUpload;
$Body .= "</td>";
$Body .= "</tr>";



$mail->Body = $Body;
try {
    $mail->send();
    echo "success";
} catch (Exception $e) {
}
}
else{
    echo 'captcha_invalid';
}