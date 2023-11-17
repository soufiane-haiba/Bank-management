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

// Uncomment the following lines to insert data into 'transaction'
// if ($conn->query($sqlInsertDataTransaction)) {
//     echo "Data inserted into 'transaction' successfully";
// } else {
//     echo "Error inserting data into 'transaction': " . $conn->error;
// }

// Fetch data from the 'transaction' table
// $sqlSelectDataTransaction = "SELECT * FROM transaction";
// $resultTransaction = $conn->query($sqlSelectDataTransaction);

if (isset($_GET['id'])) {
    $clientID = isset($_GET['id']) ? intval($_GET['id']) : 0;
    $fetchAccountsQuery = "SELECT * FROM transaction WHERE  account_id = $clientID";
    $accountsResult = $conn->query($fetchAccountsQuery);
} else {
    // Fetch all accounts if no specific client ID is provided
    $fetchAccountsQuery = "SELECT * FROM account";
    $accountsResult = $conn->query($fetchAccountsQuery);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Transactions</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

h2 {
    color: #333;
    text-align: center;
    margin-top: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.table-header th {
    background-color: #f2f2f2;
    padding: 10px;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 12px;
    text-align: left;
}

tr:hover {
    background-color: #f5f5f5;
}

a {
    text-decoration: none;
    color: #007BFF;
}

a:hover {
    text-decoration: underline;
    color: #0056b3;
}

    </style>
</head>
<body>

    <h2>List of Transactions</h2>
    <table border="1">
        <tr class="table-header">
            <th>ID</th>
            <th>Montant</th>
            <th>Type</th>
            <th>Account ID</th>
        </tr>
        <?php
        // Check if there are any rows in the result
        if ($accountsResult->num_rows > 0) {
            // Output data of each row
            while ($row = $accountsResult->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['id']}</td>";
                echo "<td>{$row['montant']}</td>";
                echo "<td>{$row['type']}</td>";
                echo "<td>{$row['account_id']}</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No data found</td></tr>";
        }
        ?>
    </table>

    <?php
    // Close connection
    $conn->close();
    ?>

</body>
</html>
