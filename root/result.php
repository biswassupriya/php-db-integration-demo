<?php
    require_once('config/dbconnect.php');
    require_once('includes/header.php');
    require_once('includes/nav.php');
?>
        <main>
            <section id="result">
                <table>
                    <tr>
                        <th>Share Name</th>
                        <th>Share Price</th>
                    </tr>
                    <?php
                        if(isset($_POST['search'])){
                    
                            $rowcount = 0;
                            $search = $_POST['search'];
                            $search = $search."%";
                            
                            $findStock = "SELECT share_Name, share_Price FROM SHARES WHERE share_Name LIKE :search";
                        
                            $result = $db->prepare($findStock);
                            $result->bindParam(':search', $search, PDO::PARAM_STR);
                            $result->execute();

                            while($rows = $result->fetch(PDO::FETCH_NUM)){
                                echo '<tr class="results">';
                                echo '  <td>' .$rows[0]. '</td>';
                                echo '  <td>' .$rows[1]. '</td>';
                                echo '</tr>';
                                $rowcount++;
                            };     
                            echo '<tr class="rowcount">';
                            echo '  <td>Records Found</td>';
                            echo '  <td>' .$rowcount. '</td>';
                            echo '</tr>';
                        };
                    ?>
                </table> 
            </section>
        </main>

<?php
    require_once('includes/footer.php');
?>