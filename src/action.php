<?php

// session_start();

function checkdata($input1, $input2)
{
    include "connection.php";

    $input2 = md5($input2);
    $query = mysqli_query($connect, "SELECT * FROM loginTable WHERE email = '$input1'");
    $result = mysqli_fetch_row($query);

    // code 0 = email & pass correct
    // code 1 = email not found
    // code 2 = email found
    // code 3 = email found & pass wrong

    if ($result == NULL) {
        return 1; 
    } else if (count($result) == 2) {
        $query = mysqli_query($connect, "SELECT * FROM loginTable WHERE email = '$input1' AND password = '$input2'");
        $result = mysqli_fetch_row($query);

        if ($result == NULL) {
            return 3;
        } else if (count($result) == 2) {
            return 0;
        }
        return 2; // this return 2 will be overriden by return 3
    }
    // echo mysqli_error($connect);
}   

function inserttoDB($name, $username, $email, $pass, $status = 0)
{

    include "connection.php";
    $pass = md5($pass);

    // code 0 = Register successful
    // code 1 = An account has been registered

    if (checkdata($email, $pass) == 1) {
        $query = mysqli_query($connect, "INSERT INTO loginTable (name, email, username, pass, status) VALUES ('$name', '$email', '$username', '$pass', '$status')");
        return 0;
    }else {
        return 1;
    }

    // echo mysqli_error($connect);
}

function sendMail(){

    // to configure SMTP for PHP go to php.ini file, located in C:\XAMPP\php
    // find the [mail function] line and configure SMTP from there
    // find sendmail.ini, located in C:\XAMPP\sendmail
        
    $msg = "Test Mail";
    $msg = wordwrap($msg,70);

    mail("gunamanta.yuana@gmail.com", "Test", $msg);
    echo "WOrk";
}

function redirect($url, $statusCode = 303){
    header('Location: ' . $url, true, $statusCode);
    die();
}


?>