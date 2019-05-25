<?php
    session_start();
    unset($_SESSION['connection']);
    $host = 'localhost';
    $db = 'ted500'; 
    $user = 'root'; 
    $pass = '';
    
    $dsn = "mysql:host=$host;dbname=$db;"; 
    
    $opt = [ PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, 
             PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC, 
             PDO::ATTR_EMULATE_PREPARES=>false 
    ]; 
    
    try {
        $db = new PDO($dsn, $user, $pass, $opt);
        $_SESSION['connection'] = "Connected";        
    } catch (PDOException $e) {
        $_SESSION['connection'] = "Failed";
    }

?>