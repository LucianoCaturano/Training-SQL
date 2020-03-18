<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Randonnées</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
    <h1>Liste des randonnées</h1>
        <table>
            <thead>
            <tr>
                <th>Name</th>
                <th>Difficulty</th>
                <th>Distance (km)</th>
                <th>Duration (hours)</th>
                <th>Height difference (m)</th>
            </tr>
            </thead>
        </table>
    <?php
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=becode;charset=utf8', 'root', 'root');
    }
    catch (Exception $e)
    {
        die('Erreur:'.$e->getMessage());
    }

    $reponse = $bdd->query('SELECT * FROM hiking');
    while ($donnees = $reponse->fetch()) {
        ?>
        <table>
            <tr>
                <th><?php echo $donnees['name']; ?>
                    <a href="update.php?id=<?php echo $donnees['id']; ?>">Modifier</a>
                </th>
                <td><?php echo $donnees['difficulty']; ?></td>
                <td><?php echo $donnees['distance']; ?></td>
                <td><?php echo $donnees['duration']; ?></td>
                <td><?php echo $donnees['height_difference']; ?></td>
            </tr>
        </table>
        <?php
    }
    ?>

    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 5px;
            text-align: left;
        }
        table {
            table-layout: fixed ;
            width: 100% ;
        }
        td {
            width: 20% ;
        }
    </style>
  </body>
</html>
