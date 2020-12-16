<?php
	$mysql = new mysqli('127.0.0.1', 'maximus7022', '12345Max', 'maximus7022');
	$query ="SELECT * FROM Registration";
    $result = mysqli_query($mysql, $query) or die("Виникла помилка: " . mysqli_error($mysql)); 
	if($result)
	{
    	$rows = mysqli_num_rows($result);
     
	    echo "<table><tr><th>Id</th><th>PIB</th><th>Groupa</th><th>Birth</th><th>Age</th><th>Specialty</th><th>Email</th><th>AverageMark</th></tr>";
	    for ($i = 0 ; $i < $rows ; ++$i)
    	{
        	$row = mysqli_fetch_row($result);
        	echo "<tr>";
            	for ($j = 0 ; $j < 8 ; ++$j) echo "<td>$row[$j]</td>";
        	echo "</tr>";
    	}
    	echo "</table>";
     
    mysqli_free_result($result);
	}
 
	mysqli_close($mysql);
?>