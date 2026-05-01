<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gestion des Etudiants</title>
    </head>
    <body>
        <nav>
            <ul>
                <li><a href="#formulaire">Ajouter un etudiant</a></li>
                <li><a href="#liste">Liste des etufiants</a></li>
            </ul>
        </nav>
        <?php
            require "connexion.php";
            $fl = $db->prepare("SELECT * FROM filieres");
            $fl->execute();
            $data = $fl->fetchAll();
        ?>
        <form method ='POST' action='traitement.php'>
             <h2 id="formulaire">Formulaire d'enregistrement</h2><br>
            <input type = "text" placeholder = "Nom ">
            <input type="text" placeholder = "Prenom">
            
            <select name="" id="" >
                <?php
                    foreach ($data as $item) {
                    echo '<option value="'.$item[0].'">'.$item[1] .'</option>';
                    }
                ?>          
            </select>
            <input type="submit" value="Ajouter">
        </form>
        <h2 id ="liste"></h2>
        <table border="1">
            <tr>
                <th>Liste des etudiants</th>
            </tr>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Filiere</th>
            </tr>
            <?php
                $el = $db-> query('SELECT etudiants.id, etudiants.nom, etudiants.prenom, filieres.filiere_nom FROM etudiants, filieres WHERE etudiants.filiere_id = filieres.filiere_id' );
                $el->execute();
                while($info = $el->fetch()){
            ?>
                    <tr>
                        <td><?=$info[1]?></td>
                        <td><?=$info[2]?></td>
                        <td><?=$info[3]?></td>
                        <td><a href="update.php?task=modif&id=<?= $info[0]?>">Modifier</a></td>
                        <td><a href="delete.php?task=supp&id=<?= $info[0]?>">Supprimer</a></td>
                    </tr>
            <?php }
            ?>
        </table>
    </body>
</html>