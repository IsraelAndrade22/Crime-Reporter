<?php 
session_start(); //start or resume an existing session 

include 'credentials.php'; 

$connection = getDatabaseConnection(); 

if (isset($_POST['loginForm'])) { //checks whether user submitted the form 
     
    $username = $_POST['username']; 
    $password = sha1($_POST['password']);  //hash("sha1", $_POST['password'])
    var_dump($password);
    // $sql = "SELECT *  
    //         FROM oe_admin 
    //         WHERE username = '$username' 
    //         AND password = '$password'";  //Not preventing SQL Injection 
             
    $sql = "SELECT *  
            FROM User_Information 
            WHERE userName = :username 
            AND userPassword = :password";  //Preventing SQL Injection 

   // $sql_2 = "SELECT * FROM Order";
  
//  $sql = "SELECT *  
//             FROM oe_admin 
//             WHERE username = '$username'";
            
    $namedParameters = array(); 
    $namedParameters[':username'] = $username;                 
    $namedParameters[':password'] = $password; 
    var_dump($username);
    var_dump($password);
    // var_dump($connection->prepare($sql));
    $statement = $connection->prepare($sql);
    // var_dump($statement);
    $statement->execute($namedParameters); 
    $record = $statement->fetch(PDO::FETCH_ASSOC); 
     
    if (empty($record)) { //wrong username or password 
         
        echo "Wrong username or password!"; 
        header("Location: logout.php");
         
    } else { 
         
        $_SESSION['username'] = $record['userName']; 
        $_SESSION['adminName'] = $record['firstName'] . " " . $record['lastName'];
        $_SESSION['image'] = "";
        header("Location: records.php"); 
                 
    } 
     

     
} 




?>