<?php
$server = 'https://'.$_SERVER["HTTP_HOST"];
session_start(); // Sessiyani boshlash
    session_unset(); // Barcha sessiya o'zgaruvchilarini tozalash
    session_destroy(); // Sessiyani yopish
    header("Location: ".$server); // Bosh sahifaga qaytish
    exit(); // Kodni yakunlash