 <?php
        function getDatabaseConnection()
        {
            $host = "127.0.0.1";
            $user = "israelandrade22";
            $pass = "";
            $db = "Final_Project";
            $port = 3306;
            //$connection = mysqli_connect($host, $user, $pass, $db, $port) or die(mysql_error());
            
            $connection = new PDO("mysql:dbname=$db;host=$host", $user, $pass);
            
            
            if($connection->connect_error)
            {
                die("Connection Failed: ". $connection->connect_error);
            }
            return $connection;
            
        }
        function getDatabaseConnectionMysqli()
        {
            $host = "127.0.0.1";
            $user = "israelandrade22";
            $pass = "";
            $db = "Final_Project";
            $port = 3306;
            $connection = mysqli_connect($host, $user, $pass, $db, $port) or die(mysql_error());
            
          
            
            
            if($connection->connect_error)
            {
                die("Connection Failed: ". $connection->connect_error);
            }
            return $connection;
        }
?>