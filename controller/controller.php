<?php
include("../model/conn.php");



define('ENCRYPTION_KEY', 'aEloMUFGdmJlSnBFUEVhZzRNbkJ5UktGbVJiMUUvcGhqTDJadXFkMVUxaz06OkygJAkjIuZV690rgA7wOFY='); 
define('ENCRYPTION_METHOD', 'AES-256-CBC'); 

function encryptPassword($password) {
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length(ENCRYPTION_METHOD));
    $encrypted = openssl_encrypt($password, ENCRYPTION_METHOD, ENCRYPTION_KEY, 0, $iv);
    return base64_encode($encrypted . '::' . $iv); // Store both encrypted data and IV
}


function decryptPassword($encryptedPassword) {
    list($encrypted_data, $iv) = explode('::', base64_decode($encryptedPassword), 2);
    return openssl_decrypt($encrypted_data, ENCRYPTION_METHOD, ENCRYPTION_KEY, 0, $iv);
}


// Encrypt the password
// $encryptedPassword = encryptPassword($plainPassword);
// echo "Encrypted Password: " . $encryptedPassword . PHP_EOL;

// Decrypt the password
// $decryptedPassword = decryptPassword($encryptedPassword);

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


// Function to fetch and display data from the view
function display_pmm_data($pdo) {
    try {
        // Query to fetch data from the view
        $sql = "SELECT * FROM operational_plan_full GROUP BY unique_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        // Fetch all results
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Check if data is available
        if (!empty($data)) {
            foreach ($data as $row) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['unique_id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['development_area_name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['outcome_name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['strategy_name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['pap_name']) . "</td>";
                echo "<td><a href='view-oppm.php?op_id={$row['unique_id']}' class='btn btn-success'>View Full Data</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='19'>No data found</td></tr>";
        }
    } catch (PDOException $e) {
        echo "<tr><td colspan='19'>Error: " . htmlspecialchars($e->getMessage()) . "</td></tr>";
    }
}

// Function to fetch and display data from the view
function display_pmm_data_matrix($pdo) {
    try {
        // Query to fetch data from the view
        $sql = "SELECT * FROM operational_plan_view group by development_area";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        // Fetch all results
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Check if data is available
        if (!empty($data)) {
            foreach ($data as $row) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['matrix_id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['development_area']) . "</td>";
                echo "<td>" . htmlspecialchars($row['outcome']) . "</td>";
                echo "<td>" . htmlspecialchars($row['strategy']) . "</td>";
                echo "<td><a href='view-oppm-matrix.php?pap_id={$row['matrix_id']}' class='btn btn-success'>View Full Data</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='19'>No data found</td></tr>";
        }
    } catch (PDOException $e) {
        echo "<tr><td colspan='19'>Error: " . htmlspecialchars($e->getMessage()) . "</td></tr>";
    }
}

function get_pmm_data_matrix_count($pdo) {
    try {
        // Query to count the rows grouped by development_area
        $countSql = "SELECT COUNT(*) as row_count FROM (SELECT development_area FROM operational_plan_view GROUP BY development_area) as grouped_data";
        $countStmt = $pdo->prepare($countSql);
        $countStmt->execute();

        // Fetch the count result
        $countResult = $countStmt->fetch(PDO::FETCH_ASSOC);
        return $countResult['row_count'];
    } catch (PDOException $e) {
        // Return 0 in case of an error
        return 0;
    }
}


function get_pmm_data_count($pdo) {
    try {
        // Query to count the rows grouped by development_area
        $countSql = "SELECT COUNT(*) as row_count FROM (SELECT development_area_name FROM operational_plan_full GROUP BY development_area_name) as grouped_data";
        $countStmt = $pdo->prepare($countSql);
        $countStmt->execute();

        // Fetch the count result
        $countResult = $countStmt->fetch(PDO::FETCH_ASSOC);
        return $countResult['row_count'];
    } catch (PDOException $e) {
        // Return 0 in case of an error
        return 0;
    }
}

function get_employee_count($pdo) {
    try {
        // Query to count the rows grouped by development_area
        $countSql = "SELECT COUNT(*) as row_count FROM employee_accounts";
        $countStmt = $pdo->prepare($countSql);
        $countStmt->execute();

        // Fetch the count result
        $countResult = $countStmt->fetch(PDO::FETCH_ASSOC);
        return $countResult['row_count'];
    } catch (PDOException $e) {
        // Return 0 in case of an error
        return 0;
    }
}


function get_admin_count($pdo) {
    try {
        // Query to count the rows grouped by development_area
        $countSql = "SELECT COUNT(*) as row_count FROM admin_accounts";
        $countStmt = $pdo->prepare($countSql);
        $countStmt->execute();

        // Fetch the count result
        $countResult = $countStmt->fetch(PDO::FETCH_ASSOC);
        return $countResult['row_count'];
    } catch (PDOException $e) {
        // Return 0 in case of an error
        return 0;
    }
}

?>