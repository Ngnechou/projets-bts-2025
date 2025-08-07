<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard Secrétariat</title>
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<style>
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			font-family: 'Segoe UI', sans-serif;
		}
		body {
			display: flex;
			min-height: 100vh;
			background: #f5f6fa;
		}
		nav {
			width: 220px;
			background: #6c00ff;
			padding: 20px;
			color: white;
		}
		nav h2 {
			margin-bottom: 30px;
		}
		nav a {
			display: block;
			margin: 10px 0;
			text-decoration: none;
			color: white;
			padding: 10px;
			border-radius: 10px;
			transition: 0.3s;
		}
		nav a:hover, nav a.active {
			background: white;
			color: #6c00ff;
		}
		main {
			flex: 1;
			padding: 30px;
		}
		.title {
			font-size: 28px;
			margin-bottom: 10px;
		}
		.breadcrumbs {
			list-style: none;
			display: flex;
			gap: 10px;
			color: #999;
			margin-bottom: 30px;
		}
		.breadcrumbs li a {
			text-decoration: none;
			color: #6c00ff;
		}
		.info-data {
			display: grid;
			grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
			gap: 20px;
			margin-bottom: 30px;
		}
		.card {
			background: white;
			padding: 20px;
			border-radius: 15px;
			box-shadow: 0 3px 10px rgba(0,0,0,0.1);
			position: relative;
		}
		.card .head {
			display: flex;
			justify-content: space-between;
			align-items: center;
		}
		.card .progress {
			display: block;
			height: 8px;
			width: 100%;
			margin: 10px 0;
			border-radius: 5px;
			background: #eee;
			overflow: hidden;
		}
		.card .progress::after {
			content: '';
			display: block;
			height: 100%;
			background: #6c00ff;
			width: var(--value);
		}
		.card .label {
			font-size: 14px;
			color: #6c00ff;
			font-weight: bold;
		}
		.data {
			display: flex;
			flex-wrap: wrap;
			gap: 20px;
		}
		.content-data {
			flex: 1;
			min-width: 300px;
			background: white;
			padding: 20px;
			border-radius: 15px;
			box-shadow: 0 3px 10px rgba(0,0,0,0.1);
		}
	</style>
</head>
<body>
	<nav>
		<h2>AdminSecrétariat</h2>
		<a href="#" class="active">Dashboard</a>
		<a href="#">Tâches</a>
		<a href="#">Utilisateurs</a>
		<a href="#">Catégories</a>
		<a href="#">Statuts</a>
	</nav>
	<main>
		<h1 class="title">Tableau de bord</h1>
		<ul class="breadcrumbs">
			<li><a href="#">Accueil</a></li>
			<li class="divider">/</li>
			<li><a href="#" class="active">Dashboard</a></li>
		</ul>

		<div class="info-data">
			<div class="card" style="--value: 80%">
				<div class="head">
					<div>
						<h2>20</h2>
						<p>Tâches terminées</p>
					</div>
					<i class='bx bx-check-circle'></i>
				</div>
				<span class="progress"></span>
				<span class="label">80%</span>
			</div>
			<div class="card" style="--value: 40%">
				<div class="head">
					<div>
						<h2>10</h2>
						<p>Tâches en attente</p>
					</div>
					<i class='bx bx-time'></i>
				</div>
				<span class="progress"></span>
				<span class="label">40%</span>
			</div>
			<div class="card" style="--value: 30%">
				<div class="head">
					<div>
						<h2>5</h2>
						<p>Courriers</p>
					</div>
					<i class='bx bx-envelope'></i>
				</div>
				<span class="progress"></span>
				<span class="label">30%</span>
			</div>
			<div class="card" style="--value: 60%">
				<div class="head">
					<div>
						<h2>12</h2>
						<p>Rendez-vous</p>
					</div>
					<i class='bx bx-calendar'></i>
				</div>
				<span class="progress"></span>
				<span class="label">60%</span>
			</div>
		</div>

		<div class="data">
			<div class="content-data">
				<h3>Répartition des tâches</h3>
				<!-- Graphique dynamique JS à ajouter ici -->
			</div>
			<div class="content-data">
				<h3>Discussion rapide</h3>
				<p>Bienvenue dans la section de messagerie du secrétariat.</p>
				<!-- Chat dynamique JS à ajouter ici -->
			</div>
		</div>
	</main>
</body>
</html>