<?php

include 'credentials.php';
$conn = getDatabaseConnection();
 function getCrimeReportById() {
    global $conn;
    $sql = "SELECT * FROM Crime_Report WHERE Address_Id = :Address_Id";
    $namedParameters = array();
    $namedParameters[':Address_Id'] = $_GET['Address_Id'];
    $statement = $conn->prepare($sql);    
    $statement->execute($namedParameters);
    $record = $statement->fetch();
    return $record;
 }
 $crimeReport = getCrimeReportById();

if (isset($_GET['updateForm'])) {  //admin submitted the Update Form
    global $conn;
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

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>updateProduct</title>
  <meta name="description" content="">
  <meta name="author" content="lara4594">

  <meta name="viewport" content="width=device-width; initial-scale=1.0">

  <link rel="stylesheet" type="text/css" href="css/styles.css">
    <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body style="background-color: #e6e8ed">
  <div>
    <div align = "center" class = "jumbotron">
       <h1>Update Product</h1>
    </div>
     

    <div class = "background">
        

      <form method = "get">
        <div class="form-group">
          <Strong>Crime Description:</Strong> <textarea class="form-control" rows="4" cols="20" name="Crime_Description"><?=$crimeReport['Crime_Description']?></textarea><br />
          <Strong>Time:</Strong> <input class="form-control" type="text" name="Time" value="<?=$crimeReport['Time']?>" /><br />
          <Strong>Category:</Strong> <select name="Category">
                       <option value="1">1</option>
                       <option value="2">2 </option>
                       <option value="3">3</option>
                       <option value="4">4 </option>
                       <option value="5">5 </option>
                    </select>
          <br />          
          <input type="hidden" name="Address_Id" value="<?=$crimeReport['Address_Id']?>"/>
          <input class="btn btn-primary" type="submit" value="Update Crime Report" name= "updateForm" />
          </div>
      </form>
      <form action="records.php">
        <input class="btn btn-basic" type="submit" value="Back to Crime Reports" />
      </form>
    </div>
    <footer>
    </footer>
  </div>
</body>
</html>