<?php
namespace core\services;


use core\Config;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class EmailService {

    static public $config;

    static function getName(){
        return "email";
    }

    static function init(){

    }

    static function send($from,$to,$subject,$message){

        self::$config = Config::getFile("email");


        $f = self::$config['accounts'][$from];

        if(isset($f['smtp'])){
            return self::sendSMTP($from,$to,$subject,$message);
        }else{
            return self::sendNormal($from,$to,$subject,$message);
        }



    }


    static function sendNormal($from,$to,$subject,$message){
        $f = self::$config['accounts'][$from]['from'];

        if( isset(self::$config['accounts'][$to]) && isset(self::$config['accounts'][$to]['to'])){
            $to = self::$config['accounts'][$to]['to'];
        }else{
            $to = $to;
        }

        $subject = $subject;
        $message = $message;
        $headers = 'From: '.$f . "\r\n" .
            'Reply-To: '.$f . "\r\n" .
            'X-Mailer: PHP/' . phpversion() ."\r\n".
            "Content-Type: text/html; charset=UTF-8";



        $r = mail($to, $subject, $message, $headers);

        return $r;
    }

    static function sendSMTP($from,$to,$subject,$message){
        $f = self::$config['accounts'][$from]['from'];
        if( isset(self::$config['accounts'][$to]) && isset(self::$config['accounts'][$to]['to'])){
            $to = self::$config['accounts'][$to]['to'];
        }else{
            $to = $to;
        }



        $smtp = self::$config['accounts'][$from]['smtp'];


        $mail = new PHPMailer(true);

        $r = false;
        try {
            $mail->CharSet = "UTF-8";
            $mail->isSMTP();                            // Set mailer to use SMTP
            $mail->Host = $smtp['host'] ;             // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                     // Enable SMTP authentication
            $mail->Username = $smtp['username'];          // SMTP username
            $mail->Password = $smtp['password']; // SMTP password
            $mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                          // TCP port to connect to

            $mail->setFrom($f, 'Cartiamo');
            $mail->addReplyTo($f, 'Cartiamo');
            $mail->addAddress($to);   // Add a recipient

            $mail->isHTML(true);  // Set email format to HTML

            $bodyContent = $message;

            $mail->Subject = $subject;
            $mail->Body    = $bodyContent;

            $r = $mail->send();


        } catch (Exception $e) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }

        /*

        $subject = $subject;
        $message = $message;
        $headers = 'From: '.$f . "\r\n" .
            'Reply-To: '.$f . "\r\n" .
            'X-Mailer: PHP/' . phpversion() ."\r\n".
            "Content-Type: text/html; charset=UTF-8";



        $r = mail($to, $subject, $message, $headers);
    */
        return $r;
    }

}
