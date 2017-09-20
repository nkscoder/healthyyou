<?php
require 'PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail1 = new PHPMailer;

$name=$_POST['name'];
$email=$_POST['email'];
//$subject=$_POST['services'];
$phone=$_POST['phonenumber'];

$services='';
foreach ($_POST['services'] as $selected_option) {
    $services.= $selected_option;
}
//echo $services; die;
// name  email
//
//$Adminmessage=$_POST['message'];
//$subject=$_POST['subject'];
//$schoolname=$_POST['schoolname'];
//$location=$_POST['location'];
//$phone=$_POST['phone'];
//
//$lname=$_POST['lname'];
//
//$city=$_POST['city'];
//$state=$_POST['state'];
//$download=$_POST['download'];



$emailadmin="nkscoder@gmail.com";
//$emailsubadmin="nkscoder@gmail.com";
$subject="contact us.";

$Usersubject="Thank You for contacting Healthyyou.";
$messageUsers=file_get_contents('template.html');

$message ='<html>
<body>
<div id="abcd" style="text-align:justify;font-size:18px;"> Name:-'.$name.'<br> Email:-'.$email.'<br>Phone:-'.$phone.'<br>Service:-'.$services.'</div>
</body>
</html>';

if (empty($services)){
    $subject='';
    $subject='REQUEST FOR A FREE CONSULTATION';

    $message="";
    $message ='<html>
<body>    
<div id="abcd" style="text-align:justify;font-size:18px;">
  Name:-'.$name.'<br>
  Email:-'.$email.'<br>
  Phone:-'.$phone.'<br>
  </div>
</body>
</html>';
}

// $phoneMessage ='<html>
// <body>
// <div id="abcd" style="text-align:justify;font-size:18px;"><br>Phone:-'.$phone.'</div>
// </body>
// </html>';



// $Popupsubject="Ecomm - Exit Intent Modal Form";
// $popupMessage ='<html>
// <body>
// <div id="abcd" style="text-align:justify;font-size:18px;"><br>Phone/Email - :-'.$popupEmail.'</div>
// </body>
// </html>';
/*$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'mail.scaledesk.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'contact@scaledesk.com';                 // SMTP username
$mail->Password = 'qazplmq1w2e3r4';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;
$mail->IsHTML(true);  */
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = '';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'contact@healthyyou.online';                 // SMTP username
$mail->Password = '';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 993;// TCP port to connect to
$mail->IsHTML(true);
$mail->setFrom('contact@healthyyou.online', 'Healthyyou');
//$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo('contact@healthyyou.online', 'noreply');
// TCP port to connect to
/*$mail1->isSMTP();                                      // Set mailer to use SMTP
$mail1->Host = 'mail.scaledesk.com';  // Specify main and backup SMTP servers
$mail1->SMTPAuth = true;                               // Enable SMTP authentication
$mail1->Username = 'contact@scaledesk.com';                 // SMTP username
$mail1->Password = 'qazplmq1w2e3r4';                           // SMTP password
$mail1->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail1->Port = 587;
$mail1->IsHTML(true);
*/

$mail1->isSMTP();                                      // Set mailer to use SMTP
$mail1->Host = '';  // Specify main and backup SMTP servers
$mail1->SMTPAuth = true;                               // Enable SMTP authentication
$mail1->Username = 'contact@healthyyou.online';                 // SMTP username
$mail1->Password = '';                           // SMTP password
$mail1->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail1->Port = 993;// TCP port to connect to
$mail1->IsHTML(true);
$mail1->setFrom('contact@healthyyou.online', 'Healthyyou');
//$mail->setFrom('contact@scaledesk.com', 'Scaledesk');
$mail->addAddress($email, $name);
//$mail1->setFrom('contact@scaledesk.com', 'Scaledesk');
$mail1->addAddress($emailadmin);     // Add a recipient
// $mail1->addAddress($emailadmin2);     // Admin mail
//$mail1->addAddress($emailsubadmin);  // sub admin mail

$mail->Subject = $Usersubject;
$mail->Body    = $messageUsers;

$mail1->Subject = $subject;
$mail1->Body    = $message;
// echo "<pre/>";
// print_r($mail1);die;

 $mail1->SMTPDebug = 1;
// $mail1->SMTPDebug  = 2;




    if ($mail1->send()) {

        if ($mail->send()) {
            header("location: /healthyyou/thankyou.html");
        } else {
            header("location: /healthyyou/thankyou.html");
        }

    } else {
         echo $mail1->ErrorInfo;

        header("location: /healthyyou/");


    }

