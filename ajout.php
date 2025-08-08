<?php
 $pdo = new PDO("mysql:host=localhost;dbname=taches_secretariat", "root", "", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);

$message = '';
$error = '';

// Définition des catégories manuellement (car ta table categories n'a pas de colonne libele)
$categories = [
    1 => 'Dossiers',
    2 => 'Rendez-vous',
    3 => 'Courriers',
    4 => 'Autres',
];
$statuts = [
    1 => 'effectuer',
    2 => 'non-effectuer',
    3 => 'en-cours',
 
];

// Récupérer utilisateurs et statuts depuis la base
$utilisateurs = $pdo->query("SELECT id, nom FROM utilisateurs")->fetchAll(PDO::FETCH_KEY_PAIR);


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $titre = trim($_POST['titre'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $categorie_id = (int)($_POST['categorie'] ?? 0);
    $utilisateur_id = (int)($_POST['utilisateur'] ?? 0);
    $date_creation = $_POST['date_creation'] ?? '';
    $statut_id = (int)($_POST['statut'] ?? 0);

    if ($titre && $description && $categorie_id && $utilisateur_id && $date_creation && $statut_id) {
        try {
            $stmt = $pdo->prepare("INSERT INTO taches (titre, description, date_creation,date_modification, utilisateur_id,categorie_id, statut_id) VALUES (?, ?, ?, NOW(), ?, ?, ?)");
            $stmt->execute([$titre, $description,$date_creation, $utilisateur_id,$categorie_id, $statut_id]);
            $message = "✅ Tâche ajoutée avec succès !";
        } catch (Exception $e) {
            $error = "Erreur lors de l'insertion : " . $e->getMessage();
        }
    } else {
        $error = "Tous les champs sont obligatoires.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <title>Gestion des Tâches</title>
  <style>
    /* Ton CSS habituel ici */
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f4f7fc;
      margin: 0;
      padding: 30px;
    }
    h1 {
      color: #2c3e50;
      margin-bottom: 20px;
    }
    .form-container {
      background: #fff;
      padding: 25px;
      border-radius: 12px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      margin-bottom: 30px;
    }
    form {
      display: flex;
      flex-wrap: wrap;
      gap: 15px;
      align-items: center;
    }
    input, select, textarea {
      padding: 10px;
      font-size: 14px;
      width: 200px;
      border: 1px solid #ccc;
      border-radius: 6px;
    }
    textarea {
      height: 60px;
      resize: vertical;
      width: 100%;
      max-width: 600px;
    }
    button {
      padding: 10px 20px;
      background: #2980b9;
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      transition: background 0.3s;
    }
    button:hover {
      background: #1f618d;
    }
    .message {
      padding: 10px;
      background-color: #d4edda;
      color: #155724;
      border: 1px solid #c3e6cb;
      border-radius: 6px;
      margin-bottom: 15px;
    }
    .error {
      padding: 10px;
      background-color: #f8d7da;
      color: #721c24;
      border: 1px solid #f5c6cb;
      border-radius: 6px;
      margin-bottom: 15px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      background: #fff;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }
    th, td {
      padding: 14px;
      text-align: left;
      border-bottom: 1px solid #e0e0e0;
    }
    th {
      background: #f0f4f8;
      color: #34495e;
    }
    .status {
      padding: 6px 12px;
      border-radius: 12px;
      color: white;
      font-weight: bold;
      font-size: 13px;
      text-transform: uppercase;
      display: inline-block;
    }
    .effectuee { background-color: #2ecc71; }
    .non-effectuee { background-color: #e74c3c; }
    .en-cours { background-color: #3498db; }
  </style>
</head>
<body>

  <h1>Ajouter une Tâche</h1>
<a href="index.php">retour a l'accueil</a>
  <div class="form-container">
    <?php if ($message): ?>
      <div class="message"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>

    <?php if ($error): ?>
      <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST" novalidate>
      <input type="text" name="titre" placeholder="Nom de la tâche"  value="<?= htmlspecialchars($_POST['titre'] ?? '') ?>" />
      <textarea name="description" placeholder="Description de la tâche" ><?= htmlspecialchars($_POST['description'] ?? '') ?></textarea>

      <select name="categorie" required>
        <option value="">-- Catégorie --</option>
        <?php foreach ($categories as $id => $libelle): ?>
          <option value="<?= $id ?>" <?= (isset($_POST['categorie']) && $_POST['categorie'] == $id) ? 'selected' : '' ?>>
            <?= htmlspecialchars($libelle) ?>
          </option>
        <?php endforeach; ?>
      </select>

      <select name="statut" required>
        <option value="">-- statut --</option>
        <?php foreach ($statuts as $id => $libelle): ?>
          <option value="<?= $id ?>" <?= (isset($_POST['statut']) && $_POST['statut'] == $id) ? 'selected' : '' ?>>
            <?= htmlspecialchars($libelle) ?>
          </option>
        <?php endforeach; ?>
      </select>

      <select name="utilisateur" required>
        <option value="">-- Utilisateur --</option>
        <?php foreach ($utilisateurs as $id => $nom): ?>
          <option value="<?= $id ?>" <?= (isset($_POST['utilisateur']) && $_POST['utilisateur'] == $id) ? 'selected' : '' ?>>
            <?= htmlspecialchars($nom) ?>
          </option>
        <?php endforeach; ?>
      </select>

      <input type="date" name="date_creation" required value="<?= htmlspecialchars($_POST['date_creation'] ?? '') ?>" />

     
      <button type="submit">Ajouter</button>
    </form>
  </div>

  <h1>Liste des Tâches</h1>

  <table>
    <thead>
      <tr>
        <th>Nom</th>
        <th>Description</th>
        <th>Catégorie</th>
        <th>Utilisateur</th>
        <th>Échéance</th>
        <th>Statut</th>
        <th>Créée le</th>
        <th>actions</th>
        
      </tr>
    </thead>
    <tbody>
      <?php
      // Requête sans jointure sur categories (car structure spécifique)
      $sql = "SELECT t.*, u.nom AS utilisateur_nom, s.libelle AS statut_nom
              FROM taches t
              LEFT JOIN utilisateurs u ON t.utilisateur_id = u.id
              LEFT JOIN statuts s ON t.statut_id = s.statut_id
              ORDER BY t.date_creation DESC";

      foreach ($pdo->query($sql) as $row):
        $statusClass = strtolower(str_replace(' ', '-', $row['statut_nom']));
      ?>
        <tr>
          <td><?= htmlspecialchars($row['titre']) ?></td>
          <td><?= htmlspecialchars($row['description']) ?></td>
          <td><?= htmlspecialchars($categories[$row['categorie_id']] ?? 'N/A') ?></td>
          <td><?= htmlspecialchars($row['utilisateur_nom'] ?? 'N/A') ?></td>
          <td><?= htmlspecialchars($row['date_creation']) ?></td>
          <td><span class="status <?= $statusClass ?>"><?= htmlspecialchars(ucfirst(str_replace('-', ' ', $row['statut_nom']))) ?></span></td>
          <td><?= htmlspecialchars($row['date_creation']) ?></td>
          <td> <a href=""><button>modifier</button></a>
        <button style=' background:red'>supprimer</button>
        </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

</body>
</html>
