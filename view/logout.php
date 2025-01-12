<?php
include("../controller/controller.php");
session_destroy();

echo "<script>alert('Logout Success!'); window.location.href='login.php'</script>";



?>