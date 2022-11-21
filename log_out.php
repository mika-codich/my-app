<?php
setcookie("this_user", $email_modal, time() - 3600);
$page = $_POST['the_page'];
//echo "<script>window.location.href = '$this_page'</script>";
header("Location: $page");
echo "<script>alert($page)</script>";
?>
