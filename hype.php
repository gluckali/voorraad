<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <body>
        <h1>Reserveer je eten</h1>

        <?php        
            Session_start();

            error_log("test");

            // include './database/database.php';
            // $db = new database();

            // $food = $db->select("SELECT id, eten FROM eten WHERE 'amount' > 0", []);

            // $food = array_values($food);

            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $naam = $_POST["naam"]; 
                $adres = $_POST["adres"];
                $plaats = $_POST["plaats"];
                $telefoon = $_POST["telefoon"];
                $eten_id = $_POST["eten_id"];
                echo $eten_id;

                $sql = "INSERT INTO reserveren
                VALUES
                (:naam, :adres, :plaats, :telefoon, :eten_id)";
                echo "4";
                
                $placeholder = [
                    'naam'=>$naam,
                    'adres'=>$adres,
                    'plaats'=>$plaats,
                    'telefoon'=>$telefoon,
                    'eten_id'=>$eten_id
                ];
                echo "I just want to cry and sleep.";
                // $db -> add($sql, $placeholder, "hype.php");
            }else{
                echo "there are no logs";
            }
            
            
        ?>
        <form action="hype.php" method="post">
            <input type="text" name="naam" placeholder="naam" required>
            <input type="text" name="adres" placeholder="adres"required>
            <input type="text" name="plaats" placeholder="plaats"  required>
            <input type="text" name="telefoon" placeholder="telefoon" required> 
            <!-- <input type="text" name="eten_id" placeholder="eten_id" required>  -->
            <!-- 
                Task #1 add name attribute (name="eten_id")
                Task #2 loop through $eten and fill in the write value attribute (<option value="1"> bla </option>)
             -->ho
            <select name="eten_id">
                <?php 
               

                $food = [
                    0 => [
                        'eten' => 'burgers',
                        'id' => 2
                    ],
                    1 => [
                        'eten' => 'pizza',
                        'id' => 1,
                    ],
                    2 => [
                        'eten' => 'chicken',
                        'id' => 4
                    ]
                ];

                foreach($food as $rows){
                    echo "<option value='" . $rows['id'] . "'>" . $rows['eten'] . "</option>";
                        // "<option value='" + $etenEntry['id'] + "'>" +  $etenEntry['eten'] + "</option>
                        //  1                   2                 3            4                    5
                }
                ?> 
            </select>
            <input type="submit" value="Voeg eten toe">
        </form>
    </body>
</html>