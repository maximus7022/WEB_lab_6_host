<?php
    $mysql = new mysqli('127.0.0.1', 'maximus7022', '12345Max', 'maximus7022');

    if ($mysql->connect_error)
    {
        die("Не вдалося підключитись: " .$mysql->connect_error);
    }

    $mysql->set_charset(UTF8);

    $result = $mysql->query("SELECT * FROM Registration WHERE ID <= 10");

    echo "<table><tr><th>Id</th><th>PIB</th><th>Groupa</th><th>Birth</th><th>Age</th><th>Specialty</th><th>Email</th><th>AverageMark</th></tr>";

    while($row = $result->fetch_assoc())
    {
        echo "<tr><td>".$row['ID']."</td><td>".$row['PIB']."</td><td>".$row['Groupa']."</td><td>".$row['Birth']."</td><td>".$row['Age']."</td><td>".$row['Specialty']."</td><td>".$row['Email']."</td><td>".$row['AverageMark']."</td></tr>";
    }
?>