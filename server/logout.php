<?php
session_start();
unset($_SESSION["s_usuario"]);
session_destroy();
header("Location:../src/app/app.component.html");
?>