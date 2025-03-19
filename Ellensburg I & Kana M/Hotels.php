<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/Reisbureau.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Reisbureau - Hotels</title>
</head>
<body>
<div class="reis">
    <h1>Hotels</h1>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "reisbureau"; //naam van de database
    
    // Verbinding met de database
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Controle verbinding
    if ($conn->connect_error) {
        die("Connectie mislukt: " . $conn->connect_error);
    }

    // Selecteren van een database
    $conn->select_db($dbname);

    // Query om alle hotels op te halen
    $sql_select_orders = "SELECT * FROM hotels";
    $result = $conn->query($sql_select_orders);

    if ($result && $result->num_rows > 0) {
        echo "<table border='1'> 
            <tr>
                <th>Hotel_ID</th>
                <th>Plaats_ID</th>
                <th>Hotel_Naam</th>
                <th>Adres</th>
                <th>Telefoon</th>
                <th>Prijs_per_Nacht</th>
                <th>Hotel_Klasse</th>
            </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>".$row['Hotel_ID']."</td>
                <td>".$row['Plaats_ID']."</td>
                <td>".$row['Hotel_Naam']."</td>
                <td>".$row['Adres']."</td>
                <td>".$row['Telefoon']."</td>
                <td>".$row['Prijs_per_Nacht']."</td>
                <td>".$row['Hotel_Klasse']."</td>
            </tr>";
        }
        echo "</table>";
    } else {
        echo "Geen hotels gevonden.";
    }

    // Sluit de verbinding
    $conn->close();
    ?>

    <!-- Knop naar de homepage -->
    <button class="home"><a class="homepage" href="reisbureau.php">Home</a></button>

</div>
</body>
</html>