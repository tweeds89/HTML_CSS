<?php

if($_SERVER['REQUEST_METHOD']=="POST"){
   $to = 'p.palinski@gmail.com';  
   $from = $_POST['email'];
   $subject = $_POST['subject'];
   $message = $_POST['message'];
   $headers = "From: " .$from. "\r\n" ;
    
   mail($to, $subject, $message, $headers);
   
   echo 'Wiadomość została wysłana';    
}