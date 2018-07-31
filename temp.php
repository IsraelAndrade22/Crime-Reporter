<!--

My API KEY: AIzaSyBYZBGNkathvI3UzrRoHsq8Hcm5B_p2BSE
-->
<!DOCTYPE html>
<html>
  <head>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
        <script type+"text/javascript"
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBYZBGNkathvI3UzrRoHsq8Hcm5B_p2BSE">
    </script>
  </head>
  <body>
    <div id="map"></div>
    <script>
      var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: {lat: 36.6777, lng: -121.6555},
          mapTypeId: 'roadmap'
        });

      
      var magnitude = 10000;
      var circle = new google.maps.Circle({
          map: map,
          clickable: true,
          center: new google.maps.LatLng(36.672681, -121.613232),
          fillColor: 'red',
          radius: 165,
          fillOpacity: .2,
          //scale: Math.pow(2, magnitude) / 2,
          strokeColor: 'white',
          strokeWeight: .5,
          title: 'Crime Report'
          
      });
      
       var contentString = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h1 id="firstHeading" class="firstHeading">Crime Report</h1>'+
            '<div id="bodyContent">'+
            '<br>' +
            '<h2> Crime Description: </h2>' +
            '<p> This is the crime Description.</p>'+
            '<h3> Category: 5 </h3>'+
            '<h3> Address: 616 Donner Way </h3>'+
            '</div>'+
            '</div>';
            
     
        var infowindow = new google.maps.InfoWindow({
          content: contentString
        });
        
        // marker.addListener('click', function() {
        //   infowindow.open(map, marker);
        // });
        circle.addListener('click', function() {
          infowindow.open(map, circle);
        });
        circle.setMap(map);
        
   // marker.setMap(map);
    
    
    </script>

  </body>
</html>