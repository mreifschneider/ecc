<?php
 session_start();
 session_destroy();
 header("Location: http://cs470.comoj.com/index.php");
exit;
?>