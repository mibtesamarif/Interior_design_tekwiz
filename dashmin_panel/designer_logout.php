<?php
include("php/query.php");
unset($_SESSION['designerEmail']);
unset($_SESSION['designerId']);
echo "<script>location.assign('../index.php')
</script>";
?>