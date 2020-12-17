<?php
    $mysql = new mysqli('127.0.0.1', 'maximus7022', '12345Max', 'maximus7022');

    if ($mysql->connect_error){
      die("Не вдалося підключитись: " .$mysql->connect_error);
    }

    $mysql->set_charset(utf8);

    $result=$mysql->query("SELECT Count(ID) AS Count_FB95 FROM Registration WHERE Groupa LIKE 'ФБ-95'");

    $count = $result->fetch_row();

    echo "Count_FB95<br>".$count[0];
?>