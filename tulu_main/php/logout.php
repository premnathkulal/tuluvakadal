<?php
    session_start();
    unset($_SESSION['login_user']);
    unset($_SESSION['login_psw']);
    session_destroy();
    header("Location:../../");
    exit;
?>