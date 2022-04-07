<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <?php
    $mysqli = new mysqli("localhost", "root", "", "szkola");

    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        exit();
    }

    $sql = "SELECT id, Imie, Nazwisko, Srednia_ocen FROM uczen";
    $result = $mysqli->query($sql);



    // Associative array
    //$row = $result->fetch_array(MYSQLI_ASSOC);
    echo '<table>';
    echo '<tr><td id="x">Lp.</td><td id="x">Imie</td><td id="x">Nazwisko</td><td id="x">Średnia ocen</td></tr>';
    while ($row = mysqli_fetch_assoc($result)) {

        echo '<tr><td>' . $row['id'] . "</td> <td>" . $row['Imie'] . "</td> <td>" . $row['Nazwisko'] . "</td> <td>" . $row['Srednia_ocen'] . "</td></tr>";
    }
    echo '</table>';
    // Free result set
    $result->free_result();

    $dwa = "Select ROUND(AVG(Srednia_ocen),2) FROM uczen";
    $resultdwa = $mysqli->query($dwa);

    $row2 = mysqli_fetch_assoc($resultdwa);
    echo "Średnia ocen to " . $row2["ROUND(AVG(Srednia_ocen),2)"];
    $mysqli->close();
    ?>
</body>

</html>