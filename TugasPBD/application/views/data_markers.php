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
  background: red;
}
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
      if($tipe_user == "user") { echo '<a href="<a href="'.base_url().'page/profil_user" class="list-group-item">Profil User';} elseif($tipe_user == "admin"){echo '<a href="'.base_url().'page/data_user" class="list-group-item">Data User';} elseif($tipe_user == "operator"){echo '<a href="'.base_url().'page/data_markers" class="list-group-item">Data Markers';}?></h2></a>
      <h2><a href="<?=base_url()?>login/aksi_logout" class="list-group-item">Logout</h2></a>

    </div>



  </div>
  <!--/Test -->




  <!--Normale contenuto di pagina-->
  <div class="container">
    <div class="row">
          <br><br><br>
          <h2><center>Data User</center></h2><br><br>
		 </div>


	    <div class="row">

        <div class="card-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>ID</th>
              <th>Nama Bangunan</th>
              <th>Latitude</th>
              <th>Longitude</th>
              <th>Gambar</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($bangunan as $bangunans): ?>
            <tr>
              <td><?php echo $bangunans->bangunan_id?></td>
              <td><?php echo $bangunans->bangunan_nama?></td>
              <td><?php echo $bangunans->bangunan_lat?></td>
              <td><?php echo $bangunans->bangunan_long?></td>
              <td><img src="<?php echo base_url();?>assets/images/<?php echo $bangunans->bangunan_gambar?>" width:"80px" height="120px" class="center"></td>
              <td width="90px"><a href="<?=base_url()?>page/editUser/<?php echo $bangunans->bangunan_id?>"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></td>
            </tr>
          <?php endforeach;?>
        </tbody>
          </table>
        </div>
      


        <!-- /.card-body -->
      </div></div>
			 </div>
	    </div>


  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="<?=base_url()?>assets/js/BootSideMenu.js"></script>

  <script type="text/javascript">
    $('#test').BootSideMenu({side:"left", autoClose:false});

  </script>





</body>
</html>
