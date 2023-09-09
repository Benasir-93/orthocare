
<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $conn="orthobh";
// "Server=MYSQL5025.site4now.net;Database=db_a95278_orthoca;Uid=a95278_orthoca;Pwd=ahnaf2020"
 $servername = "MYSQL5025.site4now.net";
 $username = "a95278_orthoca";
$password = "ahnaf2020";
 $conn="db_a95278_orthoca";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$conn);
if(isset($_POST['send'])){
    if(!empty($_POST['firstname']) && !empty($_POST['lastname'])
    && !empty($_POST['dateofbirth'])
    && !empty($_POST['socialsecuritynumber'])
    && !empty($_POST['phonenumber'])
    && !empty($_POST['email'])
    && !empty($_POST['reasonofappoinment'])){
        $firstname=$_POST['firstname'];
        $lastname=$_POST['lastname'];
        $dateofbirth=date("Y-m-d",strtotime($_POST["dateofbirth"]));
        $socialsecuritynumber=$_POST['socialsecuritynumber'];
        $phonenumber=$_POST['phonenumber'];
        $email=$_POST['email'];
        $reasonofappoinment=$_POST['reasonofappoinment'];
        $sql="INSERT INTO contact(firstname,lastname,dateofbirth,socialsecuritynumber,phonenumber,email,reasonofappointment)
        VALUES('$firstname','$lastname','$dateofbirth','$socialsecuritynumber','$phonenumber','$email','$reasonofappointment')";
        $run=mysqli_query($conn,$sql) or die(mysqli_error());
       
        if($run){echo"form submitted";}
       
       
       
        else{
            echo"not send";
        }
       
    }
       
        else{
echo"all fields required";
        }
     }