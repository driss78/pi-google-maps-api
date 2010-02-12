<?php

if(isset($_GET['source'])) {
  highlight_file(__FILE__);
  die;
}
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <style type="text/css">
      body {
          margin: 10px;
          text-align: center;
          width: 1000px;
      }
      #global {
          text-align: center;
          margin-left: auto;
          margin-right: auto;
      }
      #route {
          height: 130px;
          overflow-y: auto;
      }
      #map {
          float: left;
      }
      #options {
          width: 350px;
          float: left;
          padding: 0 10px 10px 10px;
          text-align: left;
      }
      .panel {
          background-color: #E8ECF9;
          border: 1px dashed black;
          padding: 5px;
          margin: 10px 0 10px 0;
      }
      .titre {
          text-align: left;
          font-weight: bold;
          margin: 0 0 5px 0;
      }

      .inputTxt {
          width: 100px;
      }
    </style>
    <title>Clustering By GoogleMapsAPI</title>
  </head>
  <body onunload="GUnload()">
    <div id="global">
      <div id="map">
        <?php
          require('../../GoogleMapsAPI.class.php');
          $gmap = new GoogleMapsAPI('ABQIAAAAz7Xbm_WTkGpNU7kyMc1gghS3lcuyex_8Fgp7wndALVTrLQXUHBSpiUS5eUwxq6wOiCz4YtdnlMuOvA');
          /* $gmap->useCache('-clustering',900); */
          $gmap->setDivId('test1');
          $gmap->setCenterByAddress('Nantes France');
          $gmap->setDisplayDirectionFields(true);
	  $gmap->useClusterer('../../res/js/markerclusterer.js');
/* $gmap->useClusterer('../../res/js/markerclusterer_packed.js'); */
          $gmap->setSize(600,600);
          $gmap->setZoom(7);
          $gmap->addXML('../../res/xml/radar_fixe.xml','radars_fixes',
                        new GIcon('../../res/images/markers/radarFixe.png', // image marker
                                  'X','X')); // coords image anchor (x=centered, E=Est, N=Nord etc)

                                  $gmap->generate();
                                  echo $gmap->getGoogleMap();
        ?>
      </div>
    </div>
    <?php
    include('footer.php');
    ?>
  </body>
</html>
