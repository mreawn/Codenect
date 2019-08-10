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
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/new.css"> -->
  </head>
  <body>
    <!-- nav -->
    <nav class="navbar navbar-inverse navbar-fixed-top nav-teach">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <img src="<?php echo base_url(); ?>assets/img/logo2.png" style="position: absolute; width: 60px; height: 60px;margin-top: -13px;">
          <a class="navbar-brand" href="#" style="margin-left: 40px;">CODE<span style="color: #0c8564">NECT</span></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo base_url(); ?>pages/dashboard">Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>pages/profile">Profile</a></li>
            <li><a href="<?php echo base_url(); ?>pages/students">Students</a></li>
            <li><a href="<?php echo base_url(); ?>pages/courses">Courses</a></li>
            <li style="border-top:1px outset #333"><a href="<?php echo base_url(); ?>teacher/logout">Log out</a></li>
          </ul>
          <a href="<?php echo base_url(''); ?>teacher/logout"><button class="btn btn-primary btn-logout">Log out</button></a>
        </div>
      </div>
    </nav>
    <!-- end nav -->
    <div class="container-fluid">
      <div class="row">
        <div id="navbar" class="navbar-collapse collapse">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar sidebar-teach">,
            <div style="padding: 10px;">
              <img id="img-holder" src="<?php echo base_url(); ?>upload/<?php echo $image; ?>" alt="">
            </div>
            <h4 id="name"><?php echo $fname  ?></h4>
            <h5 id="student">Teacher</h5>
            <li><a href="<?php echo base_url(); ?>pages/dashboard" class="sidebar-text">Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>pages/profile" class="sidebar-text">Profile</a></li>
            <li><a href="<?php echo base_url(); ?>pages/students" class="sidebar-text">Students</a></li>
            <li class="active"><a href="<?php echo base_url(); ?>pages/courses" class="sidebar-text">Courses</a></li>
          </ul>
        </div>
      </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <div class="game_form animated fadeInDown">
            <div class="row">
              <div class="c_nov ">
                <h1 style="text-align: center; padding-bottom: 20px;">C Language</h1>
                <div class="row">
                  <div class="col-md-4 img_cnov">
                    <img src="<?php echo base_url(); ?>assets/img/novice_c.png" class="novice_c">
                  </div>
                  <div class="col-md-4 des_cnov">
                    <ul>
                      <li>Pogramming Structure</li>
                      <li>Basic Syntax</li>
                      <li>Data Types</li>
                      <li>Variables</li>
                      <li>Operators</li>
                    </ul>
                  </div>
                  <div class="col-md-4 game_typev">
                  </div>
                </div>
              </div>
              <div class="c_nov">
                <div class="row">
                  <div class="col-md-4 img_cnov">
                    <img src="<?php echo base_url(); ?>assets/img/intermediate_c.png" class="novice_c">
                  </div>
                  <div class="col-md-4 des_cnov">
                  <ul>
                    <li>Decision Making</li>
                    <li>Loops</li>
                    <li>Functions</li>
                    <li>Arrays</li>
                    <li>Pointers</li>
                    <li>Strings</li>
                  </ul>
                </div>
                <div class="col-md-4 game_typev"></div>
              </div>
            </div>
            <div class="c_nov">
              <div class="row">
              <div class="col-md-4 img_cnov">
                <img src="<?php echo base_url(); ?>assets/img/advance_c.png" class="novice_c">
              </div>
              <div class="col-md-4 des_cnov">
                <ul>
                  <li>Structures</li>
                  <li>Bitfields</li>
                  <li>Typedef</li>
                  <li>Input/Output</li>
                  <li>File I/O</li>
                </ul>
              </div>
              <div class="col-md-4 game_typev"></div>
            </div>
          </div>
          <div class="c_nov">
            <h1 style="text-align: center; padding-bottom: 20px; margin-top: 60px;">Java Language</h1>
            <div class="row">
              <div class="col-md-4 img_cnov">
                <img src="<?php echo base_url(); ?>assets/img/novice_java.png" class="novice_c">
              </div>
              <div class="col-md-4 des_cnov"></div>
              <div class="col-md-4 game_typev"></div>
            </div>
          </div>
            <div class="c_nov">
              <div class="row">
                <div class="col-md-4 img_cnov">
                  <img src="<?php echo base_url(); ?>assets/img/intermediate_java.png" class="novice_c">
                </div>
                <div class="col-md-4 des_cnov"></div>
                <div class="col-md-4 game_typev"></div>
              </div>
            </div>
          <div class="c_nov">
            <div class="row">
              <div class="col-md-4 img_cnov">
            <img src="<?php echo base_url(); ?>assets/img/advance_java.png" class="novice_c">
          </div>
          <div class="col-md-4 des_cnov"></div>
            <div class="col-md-4 game_typev"></div>
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
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/main.js"></script>
  <script src="<?php echo base_url(); ?>assets/bootstrap/jquery.js"></script>
  <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/nicescroll.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js"></script>
  </body>
</html>
