<?php
session_start();
session_destroy();
echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
?>