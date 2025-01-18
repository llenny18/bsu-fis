  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <?php
include("../controller/controller.php");
session_destroy();




?>

<script>
        document.addEventListener('DOMContentLoaded', function() {

      Swal.fire({
        icon: 'success',
        title: 'Logout Successful',
        text: 'You have successfully logged out!',
        timer: 2000,
        showConfirmButton: false
      }).then(() => {
        window.location.href = '../'; // Redirect to login page or another page
      });
    

        });

</script>