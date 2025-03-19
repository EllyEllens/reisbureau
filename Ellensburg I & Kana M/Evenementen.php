<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/Reisbureau.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Reisbureau - Evenementen</title>
</head>
<body>
<div class="reis">
    <h1>Evenementen</h1>

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

    // Query om alle evenementen op te halen
    $sql_select_excursies_evenementen = "SELECT * FROM excursies_evenementen";
    $result = $conn->query($sql_select_excursies_evenementen);

    if ($result && $result->num_rows > 0) {
        echo "<table border='1'> 
            <tr>
                <th>Evenment_ID</th>
                <th>Plaats_ID</th>
                <th>Evenement_Type</th>
                <th>Omschrijving</th>
                <th>Evenement_Data	</th>
                <th>Prijs</th>
                <th>Categorie</th>
            </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>".$row['Evenment_ID']."</td>
                <td>".$row['Plaats_ID']."</td>
                <td>".$row['Evenement_Type']."</td>
                <td>".$row['Omschrijving']."</td>
                <td>".$row['Evenement_Data']."</td>
                <td>".$row['Prijs']."</td>
                <td>".$row['Categorie']."</td>
            </tr>";
        }
        echo "</table>";
    } else {
        echo "Geen evenementen gevonden.";
    }

    // Sluit de verbinding
    $conn->close();
    ?>

    <!-- Knop naar de homepage -->
    <button class="home"><a class="homepage" href="Reisbureau.php">Home</a></button>

</div>
</body>
</html>