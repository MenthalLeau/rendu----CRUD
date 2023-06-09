<?php
require_once 'fonction.ini.php';

$connexion = connexion();


// On écrit notre requête
$sql = 'SELECT * FROM `Voitures`';

// On prépare la requête
$query = $connexion->prepare($sql);

// On exécute la requête
$query->execute();

// On stocke le résultat dans un tableau associatif
$result = array();
$result = $query->fetchAll(PDO::FETCH_ASSOC)

//TODO : Faire la requete Select pour avoir les bonnes données
//TODO : Faire le HTML avec  la boucle d'affichage des données

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rendu - CRUD</title>
    <link rel="stylesheet" href="../rendu/style.css">
</head>
<body>
    
    <h2>Bienvenue sur la liste des voitures de mon garage !</h2>
    <table class="tableau">
        <thead>
            <th>id</th>
            <th>Pays</th>
            <th>Marque</th>
            <th>Models</th>
            <th>Année</th>
            <th>Puissance en ch</th>
            <th>Couple en N.m</th>
            <th>Poids en kg</th>
            <th></th>
        </thead>
        <tbody>
        <?php
            foreach($result as $Voitures){
        ?>
                <tr>
                    <td class="id"><?= $Voitures['id'] ?></td>
                    <td><?= $Voitures['Pays'] ?></td>
                    <td><?= $Voitures['Marque'] ?></td>
                    <td><?= $Voitures['Models'] ?></td>
                    <td><?= $Voitures['Annee'] ?></td>
                    <td><?= $Voitures['Puissance'] ?></td>
                    <td><?= $Voitures['Couple'] ?></td>
                    <td><?= $Voitures['Poids'] ?></td>
                    <td><a class="read" href="more.php?id=<?= $Voitures['id'] ?>">Voir</a>  <a class="Modif" href="update.php?id=<?= $Voitures['id'] ?>">Modifier</a>   <a onclick="return confirm('Voulez-vous vraiment supprimer la <?php echo $Voitures['Marque'] ?> <?php echo $Voitures['Models'] ?> de <?php echo $Voitures['Annee'] ?> de mon garage ?')" class="btn-supprimer" href="delete.php?id=<?= $voiture['id'] ?>">Supprimer</a></td>
                </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
    <a href="create.php" class="Add">Ajouter</a>
</body>
</html>