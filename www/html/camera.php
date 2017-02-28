<?php
/*
# Copyright (c) 2016 mindsensors.com
# 
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License version 2 as
# published by the Free Software Foundation.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.    See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with this program; if not, write to the Free Software
# Foundation, Inc., 675 Mass Ave, Cambridge, MA 02139, USA.
#
#mindsensors.com invests time and resources providing this open source code, 
#please support mindsensors.com  by purchasing products from mindsensors.com!
#Learn more product option visit us @  http://www.mindsensors.com/
#
# History:
# Date         Author          Comments
# July 2016    Roman Bohuk     Initial Authoring 
*/

include "api/config.php";

if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: ./login.php');
    exit();
}

?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="theme-color" content="#DD4B39">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Camera | PiStorms Web Interface</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="assets/bootstrap.min.css">  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/font-awesome.min.css">
  <link rel="stylesheet" href="assets/AdminLTE.min.css">
  <link rel="stylesheet" href="assets/pnotify.min.css">
  <link rel="stylesheet" href="assets/skin-red.min.css">
  <link rel="stylesheet" href="assets/jquery.minicolors.css">
  <link rel="stylesheet" href="assets/slider.css">
  <link href="assets/bootstrap-toggle.min.css" rel="stylesheet">
  <style>
    img {max-width:100%}
    .btn-sq {
      width: 50px !important;
      height: 50px !important;
      font-size: 24px;
    }
    .btn-settings {
        margin: 5px;
    }
    .front {
        background: url(assets/top.png) !important;
        background-size: contain !important;
        opacity: 1 !important;
        z-score: 100 !important;
        height: 85% !important;
        width: 85% !important;
        margin-left: -54.4px !important;
        margin-top: -54.4px !important;
    }
    .back {
        background: url(assets/bottom.png) !important;
        background-size: contain !important;
        opacity: 1 !important;
        z-score: 100 !important;
    }
    .nipple {
        opacity: 1 !important;
    }
  </style>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <a href="./" class="logo">
      <span class="logo-mini"><b>PS</b></span>
      <span class="logo-lg"><b>PiStorms</b> Web</span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li>
            <a href="./logout.php">Logout&nbsp;&nbsp;<i class="fa fa-sign-out"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <?php
    include_once("./components/nav.php");
  ?>

  <div class="content-wrapper">
    <section class="content">

      <div class="row">
        
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="box box-danger">
           <img id="imgCamera" src="image.jpg"/>
           <button id="btnSnap">Take Pic!</button>
          </div>
        </div>     
      </div>

    </section>
  </div>

  <?php include_once("./components/footer.php"); ?>

</div>

<script src="assets/jquery.min.js"></script>
<script src="assets/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/app.min.js"></script>
<script type="text/javascript" src="assets/pnotify.min.js"></script>
<script type="text/javascript" src="assets/jquery.slimscroll.min.js"></script>
<script type="text/javascript" src="assets/bootstrap-slider.min.js"></script>
<script type="text/javascript" src="assets/jquery.minicolors.min.js"></script>
<script src="assets/bootstrap-toggle.min.js"></script>
<script>
var api = "http://<?=$_SERVER['SERVER_NAME']?>:3141/";

  $(document).on("click", "#btnSnap", function() {
    $.ajax({
        type: "POST",
        url: api+"camerastill",
        success: function(data) {
            $("#imgCamera").attr('src', 'image.jpg' + '?_=' + new Date().getTime());
        }
    });
});
</script>

</body>
</html>
