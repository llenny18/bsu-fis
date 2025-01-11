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
                <td>{$employee['first_name']} {$employee['middle_name']} {$employee['last_name']}</td>
               
              
                <td>
                    <a href='e_data.php?e_id={$employee['id']}' class='btn btn-success'>View Full Data</a>
                    <button class='btn btn-danger'>Delete</button>
                </td>
                  </tr>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}



?>