<?php
    //db connection and basic variables
    include('dbconn.php');

    //logout
    $sql = "DELETE FROM activeusers WHERE user_id = '$user_id';";
    $result = $conn->query($sql);
    $sql = "INSERT INTO records (user_id, chat_id, record_flag, text) values ('$user_id', '$chat_id', 3, '***$login OUT***');";
    $result = $conn->query($sql);
    session_unset();
?>
