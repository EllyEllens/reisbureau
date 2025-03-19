<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/Website.css">
    <link rel="stylesheet" href="CSS/CRUID.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Reisbureau - VERWIJDEREN</title>
</head>
<body>
<div class="reis">
    <h1>VERWIJDEREN</h1>
    <h3>Verwijder de gegevens van een willekeurige klant</h3>

    
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

    // Controle of de ID is ingesteld en niet 
    if(isset($_GET['id']) && !empty($_GET['id'])) {
        $klant_id = $_GET['id'];

        // Delete statement
        $sql_delete_customer = "DELETE FROM klanten WHERE Klant_ID = $klant_id";

        // Uitvoering
        if ($conn->query($sql_delete_customer) === TRUE) {
            echo "<script>window.location.href = 'Reisbureau.php';</script>"; 
        } else {
            echo "Fout bij het verwijderen van het record: " . $conn->error;
        }
    } else {
        echo "Geen Customer-ID opgegeven";
    }

    // Sluit de databaseverbinding
    $conn->close();
    ?>

</div>
</body>
</html>