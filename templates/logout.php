<?php
session_destroy();
unset($_SESSION['user']);
header('Location: home');
?>