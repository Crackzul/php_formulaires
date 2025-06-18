<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>130625Exercices_PHP_Formulaires</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<!-- Exercices à faire : 5, tente le 8 et le 10 -->
<body>

    <h1>1.Requête GET via URL</h1>
    <!-- http://localhost/130625Exercices_PHP_Formulaires/?ville=Périgueux&transport=Vélo -->
    <?php
    
    if ((isset($_GET['ville'])) && (isset($_GET['transport'])) ){
    $ville = $_GET['ville'];
    $transport = $_GET['transport'];
         
         
    echo 'La ville choisie est ' . $ville . ' et le transport se ferra en ' . $transport . ' !';
   }
    ?>

    <h1>2.Requête GET via Formulaire</h1>

    <form action="index.php" method="get">
        <input type="text" name="espece" placeholder="Espèce" required>
        <button>Envoyer</button>
    </form>
    
    <?php
    if (isset($_GET['espece'])) {
        echo "Le nom saisi est : " . $_GET['espece'];
    }
    ?>
   
    <h1>3.Requête POST</h1>

    <form action="index.php" method="post">
        <input type="text" name="pseudo" placeholder="Pseudo" required>
            <select name="color">
                    <option value="red">Rouge</option>
                    <option value="blue">Bleu</option>
                    <option value="yellow">Jaune</option>
            </select>
            <button>Envoyer</button>
    </form>


    <style>
    
    p{
    background-color:<?php echo $_POST['color'] ?> ;
    }
    </style>

    <p>
    <?php
    if (isset($_POST['pseudo'])) {
        echo "Bonjour : " . $_POST['pseudo'];
    }

    // var_dump($_POST['color'])
    ?>
    </p>

    
    <!-- 
    <h1>4.Dés numériques</h1>
    <p>
        <button>Lancez Moi</button>
        <?php
        // function EstMultipleDeSix($number,$msg=NULL)
        // {
        //     if($number % 6 == 0) {
        //     echo "$number" . "est divisible par 6, BRAVO";    
        // }else{
        //     echo "Essaie encore";
        // } 
        // }
        ?>
    </p> -->

    <h1>Exercice 5 : Authentification sur Formulaire</h1>

    <p>Faire un formulaire d’authentification qui prendra pour nom d’utilisateur « admin » et comme
    mot de passe « 1234 ». Rediriger l’utilisateur sur une nouvelle page si l’authentification est
    réussie, mettre un message d’erreur si le mot de passe ou le nom d’utilisateur est incorrect
    </p>
    <p>Bonus : Crypter le mot de passe initial</p>

   
    <?php
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['name'];
    $mdp = $_POST['mdp'];

    if ($nom === "admin" && $mdp === "1234") {
        header("Location: page-admin.php");
        exit();
    } else {
        $erreur = "Nom ou mot de passe incorrect.";
    }
    }
    ?>

    <?php if (isset($erreur)) echo "<p style='color:red;'>$erreur</p>"; ?>

    <form action="index.php" method="post" name="Administrateur">
        <label for="nom">Admin :</label>
        <input type="text" name="name" id="nom" placeholder="Nom" required>

        <label for="mdp">Mot de passe :</label>
        <input type="password" name="mdp" id="mdp" placeholder="Mot de passe" required>

        <input type="submit" value="Entrez">
    </form>
    
    <h1>Exercice 8</h1>

    <fieldset>
  <legend>Select a maintenance drone:</legend>

  <div>
    <input type="radio" id="plat" name="plat" value="plat" checked />
    <label for="saison">Quel est ton plat préféré ?</label>
  </div>

  <div>
    <input type="radio" id="dewey" name="saison" value="saison" />
    <label for="saison">Quel est ta saison préféré</label>
  </div>

  <div>
    <input type="radio" id="louie" name="color" value="color" />
    <label for="color">Quel est ta couleur préférée</label>
  </div>
</fieldset>

</body>
</html>