<?php 
session_start();
session_destroy();
header("Location: /student002/shop/backend/index.php");
?>