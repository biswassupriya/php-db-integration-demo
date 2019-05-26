<?php

    //Connect to the database
    $host = "localhost";   //See Step 3 about how to get host name
    $user = "supriyamb";                     //Your Cloud 9 username
    $pass = "";                                 //Remember, there is NO password!
    $db = "mysql";                          //Your database name you want to connect to
    $port = 3306;                               //The port #. It is always 3306


    $connection = mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error());

    //And now to perform a simple query to make sure it's working
/*    $query = "SELECT share_name FROM SHARES";
    $result = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        echo "The ID is: " . $row['share_name'];
        echo $row;
    }*/

  /*    $query = "SELECT user FROM user";
    $result = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        echo "The ID is: " . $row['user'];
    }*/

        $conn= mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error());

    $table_name = 'sales';

$sql = 'CREATE TABLE IF NOT EXISTS `' . $table_name . '` (
          `trans_id` int(11) NOT NULL AUTO_INCREMENT,
          `prod_id` int(11) NOT NULL,
          `trans_date` date NOT NULL,
          `qty` tinyint(4) NOT NULL,
          `amount` int(11) NOT NULL,
          `cust_id` int(11) NOT NULL,
          PRIMARY KEY (`trans_id`),
          KEY `prod_id` (`prod_id`)
        ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1';

$query = mysqli_query($conn, $sql);

if (!$query) {
    die ('ERROR: Unable to create ' . $table_name . ' table: ' . mysqli_error($conn));
}

echo 'The ' . $table_name . ' table has been successfully created<br/>';

$sql = "INSERT INTO `$table_name` (`trans_id`, `prod_id`, `trans_date`, `qty`, `amount`, `cust_id`)
        VALUES  (1, 100, '2016-09-20', 8, 265, 1),
                (2, 100, '2016-10-11', 3, 270, 2),
                (3, 101, '2016-08-17', 8, 250, 2),
                (4, 101, '2016-08-24', 12, 380, 2),
                (5, 101, '2016-05-10', 12, 250, 1),
                (6, 101, '2016-05-04', 11, 375, 1),
                (7, 101, '2016-07-15', 3, 265, 1),
                (8, 100, '2016-05-19', 4, 250, 1),
                (9, 101, '2016-06-17', 12, 255, 2),
                (10, 100, '2016-09-11', 12, 280, 1)";

$query = mysqli_query($conn, $sql);

if (!$query) {
    die ('ERROR: Unable to insert data to ' . $table_name . ' table: ' . mysqli_error($conn));
}

echo 'Data successfully inserted on ' . $table_name . ' table';


$sql = 'SELECT prod_id, trans_date, amount, qty
        FROM sales';

$query = mysqli_query($conn, $sql);

if (!$query) {
    die ('SQL Error: ' . mysqli_error($conn));
}

echo '<table>
        <thead>
            <tr>
                <th>PRODUCT ID</th>
                <th>TRANSACTION DATE</th>
                <th>AMOUNT</th>
                <th>QUANTITY</th>
            </tr>
        </thead>
        <tbody>';

while ($row = mysqli_fetch_array($query))
{
    echo '<tr>
            <td>'.$row['prod_id'].'</td>
            <td>'.$row['trans_date'].'</td>
            <td>'.number_format($row['amount'], 0, ',', '.').'</td>
            <td class="right">'.$row['qty'].'</td>
        </tr>';
}
echo '
    </tbody>
</table>';

// Should we need to run this? read section VII
mysqli_free_result($query);

// Should we need to run this? read section VII
mysqli_close($conn);

?>