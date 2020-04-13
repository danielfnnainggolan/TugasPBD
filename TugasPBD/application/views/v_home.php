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

  <link href="<?=base_url()?>assets/css/BootSideMenu.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/css/zenburn.css" rel="stylesheet">
	<link href="<?=base_url()?>assets/leaflet/leaflet.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/css/login.css" rel="stylesheet">
	  <script src="<?=base_url()?>assets/leaflet/leaflet.js"></script>


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


#header-BG {
  height: 100%;
  background: #4f5a5e;
}

html,
body {
margin: 0;
height: 100%;
}
body {
min-height: 100%;
}
</style>
</head>
<body>


  <!--Test -->
  <div id="test">
    <br><img src="<?=base_url()?>assets/images/logo.png" width:"80px" height="120px" class="center"><br>
    <div class="list-group">
      <h2><a href="#" class="list-group-item active">Home </h2></a>
      <h2><?php

          $tipe_user = $this->session->userdata('tipe_user');
      if($tipe_user == "user") { echo '<a href="'.base_url().'page/profil_user" class="list-group-item">Profil User';} elseif($tipe_user == "admin"){echo '<a href="'.base_url().'page/data_user" class="list-group-item">Data User';} elseif($tipe_user == "operator"){echo '<a href="#" class="list-group-item">Data Markers';}?></h2></a>
      <h2><a href="<?=base_url()?>login/aksi_logout" class="list-group-item">Logout</h2></a>

    </div>



  </div>
  <!--/Test -->


  <div id="header-BG">
    <br><br><br><br><br>
  <div class="container">
    <div class="row">

          <h1>Web GIS</h1>
          <br><br><br><br>
		 </div>


	    <div class="row">

	          <div id="map"></div>
			 </div>
	    </div>


</div>
  <!--Normale contenuto di pagina-->

  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="<?=base_url()?>assets/js/BootSideMenu.js"></script>

  <script type="text/javascript">
    $('#test').BootSideMenu({side:"left", autoClose:false});
		var map = L.map('map').setView([-7.053250, 110.423270], 13);
    var base_url = "<?=base_url()?>";
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    var myFeatureGroup = L.featureGroup().addTo(map).on("click", groupClick);



    var bangunanMarker;
    var icon_bangunan= L.icon({
      iconUrl : base_url+'assets/images/restaurant.png',
       iconSize : [30,30]
    });

      $.getJSON("<?=base_url()?>Bangunan/bangunan_json", function(data){
         $.each(data, function(i, field){
           var v_lat=parseFloat(data[i].bangunan_lat);
            var v_long=parseFloat(data[i].bangunan_long);
            var bangunan_gambar = data[i].bangunan_gambar;

            var detailBangunan = "<div align='center'>"+data[i].bangunan_nama+"<br><br><img src='<?=base_url()?>assets/images/"+bangunan_gambar+"' width='230px' height='180px'>"
                                  +"<br><br><a href='<?=base_url()?>Bangunan/deleteTempat/"+data[i].bangunan_id+"'>Delete</a></div>";
            bangunanMarker = L.marker([v_lat,v_long],{icon:icon_bangunan}).addTo(myFeatureGroup)
                 .bindPopup(detailBangunan);
            bangunanMarker.id = data[i].bangunan_id;


         });
       });


       function groupClick(event) {
          // alert("Clicked on marker"+event.layer.id);
       }

       var Marker;
       map.on('click', function(e){
      if(Marker != null) {
        map.removeLayer(Marker);

      }
       var coord = e.latlng;
       var lat = coord.lat;
       var lng = coord.lng;
       var tambah_marker ="<h4>"+
          "<div align='center'>Add Marker</div></h4><br>Latitude : "+lat+"<br>Longitude : "+lng+"<br><br>"
          +"<form action=\"<?=base_url()?>index.php/bangunan/tambahTempat\" method=\"POST\" enctype=\"multipart/form-data\"> Nama Tempat : <input type=\"text\" id=\"nama_tempat\" name=\"nama_tempat\" required> <br><br>"
          +"Upload Gambar <br></label><input type=\"file\" id=\"gambar\" name=\"gambar\" width='50%' required><br><br>"
          +"<input type='text' id='latitude' name='latitude' value="+lat+"><input type='text' id='longitude' name='longitude' value="+lng+"><div align='center'><input type=\"submit\" value=\"Submit\"></div></form>";

       Marker = L.marker([lat,lng],{icon:icon_bangunan}).addTo(map).bindPopup(tambah_marker, {
         maxWidth : 260,
         closeButton : true,
         offset : L.point(0, -20)
       }).openPopup();




       console.log("You clicked the map at latitude: " + lat + " and longitude: " + lng + "Leaflet ID is : " + Marker._leaflet_id);


    });

        $.getJSON("<?=base_url()?>assets/geojson/map.geojson", function(data){
                geoLayer = L.geoJson(data, {
                    style: function(feature) {
                      var kategori = feature.properties.kategori;
                      if(kategori==1) { //lahan
                        return {
                                  fillOpacity: 0.8,
                                  weight: 1,
                                  opacity: 1,
                                  color:"#34eb34"
                        };


                      }else if(kategori==2) {
                        return { //permukiman
                                  fillOpacity: 0.8,
                                  weight: 1,
                                  opacity: 1,
                                  color:"#e88243"
                        };


                      } else { //lahan
                        return {
                                  fillOpacity: 0.8,
                                  weight: 1,
                                  opacity: 1,
                                  color:"#f44242"
                        };


                      }


            },

            onEachFeature: function(feature, layer) {
              var kode = feature.properties.kode;
                var kategori = feature.properties.kategori;
              var info_bidang ="<h4> Info Bidang</h4>"
                            + "<a href='<?=base_url()?>home/bidang_detail/"+kode+"'><img src='<?=base_url()?>assets/images/kategori/"+kategori+".jpg' width='230px' height='180px'><br>"
                            +"<div style='width:100%;text-align:center;text-size:30px;'>DETAIL</a>";
              layer.bindPopup(info_bidang, {
                maxWidth : 260,
                closeButton : true,
                offset : L.point(0, -20)
              });

              layer.on('click', function() {
                layer.openPopup();
              });
            }


          }).addTo(map);
        });

  </script>





</body>
</html>
