<?php
session_start();
session_unset();
session_destroy();

// منع المستخدم من العودة عبر المتصفح
header("Location: log.php");
exit();
?>
