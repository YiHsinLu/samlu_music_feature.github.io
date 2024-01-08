<?php
    include_once "head.php";
?>
<title>For You!</title>
<br>
<br>
<?php
  if (isset($_SESSION["useruid"])){
    echo "<span style='color: #DB7093;'><h2><b><p>Dear ";
    echo $_SESSION["useruid"];
    echo ",</p></b></h2>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<span style='color: #DB7093;'><h3><b><p>Welcome to my page, it is my honer to share the most precious things for you.</p></b></h3>";
    echo "<p></p>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<span style='color: #DB7093;'><h2 align='right'><b>Best, Yi Hsin</b></h2></span>";
  }
  else{
    echo "<span style='color: #DB7093;'><h2><b><p>Please <a href='login.php'>Login</a> or <a href='signup.php'>Sign-up</a>!</p></b></h2></span>";
  }
?>
<?php
    include_once "footer.php";
?>