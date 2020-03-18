<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Weatherapp</title>
</head>
<body>

<?php
try {
    //On se connecte à MySQL
    $bdd= new PDO('mysql:host=localhost;dbname=weatherapp;charset=utf8','root','root');
}
catch (Exception $e)
{
    //En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur :'.$e->getMessage());
}

$resultat = $bdd->query('SELECT * FROM Météo');
$donnees=$resultat->fetchAll();
echo ("<pre>");
var_dump($donnees);
echo ("</pre>");
$resultat->closeCursor();
?>

    <table border="1">
    <thead>
        <tr>
            <th>Ville</th>
            <th>Haut</th>
            <th>Bas</th>
        </tr>
    </thead>
    <tbody>
<?php
       //pour chaque ligne (chaque enregistrement)

       foreach ($donnees as $row):

           //DONNEES A AFFICHER dans chaque cellule
?>
            <tr>
                <td><?= $row['ville'];?></td>  
                <td><?= $row['haut'];?></td>
                <td><?= $row['bas'];?></td>
            </tr>
<?php
       endforeach; // fin foreach
?>
    </tbody>
    </table>

<?php
// On commence par récupérer les champs

if(isset($_POST['ville'])) $ville=$_POST['ville'];
    else $ville='';

if(isset($_POST['haut'])) $haut=$_POST['haut'];
    else $haut='';

if (isset($_POST['bas'])) $bas=$_POST['bas'];
    else $bas='';

// On vérifie si les champs sont vides
if (empty($ville) OR empty($haut OR empty($bas)))
        {
            echo 'Remplissez tous les champs';
        }
// Aucun champ n'est vide, on peut enregistrer dans la table
else
        {
            // Connexion à la base de données
            $bd=mysqli_connect('localhost','root','root') or die('Erreur de connexion'.mysqli_error());

            // Sélection de la base
            mysqli_select_db($bd,'weatherapp') or die ('Erreur de selection'.mysqli_error($bd));

            // On écrit la requête sql
            $sql="INSERT INTO Météo(ville,haut,bas) VALUES ('$ville','$haut','$bas')";

            // On insère les informations du formulaire dans la table
            mysqli_query($bd,$sql) or die ('Erreur SQL!'.$sql.'<br>'.mysqli_error($bd,$sql));

            // On affiche le résultat pour le visiteur

            echo 'Vos infos ont été ajoutées';

            mysqli_close($bd); // On ferme la connexion
        }

?>

</body>
</html>

