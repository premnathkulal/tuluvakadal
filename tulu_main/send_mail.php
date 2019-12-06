<?php
// include phpmailer file
    require_once "PHPMailer-FE_v4.11/_lib/class.phpmailer.php";
    $mail = new PHPMailer(true);
    $mail->IsSMTP();
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 465;
    
    // for hotmail
    $mail->SMTPSecure = 'tls';
    $mail->Host = 'smtp.live.com';
    // use 25 or 587
    $mail->Port = 25; 

    $mail->Username = 'premnathkulal1998@gmail.com';
    // must be in single quotes
    $mail->Password = '!!swamykoragajja1998';
    
    $mail->SetFrom('premnathkulal1998@gmail.com', 'premnath');

    $mail->AddAddress('user1@domain.com');
// remove this line below 
// if you don't want to send to multiple recipient
$mail->AddAddress('user2@domain.com');

$mail->AddCC('user1@domain.com');
$mail->AddBCC('user2@domain.com');

$message = '<html><body>';
$message .= '';
$message .= '<table rules="all" cellpadding="10">';
$message .= '<tr style="background: #eee;"><td>';
$message .= '<h1><a href="https://www.thesoftwareguy.in/" target="_blank">';
$message .= '<img src="https://www.thesoftwareguy.in/thesoftwareguy-logo-small.png" alt="" />';
$message .= '</a></h1>';
$message .= '</td></tr>';
// add body 
$message .= "<tr style='background: #eee;'><td>My sample text message goes here.</td></tr>";
 
$message .= "</table>";
 
// add footer
$message .= '<table rules="all" width="600px">';
$message .= '<tr><td>This mail is send via ';
$message .= '<a href="https://www.thesoftwareguy.in/" target="_blank">www.thesoftwareguy.in</a>';
$message .= ' and is used for demo purpose only. ';
$message .= '<b>Please do not reply to this mail.</b></td></tr>';
 
$message .= "</table>";
$message .= "</body></html>";
 
// add message body
$mail->MsgHTML($message);

// replace time.png with your file
$mail->AddAttachment('time.png');

try {
    $mail->Send();
    echo "Mail send successfully";
} catch (phpmailerException $e) {
    echo $e->getMessage();
} catch (Exception $e) {
    echo $e->getMessage();
}

?>