<?php
include("php/query.php");
unset($_SESSION['adminEmail']);
unset($_SESSION['adminId']);
echo "<script>location.assign('../index.php')
</script>";
?>