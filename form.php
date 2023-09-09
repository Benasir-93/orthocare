
<?php
$firstname=$_POST["firstname"];
$lastname=$_POST["lastname"];
$dateofbirth=date("Y-m-d",strtotime($_POST["dateofbirth"]));
$socialsecuritynumber=$_POST["socialsecuritynumber"];
$phonenumber=filter_input(INPUT_POST,"phonenumber",FILTER_VALIDATE_INT);
$email=$_POST["email"];
$reason=$_POST["reason"];
//VAR_DUMP($phonenumber);
//VAR_DUMP($_POST);
//"Server=MYSQL8001.site4now.net;Database=db_a8f23e_orthobh;Uid=a8f23e_orthobh;Pwd=YOUR_DB_PASSWORD"
//server info
//$servername ="MYSQL8001.site4now.net";
//$username = "a8f23e_orthobh";
//$password = "ibrafai85";
//$conn="db_a8f23e_orthobh";
$servername = "localhost";
$username = "root";
$password = "";
$conn="orthobh";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$conn);
if(mysqli_connect_error()){die("connection error:".mysqli_connect_error());}

$sql="INSERT INTO contact (firstname,lastname,dateofbirth,socialsecuritynumber,
      phonenumber,email,reason)VALUES (?,?,?,?,?,?,?)";
$stmt=mysqli_stmt_init($conn);

if(! mysqli_stmt_prepare($stmt,$sql)){
    die(mysqli_error($conn));
}
mysqli_stmt_bind_param($stmt,"sssssss",
$firstname,$lastname,$dateofbirth,$socialsecuritynumber,
      $phonenumber,$email,$reason);
      mysqli_stmt_execute($stmt);
      header("Location: success.html");

      // code for email
      //require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PhPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST["send"])){
$mail = new PHPMailer(true);
// $mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure ='ssl';
$mail->Port = 465;

$mail->Username = "ibrahimfaizal1985@gmail.com";
$mail->Password = "suogzukxheseezmi";

$mail->setFrom("ibrahimfaizal1985@gmail.com");
$mail->addAddress($_POST["email"]);

$mail->isHTML(true);

$mail->firstname = $firstname;
$mail->lastname= $lastname;
$mail->dateofbirth = $firstname;
$mail->ssno= $socialsecuritynumber;
$mail->phonenumber = $firstname;
$mail->email= $email;
$mail->reason = $reason;
$mail->send();
echo"send successfully";
}
      ?>