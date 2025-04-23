<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Véhicules en vente</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 0;
      margin: 0;
      background-color: #f2f2f2;
    }
    header {
      background-color: #333;
      color: white;
      padding: 10px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .retour {
      color: white;
      text-decoration: none;
      font-size: 18px;
    }
    .retour:hover {
      text-decoration: underline;
    }
    h1 {
      margin: 0;
      font-size: 24px;
    }
    .search-form input[type="text"] {
      padding: 8px;
      font-size: 16px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }
    .vehicules-container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 20px;
      padding: 20px;
    }
    .vehicule {
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      overflow: hidden;
      transition: transform 0.3s;
    }
    .vehicule:hover {
      transform: scale(1.02);
    }
    .vehicule img {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }
    .vehicule-info {
      padding: 15px;
    }
    .vehicule-info h3 {
      margin: 0 0 10px;
    }
    .vehicule-info p {
      margin: 5px 0;
    }
    .acheter-btn {
      display: inline-block;
      margin-top: 10px;
      background-color: #4CAF50;
      color: white;
      padding: 10px 15px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      text-decoration: none;
    }
    .acheter-btn:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>

<header>
  <a class="retour" href="../connexion.php">&#8592; Retour</a>
  <h1>Véhicules électriques en vente</h1>
  <form class="search-form" method="GET" action="">
    <input type="text" name="recherche" placeholder="Rechercher une marque..." value="<?= htmlspecialchars($_GET['recherche'] ?? '') ?>">
  </form>
</header>

<div class="vehicules-container">
  <?php
  $vehicules = [
    ["Tesla Model S", "Berline électrique haut de gamme avec grande autonomie et accélération fulgurante.", 80000, "../images/Tesla Model S.jpeg", 3],
    ["Tesla Model 3", "Voiture électrique populaire offrant un excellent rapport qualité-prix.", 50000, "../images/1.jpeg", 5],
    ["Nissan Leaf", "Pionnière des voitures électriques compactes et accessibles.", 30000, "../images/2.jpeg", 4],
    ["BMW i3", "Voiture électrique urbaine au design unique et compact.", 35000, "../images/3.jpeg", 2],
    ["Audi e-tron", "SUV 100% électrique avec luxe et performance.", 75000, "../images/4.jpeg", 2],
    ["Hyundai Ioniq 5", "SUV électrique au design futuriste et recharge ultra-rapide.", 47000, "../images/5", 3],
    ["Porsche Taycan", "Supercar électrique avec conduite sportive et finition premium.", 120000, "../images/6.jpeg", 1],
    ["Renault Zoe", "Petite citadine électrique idéale pour les trajets urbains.", 28000, "../images/7.jpeg", 4],
    ["Kia EV6", "SUV électrique avec autonomie étendue et technologie moderne.", 49000, "https://images.unsplash.com/photo-1629116374335-98749cc2cf92", 2],
    ["Mercedes EQC", "SUV électrique de luxe, confortable et puissant.", 79000, "https://images.unsplash.com/photo-1589791394893-f24bba6bc9db", 2],
    ["Volvo XC40 Recharge", "SUV électrique avec sécurité de pointe.", 55000, "https://images.unsplash.com/photo-1661800304228-e084e7a0cc4d", 2],
    ["Peugeot e-208", "Citadine électrique stylée et économique.", 32000, "https://images.unsplash.com/photo-1588948379215-4b435f68de3f", 5],
    ["Opel Corsa-e", "Voiture électrique compacte et accessible.", 30000, "https://images.unsplash.com/photo-1605030914575-2c0a3f9ddbb2", 3],
    ["Skoda Enyaq", "SUV familial 100% électrique avec grand espace intérieur.", 49000, "https://images.unsplash.com/photo-1626365341245-8391b8040d98", 4],
    ["Mini Electric", "Version électrique de la célèbre Mini Cooper.", 36000, "https://images.unsplash.com/photo-1620290465064-bf162c8f92e4", 2],
    ["Fiat 500e", "Petite citadine électrique au look rétro.", 27000, "https://images.unsplash.com/photo-1612898266042-cd556832d539", 6],
    ["Honda e", "Compacte électrique avec un design unique et high-tech.", 33000, "https://images.unsplash.com/photo-1617080387423-d830f3848480", 5],
    ["Lucid Air", "Berline électrique de luxe avec autonomie exceptionnelle.", 95000, "https://images.unsplash.com/photo-1635488642235-15b34b77aa48", 1],
    ["BYD Atto 3", "SUV électrique chinois moderne et abordable.", 34000, "https://images.unsplash.com/photo-1660324385819-d4d5a177fc3e", 3],
    ["MG ZS EV", "SUV électrique compact et économique.", 30000, "https://images.unsplash.com/photo-1641923133674-99447c6c82c3", 2],
    ["Chevrolet Bolt EUV", "Compact électrique américain avec bon rapport autonomie/prix.", 33000, "https://images.unsplash.com/photo-1619983081602-6fd27a728b31", 3],
    ["Ford Mustang Mach-E", "SUV sportif électrique au style dynamique.", 62000, "https://images.unsplash.com/photo-1637106820085-b0cf6607e33e", 2],
    ["Volkswagen ID.4", "SUV familial moderne et 100% électrique.", 48000, "https://images.unsplash.com/photo-1623791171764-b7ef53897bde", 4],
    ["Toyota bZ4X", "Premier SUV électrique de Toyota avec autonomie correcte.", 46000, "https://images.unsplash.com/photo-1682369923922-06d2a70d4c39", 2],
  ];

  $recherche = strtolower(trim($_GET['recherche'] ?? ''));

  foreach ($vehicules as $v) {
    if ($recherche === '' || strpos(strtolower($v[0]), $recherche) !== false) {
      $url = "achat.php?nom=" . urlencode($v[0]) . 
             "&prix=" . urlencode($v[2]) . 
             "&image=" . urlencode($v[3]) . 
             "&description=" . urlencode($v[1]);
      echo "
      <div class='vehicule'>
        <img src='{$v[3]}' alt='Image de {$v[0]}'>
        <div class='vehicule-info'>
          <h3>{$v[0]}</h3>
          <p>{$v[1]}</p>
          <p><strong>Prix :</strong> {$v[2]} €</p>
          <p><strong>Stock :</strong> {$v[4]}</p>
          <a href='{$url}' class='acheter-btn'>Acheter</a>
        </div>
      </div>";
    }
  }
  ?>
</div>

</body>
</html>
