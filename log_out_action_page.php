<?php
setcookie("name_info", $name, time() - 3600);
setcookie("surname_info", $surname, time() - 3600);
setcookie("email_info", $email, time() - 3600);

$page = $_POST['the_page'];

header("Location: $page");

?>
