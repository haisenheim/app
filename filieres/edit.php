
    <?php include_once('../includes/header.php'); ?>
    <?php
            $servername = '127.0.0.1';
            $username = 'root';
            $password = '';
            
            //On établit la connexion
            try{

                $db = new PDO("mysql:host=127.0.0.1;dbname=personnes_db", $username, $password);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                if(!empty($_GET)){
                $id = $_GET['id'];
                //var_dump($conn);
                // On récupère tout le contenu de la table recipes
                $sql = 'SELECT * FROM filieres where id='.$id;
                $statement = $db->prepare($sql);
                $statement->execute();
                $filiere = $statement->fetch();
                }
               if(!empty($_POST)){
                    $id = $_POST['id'];
                    $personne=  [
                        'name'=>$_POST['name'],
                        'code'=>$_POST['code'],
                     ];
             
                     $sql = 'UPDATE filieres set name =:name, code=:code where id =:id';
             
                    // Préparation
                    $insert = $db->prepare($sql);
             
                    $insert->execute([
                        'id' => $id,
                        'name' => $personne['name'],
                        'code' => $personne['code']
                    ]);
                    header('Location:/filieres/index.php'); 
                 }  
             
                 
               
               //var_dump($filiere);
            
            }catch(Exception $e){
                echo 'Erreur de connection a la base ;';
            }
            
           
        ?>
    <div class="main selector-for-some-widget">
        <div class="container pt-4">
        <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><?= $filiere['name'] ?></h3>
                    
                </div>
                <div class="card-body">
                <form method="POST" action="/filieres/edit.php">
                    <div class="modal-content">
                    <div class="modal-body">
                        <input type="hidden" name="id" value="<?= $filiere['id'] ?>">
                        <div class="form-group mt-3">
                            <label for="">NOM</label>
                            <input name="name"  class="form-control" value="<?= $filiere['name'] ?>" type="text" placeholer ="Saisir le nom">
                        </div>
                        <div class="form-group mt-3">
                            <label for="">CODE</label>
                            <input name="code"  class="form-control" value="<?= $filiere['code'] ?>" type="text" placeholer ="Saisir le code">
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">FERMER</button>
                        <button type="submit" class="btn btn-primary">ENREGISTRER</button>
                    </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div> 
    <?php include_once('../includes/bottom.php'); ?>
    