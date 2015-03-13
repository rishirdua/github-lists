<button onclick="logout();">Logout</button>
Enter the repo

<div id="list">
  <!--todo:
    disable by default
    parsing to check for errors
    fallback error handling when user doesnt grant permission
  -->
  
  <div id="main"></div>
  <?php
  if (isset($_COOKIE['access_token'])) {
     
     if (!isset($_POST['users_file'])) {
      echo '<form id="users_form" method="post">';
      echo '<input type="text" name="users_file" id="users_file"><input type="submit" value="load users">';
      echo '</form>';
      //
    }

    else if (isset($_POST['users_file'])) {
      echo '<script>get_users(\'' . $_POST['users_file'] . '\', \'' . $_COOKIE['access_token'] . '\');</script>';
      echo '<form id="users_form" method="post">';
      echo '<select id ="users" name="users" multiple></select>';
      echo '<button onclick="follow(\''.$_COOKIE['access_token'].'\'); return false;">Follow</button>';
      echo '<button onclick="unfollow(\''.$_COOKIE['access_token'].'\'); return false;">Unfollow</button>';
      echo '</form>';
    }
}


  ?>
</div>