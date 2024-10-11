<?php require_once 'dbConfig.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
// select all columns from the 'available_colors' table
$stmt = $pdo->prepare("SELECT * FROM available_colors");

// Execute the prepared statement
if ($stmt->execute()) {
    // Get each row in the result set if the query is successful.
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch as associative array

    if (!empty($results)) {
        // HTML table with inline CSS
        echo "<table style='border: 1px solid black; border-collapse: collapse;'>";

        // Use the keys from the first row of the results to get the table header.
        echo "<tr style='background-color: #000; color: #ffffff'>";
        foreach (array_keys($results[0]) as $column) {
            echo "<th style='padding: 8px; border: 1px solid black;'>{$column}</th>";
        }
        echo "</tr>";

        // Table rows
        foreach ($results as $row) {
            echo "<tr>";
            foreach ($row as $cell) {
                echo "<td style='padding: 8px; border: 1px solid black;'>{$cell}</td>";
            }
            echo "</tr>";
        }


        echo "</table>";
    } else {
        echo "No data found.";
    }
}
?>
</body>
</html>
