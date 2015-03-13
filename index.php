<!--GET /repos/:owner/:repo/contents/:path-->

<html>
  <head>
    <meta charset='utf-8' />
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
  </head>
  <body>
    <div id="content">
      <div id="login">
        <?php
        

        if (!isset($_COOKIE['access_token']) && !isset($_POST['access_token'])) {
            include("login.php");
        }

        if (isset($_POST['access_token'])) {
          $cookie_name = "access_token";
          $cookie_value = $_POST['access_token'];
          setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
          header("Location: index.php");
        }

        if (isset($_COOKIE['access_token'])) {
            include("loggedin.php");
        }

        ?>
      </div>

      
      
    </div>
  </body>
</html>