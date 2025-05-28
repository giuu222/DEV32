<?php
session_start();

session_destroy(); 

    echo"<script>window.alert('Você não está logado!');</script>";
    echo"<script>window.location.href='login.php';</script>";

?>