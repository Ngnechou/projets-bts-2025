
<?php
require'database.php';
?>


<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>OfficeFlow - Accueil</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
  <style>
    :root {
      --primary: #1a73e8;
      --accent: #4fc3f7;
      --light: #ffffff;
      --bg: #f9f9f9;
      --text-dark: #222;
      --text-light: #666;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      scroll-behavior: smooth;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background: var(--bg);
      color: var(--text-dark);
      line-height: 1.6;
    }

    a {
      text-decoration: none;
      color: inherit;
    }

    .container {
      max-width: 1200px;
      margin: auto;
      padding: 0 30px;
    }

    /* HEADER */
    header {
      background-color: var(--primary);
      color: white;
      padding: 20px 0;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      position: sticky;
      top: 0;
      z-index: 1000;
    }

    header .container {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .logo {
      font-size: 1.8em;
      font-weight: 700;
      letter-spacing: 1px;
      cursor: default;
    }

    nav ul {
      list-style: none;
      display: flex;
      gap: 25px;
    }

    nav ul li a {
      font-weight: 500;
      padding: 8px 14px;
      border-radius: 4px;
      transition: 0.3s;
    }

    nav ul li a:hover {
      background: rgba(255,255,255,0.15);
    }

    .btn {
      background-color: white;
      color: var(--primary);
      font-weight: bold;
      padding: 8px 18px;
      border-radius: 25px;
      transition: all 0.3s ease;
    }

    .btn:hover {
      background-color: #e3f2fd;
      transform: scale(1.05);
    }

    /* HERO SECTION */
    .hero {
      background: linear-gradient(to right, var(--primary), var(--accent));
      color: white;
      padding: 120px 30px;
      text-align: center;
      position: relative;
      overflow: hidden;
    }

    .hero h1 {
      font-size: 3.2em;
      font-weight: 700;
      margin-bottom: 20px;
      animation: fadeInDown 1s ease-out forwards;
    }

    .hero p {
      font-size: 1.3em;
      max-width: 700px;
      margin: auto;
      animation: fadeInUp 1.5s ease-out forwards;
    }

    .glow-btn {
      margin-top: 30px;
      display: inline-block;
      padding: 14px 30px;
      font-size: 1em;
      border-radius: 30px;
      background: white;
      color: var(--primary);
      font-weight: bold;
      box-shadow: 0 0 15px rgba(255,255,255,0.4);
      transition: 0.3s ease;
      animation: fadeInUp 2s ease-out forwards;
      cursor: pointer;
    }

    .glow-btn:hover {
      background: #e3f2fd;
      box-shadow: 0 0 20px white, 0 0 40px white;
      transform: scale(1.05);
    }

    /* FEATURES */
    #features {
      padding: 80px 0;
      background: var(--light);
    }

    #features h2 {
      text-align: center;
      font-size: 2.5em;
      margin-bottom: 50px;
      color: var(--primary);
    }

    .feature-cards {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 30px;
    }

    .card {
      background: white;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.06);
      text-align: center;
      transition: 0.3s ease;
      cursor: default;
    }

    .card:hover {
      transform: translateY(-10px);
      box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }

    .card i {
      font-size: 40px;
      color: var(--primary);
      margin-bottom: 15px;
      display: block;
    }

    .card h3 {
      font-size: 1.3em;
      margin-bottom: 10px;
    }

    .card p {
      color: var(--text-light);
      font-size: 0.95em;
    }

    /* ABOUT */
    #about {
      padding: 80px 0;
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      gap: 50px;
    }

    #about .text {
      flex: 1;
    }

    #about h2 {
      font-size: 2.2em;
      margin-bottom: 20px;
      color: var(--primary);
    }

    #about p {
      font-size: 1.1em;
      line-height: 1.8;
      color: var(--text-light);
    }

    #about img {
      flex: 1;
      max-width: 500px;
      width: 100%;
      border-radius: 15px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }

    /* FOOTER */
    footer {
      background-color: var(--primary);
      color: white;
      text-align: center;
      padding: 30px 20px;
      font-size: 0.95em;
      margin-top: 50px;
    }

    footer a {
      color: #fff;
      margin: 0 10px;
      font-weight: bold;
      transition: 0.3s;
    }

    footer a:hover {
      text-decoration: underline;
      color: #e3f2fd;
    }

    /* ANIMATIONS */
    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }

    @keyframes fadeInDown {
      from { opacity: 0; transform: translateY(-30px); }
      to { opacity: 1; transform: translateY(0); }
    }

    /* RESPONSIVE */
    @media (max-width: 768px) {
      .hero h1 { font-size: 2.3em; }
      #about { flex-direction: column; }
    }
  </style>
</head>
<body>

  <!-- HEADER -->
  <header>
    <div class="container">
      <div class="logo">OfficeFlow</div>
      <nav>
        <ul>
          <li><a href="#features">Fonctionnalités</a></li>
          <li><a href="#about">À propos</a></li>
          <li><a href="login.php" class="btn">Connexion</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <!-- HERO -->
  <section class="hero">
    <div class="container">
      <h1>Optimisez le secrétariat du centre de formation professionnelle la canadienne</h1>
      <p>OfficeFlow simplifie la gestion des tâches, des utilisateurs et des documents pour les centres de formation.</p>
      <a href="login.php" class="glow-btn">Commencer maintenant</a>
    </div>
  </section>

  <!-- FEATURES -->
  <section id="features">
    <div class="container">
      <h2>Fonctionnalités clés</h2>
      <div class="feature-cards">
        <div class="card">
          <i>📁</i>
          <h3>Gestion des Tâches</h3>
          <p>Créez, suivez et assignez des tâches administratives à votre équipe.</p>
        </div>
        <div class="card">
          <i>👥</i>
          <h3>Utilisateurs & Rôles</h3>
          <p>Ajoutez des comptes, attribuez des rôles (admin, assistant, etc.) et gérez les accès.</p>
        </div>
        <div class="card">
          <i>📊</i>
          <h3>Statuts Personnalisés</h3>
          <p>Suivez l’avancement avec des statuts adaptés à chaque tâche.</p>
        </div>
        <div class="card">
          <i>🗂️</i>
          <h3>Catégories & Organisation</h3>
          <p>Classez les tâches par catégories pour un suivi clair et efficace.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ABOUT -->
  <section id="about">
    <div class="container">
      <div class="text">
        <h2>À propos d’OfficeFlow</h2>
        <p>OfficeFlow est une application pensée pour les centres de formation professionnelle, facilitant la gestion du secrétariat. Avec une interface intuitive et des fonctionnalités adaptées, OfficeFlow vous aide à gagner du temps et à améliorer la productivité de votre équipe.</p>
      </div>
      <img src="https://images.unsplash.com/photo-1581091215367-cd244dc76ee2?auto=format&fit=crop&w=600&q=80" alt="Secrétariat moderne" />
    </div>
  </section>

  <!-- FOOTER -->
  <footer>
    <div class="container">
      <p><strong>OfficeFlow</strong> — Gestion intelligente du secrétariat</p>
      <p>
        <a href="#features">Fonctionnalités</a> |
        <a href="#about">À propos</a> |
        <a href="login.php">Connexion</a>
      </p>
      <p>📧 Contact : <a href="mailto:contact@officeflow.com">contact@officeflow.com</a></p>
      <p>© 2025 OfficeFlow. Tous droits réservés.</p>
    </div>
  </footer>

</body>
</html>
