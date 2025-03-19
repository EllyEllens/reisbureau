<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/CRUID.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Reisbureau - INVOEGEN</title>
</head>
<body>
    <div class="reis">
        <h1>Klant Invoegen</h1>
        <h3>Voeg een nieuwe klant in</h3>

        <form class="insert" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
            Naam: <input type="text" name="Naam"><br>
            Adres: <input type="text" name="Adres"><br>
            Telefoon: <input type="text" name="Telefoon"><br>
            Paspoort Nummer: <input type="text" name="Paspoort_Nummer"><br>
            <input type="submit" value="Submit">
        

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

// Verwerking van het formulier 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $naam = $_POST['Naam'];
    $adres = $_POST['Adres'];
    $telefoon = $_POST['Telefoon'];
    $paspoort = $_POST['Paspoort_Nummer'];
    
    // Insert statement
    $sql = "INSERT INTO klanten (Naam, Adres, Telefoon, Paspoort_Nummer) 
    VALUES ('$naam', '$adres', '$telefoon', '$paspoort')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>window.location.href = 'Reisbureau.php';</script>"; // JavaScript redirect to the homepage
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Sluit de verbinding
$conn->close();

?>
</form>
</div>
</body>
</html>