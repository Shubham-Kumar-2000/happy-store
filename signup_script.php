<?php

require("includes/common.php");

  // Getting the values from the signup page using $_POST[] and cleaning the data submitted by the user.
  $name = $_POST['name'];
  $name = mysqli_real_escape_string($con, $name);

  $email = $_POST['e-mail'];
  $email = mysqli_real_escape_string($con, $email);

  $password = $_POST['password'];
  $password = mysqli_real_escape_string($con, $password);
  $password = MD5($password);
  $otp = rand (100000, 999999);
  $otps=$otp;
  $otp = mysqli_real_escape_string($con, $otp);
  $otp = MD5($otp);

  $contact = $_POST['contact'];
  $contact = mysqli_real_escape_string($con, $contact);

  $city = $_POST['city'];
  $city = mysqli_real_escape_string($con, $city);

  $address = $_POST['address'];
  $address = mysqli_real_escape_string($con, $address);

  $regex_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
  $regex_num = "/^[789][0-9]{9}$/";

  $query = "SELECT * FROM users WHERE email='$email'";
  $result = mysqli_query($con, $query)or die($mysqli_error($con));
  $num = mysqli_num_rows($result);
  
  if ($num != 0) {
    $m = "<span class='red'>Email Already Exists</span>";
    header('location: signup.php?m1=' . $m . '&m2=');
  } else if (!preg_match($regex_email, $email)) {
    $m = "<span class='red'>Not a valid Email Id</span>";
    header('location: signup.php?m1=' . $m . '&m2=');
  } else if (!preg_match($regex_num, $contact)) {
    $m = "<span class='red'>Not a valid phone number</span>";
    header('location: signup.php?m2=' . $m . '&m1=');
  } else {
    $mailb= "Your otp in HAPPY STORE is $otps";
    $query = "INSERT INTO temp(name, email, password, contact, city, address, otp)VALUES('" . $name . "','" . $email . "','" . $password . "','" . $contact . "','" . $city . "','" . $address . "','" . $otp . "')";
    mysqli_query($con, $query) or die(mysqli_error($con));
   
      require 'PhpMailer-master/src/PHPMailer.php';
  require 'PhpMailer-master/src/SMTP.php';
  require 'PhpMailer-master/src/Exception.php';



    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPDebug=1;
    $mail->SMTPAuth= TRUE;
    $mail->SMTPSecure= 'tls';
    $mail->Host= "smtp.gmail.com";
    $mail->Port= 25;
    $mail->Username= "shukhu10@gmail.com";
    $mail->Password= "i loveu69";
    $mail->SetFrom('Happy@Store.com');
    $mail->Subject= "OTP";
    $mail->Body=$mailb;
    $mail->AddAddress($email);
    $Provider= "Google";
if ($mail->Send()) {
   header('location: verify.php?e=' . $email . '&m=');;
} else {
echo "SERVER ERROR PLEASE TRY AGAIN!!!!!!!!!!!!!!!!!!!!!!!!";}
   
  }

?>