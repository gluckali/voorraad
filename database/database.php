<?php 
// create a database class with the needed private functions 
// name of server - database - gebruikersnaam - pass - conn 
class database{
    private $host;
    private $username;
    private $password;
    private $database;
    private $conn;

    // bij de construct leggen we de connectie aan met de database 
    public function __construct(){
        $this->host = 'localhost';
        $this->database = 'voorraad';
        $this->username = 'root';
        $this->password = '';

    // hier wordt er bij de "try" de connectie gemaakt met de database 
    try{
        $dsn = "mysql:host=$this->host;dbname=$this->database";
        $this->conn =new PDO ($dsn, $this->username, $this->password);
        }catch (PDOException $e) {
            // hier wordt er een error gegeven als de connectie niet werkt
            die ("Unable to connect. Error: " . $e.getMessage());
        }
    }

    public function registerklant($statement, $named_placeholder, $location){
        $stmt = $this->conn->prepare($statement);
        $stmt->execute($named_placeholder);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        header('location:'.$location);
        exit();
    }



    public function medewerker($gebruikersnaam, $wachtwoord) {
        // id, voorletters, voorvoegsels, achternaam, gebruikersnaam, wachtwoord 
        $sql ="SELECT id, gebruikersnaam, wachtwoord FROM medewerker WHERE gebruikersnaam = :gebruikersnaam";
        // prepare
        $stmt = $this->conn->prepare($sql);
        // execute
        $stmt->execute([
        'gebruikersnaam' => $gebruikersnaam,
        ]);

        // fetch de results van de exec and prep
        $result = $stmt->fetch(PDO::FETCH_ASSOC); // FETCHdata here - assoc is associative array which you are fetching
        // this is used for password hashed verifcation
        if(is_array($result)){ // if statement checkt if its array en loopt het 
            if(password_verify($wachtwoord, $result['wachtwoord'])){ // verified password 
            } 
            print_r($wachtwoord); // print password
        
         if(count($result)> 0){  // is het gelijk met de resultaat met de login, dan log het je in

        // check of de ingevoerde gebruikersnaam en password overeen komt met de gegevens in de database
            if($gebruikersnaam == $result['gebruikersnaam'] && password_verify($wachtwoord, $result['wachtwoord'])){ // && means both of them have to be true    == means is/ identical too
                $_SESSION['id'] = $result['id'];
                $_SESSION['gebruikersnaam'] = $result['gebruikersnaam'];
                // als hij correct inlogt dan gaat hij naar je index.php
                header("location: ../medewerker/indexmedewerkerlog.php");
            } else {
                echo 'failed to login';
            }
        }else{
            echo"CODE NOT SUBMITTING";
        }

    }else{
        echo 'Failed to log ';
        }
    } 

    public function klant($gebruikersnaam, $wachtwoord){
        $sql = "SELECT id, gebruikersnaam, wachtwoord FROM klant WHERE gebruikersnaam = :gebruikersnaam";

        // prepare
        $stmt = $this->conn->prepare($sql);
        //execute
        $stmt->execute([
            'gebruikersnaam' => $gebruikersnaam,
        ]);
        // fetch
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if(is_array($result)){
            if(count($result) > 0){
                if($gebruikersnaam == $result['gebruikersnaam']  && password_verify($wachtwoord, $result['wachtwoord'])){
                    // if (!isset($_SESSION)){ // als er een error komt met session.
                        session_start();
                        $_SESSION['id'] = $result['id'];
                        $_SESSION['gebruikersnaam'] = $result['gebruikersnaam'];

                        // redirect naar home_medewerker.
                        header("location: indexklant.php");
                    // }
                }
            }else{
                echo "you failed to login";
                }
        }else{
            echo "failed to login2";
        }
    }
    public function select($statement, $named_placeholder){
        $stmt = $this->conn->prepare($statement);
        $stmt->execute($named_placeholder); //['uname'=>$username]
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function update_or_delete($statement, $named_placeholder, $location){
        // if you have errors, make sure to pass third argument to location parameter, (check conn / dbh)    
        $stmt = $this->conn->prepare($statement);
        $stmt->execute($named_placeholder);
        header('location:'.$location);
        exit();
    }
    public function add($statement, $named_placeholder, $location){
        $stmt = $this->conn->prepare($statement);
        $stmt->execute($named_placeholder);
        header('location:'.$location);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        exit();
      }
}


?>