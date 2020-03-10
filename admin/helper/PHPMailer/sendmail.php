<?php

require_once 'src/PHPMailer.php';
function sendMail($mTo,$body){
    $mail = new PHPMailer(true);
    try {
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->CharSet = 'UTF-8';
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true; 
        $mail->Username   = 'kkokjun98@gmail.com';
        $mail->Password   = 'vanhai123';
        $mail->SMTPSecure = 'tls';   // or ssl  
        $mail->Port       = 587;  // 465 
        $mail->setFrom('kkokjun98@gmail.com', 'FREEKOK');
        $mail->addAddress($mTo, '$nameReceiver');   
        $mail->addReplyTo('kkokjun98@gmail.com', 'FREEKOK');
        // Attachments
        // $mail->addAttachment('../../temp/a.JPG'); 
        // Content
        $mail->isHTML(true);   
        $mail->Subject = 'Xin chào';
        $mail->Body    = $body;
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->send();
        return true;
    } catch (Exception $e) {
        
        return false;
    }
}

?>