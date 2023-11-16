<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "bankmanagement";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert sample data into the 'client' table
$sqlInsertDataClient = "INSERT INTO client (nom, prenom, datenaissance, nationalite, genre) VALUES 
                    ('Abdelghafour', 'Belkhoukh', '1990/01/01', 'Moroccan', 'male'),
                    ('Ahmed', 'Nouaoui', '1985/12/15', 'Moroccan', 'male'),
                    ('abdessalam', 'Houas', '1985/12/15', 'Moroccan', 'male'),
                    ('Mostafa', 'Labdaoui', '1985/12/15', 'Moroccan', 'male'),
                    ('Yassine', 'Haiba', '1985/12/15', 'Moroccan', 'male'),
                    ('Alae', 'Rami', '1985/12/15', 'Canadian', 'male')";

// if ($conn->query($sqlInsertDataClient)) {
//     echo "Data inserted into 'client' successfully";
// } else {
//     echo "Error inserting data into 'client': " . $conn->error;
// }


// Close connection
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    


</body>
</html>
