<?php
    include_once 'login_head.php';
?>
<title>Story</title>
<?php
  if (isset($_SESSION["useruid"])){
    include_once "private/login_story_lostofbeautifulmemory.php";
}
  else{
    echo "<span style='color: #DB7093;'><font size='5'><b><p>Please <a href='login.php'>Login</a> or <a href='signup.php'>Sign-up</a>!</p></b></font></span>";
}
?>

<?php
    include_once "footer.php";
?>