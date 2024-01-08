<?php
  session_start();
?>

<!DOCTYPE html>

<html>
<head>

<meta charset="utf-8" />
<meta name="generator" content="pandoc" />
<meta http-equiv="X-UA-Compatible" content="IE=EDGE" />






<script src="site_libs/header-attrs-2.14/header-attrs.js"></script>
<script src="site_libs/jquery-3.6.0/jquery-3.6.0.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link href="site_libs/bootstrap-3.3.5/css/bootstrap.min.css" rel="stylesheet" />
<script src="site_libs/bootstrap-3.3.5/js/bootstrap.min.js"></script>
<script src="site_libs/bootstrap-3.3.5/shim/html5shiv.min.js"></script>
<script src="site_libs/bootstrap-3.3.5/shim/respond.min.js"></script>
<script src="site_libs/navigation-1.1/tabsets.js"></script>
<link href="site_libs/highlightjs-9.12.0/default.css" rel="stylesheet" />
<script src="site_libs/highlightjs-9.12.0/highlight.js"></script>
<link rel="stylesheet" href="css/style.css">
<script src="js/script.js"></script>


<!-- code folding -->
<div class="container-fluid main-container">

<div class="navbar navbar-inverse  navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-bs-toggle="collapse" data-target="#navbar" data-bs-target="#navbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Yi-Hsin Lu</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="thesis.php">Visual4Jazz</a></li>
        <?php
          if (isset($_SESSION["useruid"])){
            echo "<li><a href='login_story.php'>Story</a></li>";
            echo "<li><a href='login_rehab.php'>Rehab</a></li>";
            echo "<li><a href='login_volley.php'>Volleyball</a></li>";
            echo "<li><a href='login_music.php'>Music</a></li>";
          }
        ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <?php
          if (isset($_SESSION["useruid"])){
            echo "<li><a href='login_message.php'>FOR YOU</a></li>";
            echo "<li><a href='includes/logout.inc.php'>Logout</a></li>";
          }
          else {
            echo "<li><a href='signup.php'>Sign-Up</a></li>";
            echo "<li><a href='login.php'>Login</a></li>";
          }
        ?>
      </ul>
    </div><!--/.nav-collapse -->
  </div><!--/.container -->
</div><!--/.navbar -->

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

</head>
<body style="background-color:#FFD9EB;">