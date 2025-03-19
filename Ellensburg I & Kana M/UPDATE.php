<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/CRUID.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Reisbureau - UPDATEN</title>
</head>
<body>
    <div class="reis">
        <h1>Klant Updaten</h1>
        <h3>Bewerk de gegevens van een willekeurige klant</h3>

        <?php
        // Verbindingsparameters
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

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $klant_id = $_POST['Klant_ID'];
            $naam = $_POST['Naam'];
            $adres = $_POST['Adres'];
            $telefoon = $_POST['Telefoon'];
            $paspoort = $_POST['Paspoort_Nummer'];
           

            // Update statement
            $sql_update = $conn->prepare("UPDATE klanten SET Naam=?, Adres=?, Telefoon=?, Paspoort_Nummer=? WHERE Klant_ID=?");
            $sql_update->bind_param("ssssi", $naam, $adres, $telefoon, $paspoort, $klant_id);


            if ($sql_update->execute() === TRUE) {
                echo "<script>window.location.href = 'Reisbureau.php';</script>"; 
            } else {
                echo "Error updating record: " . $conn->error;
            }

            $sql_update->close();
        }

        // Sluit de verbinding
        $conn->close();
        ?>

        <form class="update" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            Klant ID: <input type="text" name="Klant_ID" required><br>
            Naam: <input type="text" name="Naam"><br>
            Adres: <input type="text" name="Adres"><br>
            Telefoon: <input type="text" name="Telefoon"><br>
            Paspoort Nummer: <input type="text" name="Paspoort_Nummer"><br>
            <input type="submit" value="Updaten">
        </form>
    </div>
</body>
</html>