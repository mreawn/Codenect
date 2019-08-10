<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url(); ?>assets/img/logo3.ico">
    <title>CODENECT</title>
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/bootstrap/dashboard.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet">

    <input type="hidden" value="<?php echo base_url(); ?>" id="baseurl"/>

  </head>
  <body>
    <!-- navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <img src="<?php echo base_url(); ?>assets/img/logo3.png" style="position: absolute; width: 40px; height: 40px;margin-top: 5px;">
          <a class="navbar-brand" href="#" style="margin-left: 40px;">CODE<span style="color: #0c8564">NECT</span></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="student_dashboard.php">Dashboard</a></li>
            <li><a href="student_profile.php">Profile</a></li>
            <li><a href="student_games.php">Games</a></li>
            <li style="border-top:1px outset #333"><a href="student/logout">Log out</a></li>
          </ul>
          <a href="<?php echo base_url(); ?>student/logout"><button class="btn btn-primary btn-logout">Log out</button></a>
        </div>
      </div>
    </nav>
    <!-- end navbar -->

    <div class="container-fluid">
      <div class="row">
        <div id="navbar" class="navbar-collapse collapse">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <div style="padding: 10px;">
              <img id="img-holder" src="<?php echo base_url(); ?>upload/<?php echo $image; ?>" alt="">
            </div>
            <h4 id="name"><?php echo $fname  ?></h4>
            <h5 id="student">Student</h5>
            <li><a href="<?php echo base_url(); ?>pages/dashboard" class="sidebar-text">Dasboard</a></li>
            <li><a href="<?php echo base_url(); ?>pages/profile"class="sidebar-text">Profile</a></li>
            <li class="active"><a href="<?php echo base_url(''); ?>pages/courses" class="sidebar-text">Courses</a></li>
          </ul>
        </div>
      </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <div class="game_form animated fadeInDown">
            <div class="row">
            <div class="col-md-4">
              <div class="game1">
                <img src="<?php echo base_url(); ?>assets/img/novice_c.png" class="img_game">
                <ul class="game-desc">
                  <li>Programming Structure</li>
                  <li>Basic Syntax</li>
                  <li>Data Types</li>
                  <li>Variables</li>
                  <li>Operators</li>
                </ul>
                <a href="<?php echo base_url(); ?>pages/c_novice"><button  class="btn btn-primary img_div" >PLAY</button></a>
              </div>
            </div>
            <div class="col-md-4">
              <div class="game1">
                <img src="<?php echo base_url(); ?>assets/img/intermediate_c.png" class="img_game">
                <ul class="game-desc">
                  <li>Conditional</li>
                  <li>Loops</li>
                  <li>Arrays</li>
                  <li>Pointers</li>
                  <li>Strings</li>
                </ul>
                <a href="<?php echo base_url(); ?>pages/c_intermediate"><button class="img_div btn btn-primary">PLAY</button></a>
              </div>
            </div>
            <div class="col-md-4">
              <div class="game1">
                <img src="<?php echo base_url(); ?>assets/img/advance_c.png" class="img_game">
                <ul class="game-desc">
                  <li>Structures</li>
                  <li>Bitfields</li>
                  <li>Typedef</li>
                  <li>Functions</li>
                </ul>
                <a href="<?php echo base_url(); ?>pages/c_advance"><button class="btn btn-primary img_div" >PLAY</button></a>
              </div>
            </div>
            <div class="col-md-4">
              <div class="game1">
                <img src="<?php echo base_url(); ?>assets/img/novice_java.png" class="img_game">
                <ul class="game-desc">
                  <li>Programming Structure</li>
                  <li>Basic Syntax</li>
                  <li>Data Types</li>
                  <li>Variables</li>
                  <li>Operators</li>
                </ul>
                <a href="<?php echo base_url(); ?>pages/java_novice"><button class="btn btn-primary img_div" >PLAY</button></a>
              </div>
            </div>
            <div class="col-md-4">
              <div class="game1">
                <img src="<?php echo base_url(); ?>assets/img/intermediate_java.png" class="img_game">
                <ul class="game-desc">
                  <li>Programming Structure</li>
                  <li>Basic Syntax</li>
                  <li>Data Types</li>
                  <li>Variables</li>
                  <li>Operators</li>
                </ul>
                <a href="<?php echo base_url(); ?>pages/java_intermediate"><button class="btn btn-primary img_div" >PLAY</button></a>
              </div>
            </div>
            <div class="col-md-4">
              <div class="game1">
                <img src="<?php echo base_url(); ?>assets/img/advance_java.png" class="img_game">
                <ul class="game-desc">
                  <li>Programming Structure</li>
                  <li>Basic Syntax</li>
                  <li>Data Types</li>
                  <li>Variables</li>
                  <li>Operators</li>
                </ul>
                <a href="<?php echo base_url(); ?>pages/java_advance"><button class="btn btn-primary img_div" >PLAY</button></a>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    <footer>
      <p style="color: white; text-align: center; margin-top: 10px;">© 2018 CODE<span style="color:#0c8564 ">NECT</span></p>
    </footer>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/main.js"></script>
  <script src="<?php echo base_url(); ?>assets/bootstrap/jquery.js"></script>
  <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript">
  var base_url = $('#baseurl').val();

  check_progress();

  function check_progress() {
    $.ajax({
        url: base_url + "index.php/student/check_progress",
        method: 'POST',
        success:function(result) {
          // var d = JSON.parse(result);
          // $.each(d, function(k, v) {
          // });
          if (result == '[]') {
            insert_difficulty();
          }
        }
    });
  }

  function insert_difficulty() {
    $.ajax({
        url: base_url + "index.php/student/insert_progress",
        method: 'POST',
        success:function(result) {
          // var d = JSON.parse(result);
          // $.each(d, function(k, v) {
          // });
        }
    });
  }
  </script>
  </body>
</html>
