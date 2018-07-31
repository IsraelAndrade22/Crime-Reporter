<!DOCTYPE html>
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
session_start();

if (!isset($_SESSION['username'])) {  //checks whether user has logged in
    
    header("Location: login.php");
    
}

include 'credentials.php';

$conn = getDatabaseConnectionMysqli();

function displayAllProducts(){
    global $conn;
    $sql = "SELECT * 
                    FROM Crime_Report, Street_Address
                    WHERE Crime_Report.Address_Id = Street_Address.Address_Id";
    //$records = getDataBySQL($sql);
    $records = mysqli_query($conn, $sql);
 


     //Using Form Buttons
         echo "<table align = 'center' class = 'table table-hover table-bordered'>";
         echo "<th> Street Address </th>";
         echo "<th> Crime Description </th>";
         echo "<th> Time </th>";
         echo "<th> Action </th>";
        while ($row = mysqli_fetch_assoc($records)) {
          echo "<tr class = 'row_color'>"; 
          echo "<td>" . $row['Street_Address'] . "</td>"; 
          echo "<td>" . $row['Crime_Description'] . "</td>"; 
          echo "<td>" . $row['Time'] . "</td>"; 
          echo "<td> <form action=updateCrimeReport.php>";
          echo "<input type='hidden' name='Address_Id' value='".$row['Address_Id'] . "'/>";
          echo "<input class='btn btn-primary' type='submit' value='Update'/></form>";
          echo "<form action = deleteCrimeReport.php>";
          echo "<input type='hidden' name='Address_Id' value='".$row['Address_Id'] . "'/>";
          echo "<input class='btn btn-danger' type='submit' value='DELETE'/></form>";
          echo "</form>";
          echo "</td>";
          echo "</tr>";
        } //endForeach
        echo "</table>";
     
}

?>




<body style="background-color: #e6e8ed">
  <div id = "center_div" class = "background">
    <header>
      <h1>Crime Reports</h1>
    </header>

   
    <div>
     <strong> Welcome <?=$_SESSION['adminName']?>! </strong>
     
     <form action="logout.php">
        <input  class="btn btn-basic" type="submit" value="Logout" />    
     </form>
         
     <form action="addCrimeReport.php">
        <input class="btn btn-success" type="submit" value="Add New Crime Report" />    
     </form>
    <form action ="generateReport.php">
        <input class="btn btn-warning" type="submit" value="Generate Report"/>
    </form>
      <br /><br />    
      <?=displayAllProducts()?>
      
      
      
      
    </div>

    <footer>

    </footer>
  </div>
</body>
</html>