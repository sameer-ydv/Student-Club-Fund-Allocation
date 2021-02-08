<?php
    setcookie("admin_loggedIn", "", time() - 3600,"/");
    header("Location: http://localhost/ST3PROJECT/views/index.html");
?>