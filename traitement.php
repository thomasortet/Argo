<?php

            $servname = 'localhost';
            $dbname = 'wild_code';
            $user = 'root';
            $pass = '';
            $name = $_POST['name'];

if (!empty($_POST) && isset($_POST)){
    try{
        $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO argonautes(name)VALUES('$name')";

        $dbco->exec($sql);
        header('Location:index.php');
    }

    catch(PDOException $e){
        echo "Erreur : " . $e->getMessage();
    }
}

?>