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

// Uncomment the following lines to insert data into 'account'
// if ($conn->query($sqlInsertDataAccount)) {
//     echo "Data inserted into 'account' successfully";
// } else {
//     echo "Error inserting data into 'account': " . $conn->error;
// }

// Fetch data from the 'account' table
// $sqlSelectDataAccount = "SELECT * FROM account";
// $resultAccount = $conn->query($sqlSelectDataAccount);


// Fetch accounts based on client ID if provided in the URL
if (isset($_GET['id'])) {
    $clientID = isset($_GET['id']) ? intval($_GET['id']) : 0;
    $fetchAccountsQuery = "SELECT * FROM account WHERE client_id = $clientID";
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
    <title>List of Accounts</title>
    <link rel="stylesheet" href="style.css">

    <style>
*{
    padding: 0;
    margin: 0;
}
/* account html */

body {
    font-family: Arial, sans-serif;
}

.accountContainer {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.accH2 {
    color: #333;
}

.tableAccount {
    margin-top: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

.table-header th {
    background-color: #f2f2f2;
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

    </style>
</head>
<body>

   

<div class="accountContainer" >
    <h2 class="accH2">List of Accounts</h2>


    <div class="tableAccount">
        <table>
            <tr class="table-header">
                <th>ID</th>
                <th>Balance</th>
                <th>Devise</th>
                <th>Client ID</th>
                <th>Action</th>
            </tr>

    

        <?php
        // Check if there are any rows in the result
        if ($accountsResult->num_rows > 0) {
            // Output data of each row
            while ($row = $accountsResult->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['id']}</td>";
                echo "<td>{$row['balance']}</td>";
                echo "<td>{$row['devise']}</td>";
                echo "<td>{$row['client_id']}</td>";
                echo "<td><a href='transaction.php?id={$row['id']}'>Transaction</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No data found</td></tr>";
        }
        ?>
        </table>

    <!-- <?php
    // Close connection
    $conn->close();
    ?> -->
    </div>
</div>

</body>
</html>
