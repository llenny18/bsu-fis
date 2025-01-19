<?php include("../controller/controller.php"); 


if (isset($_GET['table']) && isset($_GET['id_name']) && isset($_GET['id_value'])) {
    $table = $_GET['table'];
    $id_name = $_GET['id_name'];
    $id_value = $_GET['id_value'];

if (!empty($table) && !empty($id_name) && !empty($id_value)) {
    // Build the SQL query
    $sql = "DELETE FROM $table WHERE $id_name = :id_value";

    // Prepare the statement
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id_value', $id_value, PDO::PARAM_INT);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Record with $id_name = $id_value has been deleted from the table $table.";
    } else {
        echo "Failed to delete the record.";
    }
} else {
    echo "Table name, id_name, or id_value missing.";
}
} else {
echo "Table, id_name, or id_value parameter missing.";
}
?>
