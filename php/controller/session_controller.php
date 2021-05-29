<?php
    session_start();
    $session_name=$_POST['session_name'];
    $data = $_SESSION[$session_name];
    echo($data);
?>