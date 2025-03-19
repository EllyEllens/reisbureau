<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/Reisbureau.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Reisbureau - Vluchten</title>
</head>
<body>
<div class="reis">
    <h1>Soorten Vluchten</h1>

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

    // Query om alle vluchten op te halen
    $sql_select_vluchten = "SELECT * FROM vluchten";
    $result = $conn->query($sql_select_vluchten);

    if ($result && $result->num_rows > 0) {
        echo "<table border='1'> 
            <tr>
                <th>Vlucht_ID</th>
                <th>Luchtvaartmaatschappij</th>
                <th>Vlucht_Nummer</th>
                <th>Vlucht_Datum</th>
                <th>Vertrek_Tijd</th>
                <th>Aankomst_Tijd</th>
                <th>Prijs</th>
            </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>".$row['Vlucht_ID']."</td>
                <td>".$row['Luchtvaartmaatschappij']."</td>
                <td>".$row['Vlucht_Nummer']."</td>
                <td>".$row['Vlucht_Datum']."</td>
                <td>".$row['Vertrek_Tijd']."</td>
                <td>".$row['Aankomst_Tijd']."</td>
                <td>".$row['Prijs']."</td>
            </tr>";
        }
        echo "</table>";
    } else {
        echo "Geen vluchten gevonden.";
    }

    // Sluit de verbinding
    $conn->close();
    ?>

    <!-- Knop naar de homepage -->
    <button class="home"><a class="homepage" href="Reisbureau.php">Home</a></button>

</div>
</body>
</html>