<html>
  <head>
    <meta charset='utf-8' />
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
  </head>
  <body>
    <div id="content">

      <div id="login">
        <?php
        if (!isset($_GET['code']) && !isset($_POST['url'])) {
          echo '<button onclick="oauth_login()">Login</button>';
        }
        else if (isset($_GET['code'])) {
          echo '<script>get_accesstoken(\'' . $_GET['code'] . '\');</script>';
        }
        ?>
      </div>

      <div id="list">
        <!--todo:
        disable by default
        parsing to check for errors
        fallback error handling when user doesnt grant permission
        -->
        <form method="POST">
          <input type="hidden" name="access_token">
          <input type="text" name="url"><br>
          <input type="submit">
        </form>
        <div id="users"></div>
        <?php
        if (isset($_POST['url'])) {
          echo '<script>get_users(\'' . $_POST['url'] . '\', \'' . $_POST['access_token'] . '\');</script>';
        }
        ?>
      </div>
      
    </div>
  </body>
</html>