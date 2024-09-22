<?php
include("php/query.php");
unset($_SESSION['userEmail']);
unset($_SESSION['user_id']);
echo "<script>location.assign('../index.php')
</script>";
?>