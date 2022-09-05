
    <?php include_once('../includes/header.php'); ?>
    <?php
            $servername = '127.0.0.1';
            $username = 'root';
            $password = '';
            
            //On établit la connexion
            try{
                $db = new PDO("mysql:host=127.0.0.1;dbname=scam_db", $username, $password);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //var_dump($conn);
                // On récupère tout le contenu de la table recipes
                $sql = 'SELECT * FROM etudiants limit 10';
                $statement = $db->prepare($sql);
                $statement->execute();
                $operateurs = $statement->fetchAll();
               
               // var_dump($etudiants);
            }
            catch(Exception $e){
                echo 'Erreur de connection a la base ;';
            }
            
           
        ?>
    <div class="main selector-for-some-widget">
       <div class="container">
         <h1>GESTION DES ETUDIANTS</h1>
            <?php
                $articles =[
                    [
                        'name'=>'LAIT MIXWELL',
                        'pu'=>150,
                        'quantite'=>36,
                    ],
                    [
                        'name'=>'DURU SAVON',
                        'pu'=>500,
                        'quantite'=>14,
                    ],
                    [
                        'name'=>'PAIN',
                        'pu'=>100,
                        'quantite'=>51,
                    ]
                ];
            
            ?>
            <?php 
             if(!empty($_POST)){
                 $article =  [
                    'name'=>$_POST['designation'],
                    'pu'=>$_POST['prix'],
                    'quantite'=>$_POST['quantite'],
                    'seuil'=>$_POST['min'],
                 ];

                 $articles[] = $article;
             }



           ?>
            
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Liste DE COURSES</h3>
                            </div>
                            <div class="card-body">
                                
                            <table class="table table-bordered table-striped table-hover table-sm">
                                <thead>
                                    <tr>
                                        <th>DESIGNATION</th>
                                        <th>P.U</th>
                                        <th>Qte</th>
                                        <th>TOTAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $somme = 0; ?>
                                    <?php foreach($articles as $item): ?>
                                        <?php 
                                            $total = $item['pu'] * $item['quantite']; 
                                            $somme = $somme + $total;
                                             ?>
                                        <tr>
                                            <td><?= $item['name'] ?></td>
                                            <td><?= $item['pu'] ?></td>
                                            <td><?= $item['quantite'] ?></td>
                                            <td><?= $total ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                            </div>
                            <div class="card-footer">
                                TOTAL : <span><b><?= number_format($somme,0,',','.') ?> FCFA</b></span>
                         </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Liste DES operateurs</h3>
                            </div>
                            <div class="card-body table-responsive">
                                
                            <table class="table table-bordered table-striped table-hover table-sm">
                                <thead>
                                    <tr>
                                        <th>MATRICULE</th>
                                        <th>NOM</th>
                                        <th>TELEPHONE</th>
                                        <th>RESIDENCE</th>
                                        <th>DTN</th>
                                        <th>EXP CNI</th>
                                        <th>ARRONDISSEMENT</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($operateurs as $item): ?>
                                        
                                        <tr>
                                            <td><?= $item['identifiant'] ?></td>
                                            <td><?= $item['name'] ?></td>
                                            <td><?= $item['phone'] ?></td>
                                            <td><?= $item['residence'] ?></td>
                                            <td><?= $item['dtn'] ?></td>
                                            <td><?= $item['expiration_cni'] ?></td>
                                            <td><?= $item['arrondissement'] ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                            </div>
                            
                        </div>
                    </div>
                    
                    
                    <div class="card mt-4" style="">
                        <div class ="card-heard">
                            <h4 class ="card-titre">NOUVEL ARTICLE </h4>
                       </div>

                         <div class="card-body">
                             <form method="POST" action="index.php">

                                  <div class="form-group mt-2" style="">
                                      <label for="">DESIGNATION</label>
                                      <input name ="designation" class="form-control"  type="text" placeholer ="Saisir le nom de l'article">
                                    </div>

                                    <div class="form-group mt-3" style="">
                                      <label for="">PRIX UNITAIRE</label>
                                      <input name="prix"value=0  class="form-control" type="number" placeholer ="Saisir le prix de l'article">
                                    </div>

                                    <div class="form-group mt-3" style="">
                                      <label for="">QUANTITE</label>
                                      <input name="quantite" class="form-control" type="number" placeholer ="Saisir la quantitée de l'article">
                                    </div>

                                    <div class="form-group mt-3" style="">
                                      <label for="">SEUIL</label>
                                      <input name="min" class="form-control" type="number" placeholer ="Saisir le seuil de l'article">
                                    </div>

                                    <div class="form-group mt-3">
                                       <button class="btn btn-danger btn-block" type="submit">Ajouter</button>
                                    </div>
                              </form> 
                               
                                    <div class="row">
                                      <div class="col-md-6 col-sm-12">
                                         <div class="card">
                                         
                                              <div class="card-header">
                                                  <h3 class="card-title">Liste DE COURSES</h3>
                                             <div class="">
                                                     <?php foreach ($articles as $elt):?>   
                                                      <ul class="list-group">
                                                          <?php endforeach ?>
                                                       </ul>
                                    
                           
                                                </div>
                                                   <div class="card-footer">
                                                       TOTAL : <span><b><?= number_format($somme,0,',','.') ?> FCFA</b></span>
                                                   </div>
                                 </div>
                                           </div>
                                       </div>

          </div>
    </div>
    <?php include_once('../includes/bottom.php'); ?>
    