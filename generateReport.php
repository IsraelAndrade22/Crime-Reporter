<!DOCTYPE html>
<html>
    
<html lang="en">
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<link rel="stylesheet" type="text/css" href="css/styles.css">
  <title>Crime Records</title>

  <meta name="viewport" content="width=device-width; initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<?php
include 'credentials.php';


if (isset($_GET['avgCrimeRate'])) {  //admin submitted the Update Form
    $sql = "UPDATE Crime_Report
            SET Crime_Description = :Crime_Description,
            Time = :Time,
            Category = :Category
            Where Address_Id = :Address_Id";
			
            
    $namedParameters = array();
    $namedParameters[':Crime_Description'] = $_GET['Crime_Description'];
    $namedParameters[':Time'] = $_GET['Time'];
    $namedParameters[':Category'] = $_GET['Category'];
    $namedParameters[':Address_Id'] = $_GET['Address_Id'];
    $conn = getDatabaseConnection();    
    $statement = $conn->prepare($sql);
    $statement->execute($namedParameters);  
      echo "Record has been updated!";  
      header('Location: records.php');
}
?>
<body style="background-color: #e6e8ed">
  <div id = "center_div" class = "background">
    <header>
      <h1>Report</h1>
    </header>

   
    <div>
        
    
       <a  id='avg'> <input class="btn btn-primary" type="submit" value="Average Crime Rate" name= "avgCrimeRate" /></a>
    <p id = "Avgcontainer"></p>
    <a  id='max'> <input class="btn btn-primary" type="submit" value="City with most Crimes" name= "maxCrimes" /></a>
    <p id = "Maxcontainer"></p>
    <script type="text/javascript">
        $(document).ready(function(){
            $('a#avg').click(function(){
                $.ajax({
                    url: "avgCrimeRate.php",
                    type: 'GET',
                    dataType: 'html',
                    success: function (data)
                    {
                        $('#Avgcontainer').html(data);
                    }
        
                });
                
            });
            $('a#max').click(function(){
                $.ajax({
                    url: "highestCrimes.php",
                    type: 'GET',
                    dataType: 'html',
                    success: function (data)
                    {
                        $('#Maxcontainer').html(data);
                    }
        
                });
                
            });
        });
    </script>
          
      <form action="records.php">
        <input class="btn btn-basic" type="submit" value="Back to Crime Reports" />
      </form>
      <br /><br />    
      
      
      
    </div>

    <footer>

    </footer>
  </div>
</body>
</html>