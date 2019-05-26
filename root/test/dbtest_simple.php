<?php

    //Connect to the database
    $host = "localhost";   //See Step 3 about how to get host name
    $user = "root";                     //Your Cloud 9 username
    $pass = "";                                 //Remember, there is NO password!
    $db = "mysql";                          //Your database name you want to connect to
    $port = 3306;                               //The port #. It is always 3306

    $connection = mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error());
    //And now to perform a simple query to make sure it's working
    $query = "SELECT user FROM user";
    $result = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        echo "The ID is: " . $row['user'];
    }

?>