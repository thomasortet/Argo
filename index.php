<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Les Argonautes</title>
</head>
<body>
<header>
    <h1>
        <img src="https://www.wildcodeschool.com/assets/logo_main-e4f3f744c8e717f1b7df3858dce55a86c63d4766d5d9a7f454250145f097c2fe.png" alt="Wild Code School logo" />
        Les Argonautes
    </h1>
</header>

<!-- Main section -->
<main>

    <!-- New member form -->
    <h2>Ajouter un(e) Argonaute</h2>
    <form method="post" action="traitement.php" class="new-member-form">
        <label for="name">Nom de l&apos;Argonaute</label>
        <input id="name" name="name" type="text" placeholder="Charalampos" required/>
        <button type="submit">Envoyer</button>
    </form>

    <h2>Membres de l'équipage</h2>
    <section class="member-list">

        <!-- Appel à la base de données -->
        <?php

        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=wild_code;charset=utf8', 'root', '');
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }


        // Récupération du contenu de la table argonautes

        $reponse = $bdd->query('SELECT * FROM argonautes');

        // Boucle pour afficher les argonautes

        while ($donnees = $reponse->fetch())
        {
            ?>
            <div class="col-4 member-item"><?php echo $donnees['name']; ?></div>
            <?php
        }

        // Termine le traitement de la requête

        $reponse->closeCursor();

        ?>
    </section>
</main>


<footer>
    <p>Réalisé par Thomas en Gironde de l'an 2021 après JC</p>
</footer>
</body>
</html>