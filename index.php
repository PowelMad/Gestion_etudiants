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
            <li><a href="Ajouter un etudiant">Ajouter un etudiant</a></li>
            <li><a href="Ajouter un etudiant"></a>Liste des etufiants</li>
        </ul>
    </nav>
    <?php
        require "connexion.php";
        $fl = $db->prepare("SELECT * FROM filieres");
        $fl->execute();
        $data = $fl->fetchAll();
        $el = $db-> query('SELECT * FROM etudiants' ); 
           
    ?>
    <h2>Formulaire d'enregistrement</h2>
    <form method ='POST' action='traitement.php'>
        <input type = "text" placeholder = "Nom ">
        <input type="text" placeholder = "Prenom">
        
        <select name="" id="" >
            <?php
                foreach ($data as $item) {
                   echo '<option value="'.$item[0].'">'.$item[1] .'</option>';
                }
            ?>          
        </select>
    </form>
    <h2 id ="liste"></h2>
    <table border="1">
        <tr>
            <th>Liste des etudiants</th>
        </tr>
        <tr>
            <th>Nom</th>
            <th>Prenom</th>
        </tr>

    </table>
    
</body>
</html>