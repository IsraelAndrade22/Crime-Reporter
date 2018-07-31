<?php
session_start();


include 'credentials.php';
$conn = getDatabaseConnection();
 function getProfileById() {
    global $conn;
    $sql = "SELECT * FROM User_Information WHERE userId = :userId";
    $namedParameters = array();
    $namedParameters[':userId'] = $_GET['userId'];
    $statement = $conn->prepare($sql);    
    $statement->execute($namedParameters);
    $record = $statement->fetch();
    return $record;
 }
 $profile = getProfileById();
if (isset($_GET['updateForm'])) {  //admin submitted the Update Form
   
      $conn = getDatabaseConnectionMysqli();
      $sql = "SELECT MAX( Address_Id ) AS newAddress_Id FROM Street_Address";
    //$records = getDataBySQL($sql);
    $records = mysqli_query($conn, $sql);
    $newAddress_Id;
     while ($row = mysqli_fetch_assoc($records))
     {
        $newAddress_Id = intval($row['newAddress_Id']);
     }
     $newAddress_Id += 1;

    
    $cityId = $_Get['City'];
        if($cityId == "Salinas")
        {
            $cityId = 1;
        }
        else if($cityId == "Marina ")
        {
            $cityId = 2;
        }
        else if($cityId == "Seaside")
        {
            $cityId = 3;
        }
        else if($cityId == "Monterey")
        {
            $cityId = 4;
        }
        else if($cityId == "Gonzales")
        {
            $cityId = 5;
        }
        else if($cityId == "Soledad")
        {
            $cityId = 6;
        }
        else if($cityId == "Greenfield")
        {
            $cityId = 7;
        }
        else
        {
            $cityId = 1;
        }
    global $conn;
    $namedParameters = array();
    $namedParameters[':Street_Address'] = $_GET['Street_Address'];
    //var_dump( $namedParameters[':Latitude'] );
    $namedParameters[':Latitude'] = $_GET['Latitude'];
   // $namedParameters[':Time'] = $_GET["Time"];
    $namedParameters[':Longitude'] = $_GET['Longitude'];
    //var_dump( $namedParameters[':Category']);
    $namedParameters[':Zipcode'] = $_GET['Zipcode'];
   // var_dump($namedParameters[':Address_Id']);
    $namedParameters[':City_Id'] = $cityId;
    $namedParameters[':Address_Id'] = $newAddress_Id;
   // var_dump($_GET['userId']);
    
    
    $sql = "INSERT INTO Street_Address (Street_Address, Latitude, Longitude, Zipcode, City_Id, Address_Id)
            VALUES " . "('" .$namedParameters[':Street_Address'] . "',".  $namedParameters[':Latitude'] . "," . $namedParameters[':Longitude'] . ","
            . $namedParameters[':Zipcode'] . ",".  $namedParameters[':City_Id'] ."," .$namedParameters[':Address_Id'].")";
    $conn = getDatabaseConnection();     
    $statement = $conn->prepare($sql);
    $statement->execute($namedParameters);  

      
      
      
      $namedParameters = array();
      $namedParameters[':Crime_Description'] = $_GET['Crime_Description'];
      
      //var_dump( $namedParameters[':Crime_Description'] );
    // var_dump($_GET['firstName']);
      $namedParameters[':Time'] = $_GET['Time'];
     // var_dump($namedParameters[':Time']);
      //var_dump($_GET['lastName']);
      $namedParameters[':Category'] = $_GET['Category'];
      //var_dump( $namedParameters[':Category']);
      $namedParameters[':Address_Id'] = $newAddress_Id;
      //var_dump($namedParameters[':Address_Id']);
      $namedParameters[':City_Id'] = $cityId;
      //var_dump($namedParameters[':City_Id']);
      //var_dump($_GET['userId']);
      
      		$sql = "Insert into Crime_Report (Crime_Description, Time, Category, Address_Id, City_id)
              VALUES " . "('" .$namedParameters[':Crime_Description'] . "','". $namedParameters[':Time'] . "'," .$namedParameters[':Category'] . ","
              . $namedParameters[':Address_Id'] . ",".  $namedParameters[':City_Id'] . ")";
      $conn = getDatabaseConnection();     
      $statement = $conn->prepare($sql);
      $statement->execute($namedParameters);  
}




?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Crime Report</title>

  <meta name="viewport" content="width=device-width; initial-scale=1.0">

  <link rel="stylesheet" type="text/css" href="css/styles.css">

  <meta name="viewport" content="width=device-width; initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body style="background-color: #e6e8ed">
  <div>
      <div align = "center" class="jumbotron">

      <h1>Add Crime Report</h1>
    </div>

    <div class = "background">
    

      <form method = "get">
           <div class="form-group">
          <Strong>Crime Description:</Strong> <input  class="form-control" type="text" name="Crime_Description" /> <br />
          
          <Strong>Category:</Strong> <input class="form-control" type="text" name="Category" /> <br />
          <Strong>Time:</Strong> <input class="form-control" type="text" name="Time"  /> <br />
          <Strong>City:</Strong> <input class="form-control" type="text" name="City"  /> <br />
          <Strong>Street Address:</Strong> <input class="form-control" type="text" name="Street_Address"  /> <br />
          <Strong>Zipcode:</Strong> <input class="form-control" type="text" name="Zipcode"  /> <br />
          <Strong>Latitude:</Strong> <input class="form-control" type="text" name="Latitude"/>
          <Strong>Longitude: </Strong><input class="form-control" type="text" name="Longitude">
          <br>
          </div>
          <input class="btn btn-success" type="submit" value="Add Crime Report" name="updateForm" />
      </form>
      
      
      
      <form action="records.php">
        <input class="btn btn-basic" type="submit" value="Back to Crime Reports" />
      </form>
    
      <!--
      Street_Address
      Latitude
      Longitude
      Zipcode
      City_Id
      Address_Id
      -->
    </div>
    <footer>
    </footer>
  </div>
</body>
</html>