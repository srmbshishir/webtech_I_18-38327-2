<link rel="stylesheet" type="text/css" href="../style/showall.css">

<div class="add">
                <?php
                include 'admin.php';
                $current_data = file_get_contents('data.json');  
                $data = json_decode($current_data, true);  
                echo "<table>
                <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone number</th>
                <th>Review</th>
                </tr>";
                foreach($data as $row)  
                {  
                        echo "<tr>";
                        echo "<td>" . nl2br($row["name"]."\n") . "</td>";
                        echo "<td>" . nl2br($row["email"]."\n"). "</td>";
                        echo "<td>" . nl2br($row["phonenumber"]."\n"). "</td>";
                        echo "<td>" . nl2br($row["review"]."\n"). "</td>";
                        echo "</tr>";                     
                } 
                echo "</table>";
            ?>
            </div>