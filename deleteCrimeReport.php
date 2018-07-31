<?php 
include 'credentials.php';
$sql = "DELETE FROM Crime_Report
    		   WHERE Address_Id = :Address_Id";
    		   
$namedParameters[':Address_Id'] = $_GET['Address_Id'];

$conn = getDatabaseConnection();    
$statement = $conn->prepare($sql);
$statement->execute($namedParameters);
$sql = "DELETE FROM Street_Address
    		   WHERE Address_Id = :Address_Id";
    		   
$namedParameters[':Address_Id'] = $_GET['Address_Id'];

$conn = getDatabaseConnection();    
$statement = $conn->prepare($sql);
$statement->execute($namedParameters);

header('Location: records.php');
?>