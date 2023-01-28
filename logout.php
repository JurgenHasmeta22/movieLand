<?php
session_start();
unset($_SESSION_['id']);
unset($_SESSION_['username']);
header("Location: login.php");
die();
?>