
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
                $sql = 'SELECT * FROM filieres where id='.$id;
                $statement = $db->prepare($sql);
                $statement->execute();
                $filiere = $statement->fetch();
               
               //var_dump($filiere);
            }
            catch(Exception $e){
                echo 'Erreur de connection a la base ;';
            }
            
           
        ?>
    <div class="main selector-for-some-widget">
        <div class="container pt-4">
        <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><?= $filiere['name'] ?></h3>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ajoutModal">
                    Modifier
                    </button>
                </div>
                <div class="card-body">
                    <p>NOM DE LA FILIERE : <?= $filiere['name'] ?></p>
                    <p>CODE DE LA FILIERE : <?= $filiere['code'] ?></p>
                </div>
            </div>
        </div>
    </div> 
    <?php include_once('../includes/bottom.php'); ?>
    