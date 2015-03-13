<html>
  <head>
    <meta charset='utf-8' />
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
  </head>
  <body>
  Logging you in...
  <?php

if (isset($_GET['code'])) {
	echo '<script>get_accesstoken(\'' . $_GET['code'] . '\');</script>';
}
//exit;
?>
<div style="display:none;">
<form method="POST" id="oauthparams" action="index.php">
  <input id="accessToken" type="text" name="access_token">
  <input type="submit">
</form>
</div>
</body>
</html>