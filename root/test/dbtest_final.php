<?php
    session_start();
    unset($_SESSION['connection']);
    $host = 'localhost';
    $db = 'mysql';
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

	$table_name = 'shares';


    $sql = 'DROP TABLE shares';
	$result = $db->prepare($sql);
    $result->execute();

    $sql = 'CREATE TABLE IF NOT EXISTS `' . $table_name . '` (
          `share_ID` int(11) NOT NULL AUTO_INCREMENT,
          `share_Name` varchar(20) NOT NULL,
          `share_Price` Double(8,2),
          PRIMARY KEY (`share_ID`)
        )';
	$result = $db->prepare($sql);
    $result->execute();

    echo 'The ' . $table_name . ' table has been successfully created<br/>';



$sql = "INSERT INTO `$table_name`  (`share_ID`,`share_Name`,`share_Price`)
VALUES	(1,'Lloyds Banking Group',6.42),
		(2,'Aviva plc',2.41),
		(3,'Sirius Minerals plc',1.51),
		(4,'Scottish Mortgage',4.32),
		(5,'ASOS plc',2.35),
		(6,'BAE Systems plc',4.87),
		(7,'Widecells Group plc',6.04),
		(8,'Vodafone Group plc',2.67),
		(9,'GVC Holdings plc',2.64),
		(10,'Kier Group plc',2.30),
		(11,'Debenhams plc',1.27),
		(12,'Cadence Minerals',9.45),
		(13,'BP Plc',7.71),
		(14,'Barclays plc',1.15),
		(15,'Hurricane Energy',2.72),
		(16,'Motif Bio plc',3.79),
		(17,'Royal Dutch Shell',8.01),
		(18,'Legal & General Group',2.05),
		(19,'Crest Nicholson plc',7.17),
		(20,'Fevertree Drinks plc',2.18)";

	$result = $db->prepare($sql);
    $result->execute();

	$rowcount = 0;

     $sql = "SELECT share_ID, share_Name, share_Price FROM shares";

     $result = $db->prepare($sql);
     $result->execute();
     echo '<table>
            <thead>
                <tr>
                    <th>SHARE ID</th>
                    <th>SHARE NAME</th>
                    <th>SHARE PRICE</th>
                </tr>
            </thead>
            <tbody>';

     while($rows = $result->fetch(PDO::FETCH_NUM)){
         echo '<tr class="results">';
         echo '  <td>' .$rows[0]. '</td>';
         echo '  <td>' .$rows[1]. '</td>';
         echo '  <td>' .$rows[2]. '</td>';
         echo '</tr>';
         $rowcount++;
     };
     echo '
    </tbody>
    </table>';

     echo '<tr class="rowcount">';
     echo '  <td>Records Found</td>';
     echo '  <td>' .$rowcount. '</td>';
     echo '</tr>';

?>