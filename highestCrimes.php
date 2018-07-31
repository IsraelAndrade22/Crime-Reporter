<?php
 include 'credentials.php';
    $sql = "SELECT COUNT(*) AS Total FROM Crime_Report where City_Id = 1";
    $conn = getDatabaseConnectionMysqli();
    $records = mysqli_query($conn, $sql);
    $SalinasCrimes;
     while ($row = mysqli_fetch_assoc($records))
     {
          $SalinasCrimes = intval($row['Total']);
     }
    $sql = "SELECT COUNT(*) AS Total FROM Crime_Report where City_Id = 2";
    $conn = getDatabaseConnectionMysqli();
    $records = mysqli_query($conn, $sql);
    $MarinaCrimes;
     while ($row = mysqli_fetch_assoc($records))
     {
          $MarinaCrimes = intval($row['Total']);
     }
    $sql = "SELECT COUNT(*) AS Total FROM Crime_Report where City_Id = 3";
    $conn = getDatabaseConnectionMysqli();
    $records = mysqli_query($conn, $sql);
    $SeasideCrimes;
     while ($row = mysqli_fetch_assoc($records))
     {
          $SeasideCrimes = intval($row['Total']);
     }
    $sql = "SELECT COUNT(*) AS Total FROM Crime_Report where City_Id = 4";
    $conn = getDatabaseConnectionMysqli();
    $records = mysqli_query($conn, $sql);
    $MontereyCrimes;
     while ($row = mysqli_fetch_assoc($records))
     {
          $MontereyCrimes = intval($row['Total']);
     }

    $maxValue = max($SalinasCrimes, $MarinaCrimes, $SeasideCrimes, $MontereyCrimes );
    if($SalinasCrimes == $maxValue)
    {
        echo "Salinas: " . $maxValue . " Crimes\n";
    }
    if($MarinaCrimes == $maxValue)
    {
        echo "Marina: " . $maxValue . " Crimes\n";
    }
    if($SeasideCrimes == $maxValue)
    {
        echo "Seaside: " . $maxValue . " Crimes\n";
    }
    if($MontereyCrimes == $maxValue)
    {
        echo "Monterey: " . $maxValue . " Crimes\n";
    }   
        

?>