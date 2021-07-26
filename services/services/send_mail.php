<?php

 header("Access-Control-Allow-Origin: *");
      header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
      header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type');
//  	header('Content-type: application/json');

 $formdata = json_decode(file_get_contents('php://input'), true);
          
$enquiry=$formdata['enquiry']; 
$name=$formdata['name'];
$from=$formdata['email'];
 
if($from)
{
 $email1="contact@and-arise.com";	
	
//  $message=$_REQUEST['enquiry'];



    $message = '<p>Hi, <br />'.$name.' has submitted enquiry form.</p>';
      $message .= '<p><strong>Name: </strong>'.$name.'</p>';
      $message .= '<p><strong>Email: </strong>'.$from.'</p>';
      $message .= '<p><strong>Enquiry Details: </strong>'.$enquiry.'</p>';
       
      
$sub="You Have Received New Enquiry";
$mail_body = "$message";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
$headers .= "From: ".$from."\n";
 
$suc=mail($email1,$sub,$mail_body,$headers);

if($suc)
{
    	$msg="Message Sent Sucessfully";
	 echo  json_encode($msg);
}
else
{
	$msg = "Message Not Sent";
 	 echo  json_encode($msg);

}

}
else{
    	echo json_encode("eror");
 
}
 
?>


