<?php
    //db connection and basic variables
    include('dbconn.php');
    
    //write every user marked to your chat
    $sql = "SELECT login, user_flag FROM activeusers INNER JOIN users ON activeusers.user_id = users.user_id WHERE chat_used='$chat_id' ORDER BY user_flag DESC, login;";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
        //color
        if ($row["user_flag"]==1){
            $userwpis="<div class=\"onlineuser admin\">";
        }
        else {
            $userwpis="<div class=\"onlineuser user\">";
        }
        //write
        if ($row["user_flag"]!=2){
            echo $userwpis.$row["login"]."</div>";
        }
    }
?>
