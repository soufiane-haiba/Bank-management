<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "bankmanagement";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insertion des données d'échantillon dans la table 'account'
$sqlInsertDataAccount = "INSERT INTO account (balance, devise, client_id) VALUES 
                        (1000, 'USD', 1),
                        (1500, 'EUR', 2),
                        (800, 'CAD', 3),
                        (2000, 'USD', 4),
                        (1200, 'EUR', 5),
                        (500, 'CAD', 6)";

if ($conn->query($sqlInsertDataAccount)) {
    echo "Data inserted into 'account' successfully";
} else {
    echo "Error inserting data into 'account': " . $conn->error;
}

// Fermeture de la connexion
$conn->close();

?>
