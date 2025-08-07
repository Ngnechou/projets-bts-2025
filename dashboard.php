<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dashboard - Gestion des tâches secrétariat</title>

  <!-- Boxicons CDN -->
  <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />

  <style>
    /* Reset */
    * {
      margin: 0; padding: 0; box-sizing: border-box;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
      display: flex;
      min-height: 100vh;
      background: #e7f0fc;
      color: #0a2240;
    }

    /* SIDEBAR */
    #sidebar {
      background-color: #0b3d91;
      width: 250px;
      min-height: 100vh;
      padding: 20px 0;
      color: #fff;
      position: fixed;
    }

    #sidebar .brand {
      display: flex;
      align-items: center;
      gap: 10px;
      font-size: 24px;
      font-weight: bold;
      padding: 0 30px 30px 30px;
      border-bottom: 1px solid #1457b5;
    }

    #sidebar .brand i {
      color: #3ea0ff;
    }

    #sidebar ul.side-menu {
      list-style: none;
      padding: 20px 0;
    }

    #sidebar ul.side-menu.top li,
    #sidebar ul.side-menu li {
      padding: 15px 30px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    #sidebar ul.side-menu.top li.active,
    #sidebar ul.side-menu li:hover {
      background-color: #3ea0ff;
      color: #fff;
    }

    #sidebar ul.side-menu li a {
      text-decoration: none;
      color: inherit;
      display: flex;
      align-items: center;
      gap: 15px;
      font-size: 16px;
    }

    #sidebar ul.side-menu li a i {
      font-size: 20px;
    }

    /* CONTENT */
    #content {
      margin-left: 250px;
      width: calc(100% - 250px);
      padding: 30px;
      background: #f0f6ff;
    }

    /* NAVBAR */
    nav {
      display: flex;
      align-items: center;
      justify-content: space-between;
      background-color: #fff;
      padding: 10px 30px;
      border-radius: 6px;
      box-shadow: 0 1px 5px rgb(0 0 0 / 0.1);
      margin-bottom: 25px;
      color: #0a2240;
    }

    nav i.bx-menu {
      font-size: 28px;
      cursor: pointer;
      color: #0b3d91;
    }

    nav .nav-link {
      font-weight: 600;
      font-size: 18px;
      color: #0b3d91;
    }

    nav form {
      flex: 1;
      margin: 0 30px;
    }

    nav form .form-input {
      position: relative;
    }

    nav form input[type="search"] {
      width: 100%;
      padding: 8px 50px 8px 15px;
      border: 1px solid #3ea0ff;
      border-radius: 25px;
      font-size: 16px;
      outline: none;
      transition: 0.3s;
      color: #0a2240;
    }

    nav form input[type="search"]:focus {
      border-color: #0b3d91;
      box-shadow: 0 0 8px #0b3d91;
    }

    nav form .search-btn {
      position: absolute;
      top: 50%;
      right: 10px;
      transform: translateY(-50%);
      border: none;
      background: none;
      cursor: pointer;
      color: #0b3d91;
      font-size: 20px;
    }

    nav .notification {
      position: relative;
      font-size: 24px;
      color: #0b3d91;
      margin-right: 20px;
      cursor: pointer;
    }

    nav .notification .num {
      position: absolute;
      top: -5px;
      right: -8px;
      background-color: #ff4d4d;
      color: white;
      font-size: 12px;
      font-weight: bold;
      padding: 2px 6px;
      border-radius: 50%;
    }

    nav .profile img {
      width: 40px;
      border-radius: 50%;
      cursor: pointer;
    }

    /* MAIN CONTENT */
    main .head-title {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 25px;
      color: #0b3d91;
    }

    main .head-title .left h1 {
      font-size: 28px;
      font-weight: 700;
      color: #0b3d91;
    }

    main .head-title .breadcrumb {
      list-style: none;
      display: flex;
      align-items: center;
      color: #4170d9;
      font-size: 14px;
      margin-top: 5px;
    }

    main .head-title .breadcrumb li {
      margin-right: 7px;
    }

    main .head-title .breadcrumb li a {
      text-decoration: none;
      color: #4170d9;
      font-weight: 600;
    }

    main .head-title .breadcrumb li a.active {
      color: #0b3d91;
    }

    main .btn-download {
      background-color: #0b3d91;
      color: white;
      padding: 10px 18px;
      border-radius: 25px;
      font-weight: 600;
      text-decoration: none;
      display: flex;
      align-items: center;
      gap: 10px;
      transition: background-color 0.3s ease;
    }

    main .btn-download:hover {
      background-color: #1457b5;
    }

    /* BOX INFO */
    .box-info {
      display: flex;
      justify-content: space-between;
      margin-bottom: 35px;
      gap: 20px;
    }

    .box-info li {
      background-color: #fff;
      flex: 1;
      padding: 25px 30px;
      border-radius: 12px;
      box-shadow: 0 1px 6px rgb(0 0 0 / 0.1);
      display: flex;
      align-items: center;
      gap: 20px;
      color: #0b3d91;
    }

    .box-info li i {
      font-size: 40px;
      color: #3ea0ff;
    }

    .box-info li .text h3 {
      font-size: 28px;
      font-weight: 700;
      margin-bottom: 5px;
      color: #0b3d91;
    }

    .box-info li .text p {
      font-weight: 600;
      color: #4170d9;
    }

    /* TABLE DATA */
    .table-data {
      display: flex;
      gap: 30px;
    }

    .table-data .order {
      flex: 3;
      background-color: #fff;
      padding: 20px 30px;
      border-radius: 12px;
      box-shadow: 0 1px 8px rgb(0 0 0 / 0.1);
    }

    .table-data .order .head {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
      color: #0b3d91;
    }

    .table-data .order .head h3 {
      font-size: 22px;
      font-weight: 700;
    }

    .table-data .order table {
      width: 100%;
      border-collapse: collapse;
    }

    .table-data .order table thead tr {
      background-color: #e3efff;
    }

    .table-data .order table thead th {
      padding: 15px;
      text-align: left;
      font-weight: 700;
      color: #0b3d91;
      border-bottom: 3px solid #3ea0ff;
    }

    .table-data .order table tbody tr {
      border-bottom: 1px solid #d0dffa;
      transition: background-color 0.3s;
    }

    .table-data .order table tbody tr:hover {
      background-color: #f0f7ff;
    }

    .table-data .order table tbody td {
      padding: 12px 15px;
      vertical-align: middle;
      color: #0a2240;
      font-weight: 600;
    }

    .table-data .order table tbody td span.status {
      padding: 5px 12px;
      border-radius: 15px;
      font-weight: 700;
      font-size: 13px;
      text-transform: uppercase;
      display: inline-block;
      color: white;
    }

    .status.effectuee {
      background-color: #2ecc71; /* vert */
    }

    .status.non-effectuee {
      background-color: #e74c3c; /* rouge */
    }

    .status.en-cours {
      background-color: #3498db; /* bleu clair */
    }

    /* TODO LIST */
    .table-data .todo {
      flex: 1.2;
      background-color: #fff;
      padding: 20px 25px;
      border-radius: 12px;
      box-shadow: 0 1px 8px rgb(0 0 0 / 0.1);
      display: flex;
      flex-direction: column;
      color: #0b3d91;
    }

    .table-data .todo .head {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 18px;
    }

    .table-data .todo .head h3 {
      font-size: 20px;
      font-weight: 700;
    }

    .table-data .todo ul.todo-list {
      list-style: none;
      flex-grow: 1;
      overflow-y: auto;
      max-height: 350px;
      color: #0a2240;
    }

    .todo-list li {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px 5px;
      border-bottom: 1px solid #d0dffa;
      cursor: pointer;
      font-size: 15px;
      font-weight: 600;
    }

    .todo-list li.completed p {
      text-decoration: line-through;
      color: #5a5cd3ff;
    }

    .todo-list li i {
      font-size: 20px;
      color: #4170d9;
      cursor: pointer;
    }

    /* Scrollbar todo list */
    .todo-list::-webkit-scrollbar {
      width: 6px;
    }

    .todo-list::-webkit-scrollbar-thumb {
      background-color: #3ea0ff;
      border-radius: 10px;
    }

  </style>
</head>
<body>

  <!-- SIDEBAR -->
  <section id="sidebar">
    <a href="#" class="brand">
      <i class='bx bxs-briefcase'></i>
      <span class="text">Secrétariat</span>
    </a>
    <ul class="side-menu top">
      <li class="active">
        <a href="#">
          <i class='bx bxs-dashboard'></i>
          <span class="text">Dashboard</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bxs-user'></i>
          <span class="text">Utilisateurs</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bxs-category'></i>
          <span class="text">Catégories</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bxs-task'></i>
          <span class="text">Tâches</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bxs-flag'></i>
          <span class="text">Statut</span>
        </a>
      </li>
    </ul>
    <ul class="side-menu">
      <li>
        <a href="#">
          <i class='bx bxs-cog'></i>
          <span class="text">Paramètres</span>
        </a>
      </li>
      <li>
        <a href="#" class="logout">
          <i class='bx bxs-log-out-circle'></i>
          <span class="text">Déconnexion</span>
        </a>
      </li>
    </ul>
  </section>

  <!-- CONTENT -->
  <section id="content">
    <!-- NAVBAR -->
    <nav>
      <i class='bx bx-menu'></i>
      <a href="#" class="nav-link">Tâches</a>
      <form action="#">
        <div class="form-input">
          <input type="search" placeholder="Rechercher..." />
          <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
        </div>
      </form>
      <a href="#" class="notification">
        <i class='bx bxs-bell'></i>
        <span class="num">4</span>
      </a>
      <a href="#" class="profile">
        <img src="img/people.png" alt="Profil" />
      </a>
    </nav>

    <!-- MAIN -->
    <main>
      <div class="head-title">
        <div class="left">
          <h1>Dashboard</h1>
          <ul class="breadcrumb">
            <li><a href="index.php">Accueil</a></li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li><a class="active" href="#">Dashboard</a></li>
          </ul>
        </div>
        <a href="#" class="btn-download">
          <i class='bx bxs-cloud-download'></i>
          <span class="text">Télécharger PDF</span>
        </a>
      </div>

      <!-- Statistiques -->
      <ul class="box-info">
        <li>
          <i class='bx bxs-user'></i>
          <span class="text">
            <h3>12</h3>
            <p>Utilisateurs</p>
          </span>
        </li>
        <li>
          <i class='bx bxs-category'></i>
          <span class="text">
            <h3>4</h3>
            <p>Catégories</p>
          </span>
        </li>
        <li>
          <i class='bx bxs-task'></i>
          <span class="text">
            <h3>50</h3>
            <p>Tâches totales</p>
          </span>
        </li>
        <li>
          <i class='bx bxs-flag'></i>
          <span class="text">
            <h3>20</h3>
            <p>Tâches effectuées</p>
          </span>
        </li>
      </ul>

      <!-- Tableau des tâches -->
      <div class="table-data">
        <div class="order">
          <div class="head">
            <h3>Tâches récentes</h3>
            <i class='bx bx-search'></i>
            <i class='bx bx-filter'></i>
          </div>
          <table>
            <thead>
              <tr>
                <th>Tâche</th>
                <th>Catégorie</th>
                <th>Utilisateur</th>
                <th>Date échéance</th>
                <th>Statut</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Préparer le rapport mensuel</td>
                <td>Courrier</td>
                <td>Marie Dupont</td>
                <td>2025-08-10</td>
                <td><span class="status effectuee">Effectuée</span></td>
              </tr>
              <tr>
                <td>Appeler le client X</td>
                <td>Rendez-vous</td>
                <td>Paul Martin</td>
                <td>2025-08-08</td>
                <td><span class="status non-effectuee">Non effectuée</span></td>
              </tr>
              <tr>
                <td>Envoyer le courrier Y</td>
                <td>Courrier</td>
                <td>Julie Bernard</td>
                <td>2025-08-09</td>
                <td><span class="status en-cours">En cours</span></td>
              </tr>
              <tr>
                <td>Organiser la visite fournisseur</td>
                <td>Visite</td>
                <td>Lucie Thomas</td>
                <td>2025-08-15</td>
                <td><span class="status non-effectuee">Non effectuée</span></td>
              </tr>
              <tr>
                <td>Classer dossiers archivés</td>
                <td>Dossier</td>
                <td>Marc Leroy</td>
                <td>2025-08-12</td>
                <td><span class="status effectuee">Effectuée</span></td>
              </tr>
            </tbody>
          </table>
        </div>

        <!-- Liste des tâches à faire -->
        <div class="todo">
          <div class="head">
            <h3>Liste des tâches</h3>
            <i class='bx bx-plus'></i>
            <i class='bx bx-filter'></i>
          </div>
          <ul class="todo-list">


		  