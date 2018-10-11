<html>
    <head>
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <script type="text/javascript" src="js/jquery.js"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <style>
      
      #map {
        height: 40%;
      }
      
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
    </head>
    <body>
        <?php include 'nav.php'; ?>
        <div class="container">
            <?php 
            require_once('koneksi.php');
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $query = oci_parse($conn, "select * from dorras_event where ID_EVENT = '". $id . "'");
                oci_execute($query);
                while (($data = oci_fetch_array($query, OCI_ASSOC)) != false) {
             ?>
            <center><h4 class="red-text text-darken-3"><?php echo "$data[NAMA_EVENT]";?></h4></center>
            <div class="row">
                <div class="col s12">
                    <center><img class="responsive-img z-depth-3" src="img/event/<?php echo "$data[IMG_EVENT]";?>"></center>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <p class="flow-text"><?php echo "$data[DESC_EVENT]"; ?></p>
                </div>
            </div>

            <div class="row">
                <div class="col s12">
                    <p class="flow-text">Acara ini bertempat di <?php echo "$data[LOCATION]"; ?></p>
                    <p class="flow-text">Tanggal <?php echo "$data[START_EVENT]"; ?> sampai <?php echo "$data[END_EVENT]"; ?></p>
                </div>
            </div>
            <div class="row">
                <div class="row">
                    <form method="post">
                        <input type="hidden" name="idevent" value="<?php echo $id; ?>">
                        <input type="hidden" name="iduser" value="<?php echo $iduser; ?>">
                        <center><button type="submit" name="take" class="waves-effect waves-light btn red darken-3">Take Event</button></center>
                    </form>
                    
                </div>
            </div>
        </div>
        <?php }} ?>
        
        <div class="row">
            <div class="container">
            <div class="col s12" >
                <div id="map" onclick="scrollOn()" onmouseleave="scrolloff()"></div>
                <script type="text/javascript">
                    function scrollOn() {
                        $('#map').removeClass('scrolloff'); // set the pointer events true on click

                    }

                    function scrollOff() {
                        $('#map').addClass('scrolloff'); 

                    }
                </script>
                <script>
                    var customLabel = {
                        located: {
                            label: 'L'
                        },
                        bar: {
                            label: 'B'
                        }
                    };
                      
                    function initMap() {
                        var map = new google.maps.Map(document.getElementById('map'), {
                            center: new google.maps.LatLng(-2.749054, 119.3494921),
                            zoom: 5,
                            scrollwheel: false

                        });
                        var infoWindow = new google.maps.InfoWindow;

                        // Change this depending on the name of your PHP or XML file
                        downloadUrl('marker.xml', function(data) {
                            var xml = data.responseXML;
                            var markers = xml.documentElement.getElementsByTagName('marker');
                            Array.prototype.forEach.call(markers, function(markerElem) {
                                var name = markerElem.getAttribute('name');
                                var address = markerElem.getAttribute('address');
                                var type = markerElem.getAttribute('type');
                                var point = new google.maps.LatLng(
                                    parseFloat(markerElem.getAttribute('lat')),
                                    parseFloat(markerElem.getAttribute('lng')));

                                var infowincontent = document.createElement('div');
                                var strong = document.createElement('strong');
                                strong.textContent = name
                                infowincontent.appendChild(strong);
                                infowincontent.appendChild(document.createElement('br'));

                                var text = document.createElement('text');
                                text.textContent = address
                                infowincontent.appendChild(text);
                                var icon = customLabel[type] || {};
                                var marker = new google.maps.Marker({
                                    map: map,
                                    position: point,
                                    label: icon.label
                                });
                                marker.addListener('click', function() {
                                    infoWindow.setContent(infowincontent);

                                    infoWindow.open(map, marker);
                                });
    
                            });
                        });

                    }



                    function downloadUrl(url, callback) {
                        var request = window.ActiveXObject ?
                            new ActiveXObject('Microsoft.XMLHTTP') :
                        new XMLHttpRequest;

                        request.onreadystatechange = function() {
                            if (request.readyState == 4) {
                                request.onreadystatechange = doNothing;
                                callback(request, request.status);
                            }
                        };

                        request.open('GET', url, true);
                        request.send(null);
                    }
                  
                    function doNothing() {}
                </script>
                <script async defer
                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA_HW-ZM7MvLvN9cAkeFx-BjpgGz3fbU-o&callback=initMap">
                </script>
            </div>
        </div> 
        </div>

        <?php include 'footer.php' ?>
    </body>
</html>
<?php 

    $domDocument = new DOMDocument('1.0', "UTF-8");

    $markers = $domDocument->createElement('markers');


    $data = oci_parse($conn, "select * from dorras_event where ID_EVENT = '". $id . "'");
    oci_execute($data);
    while (($dataxml = oci_fetch_array($data, OCI_ASSOC)) != false) {
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
    }
    

    // Append it to the document itself
    $markers->appendChild($marker);
    $domDocument->appendChild($markers);

    $domDocument->save("marker.xml");
 ?>
<?php
    $checking = oci_parse($conn, "select * from dorras_event, dorras_user, participant where dorras_user.id_user = '$iduser' and participant.id_event = dorras_event.id_event");

    oci_execute($checking);
    $cek = 1;

    while (($data = oci_fetch_array($checking, OCI_ASSOC)) != false) {
        $today=date ("Y-m-d");
        $tanggal = $data['START_EVENT'];
        $tgl_agenda = date ($tanggal);

        $start_date = new DateTime($tanggal);
        $now = date("Y-m-d");
        $now_date = new DateTime($now);
        $interval = $start_date->diff($now_date);

        echo $interval->days;

        if ($interval->days < 90) {
            echo "Anda belum bisa<br>";
            $cek = 10;
        } else {
            echo "Anda baru bisa<br>";
            $cek = 10;

        }
    }

    if(isset($_POST['take'])){

        $iduser = $_POST['iduser'];
        $idevent = $_POST['idevent'];
        $idparticipant = $idevent.$iduser;


        $query = oci_parse($conn, "INSERT INTO participant(id_participant, id_user, id_event, status) VALUES (:idparticipant, :iduser, :idevent, 0)");

        oci_bind_by_name($query, ":iduser", $iduser);
        oci_bind_by_name($query, ":idevent", $idevent);
        oci_bind_by_name($query, ":idparticipant", $idparticipant);
        error_reporting(0);
        oci_execute($query);

        if(!$query){
            echo " 
                <script>
                    alert('Anda telah melakukan take event sebelumnya');
                </script>
            ";
        } else {
            echo " 
                <script>
                    alert('Terikasih, silahkan datang pada waktu yang sudah ditentukan');
                </script>
            ";
        }
        oci_close($conn);    
    }

?>