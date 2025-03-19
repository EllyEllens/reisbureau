<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/Reisbureau.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Reisbureau - REIS-RAAK</title>
    
</head>
<body>
<div class="reis">
    <h1>REIS-RAAK | Klanten Overzicht</h1>
    
    <?php
    //DATABASE CONNECTEN
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "reisbureau"; // database naam
    
    // Maak verbinding met de database
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Controle verbinding
    if ($conn->connect_error) {
      die("Connectie mislukt: " . $conn->connect_error);
    }
    

    // Het maken van databases en tabellen
    $sql_create_db = "CREATE DATABASE IF NOT EXISTS reisbureau";
    $conn->query($sql_create_db);


    // Het selecteren van een database
    $conn->select_db("reisbureau");

    // Het creëren van een tabel
    $sql_create_table = "CREATE TABLE IF NOT EXISTS klanten (
        Klant_ID INT(10) PRIMARY KEY,
        Naam VARCHAR(25),
        Adres VARCHAR(25),
        Telefoon BIGINT(10),
        Paspoort_Nummer VARCHAR(15)
    )";

    $conn->query($sql_create_table);

    // Tabel weergeven op de browser
    $sql_select = "SELECT * FROM klanten";
    $result = $conn->query($sql_select);

    
    
    // Toon gegevens in een tabel op de browser
        echo "<table border='1'> 
            <tr>
                <th>Klant_ID</th>
                <th>Naam</th>
                <th>Adres</th>
                <th>Telefoon</th>
                <th>Paspoort_Nummer</th>
                <th>Invoegen</th>
                <th>Updaten</th>
                <th>Verwijderen</th>
                <th>Boeken</th>
            </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>".$row['Klant_ID']."</td>
                    <td>".$row['Naam']."</td>
                    <td>".$row['Adres']."</td>
                    <td>".$row['Telefoon']."</td>
                    <td>".$row['Paspoort_Nummer']."</td>
                    <td><a class='insert-button' href='INVOEGEN.php?id=".$row['Klant_ID']."'>Invoegen</a></td>
                    <td><a class='update-button' href='UPDATE.php?id=".$row['Klant_ID']."'>Updaten</a></td>  
                    <td><a class='delete-button' href='VERWIJDEREN.php?id=".$row['Klant_ID']."'>Verwijderen</a></td>
                    <td><a class='boeken-button' href='OVERZICHT.php?id=".$row['Klant_ID']."'>Overzicht</a></td>  
                </tr>";
            }
    
    // Voeg een nieuw record
    echo "<tr>
        <td colspan='7'></td>
        <td><a class='insert-button' href='INVOEGEN.php'>Toevoegen</a></td> 
    </tr>";    

    
    // Select statement
    $sql = "SELECT * FROM klanten";
    $result = $conn->query($sql);
    
    $conn->close();
    
?>
</div>
</body>
</html>