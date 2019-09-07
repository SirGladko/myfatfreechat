<?php
    $f3->config('config.ini');

    $dbhost=$f3->get('dbhost');
    $dblogin=$f3->get('dblogin');
    $dbpassw=$f3->get('dbpassw');
    $db=$f3->get('db');
    $conn = new mysqli($dbhost, $dblogin, $dbpassw, $db);
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    session_start();

        //config//
    //write logout after x seconds of inactivity
    $user_timeout=$f3->get('user_timeout');
    //max char in message
    $max_char=$f3->get('max_char');
    //max login lenght
    $login_len=$f3->get('login_len');
    //max password lenght
    $passw_len=$f3->get('passw_len');
    //max chat name lenght
    $chat_len=$f3->get('chat_len');
    //max chat password lenght 
    $chat_passw_len=$f3->get('chat_passw_len');
    //load chat x seconds back after logging in
    $pre_login_chat=$f3->get('pre_login_chat');
    //reload logging date after x seconds of inactivity 
    $logindate_reload=$f3->get('logindate_reload');
        //config//

    if(isset($_SESSION["login"])){
        //logged user
        $login=$_SESSION["login"];
        //logged user id
        $user_id=$_SESSION["user_id"];
        //used chat id
        $chat_id=$_SESSION["chat_id"];
        //used chat
        $chat=$_SESSION["chat"];
    }
    //content.php
    $last_printed_user="";
    $last_printed="";
    //auth.php
    $loginErr="";
    $chatErr="";
    $logged=false;
?>
