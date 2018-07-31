<!--

My API KEY: AIzaSyBYZBGNkathvI3UzrRoHsq8Hcm5B_p2BSE
-->

<!DOCTYPE html>
<html>
  <head>
        <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
      <?php

        session_start();
                $lat;
        $lng;
        
        
        include 'credentials.php';

        $conn = getDatabaseConnectionMysqli();
        
          echo"<form action = 'login.php'>";
          echo"<button class='btn btn-primary btn-sm' type = 'submit'>Home</button>";
          echo "</form>";
        $cityId = $_POST['City_Id'];
        if($cityId == "Salinas")
        {
            $cityId = "1";
            $lat = 36.6777;
            $lng = -121.6555;
        }
        else if($cityId == "Marina ")
        {
            $cityId = "2";
             $lat = 36.6844;
            $lng = -121.8022;       
        }
        else if($cityId == "Seaside")
        {
            $cityId = "3";
            $lat = 36.6149;
            $lng = -121.8022; 
        }
        else if($cityId == "Monterey")
        {
            $cityId = "4";
            $lat = 36.6002;
            $lng = -121.8947; 
        }
        else if($cityId == "Gonzales")
        {
            $cityId = "5";
             $lat = 36.5066;
            $lng = -121.4444; 
        }
        else if($cityId == "Soledad")
        {
            $cityId = "6";
            $lat = 36.4247;
            $lng = -121.3263; 
        }
        else if($cityId == "Greenfield")
        {
            $cityId = "7";
            $lat = 36.3208;
            $lng = -121.2438; 
        }
        else
        {
                        $lat = 36.6777;
            $lng = -121.6555;
        }
        
        function getCoordinates($type)
        {
            global $conn;
            $array = array();
            $sql = "SELECT * from Street_Address";
            //$records = getDataBySQL($sql);
            $records = mysqli_query($conn, $sql);
                       
            while ($row = mysqli_fetch_assoc($records)) {
                if($type == "Latitude")
                {
                    $array[] = $row['Latitude'];
                }
                else if($type == "Longitude")
                {
                    $array[] = $row['Longitude'];
                    
                }
             
            } //endForeach
            return $array;
        }
        $latitudeArray = getCoordinates('Latitude');
        $longitudeArray = getCoordinates('Longitude');
        
        
            function getCrimeReport()
            {
                global $conn;
                $reports = array();
                $temp = "";
                 $sql = "Select Crime_Report.*, Street_Address.Street_Address from Crime_Report, Street_Address where Street_Address.Address_Id = Crime_Report.Address_Id";
                //$records = getDataBySQL($sql);
                $records = mysqli_query($conn, $sql);
                           
                while ($row = mysqli_fetch_assoc($records)) {
                    $temp .= "<div id='content'>". "<div id='siteNotice'>".
                            "</div>"."<h1 id='firstHeading' class='firstHeading'>Crime Report</h1>".
                            "<div id='bodyContent'>".
                            "<br>"."<h2> Crime Description: </h2>";
                    $temp .= "<p>" . $row['Crime_Description'] . "</p>";
                    $temp .= "<h3>Category: ". $row['Category']. "</h3>"; 
                    $temp .= "<h3>Address: " . $row['Street_Address'] . "</h3>";
                    $temp .= "</div>" . "</div>";
                    $reports[] = $temp;
                    $temp = "";
                }
                return $reports;
            }
            $crimeReports = getCrimeReport();
      ?>
        <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBYZBGNkathvI3UzrRoHsq8Hcm5B_p2BSE">
        </script>
  </head>
  <body>

    <div id="map"></div>

    <script type="text/javascript">
    var cityId = ('<?php echo $cityId;?>')
    console.log(cityId);
    
    
    
   var lat_1 = parseFloat('<?php echo $lat;?>')
   // console.log(lat_1);
    var lng_1 = parseFloat('<?php echo $lng;?>')
     //console.log(lng_1);
       if(cityId == "1")
        {
            cityId = "1";
            lat_1 = 36.6777;
            lng_1 = -121.6555;
        }
        else if(cityId == "2")
        {
            cityId = "2";
            lat_1 = 36.6844;
            lng_1 = -121.8022;       
        }
        else if(cityId == "3")
        {
            cityId = "3";
            lat_1 = 36.6149;
            lng_1 = -121.8022; 
        }
        else if(cityId == "4")
        {
            cityId = "4";
            lat_1 = 36.6002;
            lng_1 = -121.8947; 
        }
        else if(cityId == "5")
        {
            cityId = "5";
             lat_1 = 36.5066;
            lng_1 = -121.4444; 
        }
        else if(cityId == "6")
        {
            cityId = "6";
            lat_1 = 36.4247;
            lng_1 = -121.3263; 
        }
        else if(cityId == "7")
        {
            cityId = "7";
            lat_1 = 36.3208;
            lng_1 = -121.2438; 
        }
        else
        {
            lat_1 = 36.6777;
            lng_1 = -121.6555;
        }
      var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 13,
          center: {lat: lat_1, lng:lng_1},
          mapTypeId: 'roadmap'
        });

   
     var latitudeLocations = "<?php echo implode('|', $latitudeArray); ?>";
     var longitudeLocations = "<?php echo implode('|', $longitudeArray); ?>";
     var crimeReports = "<?php echo implode('|', $crimeReports); ?>";
    // split the string value by the | delimeter to get an array
    latitudeLocations = latitudeLocations.split('|');
    longitudeLocations = longitudeLocations.split('|');
    crimeReports = crimeReports.split('|');
    var circles = [];
     //var pos = {lat: latitudeLocations[i] , lng: longitudeLocations[i]};
    for(i = 0; i < latitudeLocations.length; i++)
    {
        latitudeLocations[i] = parseFloat(latitudeLocations[i]);
        longitudeLocations[i] = parseFloat(longitudeLocations[i]);
        console.log(latitudeLocations[i]);
        console.log(longitudeLocations[i]);
        var newCircle = new google.maps.Circle({
          map: map,
          clickable: true,
          center: new google.maps.LatLng(latitudeLocations[i], longitudeLocations[i]),
          //position: new google.maps.LatLng(latitudeLocations[i], longitudeLocations[i]),
          fillColor: 'red',
          radius: 165,
          fillOpacity: .2,
          //scale: Math.pow(2, magnitude) / 2,
          strokeColor: 'white',
          strokeWeight: .5,
          title: 'Crime Report'
          
      });
       var contentString = crimeReports[i];
       
       /*
       
        var infowindow = new google.maps.InfoWindow()

google.maps.event.addListener(marker,'click', (function(marker,content,infowindow){ 
        return function() {
           infowindow.setContent(content);
           infowindow.open(map,marker);
        };
    })(marker,content,infowindow));
       
       
       */
     
      var infowindow = new google.maps.InfoWindow()
      google.maps.event.addListener(newCircle,'click', (function(newCircle,contentString,infowindow){ 
        return function() {
           infowindow.setContent(contentString);
           //infowindow.setPosition(pos);
           infowindow.setPosition(newCircle.getCenter());
           infowindow.open(map,newCircle);
        };
        })(newCircle,contentString,infowindow));
        
      //circle.setMap(map);
      circles.push(newCircle);
    }
    console.log(circles);
    </script>

  </body>
</html>