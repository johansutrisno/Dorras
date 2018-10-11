<style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 40%;
          
          margin: 0 auto;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
    }
</style>
<div class="container">
     <center><h4 class="red-text text-darken-3 ">Maps Event</h4></center>
</div>
        <div class="row">
                <div class="container">
                        <div class="col s12 m12">
                            <div id="map" class="z-depth-1"></div>

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
                                        zoom: 4
                                    });
                                    var infoWindow = new google.maps.InfoWindow;

                                    // Change this depending on the name of your PHP or XML file
                                    downloadUrl('all_marker.xml', function(data) {
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
            <div class="col s12 m4">
                
                
            </div>
                    </div>
        </div>