<?php
// Connexion à la base de données
 require 'database.php';

// Traitement du formulaire
$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['nom']);
    $email = trim($_POST['email']);
    $mot_de_passe = $_POST['mot_de_passe'];
   

    if (!empty($nom) && !empty($email) && !empty($mot_de_passe)) {
        // Hasher le mot de passe
        $mot_de_passe_hash = password_hash($mot_de_passe, PASSWORD_DEFAULT);

        try {
            $stmt = $pdo->prepare("INSERT INTO utilisateurs (nom, email, mot_de_passe, date_creation) 
                                   VALUES (?, ?, ?,  NOW())");
            $stmt->execute([$nom, $email, $mot_de_passe_hash,]);
            $success = " ✔👨‍⚖️Utilisateur ajouté avec succès !";
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                $error = "Cet email est déjà utilisé.";
            } else {
                $error = "Erreur : " . $e->getMessage();
            }
        }
    } else {
        $error = "Tous les champs sont requis.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Ajouter un utilisateur - OfficeFlow</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #e3e5ecff;
      padding: 40px;
    }

    h2 {
      color: #1a73e8;
      margin-bottom: 20px;
      justify-content: center;
      text-align: center;
      
      
    }

    form {
      background: #fff;
      padding: 25px;
      border-radius: 10px;
      max-width: 500px;
      margin: auto;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    label {
      display: block;
      margin-bottom: 8px;
      font-weight: bold;
    }

    input, select {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .btn {
      background-color: #1a73e8;
      color: white;
      padding: 10px 20px;
      border: none;
      font-weight: bold;
      border-radius: 5px;
      cursor: pointer;
    }

    .btn:hover {
      background-color: #1669c1;
    }

    .message {
      text-align: center;
      margin-top: 20px;
      font-weight: bold;
    }

    .success {
      color: green;
    }

    .error {
      color: red;
    }

    a {
      display: block;
      text-align: center;
      margin-top: 20px;
      color: #1a73e8;
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <h2>Ajouter un utilisateur</h2>

  <form method="POST" action="">
    <label for="nom">Nom</label>
    <input type="text" name="nom" placeholder="entrez votre nom" id="nom" >

    <label for="email">Email</label>
    <input type="email" name="email" placeholder="entrez votre email"  id="email" >

    <label for="mot_de_passe">Mot de passe</label>
    <input type="password" name="mot_de_passe" placeholder="entrez votre mot de passe" id="mot_de_passe" >

    

    <button type="submit" class="btn">Enregistrer</button>
  </form>

  <?php if ($success): ?>
    <div class="message success"><?= $success ?></div>
  <?php elseif ($error): ?>
    <div class="message error"><?= $error ?></div>
  <?php endif; ?>

 <a href="index.php">← Retour à l'accueil</a>

</body>
</html>
