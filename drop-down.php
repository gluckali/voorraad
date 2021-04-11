<!-- this is meant for in when they request a drop down with information from the database, you can fetch it (like we did w nash and matt) -->
<!-- you basically simply change the titles this will show you the key entries from database on dropdown instead of ids -->
<?php
            $eten= $db->select("SELECT DISTINCT eten_id FROM resereveren", []);
            $row_data = array_values($eten)
            
            foreach($row_data as $rows){
                    echo "<tr>";
                    foreach($rows as $data){
                        echo "<option>$data</option>";
                    }
                }?> 
        </select><br>