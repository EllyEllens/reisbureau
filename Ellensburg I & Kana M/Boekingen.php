<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/Reisbureau.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Reisbureau - Boekingen</title>
</head>
<body>
<div class="reis">
    <h1>Boekingen</h1>

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

    // Query om alle boekingen op te halen
    $sql_select_vluchten = "SELECT * FROM boekingen";
    $result = $conn->query($sql_select_vluchten);

    if ($result && $result->num_rows > 0) {
        echo "<table border='1'> 
            <tr>
                <th>Boeking_ID</th>
                <th>Klant_ID</th>
                <th>Plaats_ID</th>
                <th>Hotel_ID</th>
                <th>Evenement_ID</th>
                <th>Vlucht_ID</th>
                <th>Vertrek_Datum</th>
                <th>Terugkeer_Datum</th>
                <th>Totale_Prijs</th>
            </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>".$row['Boeking_ID']."</td>
                <td>".$row['Klant_ID']."</td>
                <td>".$row['Plaats_ID']."</td>
                <td>".$row['Hotel_ID']."</td>
                <td>".$row['Evenement_ID']."</td>
                <td>".$row['Vlucht_ID']."</td>
                <td>".$row['Vertrek_Datum']."</td>
                <td>".$row['Terugkeer_Datum']."</td>
                <td>".$row['Totale_Prijs']."</td>
            </tr>";
        }
        echo "</table>";
    } else {
        echo "Geen boekingen gevonden.";
    }

    // Sluit de verbinding
    $conn->close();
    ?>

    <!-- Knop naar de homepage -->
    <button class="home"><a class="homepage" href="Reisbureau.php">Home</a></button>

</div>
</body>
</html>