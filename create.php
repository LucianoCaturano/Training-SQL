<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<a href="/php-pdo/read.php">Liste des données</a>
	<h1>Ajouter</h1>
	<form action="" method="post">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
				<option value="très facile">Très facile</option>
				<option value="facile">Facile</option>
				<option value="moyen">Moyen</option>
				<option value="difficile">Difficile</option>
				<option value="très difficile">Très difficile</option>
			</select>
		</div>

		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="time" name="duration" value="">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="">
		</div>
		<button type="submit" name="button">Envoyer</button>
	</form>

    <?php
    // On commence par récupérer les champs

    if(isset($_POST['name'])) $name=$_POST['name'];
    else $name='';

    if(isset($_POST['difficulty'])) $difficulty=$_POST['difficulty'];
    else $difficulty='';

    if (isset($_POST['distance'])) $distance=$_POST['distance'];
    else $distance='';

    if(isset($_POST['duration'])) $duration=$_POST['duration'];
    else $duration='';

    if(isset($_POST['height_difference'])) $height_difference=$_POST['height_difference'];
    else $height_difference='';

    // On vérifie si les champs sont vides
    if (empty($name) OR empty($difficulty) OR empty($distance) OR empty($duration) OR empty($height_difference))
    {
        echo 'Remplissez tous les champs';
    }
// Aucun champ n'est vide, on peut enregistrer dans la table
    else
    {
        // Connexion à la base de données
        $bd=mysqli_connect('localhost','root','root') or die('Erreur de connexion'.mysqli_error());

        // Sélection de la base
        mysqli_select_db($bd,'becode') or die ('Erreur de selection'.mysqli_error($bd));

        // On écrit la requête sql
        $sql="INSERT INTO hiking (name,difficulty,distance,duration,height_difference) VALUES ('$name','$difficulty','$distance','$duration','$height_difference')";

        // On insère les informations du formulaire dans la table
        mysqli_query($bd,$sql) or die ('Erreur SQL!'.$sql.'<br>'.mysqli_error($bd,$sql));

        // On affiche le résultat pour le visiteur

        echo 'La randonnée a été ajoutée avec succès.';

        mysqli_close($bd); // On ferme la connexion
    }

    ?>
</body>
</html>
