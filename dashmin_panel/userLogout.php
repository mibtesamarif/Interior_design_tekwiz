<?php
include("php/query.php");
// session_start();
unset($_SESSION['userEmail']);
unset($_SESSION['user_id']);
// unset($_SESSION['userEmail']);
echo "<script>location.assign('../index.php')
</script>";
?>