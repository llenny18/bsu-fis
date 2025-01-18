<?php
require_once('../controller/controller.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the JSON data from the request
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);

    if (!empty($data['rows'])) {
        try {
            foreach ($data['rows'] as $row) {
                $sql = "UPDATE operational_plan_monitoring_matrix 
                        SET actual_accomplishments = :actual_accomplishments, 
                            variance = :variance, 
                            remarks = :remarks
                        WHERE id = :id";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':actual_accomplishments' => $row['actual_accomplishments'],
                    ':variance' => $row['variance'],
                    ':remarks' => $row['remarks'],
                    ':id' => $row['id'],
                ]);
            }

            echo json_encode(['success' => true]);
        } catch (PDOException $e) {
            echo json_encode(['success' => false, 'error' => $e->getMessage()]);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'No data received.']);
    }
}
?>
