<html>
    <head>
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
        <?php include 'nav.php'; ?>
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
        <script type="text/javascript"> 
            $(document).ready(function(){
                $('.slider').slider();
            });
        </script>
          <div class="slider">
            <ul class="slides">
              <li>
                  <img src="img/event/event1.jpg"> <!-- random image -->
                <div class="caption center-align">
                  <h3>Dorras</h3>
                  <h5 class="light grey-text text-lighten-3">Setetes darah adalah kehidupan bagi sesama.</h5>
                </div>
              </li>
            </ul>
            <div class="container">
                <div class="row">
                    <br><br>
                    <center><h4 class="red-text text-darken-3">Apa itu dorras</h4></center>
                    <p style="text-align: justify; font-size: 18px;">Dorras merupakan sebuah aplikasi yang membantu user untuk rutin dalam melakukkan donor darah. Dorras memberikan ruang kepada user sebagai komunitas, terkait event Donor darah yang diadakan oleh Dorras, PMI, maupun komunitas yang bergabung bersama Dorras untuk ikut serta dalam event ataupun berpartisipasi mengadakan event.</p>
                    <p style="text-align: justify; font-size: 18px;">Dorras sistem informasi online kami sediakan guna mendukung perkembangan teknologi, menyelaraskan gaya hidup modern sasaran Dorras generasi muda indonesia. Dorras adalah langkah yang cukup efektif untuk menjadikan aksi kemanusiaan sebagai gaya hidup modern.Dorras merupakan kampanye besar bertema kesehatan dan aksi sosial, bertujuan menggerakan aksi nyata membantu sesama.</p>
                </div>
            </div>

              <?php include 'all_event.php' ?>  
              <!-- <?php include 'related_news.php' ?>   -->

            <?php include 'footer.php' ?>
        </div>
    </body>
</html>
<?php 
  require_once ('koneksi.php');
  $domDocument = new DOMDocument('1.0', "UTF-8");

  $markers = $domDocument->createElement('markers');

  $data = oci_parse($conn, "select * from dorras_event");
  oci_execute($data);

  while (($dataxml = oci_fetch_array($data, OCI_ASSOC)) == true) {
      $marker = $domDocument->createElement('marker');
      $id = $domDocument->createAttribute('id');
      $name = $domDocument->createAttribute('name');
      $address = $domDocument->createAttribute('address');
      $lat = $domDocument->createAttribute('lat');
      $lng = $domDocument->createAttribute('lng');
      $type = $domDocument->createAttribute('type');
      

      // Value for the created attribute
      // $name->value = 'attributevalue';
      $id->value = $dataxml['ID_EVENT'];
      $name->value = $dataxml['NAMA_EVENT'];
      $address->value = $dataxml['LOCATION'];
      $lat->value = $dataxml['LAT_LOCATION'];
      $lng->value = $dataxml['LON_LOCATION'];
      $type->value = 'located';


      // Don't forget to append it to the element
      $marker->appendChild($id);
      $marker->appendChild($name);
      $marker->appendChild($address);
      $marker->appendChild($lat);
      $marker->appendChild($lng);
      $marker->appendChild($type);
      $markers->appendChild($marker);
      $domDocument->appendChild($markers);
  }
  

  // Append it to the document itself
  
  

  $domDocument->save("all_marker.xml");
 ?>