<?php
// It is important for any file that includes this file, to have
// check_login_status.php included at its very top.
$envelope = '<img src="images/note_dead.jpg" width="22" height="12" alt="Notes" title="You have no notifications, Sign Up first">';
$loginLink = '<a href="login.php" alt="Notes" title="Log In here">Log In</a> &nbsp; | &nbsp; <a href="signup1.php" alt="Notes" title="Sign Up here to see internship opportunities">User Sign Up</a> &nbsp; | &nbsp; <a href="signup2.php" alt="Notes" title="Sign Up for company representatives">Company Sign Up</a>';
if($user_ok == true) {
  $sql = "SELECT notescheck FROM users WHERE username='$log_username' LIMIT 1";
  $query = mysqli_query($db_conx, $sql);
  $row = mysqli_fetch_row($query);
  $notescheck = $row[0];
  $sql = "SELECT id FROM notifications WHERE username='$log_username' AND date_time > '$notescheck' LIMIT 1";
  $query = mysqli_query($db_conx, $sql);
  $numrows = mysqli_num_rows($query);
    if ($numrows == 0) {
    $envelope = '<a href="notifications.php" title="interview room"><img src="images/note_still.jpg" width="22" height="12" alt="Notes"></a>';
    } else {
    $envelope = '<a href="notifications.php" title="You have a interviwe call"><img src="images/note_flash.gif" width="22" height="12" alt="Notes"></a>';
  }
    $loginLink = '<a href="user.php?u='.$log_username.'">'.$log_username.'</a> &nbsp; | &nbsp; <a href="logout.php">Log Out</a>';
}
?>
<div id="pageTop">
    <div id="pageTopWrap">
      <div id="pageTopRest">
      <div id="menu1">
        <div>
          <?php echo $envelope; ?> &nbsp; &nbsp; <?php echo $loginLink; ?>
        </div>
      </div>
      <div id="menu2">
      <div>
        <a href="http://www.onlineinternshipfair.com"><img src="images/home.png" alt="home" title="home"></a>
        <div id="memSearch">
          <div id="memSearchInput">
          <input id="searchUsername" type="text" autocomplete="off" onKeyUp="getNames(this.value)" placeholder="Member Search" >
          </div>
          <div id="memSearchResults"></div>
        </div>
        <!--<a href="#">menu1</a>
        <a href="#">menu2</a> -->
      </div>
      </div>
      </div>
    </div>
</div>