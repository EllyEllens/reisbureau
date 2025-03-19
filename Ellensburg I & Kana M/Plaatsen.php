<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/Reisbureau.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Reisbureau - Plaatsen</title>
</head>
<body>
<div class="reis">
    <h1>Plaatsen</h1>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "reisbureau"; 
    
    // Verbinding met de database
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Controle verbinding
    if ($conn->connect_error) {
        die("Connectie mislukt: " . $conn->connect_error);
    }

    // Selecteren van een database
    $conn->select_db($dbname);

    // Query om alle plaatsen op te halen
    $sql_select_plaatsen = "SELECT * FROM plaatsen";
    $result = $conn->query($sql_select_plaatsen);

    if ($result && $result->num_rows > 0) {
        echo "<table border='1'> 
            <tr>
                <th>Plaats_ID</th>
                <th>Plaats_Naam</th>
                <th>Land</th>
                <th>Omschrijving</th>
                <th>Gem_Temp_Maand</th>
                <th>Gem_Aantal_Uren_Zon</th>
            </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>".$row['Plaats_ID']."</td>
                <td>".$row['Plaats_Naam']."</td>
                <td>".$row['Land']."</td>
                <td>".$row['Omschrijving']."</td>
                <td>".$row['Gem_Temp_Maand']."</td>
                <td>".$row['Gem_Aantal_Uren_Zon']."</td>
            </tr>";
        }
        echo "</table>";
    } else {
        echo "Geen plaatsen gevonden.";
    }

    // Sluit de verbinding
    $conn->close();
    ?>

    <!-- Knop naar de homepage -->
    <button class="home"><a class="homepage" href="Reisbureau.php">Home</a></button>

</div>
</body>
</html>