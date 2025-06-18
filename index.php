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
    

    <h1>Exercice 8 : Quizz</h1>

<form method="post" action="">
  <fieldset>
    <legend>1. Quel est ton plat préféré ?</legend>
    <input type="radio" name="q1" id="pizza" value="Pizza" required>
    <label for="pizza">Pizza</label><br>

    <input type="radio" name="q1" id="pates" value="Pâtes">
    <label for="pates">Pâtes</label><br>

    <input type="radio" name="q1" id="tartiflette" value="Tartiflette">
    <label for="tartiflette">Tartiflette</label><br>

    <input type="radio" name="q1" id="sushi" value="Sushi">
    <label for="sushi">Sushi</label><br>
  </fieldset>

  <fieldset>
    <legend>2. Quelle est ta saison préférée ?</legend>
    <input type="radio" name="q2" id="printemps" value="Printemps" required>
    <label for="printemps">Printemps</label><br>

    <input type="radio" name="q2" id="ete" value="Été">
    <label for="ete">Été</label><br>

    <input type="radio" name="q2" id="automne" value="Automne">
    <label for="automne">Automne</label><br>

    <input type="radio" name="q2" id="hiver" value="Hiver">
    <label for="hiver">Hiver</label><br>
  </fieldset>

  <fieldset>
    <legend>3. Quelle est ta couleur préférée ?</legend>
    <input type="radio" name="q3" id="rouge" value="Rouge" required>
    <label for="rouge">Rouge</label><br>

    <input type="radio" name="q3" id="bleu" value="Bleu">
    <label for="bleu">Bleu</label><br>

    <input type="radio" name="q3" id="vert" value="Vert">
    <label for="vert">Vert</label><br>

    <input type="radio" name="q3" id="noir" value="Noir">
    <label for="noir">Noir</label><br>
  </fieldset>

  <br>
  <input type="submit" value="Valider le Quizz">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $score = 0;

    
    $reponses = [ // Mes réponses
        "q1" => "Pizza",
        "q2" => "Été",
        "q3" => "Bleu"
    ];

  
    foreach ($reponses as $question => $bonneReponse) {  // Comparaison avec les réponses données
        if (isset($_POST[$question]) && $_POST[$question] === $bonneReponse) {
            $score++;
        }
    }

   
    echo "<p>Tu as obtenu <strong>$score / 3</strong></p>"; // affiche le score

    // Message selon le score
    if ($score === 3) {
        echo "<p style='color:green;'>Parfait !</p>";
    } elseif ($score === 0) {
        echo "<p style='color:red;'>Essai encore !</p>";
    } else {
        echo "<p>Pas mal, mais tu peux faire mieux</p>";
    }
}
?>


</body>
</html>