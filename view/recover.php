

<link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <?php include("./title.php"); ?>
    
<link href="dist/css/style.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php include("../controller/controller.php"); 


if (isset($_GET['table']) && isset($_GET['id_name']) && isset($_GET['id_value'])) {
    $table = $_GET['table'];
    $id_name = $_GET['id_name'];
    $id_value = $_GET['id_value'];
    $link = $_GET['link'];

if (!empty($table) && !empty($id_name) && !empty($id_value)) {
    // Build the SQL query
    $sql = "UPDATE $table SET status = 'saved'  WHERE $id_name = :id_value";

    // Prepare the statement
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id_value', $id_value, PDO::PARAM_INT);

    // Execute the statement
    if ($stmt->execute()) {
        echo "";
        ?>
    <script>
            document.addEventListener('DOMContentLoaded', function() {
    
          Swal.fire({
            icon: 'success',
            title: 'Recover Successful',
            text: 'Records is successfully Restored',
            timer: 2000,
            showConfirmButton: false
          }).then(() => {
            window.location.href = '<?=  $link?>'; // Redirect to login page or another page
          });
        
    
            });
    
    </script>
            <?php
    } else {
        echo "";
        ?>
<script>
        document.addEventListener('DOMContentLoaded', function() {

      Swal.fire({
        icon: 'error',
        title: 'Recover unsuccessful',
        text: 'Failed to delete the record.',
        timer: 2000,
        showConfirmButton: false
      }).then(() => {
        window.location.href = '<?=  $link?>'; // Redirect to login page or another page
      });
    

        });

</script>
        <?php
    }
} else {
    echo "";
    ?>
    <script>
            document.addEventListener('DOMContentLoaded', function() {
    
          Swal.fire({
            icon: 'error',
            title: 'Recover unsuccessful',
            text: 'Table name, id_name, or id_value missing.',
            timer: 2000,
            showConfirmButton: false
          }).then(() => {
            window.location.href = '<?=  $link?>'; // Redirect to login page or another page
          });
        
    
            });
    
    </script>
            <?php
}
} else {
echo "";
?>
    <script>
            document.addEventListener('DOMContentLoaded', function() {
    
          Swal.fire({
            icon: 'error',
            title: 'Recover unsuccessful',
            text: 'Table, id_name, or id_value parameter missing.',
            timer: 2000,
            showConfirmButton: false
          }).then(() => {
            window.location.href = '<?=  $link?>'; // Redirect to login page or another page
          });
        
    
            });
    
    </script>
            <?php

}
?>
