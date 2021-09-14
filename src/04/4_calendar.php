<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>시간표</title>
</head>
<body>
    <?php
    $days = ["월", "화", "수", "목", "금"];
    echo "<table border='1'>";
    echo "<tr>";
    for ($i = 0; $i < 5; $i++) { 
        echo "<th>$days[$i]</th>";
    }
    echo "</tr>";
    echo "<tr>";
    for ($i = 0; $i < 5; $i++) { 
        if ($_POST["day"] == $days[$i]) {
            echo "<td>" . $_POST["subject"] . "</td>";
        } else {
            echo "<td></td>";
        }
    }
    echo "</tr>";
    echo "</table>";
    ?>
</body>
</html>
