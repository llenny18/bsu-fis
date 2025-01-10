<?php
include("../model/conn.php");

// Function to fetch and display admin accounts
function display_admin_accounts($pdo) {
    try {
        // Query to fetch admin accounts
        $adminQuery = "SELECT id, full_name, username, password_hashed FROM admin_accounts";
        $stmtAdmin = $pdo->prepare($adminQuery);
        $stmtAdmin->execute();
        $adminResults = $stmtAdmin->fetchAll(PDO::FETCH_ASSOC);

        
        // Display admin accounts
        foreach ($adminResults as $admin) {
            echo "<tr>
                    <td>{$admin['id']}</td>
                    <td>{$admin['full_name']}</td>
                    <td>{$admin['username']}</td>
                    <td>{$admin['password_hashed']}</td>
                    <td><button class='btn btn-success'>Edit</button><button class='btn btn-primary'>Delete</button></td>
                  </tr>";
        }

       
        
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Function to fetch and display employee accounts
function display_employee_accounts($pdo) {
    try {
        // Query to fetch employee accounts
        $employeeQuery = "SELECT * FROM employee_accounts";
        $stmtEmployee = $pdo->prepare($employeeQuery);
        $stmtEmployee->execute();
        $employeeResults = $stmtEmployee->fetchAll(PDO::FETCH_ASSOC);

        // Display employee accounts
        foreach ($employeeResults as $employee) {
            echo "<tr>
                    <td>{$employee['id']}</td>
                <td>{$employee['username']}</td>
                <td>{$employee['password_hashed']}</td>
                <td>{$employee['first_name']}</td>
                <td>{$employee['middle_name']}</td>
                <td>{$employee['last_name']}</td>
                <td>{$employee['sex']}</td>
                <td>{$employee['age']}</td>
                <td>{$employee['date_of_birth']}</td>
                <td>{$employee['place_of_origin']}</td>
                <td>{$employee['civil_status']}</td>
                <td>{$employee['contact_number']}</td>
                <td>{$employee['email']}</td>
                <td>
                    <button class='btn btn-success'>Edit</button>
                    <button class='btn btn-danger'>Delete</button>
                </td>
                  </tr>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}



?>