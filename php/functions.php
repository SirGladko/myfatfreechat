<?php
    //check last active date for every user that is assigned to your chat and log them out if its expired
    //auth.php & cont.php
    function logoutinactive(){
        global $user_timeout;
        global $conn;
        $sql = "SELECT activeusers.user_id, login, user_flag, chat_used, last_active FROM activeusers INNER JOIN users ON activeusers.user_id = users.user_id WHERE UNIX_TIMESTAMP(CURRENT_TIMESTAMP) - UNIX_TIMESTAMP(last_active) > $user_timeout;";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
            if ($row["user_flag"]!=2){
                $loguser_id = $row["user_id"];
                $loguser_login = $row["login"];
                $logdate = $row["last_active"];
                $chat_used = $row["chat_used"];
                //write that user left the chat
                $sql1 = "INSERT INTO records (user_id, chat_id, record_flag, text, record_date) values ('$loguser_id', '$chat_used', 3, '***$loguser_login OUT***', '$logdate');";
                $result1 = $conn->query($sql1);
            }
        }
        $sql = "DELETE FROM activeusers WHERE UNIX_TIMESTAMP(CURRENT_TIMESTAMP) - UNIX_TIMESTAMP(last_active) > $user_timeout;";
        $result = $conn->query($sql);
    }

?>