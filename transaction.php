<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "bankmanagement";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insertion des données d'échantillon dans la table 'transaction'
$sqlInsertDataTransaction = "INSERT INTO transaction (montant, type, account_id) VALUES 
                        (-287, 'debit', 1),
                        (-1552, 'debit', 2),
                        (835, 'credit', 3),
                        (-248, 'debit', 4),
                        (125, 'credit', 5),
                        (933, 'credit', 6)";

if ($conn->query($sqlInsertDataTransaction)) {
    echo "Data inserted into 'transaction' successfully";
} else {
    echo "Error inserting data into 'transaction': " . $conn->error;
}

// Fermeture de la connexion
$conn->close();

?>
