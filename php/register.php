<?php 
    //db connection and basic variables
    include('dbconn.php');
    $registerErr="";
    $allowed=array("q","w","e","r","t","y","u","i","o","p","a","s","d","f","g","h","j","k","l","z","x","c","v","b","n","m","1","2","3","4","5","6","7","8","9","0","ą","ę","ś","ż","ź","ć","ń","ł","ó");
    $auth = false;

    if(isset($_POST["register"])){
        $login=$_POST["newlogin"];
        $password=addslashes($_POST["newpassw"]);
        $checklogin=str_split(mb_strtolower($login, 'UTF-8'));
        //check login lenght
        if (strlen($login)==0){
            $registerErr = "Login cant be empty";
        }
        else if (strlen($login)<$login_len+1){
            //check if every char is allowed
            foreach($checklogin as $character){
                if ($character!=""){
                    if (!in_array($character, $allowed)) {
                        $registerErr = "Only polish chars and digits are allowed";
                    }
                }
            }
        }
        else {
            $registerErr = "Login is too long";
        }
        if (strlen($password)>$passw_len){
            if($registerErr==""){
                $registerErr = "Password is too long";
            }
            else{
                $registerErr = "Login and password are too long";
            }
        }
        if($registerErr==""){
            $sql = "SELECT user_id, login from users where login='$login';";
            $result = $conn->query($sql);
            //if user doesnt exist then register
            if ($result->num_rows == 0){
                $sql = "INSERT INTO users (login, password, user_flag) values ('$login', '$password', 0);";
                $result = $conn->query($sql);
                $auth = true;
            }
            //if user exist
            else {
                $registerErr="Login is already taken";
            }
        }
    }
    return $auth
?>