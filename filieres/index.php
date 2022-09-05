
    <?php include_once('../includes/header.php'); ?>
    <?php
            $servername = '127.0.0.1';
            $username = 'root';
            $password = '';
            
            //On établit la connexion
            try{
                $db = new PDO("mysql:host=127.0.0.1;dbname=personnes_db", $username, $password);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //var_dump($conn);
                // On récupère tout le contenu de la table recipes
                $sql = 'SELECT * FROM filieres limit 10';
                $statement = $db->prepare($sql);
                $statement->execute();
                $filieres = $statement->fetchAll();
               
               // var_dump($etudiants);
            }
            catch(Exception $e){
                echo 'Erreur de connection a la base ;';
            }
            
           
        ?>
    <div class="main selector-for-some-widget">
        <div class="container pt-4">
        <div class="card">
                <div class="card-header">
                    <h3 class="card-title">GESTION DES FILIERES</h3>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ajoutModal">
                    Ajouter
                    </button>
                </div>
                <div class="card-body">
                    
                <table class="table table-bordered table-striped table-hover table-sm">
                    <thead>
                        <tr>
                            <th>NOM</th>
                            <th>CODE</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($filieres as $item): ?>
                          
                            <tr>
                                <td><a href=<?= '/filieres/show.php?id='.$item['id'] ?>><?= $item['name'] ?></a></td>
                                <td><?= $item['code'] ?></td>
                                <td>
                                    <ul class="list-inline m-0">
                                        <li class="list-inline-item">
                                            <a class="btn btn-sm btn-success" href=<?= '/filieres/edit.php?id='.$item['id'] ?>>Modifier</a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="btn btn-sm btn-danger" href=<?= '/filieres/delete.php?id='.$item['id'] ?>>Supprimer</a>
                                        </li>
                                    </ul>
                                </td>
                                
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div> 
    <!-- Modal -->
    <div class="modal fade" id="ajoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form method="POST" action="/filieres/insertion.php">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">NOUVELLE FILIERES</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mt-3">
                            <label for="">NOM</label>
                            <input name="name"  class="form-control" type="text" placeholer ="Saisir le nom">
                        </div>
                        <div class="form-group mt-3">
                            <label for="">CODE</label>
                            <input name="code"  class="form-control" type="text" placeholer ="Saisir le code">
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">FERMER</button>
                        <button type="submit" class="btn btn-primary">ENREGISTRER</button>
                    </div>
                    </div>
                </form>
            </div>
            </div>
    <?php include_once('../includes/bottom.php'); ?>
    