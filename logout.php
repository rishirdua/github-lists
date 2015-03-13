
Logging you out...

<?php

if(isset($_COOKIE['access_token'])) {
  setcookie('access_token', '', time() - 36000000, "/");
  //unset($_COOKIE['access_token']);
}

header("Location: index.php");
exit;

?>