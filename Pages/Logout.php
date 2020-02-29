<?php
include "connection.php";
unset($_SESSION['user']);
unset($_SESSION['admin']);
session_unset();
session_regenerate_id(true);
session_unset();
session_destroy();
session_write_close();
setcookie(session_name(),'',0,'/');
header('Location: ../index.php');
?>