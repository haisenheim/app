<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>EAD INFO</title>
</head>
<body>
<div class="header">
        <div class="container">
            <h1>PLATEFORME DES NIVEAUX EN INFO</h1>
            <span class="pull-right">
            <?= date('d/m/Y H:i:s'); ?>
            </span>
            
        </div>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">EAD INFO</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/tdphp">ACCUEIL</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="apropos.php">A PROPOS</a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        COURS
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/">PHP</a></li>
                        <li><a class="dropdown-item" href="/">HTML</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">BASES DE DONNEES </a></li>
                    </ul>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="contact.php">CONTACT</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Que cherchez vous ?" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">RECHERCHER</button>
                </form>
                </div>
            </div>
        </nav>
</div>