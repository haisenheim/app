
    <?php include_once('../includes/header.php'); ?>
    <?php
            $servername = '127.0.0.1';
            $username = 'root';
            $password = '';
            
            //On établit la connexion
            try{
                $id = $_GET['id'];
               
                $db = new PDO("mysql:host=127.0.0.1;dbname=personnes_db", $username, $password);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //var_dump($conn);
                // On récupère tout le contenu de la table recipes
                $sql = 'DELETE FROM filieres where id='.$id;
                $statement = $db->prepare($sql);
                $statement->execute();
                //$filiere = $statement->fetch();
                header('Location:/filieres/index.php'); //Rediriger vers la liste de toutes les filieres
               //var_dump($filiere);
            }
            catch(Exception $e){
                echo 'Erreur de connection a la base ;';
            }
            
           
        ?>
    <?php include_once('../includes/bottom.php'); ?>
    