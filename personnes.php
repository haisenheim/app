
    <?php include_once('includes/header.php'); ?>
    <?php
            $servername = 'localhost';
            $username = 'root';
            $password = '';
            
            //On établit la connexion
            try{
                $db = new PDO("mysql:host=localhost;dbname=personnes_db", $username, $password);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //var_dump($conn);

                if(!empty($_POST)){
                    $personne=  [
                       'nom'=>$_POST['nom'],
                       'phone'=>$_POST['phone'],
                       'dtn'=>$_POST['dtn'],
                       'male'=>$_POST['male'],
                    ];
   
                    $sql = 'INSERT INTO personnes(nom, phone, dtn,male) VALUES (:nom, :phone, :dtn, :male)';
   
                   // Préparation
                   $insert = $db->prepare($sql);
   
                   $insert->execute([
                       'nom' => $personne['nom'],
                       'phone' => $personne['phone'],
                       'dtn' => $personne['dtn'],
                       'male' => $personne['male'],
                   ]);
   
                   //var_dump($personne);
                }

                // On récupère tout le contenu de la table recipes
                $sql = 'SELECT * FROM personnes';
                $statement = $db->prepare($sql);
                $statement->execute();
                $personnes = $statement->fetchAll();
               
               // var_dump($etudiants);
            }
            catch(Exception $e){
                echo 'Erreur de connection a la base ;';
            }
            
           
        ?>
    <div class="main selector-for-some-widget">
       <div class="container">
         <h1>GESTION DES PERSONNES</h1>
            <?php 
            
           ?>
            
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Liste</h3>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ajoutModal">
                                Ajouter
                                </button>
                            </div>
                            <div class="card-body">
                                
                            <table class="table table-bordered table-striped table-hover table-sm">
                                <thead>
                                    <tr>
                                        <th>NOM</th>
                                        <th>TELEPHONE</th>
                                        <th>DATE DE NAISSANCE</th>
                                        <th>SEXE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($personnes as $item): ?>
                                      
                                        <tr>
                                            <td><?= $item['nom'] ?></td>
                                            <td><?= $item['phone'] ?></td>
                                            <td><?= date_format(date_create($item['dtn']),'d/m/Y') ?></td>
                                            <td><?= $item['male']?'Masculin':'Feminin' ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>


            <!-- Modal -->
            <div class="modal fade" id="ajoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form method="POST" action="personnes.php">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">NOUVELLE PERFSONNE</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mt-3">
                            <label for="">NOM</label>
                            <input name="nom"  class="form-control" type="text" placeholer ="Saisir le nom de la personne">
                        </div>
                        <div class="form-group mt-3">
                            <label for="">TELEPHONE</label>
                            <input name="phone"  class="form-control" type="text" placeholer ="Saisir le numero de telephone">
                        </div>
                        <div class="form-group mt-3">
                            <label for="">DATE DE NAISSANCE</label>
                            <input name="dtn"  class="form-control" type="date" placeholer ="">
                        </div>
                        <div class="form-group mt-3">
                            <label for="">SEXE</label>
                            <select class="form-control" required name="male" id="">
                                <option value="">Choisir ...</option>
                                <option value="1">MASCULIN</option>
                                <option value="0">FEMININ</option>
                            </select>
                        </div>
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
    <?php include_once('includes/bottom.php'); ?>
    