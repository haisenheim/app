<?php 
 $servername = '127.0.0.1';
 $username = 'root';
 $password = '';
 try{
    $db = new PDO("mysql:host=127.0.0.1;dbname=personnes_db", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //var_dump($conn);
    // On récupère tout le contenu de la table recipes

    if(!empty($_POST)){
        $personne=  [
           'name'=>$_POST['name'],
           'code'=>$_POST['code'],
        ];

        $sql = 'INSERT INTO filieres(name, code) VALUES (:name, :code)';

       // Préparation
       $insert = $db->prepare($sql);

       $insert->execute([
           'name' => $personne['name'],
           'code' => $personne['code']
       ]);
    }  

    header('Location:/filieres/index.php'); //Rediriger vers la liste de toutes les filieres
   
   // var_dump($etudiants);
}
catch(Exception $e){
    echo 'Erreur de connection a la base ;';
}