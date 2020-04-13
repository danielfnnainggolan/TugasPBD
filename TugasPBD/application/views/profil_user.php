<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Web Gis</title>
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
  <!-- Bootstrap -->
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  <link href="<?=base_url()?>assets/css/BootSideMenu.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/css/zenburn.css" rel="stylesheet">

  <link href="<?=base_url()?>assets/css/login.css" rel="stylesheet">



<style type="text/css">
  .user{
    padding:5px;
    margin-bottom: 5px;
  }
	#map { height: 480px; }

  .center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}
  html,
body {
  margin: 0;
  height: 100%;
}
body {
  min-height: 100%;
}
#header-BG {
  height: 100%;
  background: #4f5a5e;
}
#outPopUp {
  position: absolute;
  width: 300px;
  height: 200px;
  z-index: 15;
  top: 50%;
  left: 50%;
  margin: -100px 0 0 -150px;

}
</style>
</head>
<body>


  <!--Test -->
  <div id="test">
    <br><img src="<?=base_url()?>assets/images/logo.png" width:"80px" height="120px" class="center"><br>
    <div class="list-group">
      <h2><a href="<?=base_url()?>page/welcome" class="list-group-item active">Home </h2></a>
      <h2><?php

          $tipe_user = $this->session->userdata('tipe_user');
      if($tipe_user == "user") { echo '<a href="" class="list-group-item">Profil User';} elseif($tipe_user == "admin"){echo '<a href="'.base_url().'page/data_user" class="list-group-item">Data User';} elseif($tipe_user == "operator"){echo '<a href="#" class="list-group-item">Data Markers';}?></h2></a>
      <h2><a href="<?=base_url()?>login/aksi_logout" class="list-group-item">Logout</h2></a>

    </div>



  </div>
  <!--/Test -->


  <div id="header-BG">
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <!--Normale contenuto di pagina-->
  <div class="container">

    <form class="well form-horizontal" action="<?=base_url()?>index.php/user/updateUser" method="POST">
<fieldset>

<!-- Form Name -->
<legend><center><h2><b>User Profile</b></h2></center></legend><br>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label">Username</label>
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="username" id="username" placeholder="Username" class="form-control"  type="text" required>
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label">Nama Lengkap</label>
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="nama" id="nama" placeholder="Nama Lengkap" class="form-control"  type="text" required>
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >Email</label>
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="email" id="email" placeholder="Last Name" class="form-control"  type="text" required>
    </div>
  </div>
</div>



<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4"><br>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="submit" id="submit" class="btn btn-warning" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php if(!empty($email) && !empty($email) && !empty($username)) {echo "UPDATE";} else {echo"SUBMIT";} ?><span class="glyphicon glyphicon-send"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
  </div>
</div>

</fieldset>
</form>
</div>
    </div><!-- /.container -->
</div>

  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="<?=base_url()?>assets/js/BootSideMenu.js"></script>

  <script type="text/javascript">
    $('#test').BootSideMenu({side:"left", autoClose:false});

  </script>

  <?php
    if(!empty($username)) {
      echo '<script>document.getElementById("username").value = "'.$username.'";</script>';
    }
    if(!empty($nama)) {
      echo '<script>document.getElementById("nama").value = "'.$nama.'";</script>';
    }
    if(!empty($email)) {
      echo '<script>document.getElementById("email").value = "'.$email.'";</script>';
    }


  ?>






</body>
</html>
