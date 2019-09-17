<?php

session_start();

if (isset($_COOKIE["heistuser"])) {
    setcookie("heistuser", "");
}

session_unset();
session_destroy();

header("location:login.html");

