<?php
session_start();
if (isset($_SESSION['idrole']) && isset($_SESSION['iduser'])) {
  if (($_SESSION['idrole'])==1) {
    header("Location: admin/index.php");
  }
  $iduser = $_SESSION['iduser'];
?>
<!DOCTYPE html>
  <html>
    <head>
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
        <script type="text/javascript" src="js/sideNav.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $(".button-collapse").sideNav();
            });
        </script>
        <div class="navbar">
            <nav class="red darken-4">
                <div class="nav-wrapper ">
                    <ul id="dropdown1" class="dropdown-content">
                        <li><a href="profile.php">Profile</a></li>
                        <li><a href="#!">Score</a></li>
                        <li class="divider"></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                    <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                    <ul class="left hide-on-med-and-down">
                        <li><a href="home.php">Home</a></li>
                        <li><a href="event.php">Event</a></li>
                        <li><a href="berita.php">News</a></li>
                        <li><a href="faq.php">FaQ</a></li>
                        <li><a href="about.php">About Us</a></li>
                    </ul>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="#!" ><i class="material-icons right">notifications</i></a></li>
                        <li><a class="dropdown-button" href="#!" data-activates="dropdown1"><i class="material-icons right">perm_identity</i></a></li>
                    </ul>
                    
                    <ul class="side-nav" id="mobile-demo">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="event.html">Event</a></li>
                        <li><a href="berita.php">Berita</a></li>
                        <li><a href="faq.php">FaQ</a></li>
                        <li><a href="collapsible.html">About Us</a></li>
                    </ul>
                </div>
            </nav>
        </div>
<?php 
  } else {
    header("location:login.php");
  } 
?>