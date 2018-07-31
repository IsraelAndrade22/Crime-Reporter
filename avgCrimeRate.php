<?php
    include 'credentials.php';
    $sql = "SELECT AVG( Category ) AS Rate
    FROM Crime_Report";
    $conn = getDatabaseConnectionMysqli();
    $records = mysqli_query($conn, $sql);
     while ($row = mysqli_fetch_assoc($records))
     {
         echo $row['Rate'];
     }
    // $statement = $conn->prepare($sql);
    // $statement->execute($namedParameters);  
     //echo $statement;  


?>