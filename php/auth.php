<?php 
    //db connection and basic variables
    include('dbconn.php');
    include('functions.php');
    
    
    //check last active date for every user that is assigned to your chat and log them out if its expired
    logoutinactive();

    if (isset($_POST["submitek"])){
        //check entered chat
        if (isset($_POST["chat"])){
            //if its not too long
            if(strlen($_POST["chat"])>$chat_len){
                $chatErr="Chat name is too long";
            }
            else{
                //default chat
                if (strlen($_POST["chat"])==0){
                    $chat="default";
                    $chatpassw="";
                }
                //entered chat
                else{
                    $chat=htmlspecialchars(addslashes($_POST["chat"]));
                    $chatpassw=addslashes($_POST["chatpassw"]);
                }
                //check if entered chat exist
                $sql = "SELECT chat_id, chat_name, chat_password from chats where chat_name='$chat';";
                $result = $conn->query($sql);
                if ($result->num_rows == 1){
                    $row = $result->fetch_assoc();
                    //if password isnt too long
                    if(strlen($chatpassw)>$chat_passw_len){
                        $chatErr="Chat password is too long";
                    }
                    //check if password is correct
                    else{
                        if ($row["chat_password"]==$chatpassw){
                            $chat=$row["chat_name"];
                            $chat_id=$row["chat_id"];
                        }
                        else{
                            $chatErr="Chat password isnt correct";
                        }
                    }
                }
                //create new chat if it doesnt exist
                else{
                    $sql = "INSERT INTO chats (chat_name, chat_password, chat_flag) values ('$chat', '$chatpassw', 0);";
                    $result = $conn->query($sql);
                    $result = $conn->query("select last_insert_id();");
                    $row = $result->fetch_assoc();
                    $chat_id=$row["last_insert_id()"];
                }
            }
        }
        
        $login=addslashes($_POST["login"]);
        $password=addslashes($_POST["passw"]);
        //check login and password
        if (strlen($login)==0 or strlen($login)>$login_len){
            $loginErr="login or password incorrect";
        }
        else{
            $sql = "SELECT user_id, login, password, user_flag from users where login='$login';";
            $result = $conn->query($sql);
            if ($result->num_rows == 1){
                $row = $result->fetch_assoc();
                //if password is correct
                if ($row["login"]==$login && $row["password"]==$password){
                    //if account is banned
                    if ($row["user_flag"]==2){
                        $loginErr="Account is banned";
                    }
                    else{
                        //if chat is without error
                        if ($chatErr==""){
                            $user_id = $row["user_id"];
                            //if is already logged
                            $sql1 = "SELECT user_id FROM activeusers WHERE user_id = '$user_id';";
                            $result1 = $conn->query($sql1);
                            if ($result1->num_rows == 0){
                                $_SESSION["login"]=$row["login"];
                                $_SESSION["user_id"]=$row["user_id"];
                                $_SESSION["chat"]=$chat;
                                $_SESSION["chat_id"]=$chat_id;
                                $_SESSION["login_date"]=time();

                                //add to active users
                                $sql = "INSERT INTO activeusers (user_id, chat_used) values ('$user_id', '$chat_id');";
                                $result = $conn->query($sql);
                                //info about used chat
                                $sql = "INSERT INTO records (user_id, chat_id, record_flag, text) values ('$user_id', '$chat_id', 2, '***$login IN***');";
                                $result = $conn->query($sql);
                                $logged=true;
                            }
                            else{
                                $loginErr="Account already logged in";
                            }
                        }
                    }
                }
                else{
                    $loginErr="login or password incorrect";
                }
            }
            else{
                $loginErr="login or password incorrect";
            }
        }
    }
    return $logged;
?>