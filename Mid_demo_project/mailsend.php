<?php 
$to = "shshaon39@gmail.com";
$subject = "Practice";
$body = "Hello";
$from = "from: practicemailsend@gmail.com";

if(mail($to,$subject,$body,$from)){
    echo "mail send";
}else{
    echo "faild";
}
?>